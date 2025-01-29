<x-app-layout>
   <div>
        <main class="flex-1 overflow-x-hidden overflow-y-auto">
            <div class="container mx-auto px-6 py-4">
                <!-- Add New Tag Button -->
                <div class="flex justify-end mb-4">
                  @can('Tag create')
                    <a href="{{route('admin.tags.create')}}" class="bg-blue-600 text-white font-medium px-4 py-2 rounded-md shadow-md hover:bg-blue-700 transition-colors">
                      {{__('new_tag')}}
                    </a>
                  @endcan
                </div>

                <!-- Tags Table -->
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                  <table class="min-w-full bg-white">
                    <thead class="bg-gray-100 text-gray-600 uppercase text-sm leading-normal">
                      <tr>
                        <th class="py-3 px-6 text-left w-2/4">{{__('tag_name')}}</th>
                        <th class="py-3 px-6 text-right w-2/4">{{__('actions')}}</th>
                      </tr>
                    </thead>
                    <tbody class="text-gray-700 text-sm font-light">
                      @can('Tag access')
                        @foreach($tags as $tag)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                          <td class="py-2 px-6 text-left">{{ $tag->tagname }}</td>
                          <td class="py-2 px-6 text-right flex justify-end space-x-2">
                            <!-- Edit Button -->
                            @can('Tag edit')
                            <a href="{{route('admin.tags.edit', $tag->id)}}" class="text-white bg-green-500 hover:bg-green-600 font-medium px-3 py-1 rounded-md shadow">
                              {{__('edit')}}
                            </a>
                            @endcan

                            <!-- Delete Button -->
                            @can('Tag delete')
                            <form action="{{ route('admin.tags.destroy', $tag->id) }}" method="POST" class="inline">
                              @csrf
                              @method('delete')
                              <button class="text-white bg-red-500 hover:bg-red-600 font-medium px-3 py-1 rounded-md shadow">
                                {{__('remove')}}
                              </button>
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
        </main>
    </div>
</x-app-layout>
