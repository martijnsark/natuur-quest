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
                fact: '#F6692C',
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
                mainButtonDesktop: '25vw',
                secondaryButtonDesktop: '15vw',
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
                bgDiagonal: '36rem',
            },

            animation: {
                glow: "glow 2.5s ease-in-out infinite",
                pan: "pan 20s linear infinite",
                factCard: "fadeSlide 2s ease-out forwards, glow 2.5s ease-in-out infinite"
            },
            keyframes: {
                fadeSlide: {
                    "0%": {
                        opacity: "0",
                        transform: "translateY(20px) scale(0.98)",
                    },
                    "100%": {
                        opacity: "1",
                        transform: "translateY(0) scale(1)",
                    },
                },
                glow: {
                    "0%, 100%": {
                        boxShadow: "0 0 10px rgba(246,105,44,0.4), 0 0 20px rgba(246,105,44,0.2)"
                    },
                    "50%": {
                        boxShadow: "0 0 30px rgba(246,105,44,0.8), 0 0 50px rgba(246,105,44,0.6)"
                    },
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
