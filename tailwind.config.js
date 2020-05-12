module.exports = {
  theme: {
    colors: {
      transparent: 'transparent',
      white: '#ffffff',
      black: '#000000',  
      'dark-alt': '#292928',    
      gray: {
        100: 'hsl(31, 2%, 95%)',
        200: 'hsl(31, 2%, 90%)',
        300: 'hsl(31, 2%, 80%)',
        400: 'hsl(31, 2%, 65%)',
        500: 'hsl(31, 2%, 50%)',
        600: 'hsl(31, 2%, 40%)',
        700: 'hsl(31, 2%, 25%)',
        800: 'hsl(31, 3%, 16%)',
        900: 'hsl(31, 5%, 12%)',
        a: 'hsla(31, 5%, 12%, 0.3)',
      },
      green: {
        default: '#009460',
        dark: '#007b50',
        light: '#00bd9a',
        bright: '#00d9b1',
        minty: '#00e4c3',
      },
      blue: {
        default: '#6689AB',
        dark: '#27516C',
        light: '#709DC9',
      },
      teal: {
        light: '#1CFCE3',
        default: '#00D6D6',
        dark: '#00A2AF'
      },
      purple: {
        light: '#EE8FFF',
        default: '#C03BFF',
        dark: '#8444B4'
      }
    },
    screens: {
      'sm': '576px',
      'md': '768px',
      'lg': '992px',
      'xl': '1200px',
      'xxl': '1600px',
    },
    fontFamily: {
      sans: [
        '"GT America"',
        'system-ui',
        'sans-serif',
      ],
      serif: [
        '"Source Serif Pro"',
        'Georgia',
        'serif',
      ],
      mono: [
        'Menlo',
        'Monaco',
        'Consolas',
        'Liberation Mono',
        'monospace',
      ],
    },
    fontSize: {
      xs: '0.7rem',
      sm: '0.875rem',
      base: '1rem',
      lg: '1.125rem',
      xl: '1.25rem',
      '2xl': '1.5rem',
      '3xl': '1.875rem',
      '3xl-scale': 'calc(1.5vw + 1.125rem)',
      '4xl': '2.25rem',
      '4xl-scale': 'calc(2vw + 1.375rem)',
      '5xl': '3rem',
      '5xl-scale': 'calc(2vw + 2.5rem)',
      '6xl': '5rem',
      '6xl-scale': 'calc(2vw + 3rem)',
    },
    fontWeight: {
      // hairline: '100',
      // thin: '200',
      light: '300',
      normal: '400',
      medium: '500',
      // semibold: '600',
      bold: '700',
      // extrabold: '800',
      // black: '900',
    },
    letterSpacing: {
      tightest: '-.075em',
      tighter: '-.05em',
      tight: '-.025em',
      normal: '0',
      wide: '.025em',
      wider: '.05em',
      widest: '.15em',
    },
    lineHeight: {
      none: 1,
      tighter: 1.15,
      tight: 1.35,
      normal: 1.6,
      relaxed: 1.8,
      loose: 2
    },
    extend: {
      maxWidth: {
        '7xl': '84rem',
      },
      borderWidth: {
        '12': '12px',
      },
      // width: {
      //   '72': '20rem',
      // }
    }
  },
  variants: {},
  plugins: [
    require('tailwindcss-alpha')({
      modules: {
        backgroundColors: true,
        textColors: false, 
        borderColors: false
      },
      alpha: {
        '50': 0.5
      }
    }),
    require('tailwind-css-variables')(
      {
        // modules
        // colors: false,
        // screens: false,
        // fontFamily: false,
        // fontSize: false,
        // fontWeight: false,
        lineHeight: false,
        letterSpacing: false,
        backgroundSize: false,
        borderWidth: false,
        borderRadius: false,
        width: false,
        height: false,
        minWidth: false,
        minHeight: false,
        maxWidth: false,
        maxHeight: false,
        padding: false,
        margin: false,
        boxShadow: false,
        zIndex: false,
        // opacity: false,
      },
      {
        // options
        // postcssEachVariables: true;
      }
    )
  ]
}
