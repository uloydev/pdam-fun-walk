document.addEventListener('DOMContentLoaded', function () {
    const sortable = document.querySelectorAll('.sortable');

    sortable.forEach(function (element) {
        element.addEventListener('click', function () {
            element.classList.add('active');
            sortable.forEach(function (sibling) {
                if (sibling !== element) {
                    sibling.classList.remove('active');
                    sibling.querySelectorAll('.direction').forEach(function (icon) {
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
            Array.from(icon.parentNode.children).forEach(function (sibling) {
                if (sibling !== icon) {
                    sibling.classList.add('hidden');
                    sibling.classList.remove('active');
                }
            });

            // redirect to the url with the new sort value based on current url
            const params = getQueryParams();
            params.set('sortBy', sortBy);
            params.set('sortType', sortType);
            params.delete('page');
            refreshWithParams(params);
        });
    });

    const pageSizeBtn = document.getElementById('pageSizeBtn');
    const pageSizes = document.querySelectorAll('input[name="per_page"]');

    pageSizes.forEach(function (element) {
        element.addEventListener('change', function () {
            pageSizeBtn.innerText = this.value;
            pageSizeBtn.setAttribute('data-per-page', this.value);
            // close dropdown
            document.querySelector('.transform-dropdown-show').click();
            // redirect to the url with the new per_page value based on current url
            const params = getQueryParams();
            params.set('per_page', this.value);
            refreshWithParams(params);

        });
    });

    const searchBtn = document.getElementById('searchBtn');
    const searchInput = document.getElementById('searchInput');

    searchBtn.addEventListener('click', function () {
        const params = getQueryParams();
        params.set('search', searchInput.value);
        refreshWithParams(params);
    });

    const resetFilterBtn = document.getElementById('resetFilterBtn');
    resetFilterBtn.addEventListener('click', function () {
        const params = getQueryParams();
        params.delete('search');
        params.delete('sortBy');
        params.delete('sortType');
        params.delete('per_page');
        refreshWithParams(params);
    });
});

const getQueryParams = () => {
    return new URLSearchParams(window.location.search);
}

const refreshWithParams = (params) => {
    window.location.href = `${window.location.pathname}?${params.toString()}`;
}