<x-app-layout>
    <div>
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            <div class="container mx-auto px-6 py-1">
                <div class="bg-white shadow-md rounded my-6 p-5">
                    <h2 class="text-lg font-semibold text-center mb-4">List Tag Translation</h2>
                    @if (count($translations) != 0)
                    @foreach($translations as $translation)
                    <div class="flex items-center justify-between border-b py-1">
                        <form action="{{ route('admin.tagTranslations.update', $translation->id) }}" method="POST" class="flex-1">
                            @csrf
                            @method('PUT')

                            <div class="flex items-center gap-4">
                                <p class="text-lg flex-1">
                                    <strong>{{ $translation->language }}</strong> |
                                    <input class="rounded-lg border py-2 w-32 sm:w-auto" type="text" name="translated" value="{{ $translation->translated }}">
                                </p>
                                <button type="submit" class="bg-green-500 text-white px-4 py-1 rounded hover:bg-green-600">Save</button>
                            </div>
                        </form>
                        <form action="{{ route('admin.tagTranslations.destroy', $translation->id) }}" method="POST" class="ml-1">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="bg-red-500 text-white px-4 py-1 rounded hover:bg-red-600">Remove</button>
                        </form>
                    </div>
                    @endforeach

                    @else
                    <div class="mb-4">
                        <h4 class="text-red-600">No Translation ...</h4>
                    </div>
                    @endif


                    <h2 class="text-lg font-semibold text-center mt-6 mb-4">New Tag Translation of <span class="text-green-400">{{$tags[0]['tagname']}}</span></h2>
                    <form method="POST" action="{{ route('admin.tagTranslations.store')}}">
                        @csrf
                        @method('post')
                        <div class="mb-4">
                            <label class="block text-sm font-medium">Translated</label>
                            <input type="text" class="w-full mt-1 p-2 border rounded" name="translated">
                        </div>
                        <input name="tag_id" type="hidden" value="{{$tags[0]['id']}}">
                        <div class="flex mb-4">
                            @foreach ($langs as $lang)
                            <div class="flex items-center me-4">
                                <input id="inline-radio-{{ $lang }}" type="radio" value="{{ $lang }}" name="language" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600 mr-3">
                                <label for="inline-radio-{{ $lang }}" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300 mr-3">{{ $lang }}</label>
                            </div>
                            @endforeach
                        </div>

                        <button type="submit" class="w-full btn btn-primary px-4 py-2 rounded bg-blue-500 text-white">Add</button>
                    </form>
                </div>
            </div>
        </main>
    </div>
</x-app-layout>