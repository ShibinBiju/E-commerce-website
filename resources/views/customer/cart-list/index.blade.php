<x-app-layout>
    <div class="p-6 bg-[#111827] rounded-lg shadow-md">
        <div>
            @if (session('success'))
                <div class="bg-green-500 text-white px-4 py-3 rounded-md shadow-md">
                    {{ session('success') }}
                </div>
            @endif
        </div>
        <h3 class="text-gray-200">Your Cart</h3>
        @if(count($cartList) > 0)
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="text-gray-300 uppercase text-sm leading-normal border-b border-gray-700">
                    <th class="py-3 px-6">SI No.</th>
                    <th class="py-3 px-6">Category</th>
                    <th class="py-3 px-6">Product Name</th>
                    <th class="py-3 px-6">Price</th>
                    <th class="py-3 px-6">Quantity</th>
                    <th class="py-3 px-6">Image</th>
                    <th class="py-3 px-6 text-center">Action</th>
                </tr>
            </thead>
            <tbody class="text-gray-200 text-sm font-light">

            
                @foreach ($cartList as $index => $item)
                    <tr class="border-b border-gray-700 hover:bg-gray-800 transition">
                        <td class="py-3 px-6">{{ $loop->iteration }}</td>

                        <td class="py-3 px-6">{{ $item->product->category->name ?? 'N/A' }}</td>
                        <td class="py-3 px-6">{{ $item->product->name ?? 'N/A' }}</td>
                        <td class="py-3 px-6">{{ $item->price ?? 'N/A' }}</td>
                        <td class="py-3 px-6">{{ $item->quantity ?? 'N/A' }}</td>
                        <td class="py-3 px-6">
                            <img src="{{ asset('storage/' . $item->product->image) }}" alt="Image"
                                class="w-12 h-12 rounded-md object-cover">
                        </td>
                        <td class="py-3 px-6 text-center">
                            <form action="{{ route('cartList.delete', $item->id) }}" method="POST" class="inline"
                                onsubmit="return confirm('Are you sure you want to delete this product?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-400 hover:text-red-500 px-3">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
              
            </tbody>

        </table>

        <div class="flex mt-5">
            <span class="text-gray-200 m-4">Total Amount : {{ $totalAmount }} </span>
            <form id="orderForm" action="{{ route('order.store') }}" method="POST">
                @csrf
                <button type="submit" class="border text-blue-400 hover:text-blue-500 px-3 m-4"
                    onclick="return confirm('Are you sure you want to Buy these products?')">
                    Buy Now
                </button>
            </form>
        </div>
        @else
        <span class="py-3 px-6 text-red-600 ">Nothing on your cart!</span>

        @endif
    </div>

</x-app-layout>
