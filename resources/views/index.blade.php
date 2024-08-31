@extends('layouts.app')

@section('content')
    <nav class="h-20 w-full container pt-5 fixed top-0 left-1/2 -translate-x-1/2">
        <div class="flex justify-between text-white">
            <a class="text-xl xl:text-4xl font-bold h-full flex gap-x-4 items-center" href="{{ route('index') }}">
                <img class="pl-4 h-6 xl:pl-0 xlh-10" alt="navbar logo" src="{{ asset('assets/img/logo.png') }}">
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
            class="absolute h-[105%] w-[400%] max-w-[400%] lg:w-[200%] -top-[105%] right-0 lg:max-w-[200%] -z-10 object-cover"
            style="transition: all 3s linear;">
        <img id="wave1" src="{{ asset('assets/img/wave1.png') }}" alt="wave1"
            class="absolute h-[105%] w-[400%] max-w-[400%] lg:w-[200%] -top-[105%] left-0 lg:max-w-[200%] -z-10 object-cover"
            style="transition: all 3s linear;">

        {{-- blobs --}}
        <img src="{{ asset('assets/img/blob1.svg') }}" alt="blob 1" id="blob1"
            class="-left-full top-0 -translate-y-1/2 w-full lg:w-1/2 rotate-[30deg]">
        <img src="{{ asset('assets/img/blob2.svg') }}" alt="blob 2" id="blob2" class="-top-full -right-full w-1/2">
        <img src="{{ asset('assets/img/blob3.svg') }}" alt="blob 3" id="blob3"
            class="top-0 -translate-y-1/2 -right-full w-full lg:w-80 rotate-12">

        <div class="pt-28">
            <div class="w-full flex justify-center">
                <img id="banner" src="{{ asset('assets/img/banner.png') }}" alt="banner"
                    class="w-[80%] opacity-0 transition duration-1000 xl:w-3/5">
            </div>
            <p class="mt-8 lg:mt-16 text-white text-center max-w-[75%] mx-auto text-base">
                Ikuti keseruan Tirta Asasta Fun Walk 2024, pada <b>Minggu, 8 September 2024.</b><br>Dimeriahkan dengan
                penampilan Band dan Doorprize menarik! <br>Terbatas untuk 1.000 orang, yuk daftar sekarang!<br><br>
                Periode Pendaftaran Peserta Fun Walk:<br>
                Pelanggan: <b>Selasa, 27 Agustus 2024</b> dan Umum: <b>Rabu, 28 Agustus 2024</b>.<br>
                <b>PENDAFTARAN DITUTUP hari Minggu, 1 September 2024.</b>
            </p>
            <div id="bannerAction" class="flex justify-center mt-12 opacity-0 transition-opacity !duration-1000">
                <button onclick="closedModal()"
                    class="py-2 px-20 bg-pdam-green text-white rounded-lg text-2xl shadow-lg transition duration-300 hover:bg-pdam-dark-green hover:font-bold hover:shadow-2xl">IKUT
                    FUN WALK!</button>
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
        <div id="parentModal" class="modal max-h-1/2 max-w-2/3 p-4 lg:p-12 flex flex-col gap-y-3 lg:gap-y-4">
            <button data-target-modal="#customerModal"
                class="modal-btn inline-block py-4 w-96 max-w-full bg-pdam-blue text-white text-lg rounded-lg font-semibold transition-all shadow hover:bg-pdam-dark-blue">Saya
                Pelanggan Tirta Asasta</button>
            <button type="button" onclick="closedModal()"
                class="inline-block py-4 w-96 max-w-full bg-[#CDCDCD] text-[#656565] text-lg rounded-lg font-semibold transition-all shadow hover:bg-[#B0B0B0] hover:text-[#3D3D3D]">Non Pelanggan Tirta Asasta</button>
        </div>

        {{-- customer modal --}}
        <div id="customerModal" class="modal p-4 lg:p-12 w-full lg:w-1/2 max-w-full">
            <h3 class="mb-6 lg:mb-12 font-medium text-2xl lg:text-3xl">Registrasi Peserta</h3>
            <form id="customerForm" action="" method="POST" class="grid grid-cols-1 gap-y-3 lg:gap-y-4">
                @method('POST')
                @csrf
                <input type="hidden" name="type" value="customer">
                <div class="relative form-control">
                    <input type="text" name="name" id="customer-name"
                        class="peer focus:border-pdam-blue focus:outline-none focus:ring-0" placeholder="">
                    <label for="customer-name"
                        class="peer-placeholder-shown:scale-100 peer-placeholder-shown:top-1/2 peer-placeholder-shown:-translate-y-1/2 peer-focus:top-1 peer-focus:-translate-y-4 peer-focus:scale-75 peer-focus:text-pdam-blue">Nama
                        Lengkap</label>
                </div>
                <div class="relative form-control">
                    <input type="email" name="email" id="customer-email"
                        class="peer focus:border-pdam-blue focus:outline-none focus:ring-0" placeholder="">
                    <label for="customer-email"
                        class="peer-placeholder-shown:scale-100 peer-placeholder-shown:top-1/2 peer-placeholder-shown:-translate-y-1/2 peer-focus:top-1 peer-focus:-translate-y-4 peer-focus:scale-75 peer-focus:text-pdam-blue">Email</label>
                </div>
                <div class="relative form-control">
                    <input type="text" name="nik" id="customer-ktp"
                        class="peer focus:border-pdam-blue focus:outline-none focus:ring-0" placeholder="">
                    <label for="customer-ktp"
                        class="peer-placeholder-shown:scale-100 peer-placeholder-shown:top-1/2 peer-placeholder-shown:-translate-y-1/2 peer-focus:top-1 peer-focus:-translate-y-4 peer-focus:scale-75 peer-focus:text-pdam-blue">NIK</label>
                </div>
                <div class="grid grid-cols-2 gap-x-2 w-full">
                    <div>

                        <div class="relative form-control col-span-1">
                            <input type="text" name="customer_code" id="customer-customerID"
                                class="peer focus:border-pdam-blue focus:outline-none focus:ring-0" placeholder="">
                            <label for="customer-customerID"
                                class="peer-placeholder-shown:scale-100 peer-placeholder-shown:top-1/2 peer-placeholder-shown:-translate-y-1/2 peer-focus:top-1 peer-focus:-translate-y-4 peer-focus:scale-75 peer-focus:text-pdam-blue">ID
                                Pelanggan</label>
                        </div>
                        <p class="px-4 pt-1 text-xs lg:text-sm text-[#B0B0B0]">Contoh: 01000101</p>
                    </div>
                    <div>
                        <div class="relative form-control col-span-1">
                            <input type="text" name="phone" id="customer-phone"
                            class="peer focus:border-pdam-blue focus:outline-none focus:ring-0" placeholder="">
                            <label for="customer-phone"
                            class="peer-placeholder-shown:scale-100 peer-placeholder-shown:top-1/2 peer-placeholder-shown:-translate-y-1/2 peer-focus:top-1 peer-focus:-translate-y-4 peer-focus:scale-75 peer-focus:text-pdam-blue">Nomor
                            Telpon</label>
                        </div>
                    </div>
                </div>

                <div class="relative form-control">
                    <input type="text" name="instagram" id="customer-instagram"
                        class="peer focus:border-pdam-blue focus:outline-none focus:ring-0" placeholder="">
                    <label for="customer-instagram"
                        class="peer-placeholder-shown:scale-100 peer-placeholder-shown:top-1/2 peer-placeholder-shown:-translate-y-1/2 peer-focus:top-1 peer-focus:-translate-y-4 peer-focus:scale-75 peer-focus:text-pdam-blue">Instagram</label>
                </div>
                <div class="flex justify-between items-start px-4 lg:px-10">
                    <p class="lg:text-lg font-medium">Ukuran Baju :</p>
                    {{-- radio input --}}
                    <div class="flex gap-x-2">
                        @foreach ($shirt_stock->where('type', 'customer') as $shirt)
                            <div>
                                <input type="radio" name="shirt_stock_id" id="customer-size-{{ $shirt->id }}"
                                    value="{{ $shirt->id }}" class="peer hidden"
                                    data-stock-info="{{ $shirt->stock }}">
                                <label for="customer-size-{{ $shirt->id }}"
                                    class="py-2 px-3 lg:py-2 lg:px-4 font-bold text-[#656565] rounded-lg text-lg lg:text-2xl peer-checked:bg-pdam-blue peer-checked:text-white">{{ $shirt->size }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <p id="stockInfo" class="text-[#B0B0B0] text-right mx-10 hidden"></p>
                <small class="text-xs lg:text-sm text-[#B0B0B0]">* Satu ID pelanggan akan mendapatkan satu Fun Walk Kit
                    yang berisi 1 baju, 1 tas, 1 tumbler, dan 1 snack.</small>
                <button type="button" onclick="openChildModal()"
                    class="block w-full py-3 bg-[#cdcdcd] text-[#656565] text-lg rounded-2xl font-semibold transition-all shadow hover:bg-[#6c6c6c] hover:text-white mt-3 lg:mt-6">
                    Tambah Pendamping
                </button>
                <button type="submit"
                    class="block w-full py-3 bg-pdam-blue text-white text-lg rounded-2xl font-semibold transition-all shadow hover:bg-pdam-dark-blue">
                    Submit
                </button>

                {{-- modal form additional participant --}}
                <div class="absolute z-50 h-full w-full top-0 left-0 child-modal-overlay hidden">
                    <div class="child-modal w-full p-4 lg:p-12 flex flex-col gap-y-3 lg:gap-y-4 absolute rounded-lg top-[150%] left-1/2 -translate-x-1/2 bg-white shadow-lg"
                        style="transition: all .3s linear">
                        <h3 class="mb-4 lg:mb-6 font-medium text-2xl lg:text-3xl">Tambah Pendamping</h3>
                        <div id="formWrapper" class="flex flex-col gap-y-3 lg:gap-y-6">
                            <div class="grid grid-cols-3 gap-x-2 w-full">
                                <div class="relative form-control col-span-2">
                                    <input type="text" name="additional_participant[0][name]" id="additionalName1"
                                        class="additional-name peer focus:border-pdam-blue focus:outline-none focus:ring-0"
                                        placeholder="">
                                    <label for="additionalName1"
                                        class="peer-placeholder-shown:scale-100 peer-placeholder-shown:top-1/2 peer-placeholder-shown:-translate-y-1/2 peer-focus:top-1 peer-focus:-translate-y-4 peer-focus:scale-75 peer-focus:text-pdam-blue">Nama
                                        Lengkap</label>
                                </div>
                                <div class="relative form-control col-span-1">
                                    <select name="additional_participant[0][relation]" id="additionalRelation1"
                                        class="additional-relation py-2 lg:py-3 px-6 lg:text-lg font-semibold bg-transparent border-2 rounded-3xl border-[#aeaeae] appearance-none text-[#aeaeae] w-full focus:border-pdam-blue focus:outline-none focus:ring-0">
                                        <option value="" selected disabled>Hubungan</option>
                                        <option value="suami">Suami</option>
                                        <option value="istri">Istri</option>
                                        <option value="anak">Anak</option>
                                        <option value="adik">Adik</option>
                                        <option value="kakak">Kakak</option>
                                        <option value="saudara">Saudara</option>
                                    </select>
                                </div>
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
                            <button type="button" onclick="saveChildModalValue()"
                                class="inline-block px-8 py-3 bg-pdam-blue text-white text-lg rounded-2xl font-semibold transition-all shadow hover:bg-pdam-dark-blue">
                                Simpan
                            </button>
                        </div>
                    </div>
                </div>

            </form>
        </div>

        {{-- public modal --}}
        <div id="publicModal" class="modal p-4 lg:p-12 w-full lg:w-1/2 max-w-full">
            <h3 class="mb-6 lg:mb-12 font-medium text-2xl lg:text-3xl">Registrasi Non Pelanggan</h3>
            <form id="publicForm" action="" method="POST" class="grid grid-cols-1 gap-y-3 lg:gap-y-4">
                @method('POST')
                @csrf
                <input type="hidden" name="type" value="public">
                <div class="relative form-control">
                    <input type="text" name="name" id="public-name"
                        class="peer focus:border-pdam-blue focus:outline-none focus:ring-0" placeholder="">
                    <label for="public-name"
                        class="peer-placeholder-shown:scale-100 peer-placeholder-shown:top-1/2 peer-placeholder-shown:-translate-y-1/2 peer-focus:top-1 peer-focus:-translate-y-4 peer-focus:scale-75 peer-focus:text-pdam-blue">Nama
                        Lengkap</label>
                </div>
                <div class="relative form-control">
                    <input type="email" name="email" id="public-email"
                        class="peer focus:border-pdam-blue focus:outline-none focus:ring-0" placeholder="">
                    <label for="public-email"
                        class="peer-placeholder-shown:scale-100 peer-placeholder-shown:top-1/2 peer-placeholder-shown:-translate-y-1/2 peer-focus:top-1 peer-focus:-translate-y-4 peer-focus:scale-75 peer-focus:text-pdam-blue">Email</label>
                </div>
                <div class="relative form-control">
                    <input type="text" name="nik" id="public-ktp"
                        class="peer focus:border-pdam-blue focus:outline-none focus:ring-0" placeholder="">
                    <label for="public-ktp"
                        class="peer-placeholder-shown:scale-100 peer-placeholder-shown:top-1/2 peer-placeholder-shown:-translate-y-1/2 peer-focus:top-1 peer-focus:-translate-y-4 peer-focus:scale-75 peer-focus:text-pdam-blue">NIK</label>
                </div>
                <div class="relative form-control">
                    <input type="text" name="phone" id="public-phone"
                        class="peer focus:border-pdam-blue focus:outline-none focus:ring-0" placeholder="">
                    <label for="public-phone"
                        class="peer-placeholder-shown:scale-100 peer-placeholder-shown:top-1/2 peer-placeholder-shown:-translate-y-1/2 peer-focus:top-1 peer-focus:-translate-y-4 peer-focus:scale-75 peer-focus:text-pdam-blue">Nomor
                        Telpon</label>
                </div>
                <div class="relative form-control">
                    <input type="text" name="instagram" id="public-instagram"
                        class="peer focus:border-pdam-blue focus:outline-none focus:ring-0" placeholder="">
                    <label for="public-instagram"
                        class="peer-placeholder-shown:scale-100 peer-placeholder-shown:top-1/2 peer-placeholder-shown:-translate-y-1/2 peer-focus:top-1 peer-focus:-translate-y-4 peer-focus:scale-75 peer-focus:text-pdam-blue">Instagram Username</label>
                </div>
                <div class="flex justify-between items-start px-4 lg:px-10">
                    <p class="lg:text-lg font-medium">Ukuran Baju :</p>
                    {{-- radio input --}}
                    <div class="flex gap-x-2">
                        @foreach ($shirt_stock->where('type', 'public') as $shirt)
                            <div>
                                <input type="radio" name="shirt_stock_id" id="public-size-{{ $shirt->id }}"
                                    value="{{ $shirt->id }}" class="peer hidden"
                                    data-stock-info="{{ $shirt->stock }}">
                                <label for="public-size-{{ $shirt->id }}"
                                    class="py-2 px-3 lg:px-4 font-bold text-[#656565] rounded-lg text-xl lg:text-2xl peer-checked:bg-pdam-blue peer-checked:text-white">{{ $shirt->size }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <p id="stockInfo" class="text-[#B0B0B0] text-right mx-10 hidden"></p>
                <small class="text-xs lg:text-sm text-[#B0B0B0]">* Partisipan akan mendapatkan satu Fun Walk Kit
                    yang berisi 1 baju, 1 tas dan 1 snack.</small>
                <button type="submit"
                    class="block w-full py-3 bg-pdam-blue text-white text-lg rounded-2xl font-semibold transition-all shadow hover:bg-pdam-dark-blue mt-6">
                    Submit
                </button>
            </form>
        </div>
    </div>
@endsection

@push('script')
    <script>
        let hasAdditionalParticipant = false;
        let modalStack = [];
        let initialAlert = {!! session('alert') ? json_encode(session('alert')) : 'null' !!};


        document.addEventListener("DOMContentLoaded", () => {
            // fire initial alert
            if (initialAlert) {
                Swal.fire(initialAlert);
            }

            const wave1 = document.getElementById('wave1');
            const wave2 = document.getElementById('wave2');
            const banner = document.getElementById('banner');
            const bannerAction = document.getElementById('bannerAction');
            const blob1 = document.getElementById('blob1');
            const blob2 = document.getElementById('blob2');
            const blob3 = document.getElementById('blob3');

            wave1.classList.replace('left-0', 'lg:-left-full');
            wave2.classList.replace('right-0', 'lg:-right-full');
            wave1.classList.add('-left-[200%]');
            wave2.classList.add('-right-[200%]');
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
                console.log(form);
                const stockInfo = document.querySelector(`#${form.id} #stockInfo`);
                console.log(stockInfo);
                const radios = document.querySelectorAll(`#${form.id} input[name="shirt_stock_id"]`);
                console.log(radios);
                radios.forEach(radio => {
                    radio.addEventListener('change', () => {
                        stockInfo.classList.remove('hidden');
                        stockInfo.textContent = `Stock ${radio.dataset.stockInfo}`;
                    });
                });
                form.addEventListener('submit', sumbitForm);
            });

            // handle add participant input
            const addParticipantInputBtn = document.getElementById('addParticipantInputBtn');
            const abortAddParticipant = document.getElementById('abortAddParticipant');

            abortAddParticipant.addEventListener('click', () => {
                const wrapper = document.querySelector('#customerModal #formWrapper');
                const lastChild = wrapper.lastElementChild;
                // reset input value
                lastChild.querySelector('input').value = '';
                lastChild.querySelector('input').id = 'additionalName1';
                lastChild.querySelector('input').name = 'additional_participant[0][name]';

                lastChild.querySelector('label').htmlFor = 'additionalName1';

                lastChild.querySelector('select').value = '';
                lastChild.querySelector('select').id = 'additionalRelation1';
                lastChild.querySelector('select').name = 'additional_participant[0][relation]';

                // remove all child
                wrapper.innerHTML = '';
                // append last child
                wrapper.appendChild(lastChild);
                closeChildModal();
                hasAdditionalParticipant = false;
            });

            addParticipantInputBtn.addEventListener('click', (e) => {
                e.preventDefault();
                const parent = addParticipantInputBtn.parentElement.querySelector('#formWrapper');

                // max 3 additional participant
                if (parent.children.length == 2) {
                    Swal.fire({
                        title: 'Maaf...',
                        text: 'Maksimal 2 peserta tambahan',
                        icon: 'error',
                        confirmButtonText: 'Kembali'
                    })
                    return;
                }

                // get last child
                const lastChild = parent.lastElementChild;
                // clone last child
                const clone = lastChild.cloneNode(true);
                // reset input value
                clone.querySelector('input').value = '';
                clone.querySelector('input').id = `additionalName${parent.children.length+1}`;
                clone.querySelector('input').name =
                    `additional_participant[${parent.children.length}][name]`;

                clone.querySelector('label').htmlFor = `additionalName${parent.children.length+1}`;

                clone.querySelector('select').value = '';
                clone.querySelector('select').id = `additionalRelation${parent.children.length+1}`;
                clone.querySelector('select').name =
                    `additional_participant[${parent.children.length}][relation]`;
                // append to parent
                parent.appendChild(clone);
            });
        });

        const saveChildModalValue = () => {
            hasAdditionalParticipant = true;
            closeChildModal();
        }

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

        const closeAllModal = () => {
            const modals = document.querySelectorAll('.modal');
            const overlay = document.getElementById('modalOverlay');

            modals.forEach(modal => {
                modal.classList.remove('active');
            });

            overlay.classList.remove('active');
            setTimeout(() => {
                overlay.classList.add('hidden');
            }, 300);

            // clear forms value
            const forms = document.querySelectorAll('.modal form');
            forms.forEach(form => {
                form.reset();
            });
        }

        const sumbitForm = (e) => {
            e.preventDefault();
            const form = e.target;
            const formData = new FormData(form);
            if (!hasAdditionalParticipant) {
                formData.delete('additional_participant[0][name]');
                formData.delete('additional_participant[0][relation]');
            }
            console.log(formData.getAll('additional_participant[][name]'));
            const value = Object.fromEntries(formData.entries());
            Swal.fire({
                title: "Apakah data yang Anda masukkan sudah benar?",
                icon: "question",
                showCancelButton: true,
                confirmButtonText: "Ya",
                cancelButtonText: "Tidak",
                showLoaderOnConfirm: true,
                preConfirm: async () => {
                    try {
                        const response = await fetch(
                            '/participant/register', {
                                method: 'POST',
                                headers: {
                                    'Accept': 'application/json',
                                },
                                body: formData,
                            }
                        );
                        let data = await response.json();
                        data.statusCode = response.status;
                        return data;
                    } catch (error) {
                        console.log(error);
                    }
                },
                allowOutsideClick: () => !Swal.isLoading()
            }).then((result) => {
                console.log(result);
                if (result.isConfirmed) {
                    if (result.value.statusCode > 299) {
                        Swal.fire({
                            title: 'Maaf...',
                            html: `<ul class="text-left text-red-500 list-disc p-4 flex flex-col gap-y-2 text-lg rounded-lg bg-red-200">
                                ${Object.keys(result.value.errors).map(key => '<li class="mx-4">'+result.value.errors[key]+'</li>').join('')}
                            </ul>`,
                            icon: 'error',
                            confirmButtonText: 'Kembali'
                        });
                    } else {
                        closeAllModal();
                        Swal.fire({
                            title: 'Verifikasi email Anda',
                            html: `<p>Hallo, Terima kasih telah mendaftar.</p><p>Silahkan lakukan verifikasi dengan klik link yang telah dikirimkan melalui email  ${formData.get('email')}`,
                            icon: 'success',
                            confirmButtonText: 'Kembali'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.reload();
                            }
                        });
                    }

                }
            });

        }

        const closedModal = () => {
            Swal.fire({
                title: 'Maaf!',
                html: '<p>Kuota sudah full</p><p>Sampai Jumpa di Event lainnya!</p>',
                icon: 'error',
                confirmButtonText: 'Kembali'
            });
        }
    </script>
@endpush
