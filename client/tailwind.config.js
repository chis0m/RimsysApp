/*
** TailwindCSS Configuration File
**
** Docs: https://tailwindcss.com/docs/configuration
** Default: https://github.com/tailwindcss/tailwindcss/blob/master/stubs/defaultConfig.stub.js
*/
const defaultTheme = require('tailwindcss/defaultTheme')
// const colors = require('tailwindcss/colors')

module.exports = {
  darkMode: 'class',
  variants: {
    extend: {
    },
  },
  plugins: [
  ],
  theme: {
    extend: {
      colors: {
        blue: {
          // cardBg
          'dark-theme-lighter': '#04243f',
          // layout
          'dark-theme': '#011627',
          'dark-theme-lightest': '#041f35',
        },
      },
      fontFamily: {
        sans: ['Inter var', ...defaultTheme.fontFamily.sans],
        raleway: ['Raleway'],
        dance: ['Dancing Script'],
      },
    },
  },
  purge: {
    // Learn more on https://tailwindcss.com/docs/controlling-file-size/#removing-unused-css
    enabled: process.env.NODE_ENV === 'production',
    content: [
      'node_modules/tv-*/dist/tv-*.umd.min.js',
      'client/components/**/*.vue',
      'client/layouts/**/*.vue',
      'client/pages/**/*.vue',
      'client/plugins/**/*.js',
      'client/lib/**/*.ts',
      'client/lib/**/*.js',
      'client/lib/**/*.vue',
      'nuxt.config.js',
    ],
  },
}
