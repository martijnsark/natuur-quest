// resources/js/photo-upload.js

// Key under which we store the photo(s) in localStorage
const STORAGE_KEY = 'natuurquest_challenge_photo';

// Max file size to avoid localStorage / performance issues (2MB)
const MAX_FILE_SIZE = 2 * 1024 * 1024;

document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('photo-form');
    const fileInput = document.getElementById('photo');
    const status = document.getElementById('status-message');
    const preview = document.getElementById('photo-preview');

    if (!form || !fileInput || !status || !preview) {
        // Stop early if the elements are not on this page
        return;
    }

    // When the page loads, try to show the last saved photo from localStorage
    loadSavedPhoto(preview);

    // Handle form submit without actually sending it to the server
    form.addEventListener('submit', (event) => {
        event.preventDefault(); // prevent real POST request

        const file = fileInput.files[0];

        // Reset status styling
        status.classList.remove('text-green-700', 'text-red-700');

        if (!file) {
            status.textContent = 'Kies eerst een foto.';
            status.classList.add('text-red-700');
            return;
        }

        // Hard size limit (important when saving to localStorage)
        if (file.size > MAX_FILE_SIZE) {
            status.textContent = 'Deze foto is te groot. Kies een foto kleiner dan 2 MB.';
            status.classList.add('text-red-700');
            return;
        }

        // Only accept images
        if (!file.type.startsWith('image/')) {
            status.textContent = 'Dit bestand is geen afbeelding. Kies een foto-bestand.';
            status.classList.add('text-red-700');
            return;
        }

        // Use FileReader to convert the photo to a base64 Data URL
        const reader = new FileReader();

        reader.onload = () => {
            const dataUrl = reader.result;

            // Save the Data URL in localStorage
            try {
                localStorage.setItem(STORAGE_KEY, dataUrl);

                status.textContent = 'Foto opgeslagen! Je gaat terug naar de startpagina...';
                status.classList.add('text-green-700');

                // Show the saved photo in the preview box
                showPhoto(preview, dataUrl);

                // Redirect to homepage (dashboard) after a short delay for feedback
                setTimeout(() => {
                    window.location.href = '/dashboard';
                }, 800);

            } catch (e) {
                console.error('localStorage error:', e);

                // localStorage can fail if storage is full or the base64 string becomes too big
                status.textContent = 'Opslaan lukt niet. Probeer een kleinere foto.';
                status.classList.add('text-red-700');
            }
        };

        reader.onerror = () => {
            status.textContent = 'Er ging iets mis bij het lezen van de foto.';
            status.classList.add('text-red-700');
        };

        reader.readAsDataURL(file);
    });
});

/**
 * Tries to load a previously saved photo from localStorage and show it.
 */
function loadSavedPhoto(previewElement) {
    const saved = localStorage.getItem(STORAGE_KEY);

    if (saved) {
        showPhoto(previewElement, saved);
    }
}

/**
 * Replaces the preview container content with an <img> element.
 */
function showPhoto(previewElement, dataUrl) {
    previewElement.innerHTML = '';

    const img = document.createElement('img');
    img.src = dataUrl;
    img.alt = 'Laatst opgeslagen challenge-foto';
    img.className = 'w-full h-full object-cover rounded-md';

    previewElement.appendChild(img);

    // Make it easier for keyboard users: focus preview after saving
    previewElement.focus?.();
}
