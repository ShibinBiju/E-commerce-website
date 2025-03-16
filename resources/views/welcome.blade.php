<x-web-layout>
    <!-- Product Section with background #111827 -->
    <section class="container mx-auto px-4 py-8 bg-[#111827]">
        <h2 class="text-2xl font-bold mb-6">Products</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            <!-- Product Card 1 -->

            @if (count($products) > 0)
                @foreach ($products as $item)
                    <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden">
                        <img src="{{ asset('storage/' . $item->image) }}" alt="Product Name"
                            class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h3 class="text-xl font-semibold">{{ $item->name }}</h3>

                            <p class="d-inline-block text-truncate mt-2 text-gray-300" style="max-width: 300px;"
                                data-bs-toggle="tooltip" title="{{ $item->description }}">
                                {{ \Illuminate\Support\Str::words($item->description, 10, '...') }}
                            </p>
                            <div class="mt-4 flex items-center justify-between">
                                <span class="text-lg font-bold">₹ {{ $item->price }}</span>
                                <button class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded addToCart"
                                    data-id="{{ $item->id }}">
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

        <!-- Quantity Selection Modal -->
        <div id="quantityModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
            <div class="bg-gray-800 p-6 rounded-lg shadow-lg w-96">
                <h2 class="text-white text-xl font-bold mb-4">Select Quantity</h2>

                <input type="number" id="quantityInput"
                    class="w-full p-3 border rounded-md bg-gray-700 text-white focus:ring focus:ring-blue-500"
                    min="1" value="1">

                <div class="mt-4 flex justify-between">
                    <button id="closeModal"
                        class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded">Cancel</button>
                    <button id="confirmQuantity" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded">Add
                        to Cart</button>
                </div>
            </div>
        </div>

    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            console.log("Script Loaded ✅");

            const modal = document.getElementById("quantityModal");
            const closeModal = document.getElementById("closeModal");
            const confirmQuantity = document.getElementById("confirmQuantity");
            const quantityInput = document.getElementById("quantityInput");

            let selectedProductId = null;
            let selectedProductPrice = null;

            const userId = {{ auth()->check() ? auth()->id() : 'null' }};

            // Get CSRF token
            const csrfMetaTag = document.querySelector('meta[name="csrf-token"]');
            const csrfToken = csrfMetaTag ? csrfMetaTag.getAttribute("content") : "";

            if (!csrfToken) {
                console.error("❌ CSRF token is missing! AJAX requests will fail.");
            }

            // Add to Cart button click
            document.body.addEventListener("click", function(event) {
                if (event.target.classList.contains("addToCart")) {
                    console.log("🛒 Add to Cart Clicked ✅");

                    selectedProductId = event.target.getAttribute("data-id");
                    selectedProductPrice = event.target.closest(".p-4").querySelector("span").textContent
                        .replace("₹", "").trim();

                    quantityInput.value = 1;
                    modal.classList.remove("hidden");
                }
            });

            // Close modal
            closeModal.addEventListener("click", function() {
                modal.classList.add("hidden");
            });

            // Confirm and send AJAX request
            confirmQuantity.addEventListener("click", function() {
                let quantity = parseInt(quantityInput.value);

                if (isNaN(quantity) || quantity < 1) {
                    alert("⚠️ Please select a valid quantity!");
                    return;
                }

                console.log(
                    `📡 Sending Request for Product ID: ${selectedProductId}, Quantity: ${quantity}, User ID: ${userId}, Price: ${selectedProductPrice}`
                );

                // Send AJAX request
                fetch("{{ route('cartList.store') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "Accept": "application/json",
                            "X-CSRF-TOKEN": csrfToken,
                        },
                        body: JSON.stringify({
                            product_id: selectedProductId,
                            quantity: quantity,
                            user_id: userId,
                            price: selectedProductPrice
                        }),
                    })
                    .then(response => {
                        if (response.status === 401) {
                            alert('login or register first!')
                            window.location.href = "{{ route('register') }}"; 
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.success) {
                            window.location.href = data.redirect_url;
                            modal.classList.add("hidden");
                        } else {
                            alert("❌ Failed to add product. Try again.");
                        }
                    })
                    .catch(error => {
                        console.error("Error:", error);
                    });

            });
        });
    </script>

</x-web-layout>
