<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center w-full">


            <!-- Profiel -->
            <div class="flex-1 flex justify-start">
                <div class="flex flex-col items-center gap-2">
                    <x-h3>Profiel</x-h3>

                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open" @click.outside="open = false" class="focus:outline-none">
                            <img class="w-12 cursor-pointer"
                                 src="{{ Vite::asset('resources/images/user.png') }}"
                                 alt="Ga naar jouw profiel">
                        </button>

                        <div x-show="open" x-transition
                             class="absolute mt-2 w-48 bg-white border rounded-lg shadow-lg z-50">

                            @auth
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                            class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">
                                        Log out
                                    </button>
                                </form>
                            @else
                                <a href="{{ route('login') }}"
                                   class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                                    Log in
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex-1 flex justify-center">
                <div>
                    <x-main-button :href="route('home')">
                        {{ __('Terug naar Home') }}
                    </x-main-button>
                </div>
            </div>

            <!-- Balans -->
            <div class="flex-1 flex justify-end">
                <div class="flex flex-col text-center">
                    <x-h3>Balans</x-h3>
                    <p id="user-balance" class="font-text text-xl"> 🌸{{ auth()->user()->balance ?? 0 }}</p>
                </div>
            </div>

        </div>
    </x-slot>

    <x-card>
        <x-h3 class="text-center">Welkom in de shop!</x-h3>
        <p class="text-white">
            Hier kun je, je punten inruilen voor mooie prijzen!
        </p>
    </x-card>

    <x-card class="px-4">
        <div>
            <div class="font-semibold mb-2 text-center text-white">Jouw items:</div>
            <div id="user-items" class="flex gap-4 mt-2">
                <!-- Hier komen de gekochte items via localstorage -kan voor later gebruik een db aanmaken- -->
            </div>
        </div>
    </x-card>

    <div class="px-4">
        <div class="flex gap-5">
            <x-shop-item class="">
                <button
                    type="button"
                    class="shop-item-btn"
                    data-item-id="brunelzaadjes"
                    data-title="Brunelzaadjes"
                    data-image="{{ Vite::asset('resources/images/brunelzaadjes.jpg') }}"
                    data-price="500">

                    <img class="w-full h-full transition-transform duration-300 hover:scale-105"
                         src="{{ Vite::asset('resources/images/brunelzaadjes.jpg') }}"
                         alt="Brunelzaadjes">
                </button>
            </x-shop-item>

            <x-shop-item>
                <button
                    type="button"
                    class="shop-item-btn"
                    data-item-id="klaprooszaadjes"
                    data-title="Klaprooszaadjes"
                    data-image="{{ Vite::asset('resources/images/klaprooszaadjes.jpg') }}"
                    data-price="1000">

                    <img class="w-full h-full transition-transform duration-300 hover:scale-105"
                         src="{{ Vite::asset('resources/images/klaprooszaadjes.jpg') }}"
                         alt="Klaprooszaadjes">
                </button>
            </x-shop-item>

            <x-shop-item>
                <button
                    type="button"
                    class="shop-item-btn"
                    data-item-id="korenbloemzaadjes"
                    data-title="Korenbloemzaadjes"
                    data-image="{{ Vite::asset('resources/images/korenbloemzaadjes.webp') }}"
                    data-price="2000">

                    <img class="w-full h-full transition-transform duration-300 hover:scale-105"
                         src="{{ Vite::asset('resources/images/korenbloemzaadjes.webp') }}"
                         alt="korenbloemzaadjes">
                </button>
            </x-shop-item>
        </div>
    </div>

    <div id="image-popup"
         class="hidden fixed inset-0 px-6 z-50 flex items-center justify-center">

        <!-- Overlay (invisible wrapper for click detection) -->
        <div id="popup-overlay" class="absolute inset-0"></div>

        <!-- Panel -->
        <div class="bg-white rounded-xl shadow-xl p-6 max-w-md w-full border-4 border-black relative z-10"
             id="popup-panel">

            <h3 id="popup-title" class="text-xl font-bold text-gray-900 mb-2"></h3>

            <img
                id="popup-image"
                src=""
                alt=""
                class="w-full h-auto rounded-full mb-4">

            <div class="flex justify-between items-center mb-4">
                <span id="popup-price" class="text-lg font-semibold text-gray-800"></span>

                <button
                    id="popup-buy"
                    class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">
                    Koop
                </button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const useLocalOnly = true;

            const popup = document.getElementById('image-popup');
            const overlay = document.getElementById('popup-overlay');
            const panel = document.getElementById('popup-panel');
            const popupImage = document.getElementById('popup-image');
            const popupPrice = document.getElementById('popup-price');
            const buyButton = document.getElementById('popup-buy');
            const userBalanceEl = document.getElementById('user-balance');
            const userItems = document.getElementById('user-items');

            const popupTitle = document.getElementById('popup-title');

            let currentItemId = null;
            let currentPrice = 0;
            let currentImage = '';

            const csrfTokenMeta = document.querySelector('meta[name="csrf-token"]');
            const csrfToken = csrfTokenMeta ? csrfTokenMeta.getAttribute('content') : '';

            const STORAGE_KEY = 'purchasedItems';

            function getDisplayedBalance() {
                if (!userBalanceEl) return 0;
                const txt = userBalanceEl.textContent || '';
                const digits = txt.replace(/[^\d\-]/g, '');
                return parseInt(digits || '0', 10);
            }

            function setDisplayedBalance(n) {
                if (!userBalanceEl) return;
                userBalanceEl.textContent = ' 🌸' + n;
            }

            function loadPurchasedFromStorage() {
                try {
                    return JSON.parse(localStorage.getItem(STORAGE_KEY) || '[]');
                } catch (e) {
                    return [];
                }
            }

            function savePurchasedToStorage(arr) {
                localStorage.setItem(STORAGE_KEY, JSON.stringify(arr));
            }

            function isItemPurchased(itemId) {
                if (!itemId) return false;
                const arr = loadPurchasedFromStorage();
                return arr.includes(itemId);
            }

            function markAsPurchasedInUI(itemId, imageSrc) {
                if (!itemId) return;
                const btn = document.querySelector(`.shop-item-btn[data-item-id="${itemId}"]`);
                if (btn) {
                    btn.disabled = true;
                    btn.classList.add('opacity-40', 'cursor-not-allowed');
                    btn.classList.remove('hover:scale-105');
                    const img = btn.querySelector('img');
                    if (img) img.classList.add('grayscale');
                }

                if (userItems) {
                    if (userItems.querySelector(`img[data-item-id="${itemId}"]`)) return;

                    const div = document.createElement('div');
                    div.className = 'w-20 h-20 rounded overflow-hidden border flex items-center justify-center bg-white';
                    const img = document.createElement('img');

                    img.src = imageSrc || (btn ? btn.dataset.image : '');
                    img.alt = itemId;
                    img.dataset.itemId = itemId;
                    img.className = 'object-cover w-full h-full';
                    div.appendChild(img);
                    userItems.appendChild(div);
                }

                const arr = loadPurchasedFromStorage();
                if (!arr.includes(itemId)) {
                    arr.push(itemId);
                    savePurchasedToStorage(arr);
                }
            }

            // markeer al gekochte producten
            (function markPurchasedOnLoad() {
                const purchased = loadPurchasedFromStorage();
                if (!purchased || !purchased.length) return;
                purchased.forEach(id => {
                    const btn = document.querySelector(`.shop-item-btn[data-item-id="${id}"]`);
                    const imageSrc = btn ? btn.dataset.image : '';
                    markAsPurchasedInUI(id, imageSrc);
                });
            })();

            // pop-up logica
            document.querySelectorAll('.shop-item-btn').forEach(button => {
                if (button.disabled) return;

                button.addEventListener('click', () => {
                    currentItemId = button.dataset.itemId || button.dataset.item || null;
                    currentPrice = parseInt(button.dataset.price || '0', 10) || 0;
                    currentImage = button.dataset.image || '';
                    const currentTitle = button.dataset.title || ''; // ✅ haal titel uit data-title

                    // Vul popup elementen
                    popupTitle.textContent = currentTitle;  // ✅ titel
                    popupImage.src = currentImage;
                    popupPrice.textContent = (currentPrice ? currentPrice + ' punten' : '');
                    popup.classList.remove('hidden');
                });
            });

            // overlay close
            overlay.addEventListener('click', () => {
                popup.classList.add('hidden');
                popupImage.src = '';
            });
            if (panel) panel.addEventListener('click', (e) => e.stopPropagation());
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape') {
                    popup.classList.add('hidden');
                    popupImage.src = '';
                }
            });

            // Koop logica
            buyButton.addEventListener('click', async () => {
                if (!currentItemId) {
                    alert('Geen item geselecteerd.');
                    return;
                }

                if (useLocalOnly) {
                    const bal = getDisplayedBalance();
                    if (currentPrice > bal) {
                        alert('Niet genoeg punten.');
                        return;
                    }
                    setDisplayedBalance(bal - currentPrice);
                    markAsPurchasedInUI(currentItemId, currentImage);
                    popup.classList.add('hidden');
                    popupImage.src = '';
                    alert('Aankoop gelukt!');
                    return;
                }

                buyButton.disabled = true;
                try {
                    const res = await fetch('{{ route("shop.buy") }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken,
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({
                            item: currentItemId,
                            price: currentPrice,
                            image: currentImage
                        })
                    });

                    const data = await res.json();

                    if (!res.ok) {
                        alert(data.message || 'Aankoop mislukt.');
                        if (data.balance !== undefined) setDisplayedBalance(data.balance);
                        return;
                    }

                    if (data.balance !== undefined) setDisplayedBalance(data.balance);
                    const imageToUse = (data.purchase && data.purchase.image) ? data.purchase.image : currentImage;
                    markAsPurchasedInUI(currentItemId, imageToUse);

                    popup.classList.add('hidden');
                    popupImage.src = '';
                    alert(data.message || 'Aankoop gelukt!');
                } catch (err) {
                    console.error(err);
                    alert('Er is iets misgegaan bij de aankoop.');
                } finally {
                    buyButton.disabled = false;
                }
            });
        });
    </script>

</x-app-layout>

