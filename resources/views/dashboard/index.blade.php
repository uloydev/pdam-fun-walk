@extends('dashboard.layout')

@section('title', 'Dashboard')

@section('content')
    <!-- row 1 -->
    <div class="flex flex-wrap -mx-3 gap-y-4 items-stretch">
        <!-- card1 -->
        <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4 h-full flex-1">
            <div
                class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row -mx-3 items-center">
                        <div class="flex-none w-2/3 max-w-full px-3">
                            <div>
                                <p
                                    class="mb-0 font-sans text-sm font-semibold leading-normal uppercase dark:text-white dark:opacity-60">
                                    Customer Participant</p>
                                <h1 class="mt-2 font-bold dark:text-white">{{ $customerParticipant }}</h1>
                            </div>
                        </div>
                        <div class="px-3 text-right basis-1/3">
                            <div
                                class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl to-blue-400 from-violet-500">
                                <i class="bx bxs-user leading-none text-2xl relative top-3.5 text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4 h-full flex-1">
            <div
                class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row -mx-3 items-center">
                        <div class="flex-none w-2/3 max-w-full px-3">
                            <div>
                                <p
                                    class="mb-0 font-sans text-sm font-semibold leading-normal uppercase dark:text-white dark:opacity-60">
                                    Public Participant</p>
                                <h1 class="mt-2 font-bold dark:text-white">{{ $publicParticipant }}</h1>
                            </div>
                        </div>
                        <div class="px-3 text-right basis-1/3">
                            <div
                                class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl to-red-500 from-orange-400">
                                <i class="leading-none bx bxs-user text-2xl relative top-3.5 text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4 h-full flex-1">
            <div
                class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row -mx-3 items-center">
                        <div class="flex-none w-2/3 max-w-full px-3">
                            <div>
                                <p
                                    class="mb-0 font-sans text-sm font-semibold leading-normal uppercase dark:text-white dark:opacity-60">
                                    Customer Quota / Stock</p>
                                <h1 class="mt-2 font-bold dark:text-white">{{ $customerQuota }}</h1>
                            </div>
                        </div>
                        <div class="px-3 text-right basis-1/3">
                            <div
                                class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-emerald-600 to-teal-400">
                                <i class="leading-none bx bxs-t-shirt text-2xl relative top-3.5 text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4 h-full flex-1">
            <div
                class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row -mx-3 items-center">
                        <div class="flex-none w-2/3 max-w-full px-3">
                            <div>
                                <p
                                    class="mb-0 font-sans text-sm font-semibold leading-normal uppercase dark:text-white dark:opacity-60">
                                    Public Quota / Stock</p>
                                <h1 class="mt-2 font-bold dark:text-white">{{ $publicQuota }}</h1>
                            </div>
                        </div>
                        <div class="px-3 text-right basis-1/3">
                            <div
                                class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-purple-500 to-pink-400">
                                <i class="leading-none bx bxs-t-shirt text-2xl relative top-3.5 text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="flex flex-wrap -mx-3 gap-y-4 items-stretch mt-4">

        <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4 h-full flex-1">
            <div
                class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row -mx-3 items-center">
                        <div class="flex-none w-2/3 max-w-full px-3">
                            <div>
                                <p
                                    class="mb-0 font-sans text-sm font-semibold leading-normal uppercase dark:text-white dark:opacity-60">
                                    Customer Kits Taken</p>
                                <h1 class="mt-2 font-bold dark:text-white">{{ $customerKitsTaken }}</h1>
                            </div>
                        </div>
                        <div class="px-3 text-right basis-1/3">
                            <div
                                class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-emerald-600 to-teal-400">
                                <i class="leading-none bx bxs-t-shirt text-2xl relative top-3.5 text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4 h-full flex-1">
            <div
                class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row -mx-3 items-center">
                        <div class="flex-none w-2/3 max-w-full px-3">
                            <div>
                                <p
                                    class="mb-0 font-sans text-sm font-semibold leading-normal uppercase dark:text-white dark:opacity-60">
                                    Public Kits Taken</p>
                                <h1 class="mt-2 font-bold dark:text-white">{{ $publicKitsTaken }}</h1>
                            </div>
                        </div>
                        <div class="px-3 text-right basis-1/3">
                            <div
                                class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-purple-500 to-pink-400">
                                <i class="leading-none bx bxs-t-shirt text-2xl relative top-3.5 text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4 h-full flex-1">
            <div
                class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row -mx-3 items-center">
                        <div class="flex-none w-2/3 max-w-full px-3">
                            <div>
                                <p
                                    class="mb-0 font-sans text-sm font-semibold leading-normal uppercase dark:text-white dark:opacity-60">
                                    Customer Participant CheckIn</p>
                                <h1 class="mt-2 font-bold dark:text-white">{{ $customerCheckin }}</h1>
                            </div>
                        </div>
                        <div class="px-3 text-right basis-1/3">
                            <div
                                class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl to-blue-400 from-violet-500">
                                <i class="bx bx-log-in leading-none text-2xl relative top-3.5 text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4 h-full flex-1">
            <div
                class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row -mx-3 items-center">
                        <div class="flex-none w-2/3 max-w-full px-3">
                            <div>
                                <p
                                    class="mb-0 font-sans text-sm font-semibold leading-normal uppercase dark:text-white dark:opacity-60">
                                    Public Participant CheckIn</p>
                                <h1 class="mt-2 font-bold dark:text-white">{{ $publicCheckin }}</h1>
                            </div>
                        </div>
                        <div class="px-3 text-right basis-1/3">
                            <div
                                class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl to-red-500 from-orange-400">
                                <i class="leading-none bx bx-log-in text-2xl relative top-3.5 text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="flex flex-wrap mt-6 -mx-3">
        <div class="w-full max-w-full px-3 mt-0 mb-6 lg:mb-0 lg:w-1/2 lg:flex-none">
            <div
                class="relative flex flex-col min-w-0 break-words bg-white border-0 border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl dark:bg-gray-950 border-black-125 rounded-2xl bg-clip-border">
                <div class="p-4 pb-0 mb-0 rounded-t-4">
                    <div class="flex justify-between">
                        <h6 class="mb-2 dark:text-white">Customer Quota / Shirt Stock Details</h6>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="items-center w-full mb-4 align-top border-collapse border-gray-200 dark:border-white/40">
                        <tbody>
                            @foreach ($customerStock as $item)
                                <tr>
                                    <td
                                        class="p-2 align-middle bg-transparent border-b w-3/10 whitespace-nowrap dark:border-white/40">
                                        <div class="flex items-center px-2 py-1">
                                            <div class="ml-6">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">
                                                    Size</p>
                                                <h6 class="mb-0 text-2xl leading-normal dark:text-white">{{ $item->size }}
                                                </h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td
                                        class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40">
                                        <div class="text-center">
                                            <p
                                                class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">
                                                Used Quota</p>
                                            <h6 class="mb-0 text-lg leading-normal dark:text-white">{{ $item->used_stock }}
                                            </h6>
                                        </div>
                                    </td>
                                    <td
                                        class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40">
                                        <div class="text-center">
                                            <p
                                                class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">
                                                Remaining Quota</p>
                                            <h6 class="mb-0 text-lg leading-normal dark:text-white">
                                                {{ $item->remaining_stock }}</h6>
                                        </div>
                                    </td>
                                    <td
                                        class="p-2 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40">
                                        <div class="flex-1 text-center">
                                            <p
                                                class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">
                                                Total Stock</p>
                                            <h6 class="mb-0 text-lg leading-normal dark:text-white">
                                                {{ $item->total_stock }}
                                            </h6>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="w-full max-w-full px-3 mt-0 mb-6 lg:mb-0 lg:w-1/2 lg:flex-none">
            <div
                class="relative flex flex-col min-w-0 break-words bg-white border-0 border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl dark:bg-gray-950 border-black-125 rounded-2xl bg-clip-border">
                <div class="p-4 pb-0 mb-0 rounded-t-4">
                    <div class="flex justify-between">
                        <h6 class="mb-2 dark:text-white">Public Quota / Shirt Stock Details</h6>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="items-center w-full mb-4 align-top border-collapse border-gray-200 dark:border-white/40">
                        <tbody>
                            @foreach ($publicStock as $item)
                                <tr>
                                    <td
                                        class="p-2 align-middle bg-transparent border-b w-3/10 whitespace-nowrap dark:border-white/40">
                                        <div class="flex items-center px-2 py-1">
                                            <div class="ml-6">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">
                                                    Size</p>
                                                <h6 class="mb-0 text-2xl leading-normal dark:text-white">
                                                    {{ $item->size }}
                                                </h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td
                                        class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40">
                                        <div class="text-center">
                                            <p
                                                class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">
                                                Used Quota</p>
                                            <h6 class="mb-0 text-lg leading-normal dark:text-white">
                                                {{ $item->used_stock }}
                                            </h6>
                                        </div>
                                    </td>
                                    <td
                                        class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40">
                                        <div class="text-center">
                                            <p
                                                class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">
                                                Remaining Quota</p>
                                            <h6 class="mb-0 text-lg leading-normal dark:text-white">
                                                {{ $item->remaining_stock }}</h6>
                                        </div>
                                    </td>
                                    <td
                                        class="p-2 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40">
                                        <div class="flex-1 text-center">
                                            <p
                                                class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-60">
                                                Total Stock</p>
                                            <h6 class="mb-0 text-lg leading-normal dark:text-white">
                                                {{ $item->total_stock }}</h6>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
