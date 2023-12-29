/** @type {import('tailwindcss').Config} */
export default {
    purge: ['./index.html', './src/**/*.{vue,js,ts,jsx,tsx}'],
    media: false, // or 'media' or 'class'
    theme: {
      extend: {},
    },
    variants: {
      extend: {},
    },
    plugins: [
        require('@headlessui/vue'),
        require('@heroicons/vue/24/outline')
    ],
}

