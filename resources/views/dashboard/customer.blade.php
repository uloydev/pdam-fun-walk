@extends('dashboard.layout')
@section('title', 'Customers')

@section('content')
    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">

            <div
                class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6 class="dark:text-white">Customers Table - Page {{$pagination['page']}}</h6>
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
                                        'title' => 'Name',
                                        'column' => 'name',
                                        'sortable' => true,
                                    ])
                                    @include('dashboard.fragments.table-head', [
                                        'title' => 'Customer Code',
                                        'column' => 'customer_code',
                                        'sortable' => true,
                                    ])
                                    @include('dashboard.fragments.table-head', [
                                        'title' => 'Status',
                                        'textAlign' => 'text-center',
                                    ])
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $c)
                                    <tr>
                                        <td
                                            class="px-4 py-2 align-middle bg-transparent {{ $loop->last ? '' : 'border-b' }} dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <h6 class="mb-0 text-sm leading-normal dark:text-white">{{ $c->name }}</h6>
                                        </td>
                                        <td
                                            class="py-2 px-4 align-middle bg-transparent {{ $loop->last ? '' : 'border-b' }} dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <p
                                                class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">
                                                {{ $c->customer_code }}</p>
                                        </td>
                                        <td
                                            class="py-2 px-4 text-sm leading-normal text-center align-middle bg-transparent {{ $loop->last ? '' : 'border-b' }} dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            @if ($c->is_active)
                                                <span
                                                    class="bg-gradient-to-tl from-emerald-500 to-teal-400 px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">Active</span>
                                            @else
                                                <span
                                                    class="bg-gradient-to-tl from-red-500 to-yellow-500 px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">Not
                                                    Active</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="lg:p-6">
                            {{ $customers->onEachSide(2)->links() }}
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
