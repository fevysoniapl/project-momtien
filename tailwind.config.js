/** @type {import('tailwindcss').Config} */
export default {
  content: ['./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',
    './resources/js/**/*.vue',
    './resources/js/**/*.js',
    './resources/js/**/*.{html,js,ts,jsx,tsx,vue}'
  ],
  theme: {
    extend: {
      fontFamily: {
        heading: ['PlayfulDisplay'],
      },
      fontSize: {
        'xs': '10px',
        'sm': '14px',
        'base': '16px',
        'xl': '20px',
        '2xl': '24px',
        '3xl': '28px',
        '4xl': '36px',
        '5xl': '48px',
        '10xl': '100px',
      },
      colors: {
        'x-black': '#2C2F24',
        'x-brown': '#474747',
      },
    },
  },
  plugins: [],
}

