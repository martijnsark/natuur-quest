@props(['facts' => null])

@if ($facts)
    <div class="relative w-1/2 sm:w-1/3 h-32 sm:h-40 -rotate-12">

        <!-- Styling van de component -->

        <div class="absolute inset-0 flex items-center justify-center z-0">
            <div class="w-full h-full bg-[#F66D32] rounded-3xl blur-md -skew-x-12 opacity-95"></div>
        </div>

        <!-- Plaatsing van de content -->
        <div class="absolute inset-0 flex flex-col justify-start z-10 p-4">

            <div class="w-full text-center text-2xl font-bold mb-2">
                {{ $facts->title }}
            </div>

            <div class="w-full text-left px-2">
                {{ $facts->content }}
            </div>

        </div>

    </div>
@else
    <p>No fact found.</p>
@endif
