import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

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
                heading: ['spicy sale', 'sans-serif'],
                text: ['Comic Neue', 'sans-serif']
            },
            colors: {
                primary: '#36298B',
                nav: '#007866',
                secondary: '#E20147',
            },
            width: {
                mainButton: '50vw',
                secondaryButton: '35vw',
                bg: '150vw',
                body: '100vw',
                fact: '76vw',
                bgImg: '150vw',
            },
            height: {
                bg: '40vh',
                bgImg: '40vh',
            },
            rotate: {
                bg: '25deg',
            },
            spacing: {
                bg: '32rem',
                bgDiagonal: '37rem',
            }
        },
    },

    plugins: [forms],
};
