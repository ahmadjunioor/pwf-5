<x-app-layout>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#1f2937] overflow-hidden shadow-sm sm:rounded-lg border border-gray-700">
                <div class="p-8 text-gray-100">
                    
                    <div class="flex items-center mb-8">
                        <a href="{{ route('products.index') }}" class="mr-4 text-gray-400 hover:text-white transition">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                            </svg>
                        </a>
                        <div>
                            <h2 class="text-2xl font-bold text-white">Add Product</h2>
                            <p class="text-gray-400 text-sm mt-1">Fill in the details to add a new product</p>
                        </div>
                    </div>

                    <form action="{{ route('products.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-6">
                            <label for="name" class="block text-sm font-medium text-gray-300 mb-2">Nama Produk</label>
                            <input type="text" name="name" id="name" class="w-full bg-[#111827] border border-gray-600 text-white rounded-md shadow-sm focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 p-3" placeholder="e.g. Wireless Headphones" required>
                        </div>

                        <div class="mb-6">
                            <label for="category_id" class="block text-sm font-medium text-gray-300 mb-2">Kategori</label>
                            <select name="category_id" id="category_id" class="w-full bg-[#111827] border border-gray-600 text-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 p-3" required>
                                <option value="" disabled selected>-- Pilih Kategori --</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                            <div>
                                <label for="qty" class="block text-sm font-medium text-gray-300 mb-2">Quantity</label>
                                <input type="number" name="qty" id="qty" class="w-full bg-[#111827] border border-gray-600 text-white rounded-md shadow-sm focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 p-3" value="0" min="0" required>
                            </div>
                            <div>
                                <label for="price" class="block text-sm font-medium text-gray-300 mb-2">Price (Rp)</label>
                                <input type="number" name="price" id="price" class="w-full bg-[#111827] border border-gray-600 text-white rounded-md shadow-sm focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 p-3" value="0" min="0" required>
                            </div>
                        </div>

                        <div class="flex justify-end gap-4 pt-4">
                            <a href="{{ route('products.index') }}" class="px-5 py-2.5 border border-gray-600 rounded-md shadow-sm text-sm font-medium text-gray-300 bg-transparent hover:bg-gray-700 focus:outline-none transition">
                                Cancel
                            </a>
                            <button type="submit" class="px-5 py-2.5 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-500 hover:bg-indigo-600 focus:outline-none transition">
                                Save Product
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>