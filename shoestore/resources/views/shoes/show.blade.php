<!-- 
<div class="container">
        <h1>{{ $shoe->name }}</h1>
        <p><strong>Brand:</strong> {{ $shoe->brand->name }}</p>
        <p><strong>Category:</strong> {{ $shoe->category->name }}</p>
        <p><strong>Description:</strong> {{ $shoe->description }}</p>
        <p><strong>Price:</strong> ${{ $shoe->price }}</p>
        <div>
            <img src="{{ asset('storage/' . $shoe->image) }}" alt="{{ $shoe->name }}" class="img-preview" style="width:200px; height:200px;">
        </div>
        <a href="{{ route('shoes.index') }}" class="btn btn-secondary">Back to List</a>
       

</div> -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Shoe Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
            <!-- Shoe Image -->
            <div class="flex justify-center mb-6">
                <img src="{{ asset('storage/' . $shoe->image) }}" alt="{{ $shoe->name }}" class="w-64 h-64 object-cover rounded-md shadow">
            </div>
            
            <!-- Shoe Details -->
            <div class="text-gray-900 dark:text-gray-100">
                <h1 class="text-3xl font-bold text-center mb-4">{{ $shoe->name }}</h1>
                <p class="mb-2"><strong>Brand:</strong> {{ $shoe->brand->name }}</p>
                <p class="mb-2"><strong>Category:</strong> {{ $shoe->category->name }}</p>
                <p class="mb-4"><strong>Description:</strong> {{ $shoe->description }}</p>
                <p class="mb-4 text-lg"><strong>Price:</strong> ${{ $shoe->price }}</p>
            </div>

            <!-- Back Button -->
            <div class="text-center mt-6">
                <a href="{{ route('shoes.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 text-sm">
                    Back to List
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
