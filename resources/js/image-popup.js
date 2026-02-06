document.addEventListener('DOMContentLoaded', () => {
    const popup = document.getElementById('image-popup');
    const popupImage = document.getElementById('popup-image');

    document.querySelectorAll('.shop-item-btn').forEach(button => {
        button.addEventListener('click', () => {
            popupImage.src = button.dataset.image;
            popup.classList.remove('hidden');
        });
    });

    popup.addEventListener('click', () => {
        popup.classList.add('hidden');
        popupImage.src = '';
    });

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            popup.classList.add('hidden');
            popupImage.src = '';
        }
    });
});
