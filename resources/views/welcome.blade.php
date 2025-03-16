
<x-web-layout>
    <!-- Product Section with background #111827 -->
    <section class="container mx-auto px-4 py-8 bg-[#111827]">
        <h2 class="text-2xl font-bold mb-6">Products</h2>

        
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            <!-- Product Card 1 -->

            @if(count($products) > 0)
            @foreach ($products as $item)
            <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden">
                <img src="{{ asset('storage/' . $item->image) }}" alt="Product Name" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-xl font-semibold">{{$item->name}}</h3>
                  
                    <p class="d-inline-block text-truncate mt-2 text-gray-300" style="max-width: 300px;" data-bs-toggle="tooltip" title="{{ $item->description }}">
                        {{ \Illuminate\Support\Str::words($item->description, 10, '...') }}
                    </p>
                    <div class="mt-4 flex items-center justify-between">
                        <span class="text-lg font-bold">₹ {{$item->price}}</span>
                        <button class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded">
                            Add to Cart
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <h3 class="text-xl font-semibold text-red-500">No Products Added!</h3>
            @endif
       

          
        </div>
    </section>

    <script>
   
    document.addEventListener("DOMContentLoaded", function () {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });
</script>
 

</x-web-layout>
