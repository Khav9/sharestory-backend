<x-app-layout>

    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
            integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    </head>
    <main class="min-h-screen pt-14 pb-5 px-4 lg:px-8">
        <!-- Main Content -->
        <section id="content" class="transition-all duration-500 ease-in-out">
            <!-- User Summary -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="bg-slate-50 p-5 flex justify-between items-center shadow rounded-lg">
                    <div>
                        <h3 class="font-bold text-base">{{ __('total_active_user') }}</h3>
                        <p class="text-gray-500 text-base">{{$totalUser}}</p>
                    </div>
                    <i class="fa-solid fa-user p-4 bg-green-200 rounded-md"></i>
                </div>
                <div class="bg-slate-50 p-5 flex justify-between items-center shadow rounded-lg">
                    <div>
                        <h3 class="font-bold text-base">{{ __('total_post') }}</h3>
                        <p class="text-gray-500 text-base">{{$totalPost}}</p>
                    </div>
                    <i class="fa-solid fa-clipboard p-4 bg-pink-200 rounded-md"></i>
                </div>
                <div class="bg-slate-50 p-5 flex justify-between items-center shadow rounded-lg">
                    <div>
                        <h3 class="font-bold text-base">{{ __('total_draft') }}</h3>
                        <p class="text-gray-500 text-base">{{$totalDraft}}</p>
                    </div>
                    <i class="fab fa-firstdraft p-4 bg-gray-400 rounded-md"></i>
                </div>
                <div class="bg-slate-50 p-5 flex justify-between items-center shadow rounded-lg">
                    <div>
                        <h3 class="font-bold text-lg">Total SM</h3>
                        <p class="text-gray-500 text-sm">30</p>
                    </div>
                    <i class="fa-solid fa-users p-4 bg-yellow-200 rounded-md"></i>
                </div>
            </div>
            <!-- User List and Chart -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mt-6">
                <!-- User List -->
                <div class="overflow-x-auto shadow-md rounded-lg">
                    <table class="w-full table-auto">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="text-left px-4 py-2">#</th>
                                <th class="text-left px-4 py-2">{{ __('avatar') }}</th>
                                <th class="text-left px-4 py-2">{{ __('username') }}</th>
                                <th class="text-left px-4 py-2">{{ __('react') }}</th>
                                <th class="text-left px-4 py-2">{{ __('period') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @can('Dashboard access')
                            @foreach($users as $key => $user)
                            <tr class="border-b">
                                <td class="px-4 py-2">{{$key + 1}}</td>
                                <td class="px-4 py-2">
                                    <img class="inline-block h-8 w-8 rounded-full ring-2 ring-white"
                                        src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.25&w=256&h=256&q=80"
                                        alt="">
                                </td>
                                <td class="px-4 py-2">{{$user->name}}</td>
                                <td class="px-4 py-2">10k</td>
                                <td class="px-4 py-2">3h</td>
                            </tr>
                            @endforeach
                            @endcan
                        </tbody>
                    </table>
                </div>
                <!-- Chart -->
                <div class="shadow-md rounded-lg p-4">
                    <h2 class="text-lg font-semibold mb-4">{{ __('user_source') }}</h2>
                    <div id="pie_chart" class="w-full h-[300px] md:h-[400px]"></div>
                </div>
            </div>
        </section>
    </main>
    <script>
    var translations = {
        student: "{{ __('student') }}",
        teacher: "{{ __('teacher') }}",
        researcher: "{{ __('researcher') }}",
        coder: "{{ __('coder') }}",
        any: "{{ __('any') }}"
    };

    var options = {
        chart: {
            height: '300px',
            type: "pie",
        },
        colors: ["#4CAF50", "#FF9800", "#2196F3", "#9C27B0", "#FF5722"],
        series: [35, 15, 18, 12, 20],
        labels: [
            translations.student,
            translations.teacher,
            translations.researcher,
            translations.coder,
            translations.any
        ]
    };

    var chart = new ApexCharts(document.querySelector("#pie_chart"), options);
    chart.render();
</script>

</x-app-layout>