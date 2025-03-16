<x-app-layout>
    <div class="flex items-center justify-center min-h-screen bg-[#111827]">
        <div class="w-full max-w-lg bg-gray-900 p-6 rounded-lg shadow-lg">
            <h2 class="text-white text-2xl font-semibold mb-6 text-center">Edit Status</h2>
    
            @if ($errors->any())
                <div class="mb-4 p-3 bg-red-500 text-white rounded-md">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>- {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
    
            <form action="{{ route('ordersList.update', $order->id) }}" method="POST">
                @csrf
                @method('PATCH')
    
                <!-- Order Status -->
                <div class="mb-4">
                    <label for="status" class="block text-gray-300 text-sm font-medium mb-2">
                        Select Status
                    </label>
                    <select id="status" name="status" 
                        class="w-full p-3 border rounded-md bg-gray-800 text-white focus:ring focus:ring-blue-500">
                        <option value="pending" {{ old('status', $order->status ?? '') == 'pending' ? 'selected' : '' }}>
                            Pending
                        </option>
                        <option value="shipped" {{ old('status', $order->status ?? '') == 'shipped' ? 'selected' : '' }}>
                            Shipped
                        </option>
                        <option value="delivered" {{ old('status', $order->status ?? '') == 'delivered' ? 'selected' : '' }}>
                            Delivered
                        </option>
                    </select>
                </div>
                
                <!-- Submit Button -->
                <div class="mt-6">
                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-md transition">
                        Update Order
                    </button>
                </div>
                
            </form>
        </div>
    </div>
</x-app-layout>
