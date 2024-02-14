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
            },bodysystem: {
                'layout': '1fr, auto',
            }
        },
        screens: {
            'xs' : '600px',
            's': '800px',
            'sm' : '900px',
            'm': '1100px',
            'ml' : '1500px',
            'l': '1800px',
        },
    },

    plugins: [forms],
};
