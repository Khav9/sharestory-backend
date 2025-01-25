<x-app-layout>
    <div>
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            <div class="container mx-auto px-6 py-8">


                <h3 class="text-gray-700 text-3xl font-medium">Welcome : {{ auth()->user()->name }}</h3>

                <p>Role : <b>
                        @foreach(auth()->user()->roles as $role)
                        {{ $role->name }}
                        @endforeach
                    </b> </p>

                <a href="{{ url('lang/en') }}">English</a>
                <a href="{{ url('lang/km') }}">Khmer</a>
                <a href="{{ url('lang/th') }}">thai</a>
                <br>
                <br>
                <br>


                <p>{{ __('welcome')}}</p>

            </div>
        </main>
    </div>
    </div>
</x-app-layout>