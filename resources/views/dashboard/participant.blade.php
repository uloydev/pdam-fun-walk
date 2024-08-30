@extends('dashboard.layout')
@section('title', 'Participants')

@section('content')
    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">

            <div
                class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6 class="dark:text-white">Participants Table</h6>
                </div>
                <div class="flex flex-col sm:flex-row px-6 mt-4 mb-2 sm:justify-between">
                    @include('dashboard.fragments.table-pagesize')
                    @include('dashboard.fragments.table-search')
                </div>
                <div class="flex-auto px-0 pt-0 pb-2">
                    <div class="p-0 overflow-x-auto">
                        <table
                            class="items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                            <thead class="align-bottom">
                                <tr>
                                    @include('dashboard.fragments.table-head', [
                                        'title' => 'No',
                                        'sortable' => true,
                                        'column' => 'id',
                                        'textAlign' => 'text-center',
                                    ])
                                    @include('dashboard.fragments.table-head', ['title' => 'Nama'])
                                    @include('dashboard.fragments.table-head', [
                                        'title' => 'Email',
                                        'sortable' => true,
                                        'column' => 'email',
                                    ])
                                    @include('dashboard.fragments.table-head', ['title' => 'Phone'])
                                    @include('dashboard.fragments.table-head', [
                                        'title' => 'NIK',
                                        'sortable' => true,
                                        'column' => 'nik',
                                        'textAlign' => 'text-center',
                                    ])
                                    @include('dashboard.fragments.table-head', [
                                        'title' => 'ID Pelanggan',
                                        'sortable' => true,
                                        'column' => 'customer_code',
                                        'textAlign' => 'text-center',
                                    ])
                                    @include('dashboard.fragments.table-head', [
                                        'title' => 'Tambahan Pendamping',
                                    ])
                                    @include('dashboard.fragments.table-head', [
                                        'title' => 'Baju',
                                        'textAlign' => 'text-center',
                                    ])
                                    @include('dashboard.fragments.table-head', [
                                        'title' => 'Tipe',
                                        'textAlign' => 'text-center',
                                    ])
                                    @include('dashboard.fragments.table-head', ['title' => 'Instagram'])
                                    @include('dashboard.fragments.table-head', [
                                        'title' => 'Action',
                                        'textAlign' => 'text-center',
                                    ])
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($participants as $p)
                                    <tr>
                                        <td
                                            class="px-4 py-2 align-middle bg-transparent {{ $loop->last ? '' : 'border-b' }} dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <h6 class="mb-0 text-sm leading-normal dark:text-white text-center">
                                                {{ $p->participant_number }}</h6>
                                        </td>
                                        <td
                                            class="px-4 py-2 align-middle bg-transparent {{ $loop->last ? '' : 'border-b' }} dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <p
                                                class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">
                                                {{ $p->name }}</p>
                                        </td>
                                        <td
                                            class="px-4 py-2 align-middle bg-transparent {{ $loop->last ? '' : 'border-b' }} dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <p
                                                class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">
                                                {{ $p->email }}</p>
                                        </td>
                                        <td
                                            class="px-4 py-2 align-middle bg-transparent {{ $loop->last ? '' : 'border-b' }} dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <p
                                                class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">
                                                {{ $p->phone }}</p>
                                        </td>
                                        <td
                                            class="px-4 py-2 align-middle bg-transparent {{ $loop->last ? '' : 'border-b' }} dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <p
                                                class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-center">
                                                {{ $p->nik }}</p>
                                        </td>
                                        <td
                                            class="px-4 py-2 align-middle bg-transparent {{ $loop->last ? '' : 'border-b' }} dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <p
                                                class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-center">
                                                {{ $p->customer_code ?? 'Tidak Ada' }}</p>
                                        </td>
                                        <td
                                            class="px-4 py-2 align-middle bg-transparent {{ $loop->last ? '' : 'border-b' }} dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            @if ($p->additional_participants)
                                                <ul
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80 list-disc">
                                                    @foreach ($p->additional_participants as $ap)
                                                        <li>{{ $ap->name . '->' . $ap->relation }}</li>
                                                    @endforeach

                                                </ul>
                                            @else
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">
                                                    Tidak ada</p>
                                            @endif
                                        </td>
                                        <td
                                            class="px-4 py-2 align-middle bg-transparent {{ $loop->last ? '' : 'border-b' }} dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <p
                                                class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-center">
                                                {{ $p->shirtStock->size }}
                                            </p>
                                        </td>
                                        <td
                                            class="px-4 py-2 text-sm leading-normal text-center align-middle bg-transparent {{ $loop->last ? '' : 'border-b' }} dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            @if ($p->customer_code)
                                                <span
                                                    class="bg-gradient-to-tl from-emerald-500 to-teal-400 px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">Pelanggan</span>
                                            @else
                                                <span
                                                    class="bg-gradient-to-tl from-red-500 to-yellow-500 px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">Umum</span>
                                            @endif
                                        </td>
                                        <td
                                            class="px-4 py-2 align-middle bg-transparent {{ $loop->last ? '' : 'border-b' }} dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <p
                                                class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">
                                                {{ $p->instagram }}
                                            </p>
                                        </td>
                                        <td
                                            class="px-4 py-2 text-sm leading-normal text-center align-middle bg-transparent {{ $loop->last ? '' : 'border-b' }} dark:border-white/40 whitespace-nowrap shadow-transparent">

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="lg:p-6">
                            {{ $participants->onEachSide(2)->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    @vite('resources/js/table.js')
@endpush
