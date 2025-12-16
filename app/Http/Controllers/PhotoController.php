<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Photo;
use App\Models\Word;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * PhotoController
 *
 * Deze controller regelt ALLEEN de foto-upload flow voor spelers.
 * Belangrijk uitgangspunt:
 * - Spelers uploaden een foto voor hun eigen assignment + woord
 * - Spelleiders kunnen hier NIET uploaden
 * - Beoordelen gebeurt volledig in ChallengeController (judgePhotos)
 */
class PhotoController extends Controller
{
    /**
     * Toon de foto-upload pagina voor een speler
     *
     * Verwacht via de URL:
     * - assignment_id → welke assignment (speler + game)
     * - word_id       → voor welk woord de foto is
     *
     * Voorbeeld:
     * /photo-upload?assignment_id=5&word_id=12
     */
    public function create(Request $request)
    {
        // (optioneel) laatst geüploade foto's, vooral handig voor debug / testen
        $photos = Photo::latest()->take(10)->get();

        // IDs komen uit de link (bijv. vanuit finish.blade.php)
        $assignmentId = $request->query('assignment_id');
        $wordId = $request->query('word_id');

        // Variabele om foutmeldingen door te geven aan de view
        $blockingError = null;

        /**
         * 1️⃣ Controle: zijn assignment_id en word_id überhaupt aanwezig?
         * Zo niet → speler is hier niet via de juiste flow gekomen
         */
        if (!$assignmentId || !$wordId) {
            $blockingError = 'Ik mis assignment_id en/of word_id.';
            return view(
                'challenges.photo-upload',
                compact('photos', 'assignmentId', 'wordId', 'blockingError')
            );
        }

        // Haal bijbehorende modellen op
        $assignment = Assignment::find($assignmentId);
        $word = Word::find($wordId);

        /**
         * 2️⃣ Controle: bestaan assignment en word echt in de database?
         * Dit voorkomt handmatig geknutsel met URL’s
         */
        if (!$assignment || !$word) {
            $blockingError = 'assignment_id of word_id bestaat niet.';
            return view(
                'challenges.photo-upload',
                compact('photos', 'assignmentId', 'wordId', 'blockingError')
            );
        }

        /**
         * 3️⃣ Rechten-check:
         * Alleen de gebruiker die aan deze assignment gekoppeld is,
         * mag een foto uploaden.
         *
         * Hiermee voorkom je:
         * - Dat een spelleider uploadt
         * - Dat een andere speler uploadt voor iemand anders
         */
        $authUser = auth()->user();
        if (
            !$authUser ||
            (int) $assignment->user_id !== (int) $authUser->id
        ) {
            $blockingError = 'Je mag niet uploaden voor deze assignment.';
            return view(
                'challenges.photo-upload',
                compact('photos', 'assignmentId', 'wordId', 'blockingError')
            );
        }

        /**
         * Alles is OK:
         * - juiste IDs
         * - assignment + word bestaan
         * - gebruiker is eigenaar
         */
        return view(
            'challenges.photo-upload',
            compact('photos', 'assignmentId', 'wordId', 'blockingError')
        );
    }

    /**
     * Verwerk het uploaden van een foto
     *
     * Wordt aangeroepen via POST /photo-upload
     */
    public function store(Request $request)
    {
        /**
         * 1️⃣ Validatie van input
         * - photo moet een image zijn
         * - assignment_id en word_id moeten bestaan
         */
        $validated = $request->validate([
            'photo' => ['required', 'image', 'max:20480'],
            'assignment_id' => ['required', 'integer', 'exists:assignments,id'],
            'word_id' => ['required', 'integer', 'exists:words,id'],
        ]);

        // Haal assignment op
        $assignment = Assignment::find($validated['assignment_id']);

        /**
         * 2️⃣ Rechten-check (opnieuw, veiligheid!)
         * Nooit vertrouwen op alleen de GET-pagina
         */
        $authUser = auth()->user();
        if (
            !$authUser ||
            !$assignment ||
            (int) $assignment->user_id !== (int) $authUser->id
        ) {
            return redirect()
                ->route('photos.create', [
                    'assignment_id' => $validated['assignment_id'],
                    'word_id' => $validated['word_id'],
                ])
                ->withErrors([
                    'photo' => 'Je mag niet uploaden voor deze assignment.'
                ]);
        }

        /**
         * 3️⃣ Opslaan van de foto in storage/app/public/photos
         */
        $file = $request->file('photo');
        $path = $file->store('photos', 'public');

        /**
         * 4️⃣ Data klaarzetten voor database
         * Alleen kolommen gebruiken die echt bestaan (veilig voor migrations)
         */
        $data = [
            'assignment_id' => $validated['assignment_id'],
            'word_id'       => $validated['word_id'],
            'photo'         => $path,
        ];

        // Optionele metadata
        if (Schema::hasColumn('photos', 'original_name')) {
            $data['original_name'] = $file->getClientOriginalName();
        }
        if (Schema::hasColumn('photos', 'mime')) {
            $data['mime'] = $file->getMimeType();
        }
        if (Schema::hasColumn('photos', 'size')) {
            $data['size'] = $file->getSize();
        }

        // 5️⃣ Opslaan in de database
        Photo::create($data);

        /**
         * 6️⃣ Redirect na upload
         *
         * Heel belangrijk:
         * - Speler wordt NIET naar showGame gestuurd
         * - showGame is (deels) spelleider-gericht
         *
         * Nu:
         * - speler gaat terug naar home
         * - spelleider ziet de foto later op judge-photos
         */
        return redirect()
            ->route('home')
            ->with('success', 'Foto is ingestuurd. Wacht op beoordeling van de spelleider.');
    }
}
