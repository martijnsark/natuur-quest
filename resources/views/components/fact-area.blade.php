@props(['facts' => null])

@if ($facts)
    <div
        class="relative w-full sm:w-1/3 max-w-sm mx-auto bg-primary border-4 border-[#F6692C] rounded-3xl skew-x-2 animate-factCard overflow-hidden">

        <!-- Styling -->
        <div class="absolute bottom-0 -right-6 w-16 h-16 bg-[#F6692C] rounded-full opacity-70"></div>
        <div class="absolute top-4 right-12 w-10 h-10 bg-[#F6692C] rounded-full rotate-12 opacity-70"></div>
        <div class="absolute bottom-1/4 -left-6 w-12 h-12 bg-[#F6692C] rounded-full opacity-70"></div>

        <!-- Title vak -->
        <div class="w-1/2 bg-[#F6692C] text-white text-center py-3 px-6 rounded-br-3xl font-bold text-xl font-sans">
            {{ $facts->title }}
        </div>

        <!-- Content vak -->
        <div class="p-6 text-white">
            <p class="text-base leading-relaxed mb-4">
                {{ $facts->content }}
            </p>
        </div>

    </div>
@else
    <p class="text-center text-gray-500">No fact found.</p>
@endif
