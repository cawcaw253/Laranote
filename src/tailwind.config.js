// ref https://tailwindcss.com/docs/customizing-colors
const azure_blue = '#BFDBFE'; // colors.blue.200
const azure_blue_dark = '#60A5FA' // colors.blue.400
const hot_orange = '#f56565'; // red-500
const ash_gray = '#edf2f7'; // gray-200

module.exports = {
  purge: [],
  theme: {
    extend: {
      colors: {
        'azure-blue': azure_blue,
        'hot-orange': hot_orange,
        'ash-gray': ash_gray,
      },
      typography: (theme) => ({
        DEFAULT: {
          css: {
            fontSize: '1rem',
            h: {
              // '&1': { margin: 0 },
              // '&2': { margin: 0 },
              // '&3': { margin: 0 },
              // '&4': { margin: 0 },
              // '&5': { margin: 0 },
              // '&6': { margin: 0 },
            },
            p: { margin: 0 },
            a: {
              color: '#3182ce',
              '&:hover': {
                color: '#2c5282',
              },
            },
            blockquote: {
              "border-left-color": azure_blue_dark,
            },
            ul: {
              li: {
                '&::before': {
                  'background-color': azure_blue_dark,
                }
              }
            }
          }
        },
      }),
    },
    minHeight: {
      '0': '0',
      '1/4': '25%',
      '1/2': '50%',
      '3/4': '75%',
      'full': '100%',
    }
  },
  variants: {},
  plugins: [
    require('@tailwindcss/typography'),
  ],
}