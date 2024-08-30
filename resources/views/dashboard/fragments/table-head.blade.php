@php
    $sortable = $sortable ?? false;
    $column = $column ?? '';
    $pagination = $pagination ?? [];
    $textAlign = $textAlign ?? 'text-left';
@endphp

@if ($sortable)
    <th data-sort="{{ $column }}"
        class="sortable px-4 py-3 font-bold {{ $textAlign }} uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 text-blue-500 text-xxs border-b-solid tracking-none whitespace-nowrap opacity-90 {{ $pagination['sortBy'] == $column ? 'active' : '' }}">
        {{$title}}
        <i
            class='direction asc bx bx-down-arrow-alt {{ $pagination['sortBy'] == $column && $pagination['sortType'] == 'asc' ? 'active' : 'hidden' }}'></i>
        <i
            class='direction desc bx bx-up-arrow-alt {{ $pagination['sortBy'] == $column && $pagination['sortType'] == 'desc' ? 'active' : 'hidden' }}'></i>
    </th>
@else
    <th class="px-4 py-3 font-bold {{ $textAlign }} uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-500 opacity-90">
        {{$title}}
    </th>
@endif

