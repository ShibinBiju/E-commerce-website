
<x-web-layout>
    <!-- Product Section with background #111827 -->
    <section class="container mx-auto px-4 py-8 bg-[#111827]">
        <h2 class="text-2xl font-bold mb-6">Products</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            <!-- Product Card 1 -->
            <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden">
                <img src="https://via.placeholder.com/350x200" alt="Product Name" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-xl font-semibold">Product Name</h3>
                    <p class="mt-2 text-gray-300">
                        A brief description of the product goes here. Highlight key features.
                    </p>
                    <div class="mt-4 flex items-center justify-between">
                        <span class="text-lg font-bold">$29.99</span>
                        <button class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded">
                            Add to Cart
                        </button>
                    </div>
                </div>
            </div>

            <!-- Product Card 2 -->
            <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden">
                <img src="https://via.placeholder.com/350x200" alt="Another Product" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-xl font-semibold">Another Product</h3>
                    <p class="mt-2 text-gray-300">
                        Short description goes here.
                    </p>
                    <div class="mt-4 flex items-center justify-between">
                        <span class="text-lg font-bold">$39.99</span>
                        <button class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded">
                            Add to Cart
                        </button>
                    </div>
                </div>
            </div>

            <!-- Product Card 3 -->
            <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden">
                <img src="https://via.placeholder.com/350x200" alt="Third Product" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-xl font-semibold">Third Product</h3>
                    <p class="mt-2 text-gray-300">
                        Another product description goes here.
                    </p>
                    <div class="mt-4 flex items-center justify-between">
                        <span class="text-lg font-bold">$49.99</span>
                        <button class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded">
                            Add to Cart
                        </button>
                    </div>
                </div>
            </div>
            <!-- You can add more product cards here -->
        </div>
    </section>

</x-web-layout>
