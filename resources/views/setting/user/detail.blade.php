<x-app-layout>
    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
        <div class="container mx-auto px-6 py-2">
            <div class="flex items-center mb-4">
                <a href="{{ route('admin.users.index')}}" class="flex items-center hover:text-blue-600 hover:underline">
                    USERS
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 ml-1">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                    </svg>
                </a>
                <span class="ml-2 text-gray-600 font-medium">{{$user->name}}</span>
            </div>

            <div class="bg-white shadow-md rounded my-6">

                <div class="relative overflow-x-auto shadow-md sm:rounded-lg custom-scrollbar">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 sticky top-0 z-10">
                            <tr>
                                <th scope="col" class="p-4">
                                    <div class="flex items-center">
                                        <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="checkbox-all-search" class="sr-only">checkbox</label>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3">Title</th>
                                <th scope="col" class="px-6 py-3">Status</th>
                                <th scope="col" class="px-6 py-3">React</th>
                                <th scope="col" class="px-6 py-3">Comment</th>
                                <th scope="col" class="px-6 py-3">Created_At</th>
                                <th scope="col" class="px-6 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @can('Post access')
                            @foreach($posts as $post)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="w-4 p-4">
                                    <div class="flex items-center">
                                        <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                    </div>
                                </td>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$post->title}}
                                </th>
                                <td class="px-6 py-4">
                                    @if($post->publish)
                                    <span class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-white bg-green-500 rounded-full">Publish</span>
                                    @else
                                    <span class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-white bg-gray-500 rounded-full">Draft</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">10000</td>
                                <td class="px-6 py-4">10000000</td>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$post->created_at}}
                                </td>
                                <td class="flex items-center px-6 py-4">
                                    @can('Post delete')
                                    <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('delete')
                                        <button class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3">Delete</button>
                                    </form>
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                            @endcan
                        </tbody>
                    </table>
                </div>
                @can('Post access')
                <div class="text-right p-4">
                    {{ $posts->links() }}
                </div>
                @endcan

            </div>
        </div>
    </main>

    <!-- Custom Scrollbar CSS -->
    <style>
        .custom-scrollbar::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #4a5568; /* Darker gray */
            border-radius: 4px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #2d3748; /* Even darker gray */
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: #e2e8f0; /* Light gray */
        }
    </style>
</x-app-layout>
