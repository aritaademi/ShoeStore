

 <x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container py-12">
                        <h1 class="text-3xl font-bold mb-6 text-center">Shoe Store</h1>
                        
                        <!-- Add New Shoe Button -->
                        <div class="mb-6 text-center">
                            <a href="{{ route('shoes.create') }}" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600 text-sm">Add New Shoe</a>
                        </div>

                        <!-- Shoes Card Grid -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                            @if($shoes && $shoes->count() > 0)
                                @foreach ($shoes as $shoe)
                                    <div class="bg-white dark:bg-gray-700 shadow-md rounded-lg p-4">
                                        <!-- Shoe Image -->
                                        <div class="flex justify-center mb-4">
                                            <img src="{{ asset('storage/' . $shoe->image) }}" alt="{{ $shoe->name }}" class="w-32 h-32 object-cover rounded-md">
                                        </div>
                                        <!-- Shoe Details -->
                                        <div class="text-center">
                                            <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{ $shoe->name }}</h2>
                                            <p class="text-gray-600 dark:text-gray-300">${{ $shoe->price }}</p>
                                        </div>
                                        <!-- Action Buttons -->
                                        <div class="mt-4 flex justify-around space-x-2">
                                            <a href="{{ route('shoes.edit', $shoe->id) }}" class="px-3 py-1 bg-yellow-400 text-white rounded hover:bg-yellow-500 text-sm">Edit</a>
                                            <a href="{{ route('shoes.show', $shoe->id) }}" class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 text-sm">Details</a>
                                            <form action="{{ route('shoes.destroy', $shoe->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 text-sm">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="text-center text-gray-500 dark:text-gray-400 col-span-full">
                                    No shoes available.
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
