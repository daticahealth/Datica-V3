module.exports = {
  theme: {
    colors: {
      transparent: 'transparent',
      white: '#ffffff',
      black: '#000000',
      gray: {
        100: '#f7fafc',
        200: '#edf2f7',
        300: '#e2e8f0',
        400: '#cbd5e0',
        500: '#a0aec0',
        600: '#718096',
        700: '#4a5568',
        800: '#2d3748',
        900: '#1a202c',
      },
      green: {
        default: '#718765',
        dark: '#27516C',
        light: '#709DC9',
      },
      blue: {
        default: '#6689AB',
        dark: '#27516C',
        light: '#709DC9',
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
        'Montserrat',
        'system-ui',
        'BlinkMacSystemFont',
        '-apple-system',
        'sans-serif',
      ],
      serif: [
        '"Garamond Web"',
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
      xs: '0.75rem',
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
      // medium: '500',
      // semibold: '600',
      bold: '700',
      // extrabold: '800',
      // black: '900',
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
        '7xl': '96rem',
      },
    }
  },
  variants: {},
  plugins: []
}
