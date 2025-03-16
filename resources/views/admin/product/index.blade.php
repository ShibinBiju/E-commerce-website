<x-app-layout>
    <div class="p-6 bg-[#111827] rounded-lg shadow-md">
        <div  >
            <a href="{{route('product.create')}}"><button class=" border p-2 text-red-400 hover:text-red-500 px-3">Add Product</button></a>
        </div>
        <div>
            @if(session('success'))
    <div class="bg-green-500 text-white px-4 py-3 rounded-md shadow-md">
        {{ session('success') }}
    </div>
@endif
        </div>
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="text-gray-300 uppercase text-sm leading-normal border-b border-gray-700">
                    <th class="py-3 px-6">SI No.</th>
                    <th class="py-3 px-6">Category</th>
                    <th class="py-3 px-6">Product Name</th>
                    <th class="py-3 px-6">Image</th>
                    <th class="py-3 px-6 text-center">Action</th>
                </tr>
            </thead>
            <tbody class="text-gray-200 text-sm font-light">
                @foreach($products as $index => $item)
                <tr class="border-b border-gray-700 hover:bg-gray-800 transition">
                    <td class="py-3 px-6">{{ $loop->iteration }}</td>
                   
                    <td class="py-3 px-6">{{ $item->category->name ?? 'N/A' }}</td>
                    <td class="py-3 px-6">{{ $item->name ?? 'N/A' }}</td>
                    <td class="py-3 px-6">
                        <img src="{{ asset('storage/' . $item->image) }}" alt="Image" class="w-12 h-12 rounded-md object-cover">
                    </td>
                    <td class="py-3 px-6 text-center">
                        <a href="{{ route('product.edit', $item->id) }}" class="text-blue-400 hover:text-blue-500 px-3">Edit</a>
                        <form action="{{ route('product.delete', $item->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this product?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-400 hover:text-red-500 px-3">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            
        </table>
    </div>
    
</x-app-layout>