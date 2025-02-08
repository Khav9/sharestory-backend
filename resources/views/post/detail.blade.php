<x-app-layout>
    <div class="w-full max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-lg mt-5">
        {{-- Post Cover Image --}}
        @if ($post->cover)
        <div class="flex justify-center items-center">
            <img src="{{ Storage::url($post->cover) }}" alt="" class="shadow w-full max-h-100">
        </div>
        @else
        <h1>No cover</h1>
        @endif

        <br>

        {{-- Post Title --}}
        <h2 class="text-3xl font-bold mb-4 text-gray-800">{{ $post->title }}</h2>

        {{-- Post Content (Markdown Support & Security) --}}

        <div class="prose max-w-none">
            {!! $post->content !!}
        </div>
    </div>
</x-app-layout>