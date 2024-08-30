@extends('dashboard.layout')
@section('title', 'Customers')

@section('content')
    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">

            <div
                class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6 class="dark:text-white">Customers Table</h6>
                </div>
                <div class="flex flex-col sm:flex-row px-6 mt-4 mb-2 sm:justify-between">
                    <div class="relative">
                        <button id="pageSizeBtn" data-per-page="{{$pagination['per_page']}}" dropdown-trigger aria-expanded="false" type="button"
                            class="inline-block mr-3 py-2 px-6 font-bold text-center text-slate-500 dark:text-white uppercase align-middle transition-all rounded-lg cursor-pointer border border-solid border-slate-400 bg-white dark:bg-slate-700 leading-normal text-sm ease-in tracking-tight-rem active:opacity-85">{{$pagination['per_page']}}</button>
                        <span class="text-sm">Entries per page</span>
                        <p class="hidden transform-dropdown-show"></p>
                        <ul dropdown-menu
                            class="z-10 text-sm lg:shadow-3xl duration-250 before:duration-350 before:font-awesome before:ease min-w-44 before:text-5.5 transform-dropdown pointer-events-none absolute left-auto top-1/2 m-0 -mr-4 mt-2 list-none rounded-lg border-0 border-solid border-transparent bg-white dark:bg-slate-700 bg-clip-padding px-0 py-2 text-left text-slate-500 dark:text-white opacity-0 transition-all before:absolute before:right-7 before:left-auto before:top-0 before:z-40 before:text-white before:transition-all before:content-['\f0d8']">
                            <li>
                                <input type="radio" name="per_page" id="pageCount1" value="10" class="hidden peer" {{$pagination['per_page'] == 10 ? 'checked': ''}}>
                                <label for="pageCount1"
                                    class="py-1.2 lg:ease clear-both block w-full whitespace-nowrap border-0 bg-transparent px-4 text-left font-normal text-slate-500 hover:bg-gray-200 hover:text-slate-700 dark:text-white dark:hover:bg-gray-200/80 dark:hover:text-slate-700 lg:transition-colors lg:duration-300 peer-checked:text-slate-50 peer-checked:bg-slate-400 peer-checked:hover:bg-slate-400">10</label>
                            </li>
                            <li>
                                <input type="radio" name="per_page" id="pageCount2" value="20" class="hidden peer" {{$pagination['per_page'] == 20 ? 'checked': ''}}>
                                <label for="pageCount2"
                                    class="py-1.2 lg:ease clear-both block w-full whitespace-nowrap border-0 bg-transparent px-4 text-left font-normal text-slate-500 hover:bg-gray-200 hover:text-slate-700 dark:text-white dark:hover:bg-gray-200/80 dark:hover:text-slate-700 lg:transition-colors lg:duration-300 peer-checked:text-slate-50 peer-checked:bg-slate-400 peer-checked:hover:bg-slate-400">20</label>
                            </li>
                            <li>
                                <input type="radio" name="per_page" id="pageCount3" value="50" class="hidden peer" {{$pagination['per_page'] == 50 ? 'checked': ''}}>
                                <label for="pageCount3"
                                    class="py-1.2 lg:ease clear-both block w-full whitespace-nowrap border-0 bg-transparent px-4 text-left font-normal text-slate-500 hover:bg-gray-200 hover:text-slate-700 dark:text-white dark:hover:bg-gray-200/80 dark:hover:text-slate-700 lg:transition-colors lg:duration-300 peer-checked:text-slate-50 peer-checked:bg-slate-400 peer-checked:hover:bg-slate-400">50</label>
                            </li>
                            <li>
                                <input type="radio" name="per_page" id="pageCount4" value="100" class="hidden peer" {{$pagination['per_page'] == 100 ? 'checked': ''}}>
                                <label for="pageCount4"
                                    class="py-1.2 lg:ease clear-both block w-full whitespace-nowrap border-0 bg-transparent px-4 text-left font-normal text-slate-500 hover:bg-slate-200 hover:text-slate-700 dark:text-white dark:hover:bg-slate-400 dark:hover:text-slate-700 lg:transition-colors lg:duration-300 peer-checked:text-slate-50 peer-checked:bg-slate-400 peer-checked:hover:bg-slate-400">100</label>
                            </li>
                        </ul>
                    </div>
                    <div class="relative flex flex-wrap items-stretch transition-all rounded-lg ease">
                        <span
                            class="text-sm ease leading-5.6 absolute z-50 -ml-px flex h-full items-center whitespace-nowrap rounded-lg rounded-tr-none rounded-br-none border border-r-0 border-transparent bg-transparent py-2 px-2.5 text-center font-normal text-slate-500 dark:text-white transition-all">
                            <i class="bx bx-search-alt-2" aria-hidden="true"></i>
                        </span>
                        <input id="input" type="text"
                            class="mr-3 font-semibold pl-9 text-sm focus:shadow-primary-outline ease w-1/100 leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-slate-400 bg-white dark:bg-slate-700 bg-clip-padding py-2 pr-3 text-slate-700 dark:text-white transition-all placeholder:text-gray-500 focus:border-blue-500 dark:focus:border-slate-400 focus:outline-none focus:transition-shadow"
                            placeholder="Type here..." value="{{$pagination['search']}}">
                        <button id="searchBtn" type="button" class="px-6 py-2 rounded-lg bg-gradient-to-tl to-blue-400 from-violet-500 text-white font-semibold">Search</button>
                    </div>
                </div>
                <div class="flex-auto px-0 pt-0 pb-2">
                    <div class="p-0 overflow-x-auto">
                        <table
                            class="items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                            <thead class="align-bottom">
                                <tr>
                                    <th data-sort="name"
                                        class="sortable px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-500 opacity-70 {{ $pagination['sortBy'] == 'name' ? 'active' : '' }}">
                                        Name
                                        <i
                                            class='direction asc bx bx-down-arrow-alt {{ $pagination['sortBy'] == 'name' && $pagination['sortType'] == 'asc' ? 'active' : 'hidden' }}'></i>
                                        <i
                                            class='direction desc bx bx-up-arrow-alt {{ $pagination['sortBy'] == 'name' && $pagination['sortType'] == 'desc' ? 'active' : 'hidden' }}'></i>
                                    </th>
                                    <th data-sort="customer_code"
                                        class="sortable px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-500 opacity-70 {{ $pagination['sortBy'] == 'customer_code' ? 'active' : '' }}">
                                        Customer Code
                                        <i
                                            class='direction asc bx bx-down-arrow-alt {{ $pagination['sortBy'] == 'customer_code' && $pagination['sortType'] == 'asc' ? 'active' : 'hidden' }}'></i>
                                        <i
                                            class='direction desc bx bx-up-arrow-alt {{ $pagination['sortBy'] == 'customer_code' && $pagination['sortType'] == 'desc' ? 'active' : 'hidden' }}'></i>
                                    </th>
                                    <th
                                        class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-500 opacity-70">
                                        Status
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $c)
                                    <tr>
                                        <td
                                            class="p-2 align-middle bg-transparent {{ $loop->last ? '' : 'border-b' }} dark:border-white/40 whitespace-nowrap shadow-transparent px-6">
                                            <h6 class="mb-0 text-sm leading-normal dark:text-white">{{ $c->name }}</h6>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent {{ $loop->last ? '' : 'border-b' }} dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <p
                                                class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">
                                                {{ $c->customer_code }}</p>
                                        </td>
                                        <td
                                            class="p-2 text-sm leading-normal text-center align-middle bg-transparent {{ $loop->last ? '' : 'border-b' }} dark:border-white/40 whitespace-nowrap shadow-transparent">
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sortable = document.querySelectorAll('.sortable');
            
            sortable.forEach(function(element) {
                element.addEventListener('click', function() {
                    element.classList.add('active');
                    sortable.forEach(function(sibling) {
                        if (sibling !== element) {
                            sibling.classList.remove('active');
                            sibling.querySelectorAll('.direction').forEach(function(icon) {
                                icon.classList.add('hidden');
                                icon.classList.remove('active');
                            });
                        }
                    });

                    let sortBy = this.getAttribute('data-sort');
                    let sortType = 'asc';
                    if (this.querySelector('.asc').classList.contains('active')) {
                        sortType = 'desc';
                    }

                    const icon = this.querySelector(`.${sortType}`);
                    icon.classList.add('active');
                    icon.classList.remove('hidden');
                    Array.from(icon.parentNode.children).forEach(function(sibling) {
                        if (sibling !== icon) {
                            sibling.classList.add('hidden');
                            sibling.classList.remove('active');
                        }
                    });

                    // redirect to the url with the new sort value based on current url
                    const params = new URL(document.location.toString()).searchParams;
                    params.set('sortBy', sortBy);
                    params.set('sortType', sortType);
                    window.location.href = `${window.location.pathname}?${params.toString()}`;
                });
            });

            const pageSizeBtn = document.getElementById('pageSizeBtn');
            const pageSizes = document.querySelectorAll('input[name="per_page"]');

            pageSizes.forEach(function(element) {
                element.addEventListener('change', function() {
                    pageSizeBtn.innerText = this.value;
                    pageSizeBtn.setAttribute('data-per-page', this.value);
                    // close dropdown
                    document.querySelector('.transform-dropdown-show').click();
                    // redirect to the url with the new per_page value based on current url
                    const params = new URL(document.location.toString()).searchParams;
                    params.set('per_page', this.value);
                    window.location.href = `${window.location.pathname}?${params.toString()}`;

                });
            });

            const searchBtn = document.getElementById('searchBtn');
            const searchInput = document.getElementById('searchInput');

            searchBtn.addEventListener('click', function() {
                const input = document.getElementById('input');
                const value = input.value;
                // redirect to the url with the new search value based on current url
                const params = new URL(document.location.toString()).searchParams;
                params.set('search', value);
                window.location.href = `${window.location.pathname}?${params.toString()}`;
            });

        });
    </script>
@endpush
