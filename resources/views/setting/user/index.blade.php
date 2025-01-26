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
            <table class="text-left w-full border-collapse">
              <thead>
                <tr>
                  <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">{{__('username')}}</th>
                  <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">{{__('email')}}</th>
                  <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">{{__('created')}}</th>
                  <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">{{__('last_login')}}</th>
                  <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">{{__('post')}}</th>
                  <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light text-right">{{__('actions')}}</th>
                </tr>
              </thead>
              <tbody>
                @can('User access')
                @foreach($users as $user)
                <tr class="hover:bg-grey-lighter hover:bg-gray-50 dark:hover:bg-gray-600">
                  <td class="py-4 px-6 border-b border-grey-light">
                    <a href="{{ route('admin.users.show', $user->id) }}" class="block">
                      {{ $user->name }}
                    </a>
                  </td>
                  <td class="py-4 px-6 border-b border-grey-light">
                    <a href="{{ route('admin.users.show', $user->id) }}" class="block">
                      {{ $user->email }}
                    </a>
                  </td>
                  <td class="py-4 px-6 border-b border-grey-light">
                    <a href="{{ route('admin.users.show', $user->id) }}" class="block">
                      {{ $user->created_at }}
                    </a>
                  </td>
                  <td class="py-4 px-6 border-b border-grey-light">
                    <a href="{{ route('admin.users.show', $user->id) }}" class="block">
                      {{ $user->last_login }}
                    </a>
                  </td>
                  <td class="py-4 px-6 border-b border-grey-light">
                    <a href="{{ route('admin.users.show', $user->id) }}" class="block">
                      0
                    </a>
                  </td>
                  <td class="py-4 px-6 border-b border-grey-light text-right">
                    @can('User edit')
                    <a href="{{ route('admin.users.edit', $user->id) }}" class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark text-blue-400">Edit</a>
                    @endcan

                    @can('User delete')
                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline">
                      @csrf
                      @method('delete')
                      <button class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-blue hover:bg-blue-dark text-red-400">Delete</button>
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