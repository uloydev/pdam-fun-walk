<div class="relative">
    <button id="pageSizeBtn" data-per-page="{{ $pagination['per_page'] }}" dropdown-trigger aria-expanded="false"
        type="button"
        class="inline-block mr-3 py-2 px-6 font-bold text-center text-slate-500 dark:text-white uppercase align-middle transition-all rounded-lg cursor-pointer border border-solid border-slate-400 bg-white dark:bg-slate-700 leading-normal text-sm ease-in tracking-tight-rem active:opacity-85">{{ $pagination['per_page'] }}</button>
    <span class="text-sm">Entries per page</span>
    <p class="hidden transform-dropdown-show"></p>
    <ul dropdown-menu
        class="z-10 text-sm lg:shadow-3xl duration-250 before:duration-350 before:font-awesome before:ease min-w-44 before:text-5.5 transform-dropdown pointer-events-none absolute left-auto top-1/2 m-0 -mr-4 mt-2 list-none rounded-lg border-0 border-solid border-transparent bg-white dark:bg-slate-700 bg-clip-padding px-0 py-2 text-left text-slate-500 dark:text-white opacity-0 transition-all before:absolute before:right-7 before:left-auto before:top-0 before:z-40 before:text-white before:transition-all before:content-['\f0d8']">
        <li>
            <input type="radio" name="per_page" id="pageCount1" value="10" class="hidden peer"
                {{ $pagination['per_page'] == 10 ? 'checked' : '' }}>
            <label for="pageCount1"
                class="py-1.2 lg:ease clear-both block w-full whitespace-nowrap border-0 bg-transparent px-4 text-left font-normal text-slate-500 hover:bg-gray-200 hover:text-slate-700 dark:text-white dark:hover:bg-gray-200/80 dark:hover:text-slate-700 lg:transition-colors lg:duration-300 peer-checked:text-slate-50 peer-checked:bg-slate-400 peer-checked:hover:bg-slate-400">10</label>
        </li>
        <li>
            <input type="radio" name="per_page" id="pageCount2" value="20" class="hidden peer"
                {{ $pagination['per_page'] == 20 ? 'checked' : '' }}>
            <label for="pageCount2"
                class="py-1.2 lg:ease clear-both block w-full whitespace-nowrap border-0 bg-transparent px-4 text-left font-normal text-slate-500 hover:bg-gray-200 hover:text-slate-700 dark:text-white dark:hover:bg-gray-200/80 dark:hover:text-slate-700 lg:transition-colors lg:duration-300 peer-checked:text-slate-50 peer-checked:bg-slate-400 peer-checked:hover:bg-slate-400">20</label>
        </li>
        <li>
            <input type="radio" name="per_page" id="pageCount3" value="50" class="hidden peer"
                {{ $pagination['per_page'] == 50 ? 'checked' : '' }}>
            <label for="pageCount3"
                class="py-1.2 lg:ease clear-both block w-full whitespace-nowrap border-0 bg-transparent px-4 text-left font-normal text-slate-500 hover:bg-gray-200 hover:text-slate-700 dark:text-white dark:hover:bg-gray-200/80 dark:hover:text-slate-700 lg:transition-colors lg:duration-300 peer-checked:text-slate-50 peer-checked:bg-slate-400 peer-checked:hover:bg-slate-400">50</label>
        </li>
        <li>
            <input type="radio" name="per_page" id="pageCount4" value="100" class="hidden peer"
                {{ $pagination['per_page'] == 100 ? 'checked' : '' }}>
            <label for="pageCount4"
                class="py-1.2 lg:ease clear-both block w-full whitespace-nowrap border-0 bg-transparent px-4 text-left font-normal text-slate-500 hover:bg-slate-200 hover:text-slate-700 dark:text-white dark:hover:bg-slate-400 dark:hover:text-slate-700 lg:transition-colors lg:duration-300 peer-checked:text-slate-50 peer-checked:bg-slate-400 peer-checked:hover:bg-slate-400">100</label>
        </li>
    </ul>
</div>
