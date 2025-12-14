// resources/js/photo-upload.js

// Key under which we store the photo(s) in localStorage
const STORAGE_KEY = 'natuurquest_challenge_photo';

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

        if (!file) {
            status.textContent = 'Choose a photo first.';
            status.classList.remove('text-green-700');
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
                status.textContent = 'Photo saved on this device.';
                status.classList.remove('text-red-700');
                status.classList.add('text-green-700');

                // Show the saved photo in the preview box
                showPhoto(preview, dataUrl);
            } catch (e) {
                console.error('localStorage error:', e);
                status.textContent = 'Photo is too large to store.';
                status.classList.remove('text-green-700');
                status.classList.add('text-red-700');
            }
        };

        reader.onerror = () => {
            status.textContent = 'Something went wrong while reading the photo.';
            status.classList.remove('text-green-700');
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
    img.alt = 'Saved challenge photo';
    img.className = 'w-full h-full object-cover rounded-md';

    previewElement.appendChild(img);
}
