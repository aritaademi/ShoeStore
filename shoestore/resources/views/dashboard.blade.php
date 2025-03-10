<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    

    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="container py-12">
                    <h1 class="text-3xl font-bold mb-4">Shoes Statistics</h1>
                    
                   

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="border border-gray-400 px-4 py-2">ID</th>
                                <th class="border border-gray-400 px-4 py-2">Name</th>
                                <th class="border border-gray-400 px-4 py-2">Brand</th>
                                <th class="border border-gray-400 px-4 py-2">Category</th>
                                <th class="border border-gray-400 px-4 py-2">Description</th>
                                <th class="border border-gray-400 px-4 py-2">Price</th>
                                <th class="border border-gray-400 px-4 py-2">Image</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @if($shoes && $shoes->count() > 0)
                                @foreach ($shoes as $shoe)
                                    <tr>
                                        <td class="border border-gray-400 px-4 py-2">{{ $shoe->id }}</td>
                                        <td class="border border-gray-400 px-4 py-2">{{ $shoe->name }}</td>
                                        <td class="border border-gray-400 px-4 py-2">{{ $shoe->brand->name }}</td>
                                        <td class="border border-gray-400 px-4 py-2">{{ $shoe->category->name }}</td>
                                        <td class="border border-gray-400 px-4 py-2">{{ $shoe->description }}</td>
                                        <td class="border border-gray-400 px-4 py-2">${{ $shoe->price }}</td>
                                        <td class="border border-gray-400 px-4 py-2">
                                            <img src="{{ asset('storage/' . $shoe->image) }}" alt="{{ $shoe->name }}" class="w-16 h-16 object-cover" style="width:30px; height:30px">
                                        </td>
                                       
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


</x-app-layout>
