import forms from '@tailwindcss/forms';
import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                rubik: ['Rubik', 'sans-serif'],
            },
            colors: {
                'pdam-blue': '#00A6F4',
                'pdam-dark-blue': '#0070A5',
                'pdam-green': '#93CA34',
                'pdam-dark-green': '#548009',
            },
            transitionDuration: {
                3000: '3000ms',
            },
        },
    },

    plugins: [forms],
};
