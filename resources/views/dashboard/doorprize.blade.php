<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    <style>
        .digit {
            perspective: 1000px;
        }

        .digit-inner {
            transition: transform .3s;
            transform-style: preserve-3d;
        }

        .digit-inner.active {
            transform: rotateX(-180deg);
        }

        .digit-front,
        .digit-back {
            backface-visibility: hidden;
        }

        .digit-back {
            transform: rotateX(180deg);
        }
    </style>
</head>

<body class="font-rubik antialiased bg-slate-300">
    {{-- <div id="tsparticles"></div> --}}
    <div class="min-h-screen ">
        <div class="mx-auto w-full h-screen flex flex-col items-center">
            <div>
                <div class="flex justify-center">
                    <img id="banner" src="{{ asset('assets/img/banner.png') }}" alt="banner"
                        class="w-1/4 my-8 mx-auto">
                </div>

                <div class="uppercase text-7xl text-[#004E6D] text-center mb-8">
                    <h1 class="mb-4 font-bold">doorprize</h1>
                    <p id="prizeInfo" class="text-5xl"></p>
                </div>

                <div class="digit-container text-[12rem] rounded-lg flex justify-center items-center text-[#117898] gap-x-3 font-bold bg-white shadow-xl mb-4 w-2/3 mx-auto"
                    data-user-id data-user-name>
                    @for ($i = 0; $i < 4; $i++)
                        <div class="digit text-white">
                            <div data-rotation="-180" data-digit=""
                                class="digit-inner relative h-full w-full font-bold text-pdam-dark-blue">
                                <div class="digit-front h-full w-full flex items-center justify-center active">
                                    0
                                </div>
                                <div
                                    class="digit-back h-full w-full absolute top-0 left-0  flex items-center justify-center">
                                    1
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>

                <div class="mx-8 mb-4 flex justify-center gap-x-8">
                    <div class="relative capitalize text-[#117898] mb-4 text-xl">
                        <button id="pickPrizeBtn" dropdown-trigger aria-expanded="false" type="button"
                            class="flex justify-between items-center mx-auto py-2 px-12 align-middle transition-all rounded-lg cursor-pointer bg-white leading-normal ease-in tracking-tight-rem active:opacity-85">
                            <span>Pilih Hadiah</span>
                            <i class='bx bxs-chevron-down'></i>
                        </button>
                        <p class="hidden transform-dropdown-show"></p>
                        <ul dropdown-menu
                            class="z-10 text-sm duration-250  transform-dropdown pointer-events-none absolute left-1/2 -translate-x-1/2 top-full m-0 -mr-4 mt-2 list-none rounded-lg bg-white bg-clip-padding px-12 text-left opacity-0 transition-all flex flex-col max-h-40 overflow-scroll shadow-2xl">
                            @foreach ($prizes as $prize)
                                <li>
                                    <input type="radio" name="prize" id="prize{{ $loop->index }}"
                                        data-prize="{{ json_encode($prize) }}" class="hidden peer">
                                    <label for="prize{{ $loop->index }}"
                                        class="py-2 ease clear-both block w-full whitespace-nowrap bg-transparent px-4 text-left font-normal hover:bg-slate-200 transition-colors duration-300 peer-checked:bg-slate-200 peer-checked:hover:bg-slate-200">{{ $prize['name'] }}</label>
                                </li>
                            @endforeach
                        </ul>

                    </div>
                    <div>
                        <button id="spinBtn"
                            class="bg-[#00A6F4] text-white text-xl py-2 px-12 rounded-lg focus:bg-[#B5B5B5] focus:text-black focus:font-semibold shadow">Acak</button>
                    </div>
                </div>
            </div>


            <div class="mb-4 mx-4 flex-grow rounded-lg bg-white px-8 relative max-w-2/3 w-2/3">
                <h2 class="font-bold text-2xl text-[#004E6D] my-4 text-center">Peserta Beruntung!</h2>
                <div
                    class=" text-lg text-white font-semibold h-full max-h-1/4 overflow-y-scroll before:content-['*'] before:absolute before:bottom-0 before:left-0 before:h-1/3 before:bg-gradient-to-t before:from-white before:to-transparent before:w-full before:rounded-b-lg before:pointer-events-none">
                    <div class="winner-container pb-10">
                        @foreach ($winners as $id => $w)
                            <div class="winner px-4 inline-block bg-[#004E6D] rounded-full m-0.5">
                                <div class="flex gap-x-0.5 items-center">
                                    <span>{{ $id . ' - ' . $w }}</span>
                                    <button onclick="removeWinner(event)"
                                        class="remove-winner-btn text-xl flex items-center">
                                        <i class='bx bx-x h-full w-full inline-block'></i>
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tsparticles/confetti@3.0.3/tsparticles.confetti.bundle.min.js"></script>
    <script>
        const congrats = () => {

            const end = Date.now() + 8 * 1000;

            // go Buckeyes!
            const colors = ["#00A6F4", "#93CA34"];

            (function frame() {
                confetti({
                    particleCount: 2,
                    angle: 60,
                    spread: 55,
                    origin: {
                        x: 0
                    },
                    colors: colors,
                });

                confetti({
                    particleCount: 2,
                    angle: 120,
                    spread: 55,
                    origin: {
                        x: 1
                    },
                    colors: colors,
                });

                if (Date.now() < end) {
                    requestAnimationFrame(frame);
                }
            })();
        }
    </script>
    <script>
        var dropdown_triggers = document.querySelectorAll("[dropdown-trigger]");
        dropdown_triggers.forEach((dropdown_trigger) => {
            let dropdown_menu = dropdown_trigger.parentElement.querySelector("[dropdown-menu]");

            dropdown_trigger.addEventListener("click", function() {
                dropdown_menu.classList.toggle("opacity-0");
                dropdown_menu.classList.toggle("pointer-events-none");
                dropdown_menu.classList.toggle("before:-top-5");
                if (dropdown_trigger.getAttribute("aria-expanded") == "false") {
                    dropdown_trigger.setAttribute("aria-expanded", "true");
                    dropdown_menu.classList.remove("transform-dropdown");
                    dropdown_menu.classList.add("transform-dropdown-show");
                } else {
                    dropdown_trigger.setAttribute("aria-expanded", "false");
                    dropdown_menu.classList.remove("transform-dropdown-show");
                    dropdown_menu.classList.add("transform-dropdown");
                }
            });

            window.addEventListener("click", function(e) {
                if (!dropdown_menu.contains(e.target) && !dropdown_trigger.contains(e.target)) {
                    if (dropdown_trigger.getAttribute("aria-expanded") == "true") {
                        dropdown_trigger.click();
                    }
                }
            });
        });

        const pickPrizeBtn = document.getElementById("pickPrizeBtn");
        const prizeOptions = document.querySelectorAll("[name='prize']");
        const prizeInfo = document.getElementById("prizeInfo");

        prizeOptions.forEach((prizeOption) => {
            prizeOption.addEventListener("change", function() {
                const prize = JSON.parse(prizeOption.getAttribute("data-prize"));
                prizeInfo.textContent = prize.name + " untuk " + prize.amount + " pemenang";

                digitContainer.innerHTML = "";
                if (prize.is_prime) {
                    for (let i = 0; i < 8; i++) {
                        const digitEl = document.createElement("div");
                        digitEl.classList.add("digit", "text-white");
                        digitEl.innerHTML = `
                            <div data-rotation="-180" data-digit="" class="digit-inner relative h-full w-full font-bold text-pdam-dark-blue">
                                <div class="digit-front h-full w-full flex items-center justify-center active">0</div>
                                <div class="digit-back h-full w-full absolute top-0 left-0  flex items-center justify-center">1</div>
                            </div>
                        `;
                        digitContainer.appendChild(digitEl);
                    }
                } else {
                    for (let i = 0; i < 4; i++) {
                        const digitEl = document.createElement("div");
                        digitEl.classList.add("digit", "text-white");
                        digitEl.innerHTML = `
                            <div data-rotation="-180" data-digit="" class="digit-inner relative h-full w-full font-bold text-pdam-dark-blue">
                                <div class="digit-front h-full w-full flex items-center justify-center active">0</div>
                                <div class="digit-back h-full w-full absolute top-0 left-0  flex items-center justify-center">1</div>
                            </div>
                        `;
                        digitContainer.appendChild(digitEl);
                    }
                }

                digitElems = document.querySelectorAll(".digit");

                pickPrizeBtn.querySelector("span").textContent = prize.name;
                pickPrizeBtn.click();
                // reset all winners
                document.querySelectorAll(".winner").forEach((winner) => {
                    winner.remove();
                });

                fetchWinners(prize);

                resetSpiner();
            });
        });

        const winners = document.querySelector(".winner-container");

        const fetchWinners = (prize) => {
            const resp = fetch(`/doorprize/${prize.id}/winner`, {
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            }).then((resp) => resp.json()).then((data) => {
                if (data.data.length == prize.amount) {
                    spinBtn.onclick = () => {
                        return Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Doorprize ini sudah dipilih semua pemenangnya',
                        });
                    }
                } else {
                    spinBtn.onclick = () => spin;
                }
                data.data.forEach((winner, index) => {
                    console.log(winner);
                    console.log("masuk");
                    const winnerElem = document.createElement("div");
                    winnerElem.classList.add("winner", "px-4", "inline-block", "bg-[#004E6D]",
                        "rounded-full", "m-0.5");
                    winnerElem.innerHTML = `
                        <div class="flex gap-x-0.5 items-center">
                            <span>${winner.user_id} - ${winner.name}</span>
                            <button onclick="removeWinner(event)" data-winner-id="${winner.id}" class="remove-winner-btn text-xl flex items-center">
                                <i class='bx bx-x h-full w-full inline-block'></i>
                            </button>
                        </div>
                    `;
                    winners.appendChild(winnerElem);
                });
            }).catch((err) => {
                console.log(err);
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Gagal mengambil data pemenang!',
                });
            });
        }

        const removeWinner = (e) => {
            const btn = e.target.parentElement;
            const winnerData = JSON.parse(btn.getAttribute("data-winner-id"));
            fetch(`/doorprize/winner/${winnerData}/remove`, {
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            }).then((resp) => resp.json()).then((data) => {
                if (data.status == "success") {
                    btn.parentElement.parentElement.remove();
                    spinBtn.onclick = () => spin;
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: 'Pemenang berhasil dihapus!',
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Gagal menghapus pemenang!',
                    });
                }
            }).catch((err) => {
                console.log(err);
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Gagal menghapus pemenang!',
                });
            });
            e.target.parentElement.parentElement.parentElement.remove();
        };

        let digitElems = document.querySelectorAll(".digit");
        const spinBtn = document.getElementById("spinBtn");

        spinBtn.addEventListener("click", spin);

        function spin() {
            const prize = JSON.parse(document.querySelector("[name='prize']:checked").getAttribute("data-prize"));
            resetSpiner();
            fetch(`/doorprize/spin?prize_id=${prize.id}`, {
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                        'content')
                }
            }).then((resp) => resp.json()).then((data) => {
                console.log(data);
                if (data.data && data.status == "success") {
                    const userIdChars = data.data.user_id.split("");
                    digitElems.forEach((digitEl, index) => {
                        const digitInner = digitEl.querySelector(".digit-inner");
                        digitInner.setAttribute("data-digit", userIdChars[index]);
                    });

                    digitContainer.setAttribute("data-user-id", data.data.user_id);
                    digitContainer.setAttribute("data-user-name", data.data.name);

                    digitElems.forEach((digitEl) => {
                        changeDigit(digitEl);
                    });

                    setTimeout(() => {
                        congrats();
                        const userId = digitContainer.getAttribute("data-user-id");
                        const userName = digitContainer.getAttribute("data-user-name");
                        const winnerElem = document.createElement("div");
                        winnerElem.classList.add("winner", "px-4", "inline-block", "bg-[#004E6D]",
                            "rounded-full",
                            "m-0.5");
                        winnerElem.innerHTML = `
                        <div class="flex gap-x-0.5 items-center">
                            <span>${userId} - ${userName}</span>
                            <button onclick="removeWinner(event)" class="remove-winner-btn text-xl flex items-center" data-winner-id=${data.data.id}>
                                <i class='bx bx-x h-full w-full inline-block'></i>
                            </button>
                        </div>
                    `;
                        winners.appendChild(winnerElem);
                        Swal.fire({
                            icon: 'success',
                            title: 'Selamat!',
                            text: `Peserta ${userId} - ${userName} berhasil memenangkan ${prize.name}`,
                        });
                    }, 4000);
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Maaf...',
                        text: data.message,
                    });
                }
            }).catch((err) => {
                console.log(err);
                Swal.fire({
                    icon: 'error',
                    title: 'Maaf...',
                    text: err,
                });
            });
        }

        const digitContainer = document.querySelector(".digit-container");

        function getWinner(prize) {
            let success = false;
            fetch(`/doorprize/spin?prize_id=${prize.id}`, {
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                        'content')
                }
            }).then((resp) => {
                const data = resp.json();
                console.log(data);
                if (resp.status !== 200) {
                    throw data.message;
                }
                return data;
            }).then((data) => {
                if (data.data) {
                    const userIdChars = data.data.user_id.split("");
                    digitElems.forEach((digitEl, index) => {
                        const digitInner = digitEl.querySelector(".digit-inner");
                        digitInner.setAttribute("data-digit", userIdChars[index]);
                    });

                    digitContainer.setAttribute("data-user-id", data.data.user_id);
                    digitContainer.setAttribute("data-user-name", data.data.name);
                    success = true;
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Maaf...',
                        text: 'Gagal mendapatkan pemenang!',
                    });
                }
            }).catch((err) => {
                console.log(err);
                Swal.fire({
                    icon: 'error',
                    title: 'Maaf...',
                    text: err,
                });
            });

            return success;
        }

        function resetSpiner() {
            digitElems.forEach((digitEl) => {
                const digitInner = digitEl.querySelector(".digit-inner");
                const digitNumber = parseInt(digitInner.getAttribute("data-digit"));
                const digitFront = digitInner.querySelector(".digit-front");
                const digitBack = digitInner.querySelector(".digit-back");

                digitInner.style.transform = `rotateX(0deg)`;
                digitInner.setAttribute("data-rotation", -180);
                digitFront.classList.add("active");
                digitBack.classList.remove("active");

                digitFront.textContent = 0;
                digitBack.textContent = 1;
            });
        }

        function changeDigit(digitEl) {
            const digitInner = digitEl.querySelector(".digit-inner");
            const digitInnerRotation = digitInner.getAttribute("data-rotation");
            const digitNumber = parseInt(digitInner.getAttribute("data-digit"));
            const digitFront = digitInner.querySelector(".digit-front");
            const digitBack = digitInner.querySelector(".digit-back");

            digitInner.style.transform = `rotateX(${digitInnerRotation}deg)`;
            digitInner.setAttribute("data-rotation", parseInt(digitInnerRotation) - 180);
            digitFront.classList.toggle("active");
            digitBack.classList.toggle("active");

            const digitFaceActive = digitInner.querySelector(".active");
            // get inactive using not
            const digitFaceInactive = digitInner.querySelector(":not(.active)");
            const activeNumber = parseInt(digitFaceActive.textContent);
            const inactiveNumber = parseInt(digitFaceInactive.textContent);


            if (activeNumber != digitNumber) {
                setTimeout(() => {
                    if (activeNumber == 9) {
                        digitFaceInactive.textContent = 0;
                    } else {
                        digitFaceInactive.textContent = activeNumber + 1;
                    }
                    changeDigit(digitEl);
                }, 300);
            }


        }
    </script>
</body>

</html>
