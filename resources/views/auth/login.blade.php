<!--

=========================================================
* Argon Dashboard 2 Tailwind - v1.0.1
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard-tailwind
* Copyright 2022 Creative Tim (https://www.creative-tim.com)

* Coded by www.creative-tim.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Argon Dashboard 2 Tailwind by Creative Tim</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Main Styling -->
    @vite('resources/css/dashboard.css')
</head>

<body class="m-0 font-sans antialiased font-normal bg-blue-400 dark:bg-slate-700 text-start text-base leading-default text-blue-800 dark:text-slate-200">
    <main class="mt-0 transition-all duration-200 ease-in-out">
        <section>
            <div class="relative flex items-center min-h-screen p-0 overflow-hidden bg-center bg-cover">
                <div class="container z-1">
                    <div class="flex flex-wrap -mx-3 justify-center">
                        <div
                            class="flex flex-col w-full max-w-full px-3 mx-auto lg:mx-0 shrink-0 md:flex-0 md:w-7/12 lg:w-5/12 xl:w-4/12 bg-white/60 dark:bg-black/40 backdrop-blur-sm backdrop-saturate-200 rounded-xl">
                            <div
                                class="relative flex flex-col min-w-0 break-words bg-transparent border-0 shadow-none py-4 rounded-2xl bg-clip-border">
                                <div class="p-6 pb-0 mb-0">
                                    <h4 class="font-bold text-blue-800 dark:text-slate-200">Sign In</h4>
                                    <p class="mb-0">Enter your email and password to sign in</p>
                                </div>
                                <div class="flex-auto p-6">
                                    <form role="form" method="POST" action="{{route('login')}}">
                                        @csrf
                                        @method('POST')
                                        <div class="mb-4">
                                            <input type="email" placeholder="Email" name="email"
                                                class="focus:shadow-primary-outline dark:bg-slate-700 dark:placeholder:text-slate-200/80 dark:text-slate-200/80 text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-slate-200 bg-slate-100 bg-clip-padding p-3 font-normal text-slate-700 outline-none transition-all placeholder:text-slate-500 focus:border-blue-500 focus:outline-none" value="{{ old('email') }}" />
                                            {{-- check input errors --}}
                                            @error('email')
                                                <small class="text-red-500 mt-2">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <input type="password" placeholder="Password" name="password"
                                                class="focus:shadow-primary-outline dark:bg-slate-700 dark:placeholder:text-slate-200/80 dark:text-slate-200/80 text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-slate-200 bg-slate-100 bg-clip-padding p-3 font-normal text-slate-700 outline-none transition-all placeholder:text-slate-500 focus:border-blue-500 focus:outline-none" />
                                            {{-- check input errors --}}
                                            @error('password')
                                                <small class="text-red-500 mt-2">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="flex items-center pl-12 mb-0.5 text-left min-h-6">
                                            <input id="rememberMe" name="remember"
                                                class="mt-0.5 rounded-10 duration-250 ease-in-out after:rounded-circle after:shadow-2xl after:duration-250 checked:after:translate-x-5.3 h-5 relative float-left -ml-12 w-10 cursor-pointer appearance-none border border-solid border-slate-200 bg-zinc-700/10 bg-none bg-contain bg-left bg-no-repeat align-top transition-all after:absolute after:top-px after:h-4 after:w-4 after:translate-x-px after:bg-white dark:checked:after:bg-slate-800 after:content-[''] checked:border-blue-500/95 checked:bg-blue-500/95 checked:bg-none checked:bg-right"
                                                type="checkbox" />
                                            <label
                                                class="ml-2 font-normal cursor-pointer select-none text-sm"
                                                for="rememberMe">Remember me</label>
                                        </div>
                                        <div class="flex items-center pl-12 mb-0.5 text-left min-h-6">
                                            <input id="darkMode" name="remember"
                                                class="mt-0.5 rounded-10 duration-250 ease-in-out after:rounded-circle after:shadow-2xl after:duration-250 checked:after:translate-x-5.3 h-5 relative float-left -ml-12 w-10 cursor-pointer appearance-none border border-solid border-slate-200 bg-zinc-700/10 bg-none bg-contain bg-left bg-no-repeat align-top transition-all after:absolute after:top-px after:h-4 after:w-4 after:translate-x-px after:bg-white dark:checked:after:bg-slate-800 after:content-[''] checked:border-blue-500/95 checked:bg-blue-500/95 checked:bg-none checked:bg-right"
                                                type="checkbox" />
                                            <label
                                                class="ml-2 font-normal cursor-pointer select-none text-sm"
                                                for="darkMode">Dark mode</label>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit"
                                                class="inline-block w-full px-16 py-3.5 mt-6 mb-0 font-bold leading-normal text-center text-white align-middle transition-all bg-blue-500 border-0 rounded-lg cursor-pointer hover:-translate-y-px active:opacity-85 hover:shadow-xs text-sm ease-in tracking-tight-rem shadow-md bg-150 bg-x-25">Sign
                                                in</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>
<!-- plugin for scrollbar  -->
<script src="{{ asset('assets/dashboard/js/plugins/perfect-scrollbar.min.js') }}" async></script>
<!-- main script file  -->
<script src="{{ asset('assets/dashboard/js/argon-dashboard-tailwind.js?v=1.0.1') }}" async></script>

<script>
    const initialDarkMode = localStorage.getItem('darkMode') === 'true';
    const darkMode = document.getElementById('darkMode');
    const body = document.querySelector('html');

    if (initialDarkMode) {
        body.classList.add('dark');
        darkMode.checked = true;
    }

    darkMode.addEventListener('change', () => {
        body.classList.toggle('dark');
        localStorage.setItem('darkMode', darkMode.checked);
    });

</script>

</html>
