/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './**/*.php',
    './assets/js/**/*.js',
  ],
  theme: {
    extend: {
      fontFamily: {
        heading: ['Nunito', 'system-ui', 'sans-serif'],
        body: ['Inter', 'system-ui', 'sans-serif'],
        devanagari: ['"Noto Sans Devanagari"', '"Mukta"', 'sans-serif'],
        'devanagari-heading': ['Mukta', '"Noto Sans Devanagari"', 'sans-serif'],
        telugu: ['"Hind Guntur"', '"Noto Sans Telugu"', 'sans-serif'],
        'telugu-heading': ['"Baloo Tammudu 2"', '"Noto Sans Telugu"', 'sans-serif'],
        mono: ['"JetBrains Mono"', 'monospace'],
      },
      fontSize: {
        'xs':   ['0.75rem',   { lineHeight: '1.3' }],
        'sm':   ['0.8125rem', { lineHeight: '1.4' }],
        'base': ['0.9375rem', { lineHeight: '1.55' }],
        'lg':   ['1rem',      { lineHeight: '1.6' }],
        'xl':   ['1.125rem',  { lineHeight: '1.3' }],
        '2xl':  ['1.375rem',  { lineHeight: '1.25' }],
        '3xl':  ['1.75rem',   { lineHeight: '1.2' }],
        '4xl':  ['2.25rem',   { lineHeight: '1.15' }],
        '5xl':  ['3rem',      { lineHeight: '1.1' }],
      },
      colors: {
        navy: {
          950: '#04080f',
          900: '#070e1c',
          800: '#0d1a2e',
          700: '#132338',
          600: '#1a2f47',
          500: '#223a58',
        },
        forest: {
          950: '#030a06',
          900: '#060f0a',
          800: '#0a1a10',
          700: '#0f2418',
          600: '#162e1e',
        },
        gaming: {
          950: '#050210',
          900: '#0a0514',
          800: '#130820',
          700: '#1e0a30',
        },
        saffron: {
          100: '#fef3c7',
          300: '#fcd34d',
          400: '#fbbf24',
          500: '#f59e0b',
          600: '#d97706',
        },
      },
      lineHeight: {
        'hindi':  '1.7',
        'telugu': '1.85',
      },
      maxWidth: {
        'content': '1200px',
        'prose': '65ch',
      },
      animation: {
        'fade-in': 'fadeIn 0.6s ease-out forwards',
        'slide-up': 'slideUp 0.6s ease-out forwards',
        'count-up': 'countUp 1.5s ease-out forwards',
        'chat-appear': 'chatAppear 0.4s ease-out forwards',
      },
      keyframes: {
        fadeIn: {
          '0%': { opacity: '0' },
          '100%': { opacity: '1' },
        },
        slideUp: {
          '0%': { opacity: '0', transform: 'translateY(20px)' },
          '100%': { opacity: '1', transform: 'translateY(0)' },
        },
        chatAppear: {
          '0%': { opacity: '0', transform: 'translateY(10px)' },
          '100%': { opacity: '1', transform: 'translateY(0)' },
        },
      },
    },
  },
  plugins: [],
}
