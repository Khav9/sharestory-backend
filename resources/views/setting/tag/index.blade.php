<x-app-layout>
  <div>
    <main class="flex-1 overflow-x-hidden overflow-y-auto">
      <div class="container mx-auto px-6 py-4">
        <!-- Add New Tag Button -->
        <div class="flex justify-end mb-4">
          @can('Tag create')
          <a href="{{route('admin.tags.create')}}" class="bg-blue-600 text-white font-medium px-4 py-1 rounded-md shadow-md hover:bg-blue-700 transition-colors">
            {{__('new_tag')}}
          </a>
          @endcan
        </div>

        <!-- Tags Table -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
          <table class="min-w-full bg-white">
            <thead class="bg-gray-100 text-gray-600 uppercase text-sm leading-normal">
              <tr>
                <th class="py-3 px-6 text-left w-1/4">{{__('tag_name')}}</th>
                <th class="py-3 px-6 text-right w-3/4">{{__('actions')}}</th>
              </tr>
            </thead>
            <tbody class="text-gray-700 text-sm font-light">
              @can('Tag access')
              @foreach($tags as $tag)
              <tr class="border-b border-gray-200 hover:bg-gray-100">
                <td class="py-2 px-6 text-left">{{ $tag->tagname }}</td>
                <td class="py-2 px-6 text-right flex justify-end space-x-3">
                  <!-- mange Button -->
                  <a href="{{route('admin.tagTranslations.show', $tag->id)}}" class="bg-green-200 text-black-700 px-3 py-1 ring-1 ring-gray-200 text-xs rounded-md">
                    {{__('manage')}}
                  </a>
                  <!-- Edit Button -->
                  @can('Tag edit')
                  <a href="{{route('admin.tags.edit', $tag->id)}}" class="bg-green-50 text-green-700 px-3 py-1 ring-1 ring-gray-200 text-xs rounded-md">
                    {{__('edit')}}
                  </a>
                  @endcan

                  <!-- Delete Button -->
                  @can('Tag delete')
                  <form action="{{ route('admin.tags.destroy', $tag->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button class="bg-red-50 text-red-700 px-3 py-1 ring-1 ring-gray-200 text-xs rounded-md">
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
          @can('Tag access')
          <div class="text-right p-4">
                    {{ $tags->links() }}
                </div>
          @endcan
        </div>
      </div>
    </main>
  </div>
</x-app-layout>