// ref https://tailwindcss.com/docs/customizing-colors
const azure_blue_lightest = '#EFF6FF'; // colors.blue.50
const azure_blue_lighter = '#DBEAFE'; // colors.blue.100
const azure_blue = '#BFDBFE'; // colors.blue.200
const azure_blue_darker = '#60A5FA'; // colors.blue.400
const azure_blue_darkest = '#2563EB'; // colors.blue.400
const hot_orange = '#f56565'; // red-500
const hot_orange_darker = '#DC2626'; // red-600
const hot_orange_darkest = '#991B1B' // red-800
const ash_gray_lighter = '#F3F4F6'; // colors.coolGray.100
const berry_red = '#dd2c2f'; // colors.red.400
const dim_gray_lighter = '#a6a6a6';
const dim_gray = '#434343';
const vermilion_red_lighter = '#ff2d20';
const vermilion_red = '#E62D12';
const vermilion_red_darker = '#cd2c04';
const mist_gray = '#a6a6a6';

const ash_gray = '#d6d6d6';
const rich_black = '#12141D';
const raisin_black = '#161923';
const roman_silver = '#86878F';
const clear_white = '#FFFFFF';
const ghost_white = '#F5F5FA';
const laravel_red = '#FF2D20';
const laravel_red_lighter = '#FD5F57';

module.exports = {
  purge: false, // manually purge in webpack.mix.js
  theme: {
    extend: {
      colors: {
        'azure-blue': azure_blue,
        'azure-blue-lighter': azure_blue_lighter,
        'azure-blue-lightest': azure_blue_lightest,
        'azure-blue-darker': azure_blue_darker,
        'azure-blue-darkest': azure_blue_darkest,
        'hot-orange': hot_orange,
        'hot-orange-darker': hot_orange_darker,
        'hot-orange-darkest': hot_orange_darkest,
        'ash-gray': ash_gray,
        'ash-gray-lighter': ash_gray_lighter,
        'berry-red': berry_red,
        'dim-gray-lighter': dim_gray_lighter,
        'dim-gray': dim_gray,
        'vermilion-red-lighter': vermilion_red_lighter,
        'vermilion-red': vermilion_red,
        'vermilion-red-darker': vermilion_red_darker,

        'rich-black': rich_black,
        'raisin-black': raisin_black,
        'roman-silver': roman_silver,
        'clear-white': clear_white,
        'ghost-white': ghost_white,
        'laravel-red': laravel_red,
        'laravel-red-lighter': laravel_red_lighter,
      },
      typography: (theme) => ({
        DEFAULT: {
          css: {
            'line-height': '1.4rem',
            'font-size': '1rem',
            'max-width': '100%',
            a: {
              color: azure_blue_darker,
              'overflow-wrap': 'break-word',
              '&:hover': {
                color: azure_blue_darkest,
              }
            },
            blockquote: {
              "border-left-color": azure_blue_darker,
            },
            code: {
              '&::before': { content: '"" !important' },
              '&::after': { content: '"" !important' },
              padding: '2px 4px',
              'font-size': '90%',
              color: '#c7254e',
              'background-color': '#f9f2f4',
              'border-radius': '4px',
            },
            hr: {
              'border-color': azure_blue_darker,
            },
            ul: {
              li: {
                '&::before': {
                  'background-color': azure_blue_darker,
                }
              },
            },
            ol: {
              'list-style-type': 'none',
              'padding': '0px',
              li: {
                '&::before': {
                  'color': azure_blue_darker,
                }
              },
            },
            p: {
              img: {
                'width': '100% !important',
                'margin': '0',
              }
            },
          }
        },
      }),
      outline: {
        tab: '2px solid #F3F4F6', // ash_gray_lighter
      },
      boxShadow: {
        'laravel-red': 'inset 0 0 0 1px #FF2D20', // laravel_red
      },
    },
    minHeight: {
      '0': '0',
      '1/4': '25%',
      '1/2': '50%',
      '3/4': '75%',
      'full': '100%',
      'screen-1/2': '50vh',
    }
  },
  variants: {},
  plugins: [
    require('@tailwindcss/typography'),
  ],
}