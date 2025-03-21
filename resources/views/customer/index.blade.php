<x-app-layout>
    <div class="p-6 bg-[#111827] rounded-lg shadow-md">
        <div>
            @if (session('success'))
                <div class="bg-green-500 text-white px-4 py-3 rounded-md shadow-md">
                    {{ session('success') }}
                </div>
            @endif
        </div>
        <h3 class="text-gray-200">Your Orders!</h3>
        @if(count($orders) > 0)
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="text-gray-300 uppercase text-sm leading-normal border-b border-gray-700">
                    <th class="py-3 px-6">SI No.</th>
                    <th class="py-3 px-6">Category</th>
                    <th class="py-3 px-6">Product Name</th>
                    <th class="py-3 px-6">Price</th>
                    <th class="py-3 px-6">Quantity</th>
                    <th class="py-3 px-6">Image</th>
                    <th class="py-3 px-6 text-center">status</th>
                </tr>
            </thead>
            <tbody class="text-gray-200 text-sm font-light">
                @foreach ($orders as $index => $item)
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
                        <td class="py-3 px-6">{{ $item->status ?? 'N/A' }}</td>
                    </tr>
                @endforeach
            </tbody>

        </table>

        @else
        <span class="py-3 px-6 text-red-600 ">Nothing on your cart!</span>

        @endif

    </div>

</x-app-layout>
