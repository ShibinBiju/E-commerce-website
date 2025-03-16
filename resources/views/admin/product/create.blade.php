<x-app-layout>
    <div class="flex items-center justify-center min-h-screen bg-[#111827]">
        <div class="w-full max-w-lg bg-gray-900 p-6 rounded-lg shadow-lg">
            <h2 class="text-white text-2xl font-semibold mb-6 text-center">Add New Product</h2>
    
            <!-- General Validation Errors -->
            @if ($errors->any())
                <div class="mb-4 p-3 bg-red-500 text-white rounded-md">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>- {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
    
            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
    
                <!-- Product Name -->
                <div class="mb-4">
                    <label for="name" class="block text-gray-300 text-sm font-medium mb-2">Product Name</label>
                    <input type="text" id="name" name="name" 
                        value="{{ old('name', @$category->name ?? '') }}" 
                        class="w-full p-3 border rounded-md bg-gray-800 text-white focus:ring focus:ring-blue-500">
                    @error('name') 
                        <span class="text-red-500 text-sm">{{ $message }}</span> 
                    @enderror
                </div>

                <!-- Price -->
                <div class="mb-4">
                    <label for="price" class="block text-gray-300 text-sm font-medium mb-2">Price</label>
                    <input type="number" id="price" name="price" 
                        value="{{ old('price', @$category->price ?? '') }}" 
                        class="w-full p-3 border rounded-md bg-gray-800 text-white focus:ring focus:ring-blue-500">
                    @error('price') 
                        <span class="text-red-500 text-sm">{{ $message }}</span> 
                    @enderror
                </div>

                <!-- Image -->
                <div class="mb-4">
                    <label for="image" class="block text-gray-300 text-sm font-medium mb-2">Image</label>
                    <input type="file" id="image" name="image" 
                        class="w-full p-3 border rounded-md bg-gray-800 text-white focus:ring focus:ring-blue-500">
                    @error('image') 
                        <span class="text-red-500 text-sm">{{ $message }}</span> 
                    @enderror
                </div>

                <!-- Category ID -->
                <div class="mb-4">
                    <label for="category_id" class="block text-gray-300 text-sm font-medium mb-2">Category</label>
                    <select id="category_id" name="category_id" class="w-full p-3 border rounded-md bg-gray-800 text-white focus:ring focus:ring-blue-500">
                        <option value="">Select a Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id') 
                        <span class="text-red-500 text-sm">{{ $message }}</span> 
                    @enderror
                </div>

                <!-- Description -->
                <div class="mb-4">
                    <label for="description" class="block text-gray-300 text-sm font-medium mb-2">Description</label>
                    <textarea id="description" name="description" rows="4" class="w-full p-3 border rounded-md bg-gray-800 text-white focus:ring focus:ring-blue-500">{{ old('description', @$category->description ?? '') }}</textarea>
                    @error('description') 
                        <span class="text-red-500 text-sm">{{ $message }}</span> 
                    @enderror
                </div>
    
                <!-- Submit Button -->
                <div class="mt-6">
                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-md transition">Create Product</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
