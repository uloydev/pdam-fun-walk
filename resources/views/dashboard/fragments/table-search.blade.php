<div class="relative flex flex-wrap items-stretch transition-all rounded-lg ease">
    <span
        class="text-sm ease leading-5.6 absolute z-50 -ml-px flex h-full items-center whitespace-nowrap rounded-lg rounded-tr-none rounded-br-none border border-r-0 border-transparent bg-transparent py-2 px-2.5 text-center font-normal text-slate-500 dark:text-white transition-all">
        <i class="bx bx-search-alt-2" aria-hidden="true"></i>
    </span>
    <input id="searchInput" type="text"
        class="mr-3 font-semibold pl-9 text-sm focus:shadow-primary-outline ease w-1/100 leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-slate-400 bg-white dark:bg-slate-700 bg-clip-padding py-2 pr-3 text-slate-700 dark:text-white transition-all placeholder:text-gray-500 focus:border-blue-500 dark:focus:border-slate-400 focus:outline-none focus:transition-shadow"
        placeholder="Type here..." value="{{ $pagination['search'] }}">
    <button id="searchBtn" type="button"
        class="px-6 py-2 rounded-lg bg-gradient-to-tl to-blue-400 from-violet-500 text-white font-semibold mr-3 hover:from-violet-700 hover:to-blue-600 transition-all hover:shadow-lg">Search</button>
    <button id="resetFilterBtn" type="button"
        class="px-6 py-2 rounded-lg bg-gradient-to-tl from-slate-700 to-gray-700 text-white font-semibold hover:from-slate-800 hover:to-gray-800 transition-all hover:shadow-lg">Reset Filter</button>
</div>
