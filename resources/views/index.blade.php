@extends('layouts.app')

@section('content')
    <nav class="h-20 w-full container pt-5 fixed top-0 left-1/2 -translate-x-1/2 z-50">
        <div class="flex justify-between text-white">
            <a class="text-4xl font-bold h-full flex gap-x-4 items-center" href="{{ route('index') }}">
                <img class="h-10" alt="navbar logo" src="{{ asset('assets/img/logo.png') }}">
                PT. TIRTA ASASTA
            </a>
            {{-- <div class="flex items-center">
                    <a href=""
                        class="py-2 px-6 bg-pdam-blue text-white text-lg rounded-lg font-semibold transition-all shadow hover:bg-pdam-dark-blue">Register</a>
                </div> --}}
        </div>
    </nav>
    <div class="min-h-screen w-full top-0 left-0 relative overflow-hidden bg-transparent">

        {{-- waves --}}
        <img id="wave2" src="{{ asset('assets/img/wave2.png') }}" alt="wave2"
            class="absolute h-[105%] w-[200%] -top-[105%] right-0 object-fill max-w-[200%] -z-10"
            style="transition: all 3s linear;">
        <img id="wave1" src="{{ asset('assets/img/wave1.png') }}" alt="wave1"
            class="absolute h-[105%] w-[200%] -top-[105%] left-0 object-fill max-w-[200%] -z-10"
            style="transition: all 3s linear;">

        {{-- blobs --}}
        <img src="{{ asset('assets/img/blob1.svg') }}" alt="blob 1" id="blob1"
            class="-left-full top-0 -translate-y-1/2 w-1/2 rotate-[30deg]">
        <img src="{{ asset('assets/img/blob2.svg') }}" alt="blob 2" id="blob2" class="-top-full -right-full w-1/2">
        <img src="{{ asset('assets/img/blob3.svg') }}" alt="blob 3" id="blob3"
            class="top-0 -translate-y-1/2 -right-full w-80 rotate-12">

        <div class="pt-28">
            <div class="w-full flex justify-center">
                <img id="banner" src="{{ asset('assets/img/banner.png') }}" alt="banner"
                    class="w-4/5 opacity-0 transition duration-1000">
            </div>
            <p class="mt-16 text-white text-center max-w-[75%] mx-auto text-lg">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus, nesciunt molestias. Eaque corrupti
                voluptatibus inventore quidem quibusdam rerum quo modi. Obcaecati fugiat soluta libero quis eveniet minima
                magnam cupiditate veritatis!
            </p>
            <div id="bannerAction" class="flex justify-center mt-12 opacity-0 transition-opacity !duration-1000">
                <button data-target-modal="#parentModal"
                    class="modal-btn py-2 px-20 bg-pdam-green text-white rounded-lg text-2xl shadow-lg transition duration-300 hover:bg-pdam-dark-green hover:font-bold hover:shadow-2xl">IKUT
                    FUNWALK!</button>
            </div>
        </div>
    </div>

    {{-- <div class="container relative mx-auto mb-20 min-h-screen">
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
        </div> --}}

    <div id="modalOverlay" class="fixed h-screen w-full top-0 left-0 overflow-hidden hidden">
        {{-- parent modal --}}
        <div id="parentModal" class="modal max-h-1/2 max-w-2/3 p-12 flex flex-col gap-y-6">
            <button data-target-modal="#customerModal"
                class="modal-btn inline-block py-4 w-96 max-w-full bg-pdam-blue text-white text-lg rounded-lg font-semibold transition-all shadow hover:bg-pdam-dark-blue">Saya
                Pelanggan PDAM</button>
            <button data-target-modal="#publicModal"
                class="modal-btn inline-block py-4 w-96 max-w-full bg-[#CDCDCD] text-[#656565] text-lg rounded-lg font-semibold transition-all shadow hover:bg-[#B0B0B0] hover:text-[#3D3D3D]">Saya
                Bukan Pelanggan PDAM</button>
        </div>

        {{-- customer modal --}}
        <div id="customerModal" class="modal p-12 w-1/2 max-w-full">
            <h3 class="mb-12 font-medium text-3xl">Registrasi Pelanggan</h3>
            <form action="" method="POST" class="grid grid-cols-1 gap-y-6">
                <div class="relative form-control">
                    <input type="text" name="name" id="name"
                        class="peer focus:border-pdam-blue focus:outline-none focus:ring-0" placeholder="">
                    <label for="name"
                        class="peer-placeholder-shown:scale-100 peer-placeholder-shown:top-1/2 peer-placeholder-shown:-translate-y-1/2 peer-focus:top-1 peer-focus:-translate-y-4 peer-focus:scale-75 peer-focus:text-pdam-blue">Nama
                        Lengkap</label>
                </div>
                <div class="relative form-control">
                    <input type="email" name="email" id="email"
                        class="peer focus:border-pdam-blue focus:outline-none focus:ring-0" placeholder="">
                    <label for="email"
                        class="peer-placeholder-shown:scale-100 peer-placeholder-shown:top-1/2 peer-placeholder-shown:-translate-y-1/2 peer-focus:top-1 peer-focus:-translate-y-4 peer-focus:scale-75 peer-focus:text-pdam-blue">Email</label>
                </div>
                <div class="relative form-control">
                    <input type="text" name="ktp" id="ktp"
                        class="peer focus:border-pdam-blue focus:outline-none focus:ring-0" placeholder="">
                    <label for="ktp"
                        class="peer-placeholder-shown:scale-100 peer-placeholder-shown:top-1/2 peer-placeholder-shown:-translate-y-1/2 peer-focus:top-1 peer-focus:-translate-y-4 peer-focus:scale-75 peer-focus:text-pdam-blue">NIK</label>
                </div>
                <div class="grid grid-cols-2 gap-x-2 w-full">
                    <div class="relative form-control col-span-1">
                        <input type="text" name="customerID" id="customerID"
                            class="peer focus:border-pdam-blue focus:outline-none focus:ring-0" placeholder="">
                        <label for="customerID"
                            class="peer-placeholder-shown:scale-100 peer-placeholder-shown:top-1/2 peer-placeholder-shown:-translate-y-1/2 peer-focus:top-1 peer-focus:-translate-y-4 peer-focus:scale-75 peer-focus:text-pdam-blue">ID
                            Pelanggan</label>
                    </div>
                    <div class="relative form-control col-span-1">
                        <input type="text" name="phone" id="phone"
                            class="peer focus:border-pdam-blue focus:outline-none focus:ring-0" placeholder="">
                        <label for="phone"
                            class="peer-placeholder-shown:scale-100 peer-placeholder-shown:top-1/2 peer-placeholder-shown:-translate-y-1/2 peer-focus:top-1 peer-focus:-translate-y-4 peer-focus:scale-75 peer-focus:text-pdam-blue">Nomor
                            Telpon</label>
                    </div>
                </div>
                <div class="flex justify-between items-start px-10">
                    <p class="text-lg font-medium">Ukuran Baju :</p>
                    {{-- radio input --}}
                    <div class="flex gap-x-2">
                        <div>
                            <input type="radio" name="size" id="size-s" value="S" class="peer hidden"
                                data-stock-info="200">
                            <label for="size-s"
                                class="py-2 px-4 font-bold text-[#656565] rounded-lg text-2xl peer-checked:bg-pdam-blue peer-checked:text-white">S</label>
                        </div>
                        <div>
                            <input type="radio" name="size" id="size-m" value="M" class="peer hidden"
                                data-stock-info="100">
                            <label for="size-m"
                                class="py-2 px-4 font-bold text-[#656565] rounded-lg text-2xl peer-checked:bg-pdam-blue peer-checked:text-white">M</label>
                        </div>
                        <div>
                            <input type="radio" name="size" id="size-l" value="L" class="peer hidden"
                                data-stock-info="300">
                            <label for="size-l"
                                class="py-2 px-4 font-bold text-[#656565] rounded-lg text-2xl peer-checked:bg-pdam-blue peer-checked:text-white">L</label>
                        </div>
                        <div>
                            <input type="radio" name="size" id="size-xl" value="XL" class="peer hidden"
                                data-stock-info="250">
                            <label for="size-xl"
                                class="py-2 px-4 font-bold text-[#656565] rounded-lg text-2xl peer-checked:bg-pdam-blue peer-checked:text-white">XL</label>
                        </div>
                    </div>
                </div>
                <p id="stockInfo" class="text-[#B0B0B0] text-right mx-10 hidden"></p>
                <button type="button" onclick="openChildModal()"
                    class="block w-full py-3 bg-[#cdcdcd] text-[#656565] text-lg rounded-2xl font-semibold transition-all shadow hover:bg-[#6c6c6c] hover:text-white mt-6">
                    Tambah Peserta
                </button>
                <button type="submit"
                    class="block w-full py-3 bg-pdam-blue text-white text-lg rounded-2xl font-semibold transition-all shadow hover:bg-pdam-dark-blue">
                    Kirim Jawaban!
                </button>

                {{-- modal form additional participant --}}
                <div class="absolute z-50 h-full w-full top-0 left-0 child-modal-overlay hidden">
                    <div class="child-modal w-full p-12 flex flex-col gap-y-6 absolute rounded-lg top-[150%] left-1/2 -translate-x-1/2 bg-white shadow-lg"
                        style="transition: all .3s linear">
                        <h3 class="mb-6 font-medium text-3xl">Tambah Peserta</h3>
                        <div id="formWrapper" class="flex flex-col gap-y-6">
                            <div class="relative form-control">
                                <input type="text" name="additionalName[]"
                                    class="peer focus:border-pdam-blue focus:outline-none focus:ring-0" placeholder="">
                                <label
                                    class="peer-placeholder-shown:scale-100 peer-placeholder-shown:top-1/2 peer-placeholder-shown:-translate-y-1/2 peer-focus:top-1 peer-focus:-translate-y-4 peer-focus:scale-75 peer-focus:text-pdam-blue">Nama
                                    Lengkap</label>
                            </div>
                        </div>
                        <button id="addParticipantInputBtn" type="button"
                            class="block w-full py-2 bg-white border-[#aeaeae] text-2xl font-semibold text-center border-2 text-[#aeaeae] border-dotted rounded-3xl hover:border-pdam-blue hover:text-pdam-blue">
                            +
                        </button>
                        <div class="flex justify-end gap-x-4">
                            <button type="button" id="abortAddParticipant"
                                class="inline-block px-8 py-3 bg-[#cdcdcd] text-[#656565] text-lg rounded-2xl font-semibold transition-all shadow hover:bg-[#6c6c6c] hover:text-white">
                                Buang
                            </button>
                            <button type="button" onclick="closeChildModal()"
                                class="inline-block px-8 py-3 bg-pdam-blue text-white text-lg rounded-2xl font-semibold transition-all shadow hover:bg-pdam-dark-blue">
                                Simpan
                            </button>
                        </div>
                    </div>
                </div>

            </form>
        </div>

        {{-- public modal --}}
        <div id="publicModal" class="modal p-12 w-1/2 max-w-full">
            <h3 class="mb-12 font-medium text-3xl">Registrasi Non Pelanggan</h3>
            <form action="" method="POST" class="grid grid-cols-1 gap-y-6">
                <div class="relative form-control">
                    <input type="text" name="name" id="name"
                        class="peer focus:border-pdam-blue focus:outline-none focus:ring-0" placeholder="">
                    <label for="name"
                        class="peer-placeholder-shown:scale-100 peer-placeholder-shown:top-1/2 peer-placeholder-shown:-translate-y-1/2 peer-focus:top-1 peer-focus:-translate-y-4 peer-focus:scale-75 peer-focus:text-pdam-blue">Nama
                        Lengkap</label>
                </div>
                <div class="relative form-control">
                    <input type="text" name="ktp" id="ktp"
                        class="peer focus:border-pdam-blue focus:outline-none focus:ring-0" placeholder="">
                    <label for="ktp"
                        class="peer-placeholder-shown:scale-100 peer-placeholder-shown:top-1/2 peer-placeholder-shown:-translate-y-1/2 peer-focus:top-1 peer-focus:-translate-y-4 peer-focus:scale-75 peer-focus:text-pdam-blue">NIK</label>
                </div>
                <div class="relative form-control">
                    <input type="email" name="email" id="email"
                        class="peer focus:border-pdam-blue focus:outline-none focus:ring-0" placeholder="">
                    <label for="email"
                        class="peer-placeholder-shown:scale-100 peer-placeholder-shown:top-1/2 peer-placeholder-shown:-translate-y-1/2 peer-focus:top-1 peer-focus:-translate-y-4 peer-focus:scale-75 peer-focus:text-pdam-blue">Email</label>
                </div>
                <div class="relative form-control">
                    <input type="text" name="phone" id="phone"
                        class="peer focus:border-pdam-blue focus:outline-none focus:ring-0" placeholder="">
                    <label for="phone"
                        class="peer-placeholder-shown:scale-100 peer-placeholder-shown:top-1/2 peer-placeholder-shown:-translate-y-1/2 peer-focus:top-1 peer-focus:-translate-y-4 peer-focus:scale-75 peer-focus:text-pdam-blue">Nomor
                        Telpon</label>
                </div>
                <div class="flex justify-between items-start px-10">
                    <p class="text-lg font-medium">Ukuran Baju :</p>
                    {{-- radio input --}}
                    <div class="flex gap-x-2">
                        <div>
                            <input type="radio" name="size" id="size-s" value="S" class="peer hidden"
                                data-stock-info="200">
                            <label for="size-s"
                                class="py-2 px-4 font-bold text-[#656565] rounded-lg text-2xl peer-checked:bg-pdam-blue peer-checked:text-white">S</label>
                        </div>
                        <div>
                            <input type="radio" name="size" id="size-m" value="M" class="peer hidden"
                                data-stock-info="100">
                            <label for="size-m"
                                class="py-2 px-4 font-bold text-[#656565] rounded-lg text-2xl peer-checked:bg-pdam-blue peer-checked:text-white">M</label>
                        </div>
                        <div>
                            <input type="radio" name="size" id="size-l" value="L" class="peer hidden"
                                data-stock-info="300">
                            <label for="size-l"
                                class="py-2 px-4 font-bold text-[#656565] rounded-lg text-2xl peer-checked:bg-pdam-blue peer-checked:text-white">L</label>
                        </div>
                        <div>
                            <input type="radio" name="size" id="size-xl" value="XL" class="peer hidden"
                                data-stock-info="250">
                            <label for="size-xl"
                                class="py-2 px-4 font-bold text-[#656565] rounded-lg text-2xl peer-checked:bg-pdam-blue peer-checked:text-white">XL</label>
                        </div>
                    </div>
                </div>
                <p id="stockInfo" class="text-[#B0B0B0] text-right mx-10 hidden"></p>
                <button type="submit"
                    class="block w-full py-3 bg-pdam-blue text-white text-lg rounded-2xl font-semibold transition-all shadow hover:bg-pdam-dark-blue mt-6">
                    Kirim Jawaban!
                </button>
            </form>
        </div>
    </div>
@endsection

@push('script')
    <script>
        let modalStack = [];
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
            wave1.classList.replace('-top-[105%]', 'top-0');
            wave2.classList.replace('-top-[105%]', 'top-0');
            setTimeout(() => {
                banner.classList.replace('opacity-0', 'opacity-100');
                setTimeout(() => {
                    bannerAction.classList.replace('opacity-0', 'opacity-100');
                    blob1.classList.add('active');
                    blob2.classList.add('active');
                    blob3.classList.add('active');
                }, 1000);
            }, 2500);

            // modal code
            const modalOverlay = document.getElementById('modalOverlay');
            const modals = modalOverlay.querySelectorAll('.modal');
            const modalBtns = document.querySelectorAll('.modal-btn');

            // handle modal button click
            modalBtns.forEach(btn => {
                btn.addEventListener('click', () => {
                    // show modal overlay
                    modalOverlay.classList.remove('hidden');

                    // hide current active modal
                    // const activeModal = modalOverlay.querySelector('.modal.active');
                    // if (activeModal) {
                    //     activeModal.classList.remove('active');
                    // }

                    modalStack.push(btn.dataset.targetModal);

                    // show target modal
                    setTimeout(() => {
                        const targetModal = document.querySelector(btn.dataset.targetModal);
                        targetModal.classList.add('active');
                        modalOverlay.classList.add('active');
                    }, 300);
                });
            });

            // handle modal click to prevent closing
            modals.forEach(modal => {
                modal.addEventListener('click', (e) => {
                    e.stopPropagation();
                });
            });

            // handle overlay / outer click to close modal
            modalOverlay.addEventListener('click', () => {
                let activeModal;

                if (modalStack.length > 0) {
                    const modalSelector = modalStack.pop();
                    if (modalSelector == ".child-modal") {
                        closeChildModal();
                        return;
                    }
                    activeModal = document.querySelector(modalSelector);
                }
                // hide modal
                if (activeModal) {
                    activeModal.classList.remove('active');
                }
                if (modalStack.length == 0) {
                    modalOverlay.classList.remove('active');
                    setTimeout(() => {
                        modalOverlay.classList.add('hidden');
                    }, 300);
                }

                // hide overlay
            });

            // handle radio stock info
            const forms = document.querySelectorAll('.modal form');
            forms.forEach(form => {
                const stockInfo = form.querySelector('#stockInfo');
                const radios = form.querySelectorAll('input[name="size"]');
                radios.forEach(radio => {
                    radio.addEventListener('change', () => {
                        stockInfo.classList.remove('hidden');
                        stockInfo.textContent = `Stock ${radio.dataset.stockInfo}`;
                    });
                });
            });

            // handle add participant input
            const addParticipantInputBtn = document.getElementById('addParticipantInputBtn');
            const abortAddParticipant = document.getElementById('abortAddParticipant');

            abortAddParticipant.addEventListener('click', () => {
                const wrapper = document.querySelector('#customerModal #formWrapper');
                const lastChild = wrapper.lastElementChild;
                // reset input value
                lastChild.querySelector('input').value = '';
                // remove all child
                wrapper.innerHTML = '';
                // append last child
                wrapper.appendChild(lastChild);
                closeChildModal();
            });

            addParticipantInputBtn.addEventListener('click', (e) => {
                e.preventDefault();
                const parent = addParticipantInputBtn.parentElement.querySelector('#formWrapper');

                // max 3 additional participant
                if (parent.children.length == 3) {
                    alert('Maksimal 3 peserta tambahan');
                    return;
                }

                // get last child
                const lastChild = parent.lastElementChild;
                // clone last child
                const clone = lastChild.cloneNode(true);
                // reset input value
                clone.querySelector('input').value = '';
                // append to parent
                parent.appendChild(clone);
            });
        });

        const closeChildModal = () => {
            const childModal = document.querySelector('.child-modal');
            const overlay = childModal.parentElement;

            if (modalStack[modalStack.length - 1] == '.child-modal') {
                modalStack.pop();
            }

            overlay.classList.remove('active');
            if (childModal) {
                childModal.classList.remove('active');
            }

            // hide overlay
            setTimeout(() => {
                overlay.classList.add('hidden');
            }, 300);
        }

        const openChildModal = () => {
            const childModal = document.querySelector('.child-modal');
            const overlay = childModal.parentElement;
            modalStack.push('.child-modal');

            // show modal overlay
            overlay.classList.remove('hidden');

            // show target modal
            setTimeout(() => {
                childModal.classList.add('active');
                overlay.classList.add('active');
            }, 300);
        }
    </script>
@endpush
