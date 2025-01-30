<x-app-layout>
    <div class="w-full mx-auto bg-white p-6 rounded-lg shadow-lg mt-5">
        <div class="flex justify-center items-center">
            @if ($post->cover)
            <img src="{{ Storage::url($post->cover) }}" alt="cover">
            @endif
        </div>
        <br>
        <h2 class="text-2xl font-semibold mb-4">{{$post->title}}</h2>
        <p class="mb-4">{{$post->content}}</p>
    </div>
</x-app-layout>