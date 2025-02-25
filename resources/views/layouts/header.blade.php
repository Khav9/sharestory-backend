<?php
$languages = [
    'km' => ['name' => __('khmer'), 'flag' => 'km.jpg'],
    'en' => ['name' => __('english'), 'flag' => 'en.jpg'],
    'th' => ['name' => __('thai'), 'flag' => 'th.jpg'],
    // Add more languages as needed
];

$currentLanguage = session('locale', 'km');
?>

<header class="flex justify-between items-center py-4 px-6 bg-white border-b-4 border-indigo-600 shadow-md">
    <div class="flex items-center space-x-4">
        <!-- Sidebar toggle button -->
        <button @click="sidebarOpen = true" class="text-gray-500 focus:outline-none lg:hidden hover:text-indigo-600 transition">
            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </button>

        <!-- Search bar -->
        <div class="relative">
            <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
                <svg class="h-5 w-5 text-gray-500" viewBox="0 0 24 24" fill="none">
                    <path
                        d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    </path>
                </svg>
            </span>
            <input class="form-input w-32 sm:w-64 rounded-md pl-10 pr-4 focus:border-indigo-600 focus:ring focus:ring-indigo-200"
                type="text" placeholder="{{__('search')}}">
        </div>
    </div>

    <div class="flex items-center space-x-4">
        <!-- Language Selector -->
        <div x-data="{ dropdownOpen: false }" class="relative">
            <!-- Current Language Button -->
            <button @click="dropdownOpen = !dropdownOpen"
                class="py-2.5 px-4 flex items-center text-sm font-medium text-gray-500 bg-gray-100 border border-gray-300 rounded-lg hover:bg-gray-200 focus:ring-2 focus:ring-indigo-200 transition">

                <!-- Display Flag and Current Language -->
                <img src="{{ asset('data/lang/' . $currentLanguage . '.jpg') }}"
                    alt="{{ $languages[$currentLanguage]['name'] }}"
                    style="width: 25px; height: auto;" class="mr-1">
                {{ $languages[$currentLanguage]['name'] }}

                <svg class="w-4 h-4 ml-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <path d="M6 9l6 6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </button>

            <!-- Dropdown Menu -->
            <div x-show="dropdownOpen" @click.away="dropdownOpen = false"
                class="absolute mt-2 w-44 bg-white border border-gray-200 rounded-lg shadow-md z-20">
                <ul class="py-2 text-sm">
                    @foreach ($languages as $locale => $language)
                    <li>
                        <a href="{{ url('lang/' . $locale) }}"
                            class="flex w-full px-4 py-2 items-center hover:bg-gray-100">
                            <img src="{{ asset('data/lang/' . $language['flag']) }}"
                                alt="{{ $language['name'] }}"
                                style="width: 25px; height: auto;"
                                class="mr-1">
                            {{ $language['name'] }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <!-- End language selector -->

        <!-- Profile dropdown -->
        <div class="flex items-center">
            <div x-data="{ dropdownOpen: false }" class="relative">
                <button @click="dropdownOpen = ! dropdownOpen"
                    class="relative block h-8 w-8 rounded-full overflow-hidden shadow focus:outline-none">
                    @if (auth()->user()->profile)
                    <img class="h-full w-full object-cover"
                        src="{{ Storage::url(auth()->user()->profile) }}"
                        alt="Your avatar">
                    @else
                    <img class="h-full w-full object-cover"
                        src="{{ asset('images/profiles/none_profile.jpg') }}"
                        alt="Your avatar">
                    @endif
                </button>

                <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10"
                    style="display: none;"></div>

                <div x-show="dropdownOpen"
                    class="absolute right-0 mt-2 w-48 bg-white rounded-md overflow-hidden shadow-xl z-10"
                    style="display: none;">
                    <a href="{{ route('admin.profile') }}"
                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-600 hover:text-white">{{__('profile')}}</a>

                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <a href="{{ route('admin.logout') }}" onclick="event.preventDefault();
                                                this.closest('form').submit();"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-600 hover:text-white">{{__('logout')}}</a>
                    </form>
                </div>
            </div>
        </div>
</header>
<script src="//unpkg.com/alpinejs" defer></script>