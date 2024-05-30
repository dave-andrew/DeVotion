/** @type {Partial<CustomThemeConfig & {extend: Partial<CustomThemeConfig>}> & DefaultTheme} */
const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
        fontFamily: {
            sans: ['Nunito', ...defaultTheme.fontFamily.sans],
        },
        colors: {
            primary: '#2b2d30'
        }
    },
  },
  plugins: [],
}

