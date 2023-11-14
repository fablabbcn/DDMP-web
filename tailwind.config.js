/** @type {import('tailwindcss').Config} */

const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
  content: [
    '**/*.css',
    '**/*.php',
    '*.php',
  ],
  theme: {
    colors: {
      inherit: 'inherit',
      current: 'currentColor',
      transparent: 'transparent',
      black: '#383839',
      gray: '#dadad5',
      white: '#ffffff',
      red: '#ff805b',
      yellow: '#e4ff6a',
      green: '#69a880',
      blue: '#a6ced7',
      indigo: '#5878c5',
      purple: '#ba80ff',
    },

    extend: {
      gridTemplateColumns: {
        14: 'repeat(14, minmax(0, 1fr))',
      },
      gridColumnStart: {
        '13': '13',
        '14': '14',
      },
      gridColumnEnd: {
        '13': '13',
        '14': '14',
        '15': '15',
      },

      fontFamily: {
        sans: ['Aileron', ...defaultTheme.fontFamily.sans],
      },

      fontSize: { unset: 'unset' },
      fill: (theme) => ({ ...theme('colors'), none: 'none' }),
      stroke: (theme) => ({ ...theme('colors'), none: 'none' }),
    },
  },
  plugins: [
    require('@tailwindcss/typography'),
    require('@tailwindcss/forms'),
    require('@tailwindcss/aspect-ratio'),
    require('@vicgutt/tailwindcss-debug'),
  ],
}
