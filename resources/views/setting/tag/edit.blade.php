<x-app-layout>
   <div>
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            <div class="container mx-auto px-6 py-1">
              <div class="bg-white shadow-md rounded my-6 p-5">
                <form method="POST" action="{{ route('admin.tags.update',$tag->id)}}">
                  @csrf
                  @method('put')
                <div class="flex flex-col space-y-2">
                  <label for="role_name" class="text-gray-700 select-none font-medium">{{__('tag_name')}}</label>
                  <input
                    id="tagname"
                    type="text"
                    name="tagname"
                    value="{{ old('tagname',$tag->tagname) }}"
                    placeholder="{{__('enter_tag')}}"
                    class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200"
                  />
                </div>
                <div class="text-center mt-16">
                  <button type="submit" class="bg-blue-500 text-white font-bold px-5 py-1 rounded focus:outline-none shadow hover:bg-blue-500 transition-colors ">{{__('update')}}</button>
                </div>
              </div>

             
            </div>
        </main>
    </div>
</div>
</x-app-layout>
