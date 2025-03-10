






<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Shoe') }}
        </h2>
    </x-slot>

    <div class="container mx-auto py-12">
        <div class="max-w-2xl mx-auto bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
            <h1 class="text-2xl font-bold mb-6 text-center">Edit Shoe</h1>

            @if ($errors->any())
                <div class="bg-red-100 text-red-600 p-4 rounded mb-6">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- enctype="multipart/form-data": Ensures the form can handle file uploads (e.g., a new image for the shoe). -->
            <form action="{{ route('shoes.update', $shoe->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Shoe Name</label>
                    <input type="text" name="name" id="name" class="w-full p-2 border rounded" value="{{ old('name', $shoe->name) }}" required>
                </div>

                <div>
                    <label for="brand_id" class="block text-sm font-medium text-gray-700">Brand</label>
                    <select name="brand_id" id="brand_id" class="w-full p-2 border rounded" required>
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}" {{ $shoe->brand_id == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="category_id" class="block text-sm font-medium text-gray-700">Category</label>
                    <select name="category_id" id="category_id" class="w-full p-2 border rounded" required>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $shoe->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" id="description" class="w-full p-2 border rounded" rows="4">{{ old('description', $shoe->description) }}</textarea>
                </div>

                <div>
                    <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                    <input type="number" name="price" id="price" class="w-full p-2 border rounded" value="{{ old('price', $shoe->price) }}" step="0.01" required>
                </div>

                <div>
                    <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                    <input type="file" name="image" id="image" class="w-full p-2 border rounded">
                </div>

                <div class="text-center">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Update Shoe</button>
                    <a href="{{ route('shoes.index') }}" class="ml-4 bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Back</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

