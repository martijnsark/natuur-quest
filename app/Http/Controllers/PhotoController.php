<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Photo;
use App\Models\Word;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class PhotoController extends Controller
{
    public function create(Request $request)
    {
        // Laatste uploads (alleen handig voor debug)
        $photos = Photo::latest()->take(10)->get();

        // Deze 2 moeten ALTIJD mee komen via de link (facts -> photo-upload)
        $assignmentId = $request->query('assignment_id');
        $wordId = $request->query('word_id');

        $blockingError = null;

        // Zonder IDs geen upload (zo voorkom je random uploads buiten flow)
        if (!$assignmentId || !$wordId) {
            $blockingError = 'Ik mis assignment_id en/of word_id.';
            return view('challenges.photo-upload', compact('photos', 'assignmentId', 'wordId', 'blockingError'));
        }

        // Check of IDs bestaan
        $assignment = Assignment::find($assignmentId);
        $word = Word::find($wordId);

        if (!$assignment || !$word) {
            $blockingError = 'assignment_id of word_id bestaat niet.';
            return view('challenges.photo-upload', compact('photos', 'assignmentId', 'wordId', 'blockingError'));
        }

        // Security: alleen de eigenaar van deze assignment mag uploaden
        $authUser = auth()->user();
        if (!$authUser || (int) $assignment->user_id !== (int) $authUser->id) {
            $blockingError = 'Je mag niet uploaden voor deze assignment.';
            return view('challenges.photo-upload', compact('photos', 'assignmentId', 'wordId', 'blockingError'));
        }

        return view('challenges.photo-upload', compact('photos', 'assignmentId', 'wordId', 'blockingError'));
    }

    public function store(Request $request)
    {
        // Validatie: file + IDs moeten kloppen
        $validated = $request->validate([
            'photo' => ['required', 'image', 'max:20480'],
            'assignment_id' => ['required', 'integer', 'exists:assignments,id'],
            'word_id' => ['required', 'integer', 'exists:words,id'],
        ]);

        $assignment = Assignment::find($validated['assignment_id']);

        // Security: alleen eigenaar
        $authUser = auth()->user();
        if (!$authUser || !$assignment || (int) $assignment->user_id !== (int) $authUser->id) {
            return redirect()
                ->route('photos.create', [
                    'assignment_id' => $validated['assignment_id'],
                    'word_id' => $validated['word_id'],
                ])
                ->withErrors(['photo' => 'Je mag niet uploaden voor deze assignment.']);
        }

        // File opslaan in storage/app/public/photos/...
        $file = $request->file('photo');
        $path = $file->store('photos', 'public');

        // DB record maken
        $data = [
            'assignment_id' => $validated['assignment_id'],
            'word_id' => $validated['word_id'],
            'photo' => $path,
        ];

        // Optioneel: alleen als kolommen bestaan
        if (Schema::hasColumn('photos', 'original_name')) {
            $data['original_name'] = $file->getClientOriginalName();
        }
        if (Schema::hasColumn('photos', 'mime')) {
            $data['mime'] = $file->getMimeType();
        }
        if (Schema::hasColumn('photos', 'size')) {
            $data['size'] = $file->getSize();
        }

        Photo::create($data);

        // Na upload: terug naar facts (wachten op spelleider)
        return redirect()
            ->route('facts', ['assignment' => $assignment->id])
            ->with('success', 'Foto is ingestuurd. Wacht op beoordeling van de spelleider.');
    }
}
