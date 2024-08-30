<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    @stack('style')
    <!-- Popper -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <!-- Main Styling -->
    @vite(['resources/css/dashboard.css'])
</head>

<body
    class="m-0 font-sans text-base antialiased font-normal dark:bg-slate-900 leading-default bg-gray-50 text-slate-500">
    <div class="absolute w-full bg-blue-500 dark:hidden min-h-75"></div>
    <!-- sidenav  -->
    <aside
        class="fixed inset-y-0 flex-wrap items-center justify-between block w-full p-0 my-4 overflow-y-auto antialiased transition-transform duration-200 -translate-x-full bg-white border-0 shadow-xl dark:shadow-none dark:bg-slate-850 max-w-64 ease-nav-brand z-990 xl:ml-6 rounded-2xl xl:left-0 xl:translate-x-0"
        aria-expanded="false">
        <div class="h-19">
            <i class="absolute top-0 right-0 p-4 opacity-50 cursor-pointer fas fa-times dark:text-white text-slate-400 xl:hidden"
                sidenav-close></i>
            <a class="w-full px-4 py-6 m-0 text-sm whitespace-nowrap dark:text-white text-slate-700 flex justify-between items-center"
                href="{{ route('dashboard.index') }}" target="_blank">
                <img src="{{ asset('assets/img/logo.png') }}"
                    class="inline h-full max-w-full transition-all duration-200 ease-nav-brand max-h-6"
                    alt="main_logo" />
                <span
                    class="ml-1 font-semibold transition-all duration-200 ease-nav-brand inline-block text-center text-base">Tirta
                    Asasta Fun Walk</span>
            </a>
        </div>

        <hr
            class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />

        <div class="items-center block w-auto max-h-screen overflow-auto h-sidenav grow basis-full">
            <ul class="flex flex-col pl-0 mb-0">
                <li class="mt-0.5 w-full">
                    <a class="nav-link py-2.7 dark:text-white dark:opacity-80 ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 transition-colors {{ Route::currentRouteName() == 'dashboard.index' ? 'active' : '' }}"
                        href="{{ route('dashboard.index') }}">
                        <div
                            class="mr-2 flex h-12 w-12 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <i class="relative top-0 leading-normal bx bxs-dashboard text-xl"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Dashboard</span>
                    </a>
                </li>
                <li class="mt-0.5 w-full">
                    <a class="nav-link py-2.7 dark:text-white dark:opacity-80 ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 transition-colors {{ Route::currentRouteName() == 'dashboard.participant.index' ? 'active' : '' }}"
                        href="{{ route('dashboard.participant.index') }}">
                        <div
                            class="mr-2 flex h-12 w-12 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <i class="relative top-0 leading-normal bx bxs-user text-xl"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Participant</span>
                    </a>
                </li>
                <li class="mt-0.5 w-full">
                    <a class="nav-link py-2.7 dark:text-white dark:opacity-80 ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 transition-colors {{ Route::currentRouteName() == 'dashboard.customer.index' ? 'active' : '' }}"
                        href="{{ route('dashboard.customer.index') }}">
                        <div
                            class="mr-2 flex h-12 w-12 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <i class="relative top-0 leading-normal bx bxs-user-account text-xl"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Customer</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="px-4">
            <p class="text-center text-lg font-semibold">Hi, {{ auth()->user()->email }}</p>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="w-full block px-6 py-2 font-bold text-center bg-gradient-to-tl from-slate-600 to-slate-300 dark:from-slate-900 dark:to-slate-600 uppercase align-middle transition-all rounded-lg cursor-pointer leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px active:opacity-85 hover:shadow-md text-white">Logout</button>
            </form>

            <div class="rounded-xl bg-gradient-to-tl to-blue-400 from-violet-500 mt-4 p-4">
                <div class="min-h-6 mb-0.5 flex items-center justify-center">
                    <input id="darkmode"
                        class="rounded-10 duration-300 ease-in-out after:rounded-circle after:shadow-2xl after:duration-300 checked:after:translate-x-5.3 h-5 mt-0.5 relative float-left w-10 cursor-pointer appearance-none border border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain bg-left bg-no-repeat align-top transition-all after:absolute after:top-px after:h-4 after:w-4 after:translate-x-px after:bg-white dark:after:bg-slate-700 after:content-[''] checked:border-blue-500/95 checked:bg-blue-500/95 checked:bg-none checked:bg-right"
                        type="checkbox" />
                    <label for="darkmode"
                        class="inline-block pl-3 mb-0 ml-0 font-semibold cursor-pointer select-none text-sm text-white">Dark
                        Mode</label>
                </div>
            </div>
        </div>
    </aside>

    <!-- end sidenav -->

    <main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
        <!-- Navbar -->
        <nav class="relative flex flex-wrap items-center justify-between px-0 py-2 mx-6 transition-all ease-in shadow-none duration-250 rounded-2xl lg:flex-nowrap lg:justify-start lg:py-6"
            navbar-main navbar-scroll="false">
            <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">
                <nav>
                    <h2 class="mb-0 font-bold text-white capitalize">@yield('title')</h2>
                </nav>
                <a href="javascript:;" class="block p-0 text-sm text-white transition-all ease-nav-brand xl:hidden"
                    sidenav-trigger>
                    <div class="w-4.5 overflow-hidden">
                        <i class="ease mb-0.75 relative block h-0.5 rounded-sm bg-white transition-all"></i>
                        <i class="ease mb-0.75 relative block h-0.5 rounded-sm bg-white transition-all"></i>
                        <i class="ease relative block h-0.5 rounded-sm bg-white transition-all"></i>
                    </div>
                </a>
            </div>
        </nav>
        <!-- end Navbar -->
        <!-- cards -->
        <div class="w-full px-6 py-6 lg:pt-0 mx-auto min-h-[90vh] flex flex-col justify-between">
            <section id="content">
                @yield('content')
            </section>

            <footer class="pt-4">
                <div class="w-full px-6 mx-auto">
                    <div class="flex flex-wrap items-center -mx-3 lg:justify-center">
                        <div class="w-full max-w-full px-3 mt-0 mb-6 shrink-0 lg:mb-0 lg:w-1/2 lg:flex-none">
                            <div class="text-sm leading-normal text-center text-slate-500">
                                ©
                                <script>
                                    document.write(new Date().getFullYear() + ",");
                                </script>

                                <span class="font-semibold text-slate-700 dark:text-white">PT. Tirta Asasta</span>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end cards -->
    </main>
</body>
<!-- plugin for charts  -->
<script src="{{ asset('assets/dashboard/js/plugins/chartjs.min.js') }}" async></script>
<!-- plugin for scrollbar  -->
<script src="{{ asset('assets/dashboard/js/plugins/perfect-scrollbar.min.js') }}" async></script>
<!-- main script file  -->
<script src="{{ asset('assets/dashboard/js/argon-dashboard-tailwind.js?v=1.0.1') }}" async></script>

@stack('script')
<script>
    // init darkmode 
    const initDarkMode = localStorage.getItem('darkMode') === 'true';
    const darkModeBtn = document.getElementById('darkmode');

    if (initDarkMode) {
        document.querySelector('html').classList.add('dark');
        darkModeBtn.checked = true;
    }

    darkModeBtn.addEventListener('change', function(e) {
        if (darkModeBtn.checked) {
            document.querySelector('html').classList.add('dark');
            localStorage.setItem('darkMode', true);
        } else {
            document.querySelector('html').classList.remove('dark');
            localStorage.setItem('darkMode', false);
        }
    })
</script>

</html>
