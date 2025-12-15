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
                popup: '75vw',
                popupButton: '60%',
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
                bg: '27rem',
                bgDiagonal: '31rem',
            },

            animation: {
                blob: "blob 7s infinite",
                pan: "pan 20s linear infinite",
            },
            keyframes: {
                blob: {
                    "0%": {
                        transform: "translate(0px, 0px) scale(1)"
                    },
                    "33%": {
                        transform: "translate(30px, -50px) scale(1.2)"
                    },
                    "66%": {
                        transform: "translate(-20px, 20px) scale(0.8)"
                    },
                    "100%": {
                        transform: "translate(0px, 0px) scale(1)"
                    }
                },
                pan: {
                    "0%": {backgroundPosition: "0 0"},
                    "100%": {backgroundPosition: "-100px 100px"},
                }
            }
        },
    },

    plugins: [forms],
};
