<x-app-layout>
  <div>
    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
      <div class="container mx-auto px-6 py-2">
        <div class="text-right">
          @can('User create')
          <a href="{{route('admin.users.create')}}" class="bg-blue-500 text-white font-bold px-5 py-1 rounded focus:outline-none shadow hover:bg-blue-500 transition-colors ">{{__('new_user')}}</a>
          @endcan
        </div>

        <div class="bg-white shadow-md rounded my-6 ">
          <div class="overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
              <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 sticky top-0 z-10">
                <tr>
                  <th scope="col" class="p-4">
                    <div class="flex items-center">
                      <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                      <label for="checkbox-all-search" class="sr-only">checkbox</label>
                    </div>
                  </th>
                  <th scope="col" class="px-6 py-3 whitespace-nowrap text-base">{{__('username')}}</th>
                  <th scope="col" class="px-6 py-3 whitespace-nowrap text-base">{{__('email')}}</th>
                  <th scope="col" class="px-6 py-3 whitespace-nowrap text-base">{{__('created')}}</th>
                  <th scope="col" class="px-6 py-3 whitespace-nowrap text-base">{{__('last_login')}}</th>
                  <th scope="col" class="px-6 py-3 whitespace-nowrap text-base">{{__('post')}}</th>
                  <th scope="col" class="px-6 py-3 whitespace-nowrap text-base">{{__('actions')}}</th>
                </tr>
              </thead>
              <tbody>
                @can('User access')
                @foreach($users as $user)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600 cursor-pointer"
                  onclick="window.location='{{ route('admin.users.show', $user->id) }}';">
                  <td class="w-4 p-4">
                    <div class="flex items-center">
                      <input id="checkbox-table-search-{{ $user->id }}" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                      <label for="checkbox-table-search-{{ $user->id }}" class="sr-only">checkbox</label>
                    </div>
                  </td>
                  <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $user->name }}
                  </td>
                  <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $user->email }}
                  </td>
                  <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $user->created_at }}
                  </td>
                  <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $user->last_login }}
                  </td>
                  <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $user->posts_count }}
                  </td>
                  <td class="flex items-center px-6 py-4">
                    @can('User edit')
                    <a href="{{ route('admin.users.edit', $user->id) }}" class="bg-green-50 text-green-700 px-3 py-1 ring-1 ring-gray-200 text-xs rounded-md mr-3">Edit</a>
                    @endcan
                    @can('User delete')
                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline">
                      @csrf
                      @method('delete')
                      <button class="bg-red-50 text-red-700 px-3 py-1 ring-1 ring-gray-200 text-xs rounded-md">Delete</button>
                    </form>
                    @endcan
                  </td>
                </tr>

                @endforeach
                @endcan
              </tbody>
            </table>
          </div>
        </div>

      </div>
    </main>
  </div>
  </div>
</x-app-layout>