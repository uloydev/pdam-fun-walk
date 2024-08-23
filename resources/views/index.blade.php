@extends('layouts.app')

@section('content')

        <nav class="h-20 w-full container pt-5 fixed top-0 left-1/2 -translate-x-1/2 z-50">
            <div class="flex justify-between text-white">
                <a class="text-4xl font-bold h-full flex gap-x-4 items-center" href="{{ route('index') }}">
                    <img class="h-10" alt="navbar logo" src="{{ asset('assets/img/logo.png') }}">
                    PT. TIRTA ASASTA
                </a>
                <div class="flex items-center">
                    <a href=""
                        class="py-2 px-6 bg-pdam-blue text-white text-lg rounded-lg font-semibold transition-all shadow hover:bg-pdam-dark-blue">Register</a>
                </div>
            </div>
        </nav>
        <div class="min-h-screen w-full top-0 left-0 relative overflow-hidden bg-transparent">
            
            {{-- waves --}}
            <img id="wave2" src="{{ asset('assets/img/wave2.png') }}" alt="wave2"
                class="absolute h-[120%] w-[200%] -top-[120%] right-0 object-fill max-w-[200%] -z-10"
                style="transition: all 3s linear;">
            <img id="wave1" src="{{ asset('assets/img/wave1.png') }}" alt="wave1"
                class="absolute h-[120%] w-[200%] -top-[120%] left-0 object-fill max-w-[200%] -z-10"
                style="transition: all 3s linear;">

            {{-- blobs --}}
            <img src="{{asset('assets/img/blob1.svg')}}" alt="blob 1" id="blob1" class="-left-full top-0 -translate-y-1/2 w-1/2 rotate-[30deg]">
            <img src="{{asset('assets/img/blob2.svg')}}" alt="blob 2" id="blob2" class="-top-full -right-full w-1/2">
            <img src="{{asset('assets/img/blob3.svg')}}" alt="blob 3" id="blob3" class="top-0 -translate-y-1/2 -right-full w-80 rotate-12">

            <div class="pt-28">
                <div class="w-full flex justify-center">
                    <img id="banner" src="{{ asset('assets/img/banner.png') }}" alt="banner" class="w-2/3 opacity-0 transition duration-1000">
                </div>
                <p class="mt-16 text-white text-center max-w-[50%] mx-auto text-lg">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus, nesciunt molestias. Eaque corrupti voluptatibus inventore quidem quibusdam rerum quo modi. Obcaecati fugiat soluta libero quis eveniet minima magnam cupiditate veritatis!
                </p>
                <div id="bannerAction" class="flex justify-center mt-12 opacity-0 transition-opacity !duration-1000">
                    <button  class="py-2 px-20 bg-pdam-green text-white rounded-lg text-2xl shadow-lg transition duration-300 hover:bg-pdam-dark-green hover:font-bold hover:shadow-2xl">IKUT FUNWALK!</button>
                </div>
            </div>
        </div>

        <div class="container relative mx-auto mb-20 min-h-screen">
            <div class="w-full bg-white shadow-lg rounded-xl -mt-20 h-full">
                <div class="grid grid-cols-4 gap-x-12 p-6 h-1/2">
                    <div class="col-span-1 h-full pl-4 py-4 flex flex-col justify-between">
                        <div class="text-right">
                            <h2 class="font-semibold text-4xl">
                                FUNWALK TRACK
                            </h2>
                            <p class="text-3xl mt-3 flex justify-end items-center gap-x-1">
                                <i class='bx bx-stopwatch'></i>
                                01:15:00
                            </p>
                        </div>
                        <div class="flex justify-end items-start font-semibold gap-x-2">
                            <p class="text-9xl text-right">
                                2.5
                            </p>
                            <span class="text-3xl pt-3">KM</span>
                        </div>
                    </div>
                    <div class="col-span-3">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Odit fuga consequuntur aliquam, laborum vero ratione unde corporis fugiat architecto? Laborum exercitationem tenetur impedit nihil ipsum ab expedita? Earum modi esse dolor tempora aliquam quaerat nulla ipsa a, recusandae, culpa suscipit animi. Modi reprehenderit a, magni quae quam saepe architecto rerum unde. Sunt itaque temporibus consequatur iure sequi nulla tempore vitae nostrum. Aspernatur dignissimos nulla explicabo ratione nemo consectetur tenetur exercitationem natus iusto laboriosam omnis nostrum inventore repudiandae, repellendus nobis corporis, aliquid eaque id deserunt laudantium. Vel, quis culpa eligendi enim illo, molestias quisquam tenetur veritatis deserunt atque dolorum dignissimos dolore.
                    </div>
                </div>
            </div>
        </div>
        
@endsection

@push('script')
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const wave1 = document.getElementById('wave1');
            const wave2 = document.getElementById('wave2');
            const banner = document.getElementById('banner');
            const bannerAction = document.getElementById('bannerAction');
            const blob1 = document.getElementById('blob1');
            const blob2 = document.getElementById('blob2');
            const blob3 = document.getElementById('blob3');

            wave1.classList.replace('left-0', '-left-full');
            wave2.classList.replace('right-0', '-right-full');
            wave1.classList.replace('-top-[120%]', 'top-0');
            wave2.classList.replace('-top-[120%]', 'top-0');
            setTimeout(() => {
                banner.classList.replace('opacity-0', 'opacity-100');
                setTimeout(() => {
                    bannerAction.classList.replace('opacity-0', 'opacity-100');
                    blob1.classList.add('active');
                    blob2.classList.add('active');
                    blob3.classList.add('active');
                }, 1000);
            }, 2500);
        });
    </script>
@endpush
