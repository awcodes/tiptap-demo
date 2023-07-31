const colors = require('tailwindcss/colors');

/** @type {import('tailwindcss').Config} */
module.exports = {
    darkMode: 'class',
  content: [
      './resources/views/**/*.blade.php',
  ],
  theme: {
    extend: {
        colors: {
            primary: colors.amber,
            danger: colors.red,
            success: colors.green,
            info: colors.blue,
            warning: colors.yellow,
            gray: colors.slate,
            secondary: colors.slate,
        }
    },
  },
  plugins: [require('@tailwindcss/typography')],
}

