document.addEventListener('DOMContentLoaded', () => {
    const fileInput = document.getElementById('photo');
    const preview = document.getElementById('photo-preview');
    const status = document.getElementById('status-message');

    if (!fileInput || !preview) return;

    fileInput.addEventListener('change', () => {
        const file = fileInput.files?.[0];

        if (!file) return;

        if (!file.type.startsWith('image/')) {
            status.textContent = 'Dit bestand is geen afbeelding.';
            return;
        }

        const url = URL.createObjectURL(file);

        preview.innerHTML = `
            <img src="${url}"
                 alt="Voorbeeld van de gekozen foto"
                 class="w-full h-full object-cover rounded-md" />
        `;

        status.textContent = 'Foto geselecteerd. Klik op Foto uploaden om te verzenden.';
    });
});
