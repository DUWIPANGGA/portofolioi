tailwind.config = {
  darkMode: 'class',
  theme: {
    extend: {
      colors: {
        primary: '#6c5ce7',
        secondary: '#a29bfe',
        dark: {
          100: '#1a1a2e',
          200: '#16213e',
          300: '#0f3460'
        },
        light: '#f5f6fa'
      },
      fontFamily: {
        sans: ['Poppins', 'sans-serif']
      },
      boxShadow: {
        'neumorph': '20px 20px 60px #d9d9d9, -20px -20px 60px #ffffff',
        'neumorph-dark': '20px 20px 60px #0a0a0f, -20px -20px 60px #2a2a4d',
        'neumorph-inset': 'inset 10px 10px 20px #d9d9d9, inset -10px -10px 20px #ffffff',
        'neumorph-inset-dark': 'inset 10px 10px 20px #0a0a0f, inset -10px -10px 20px #2a2a4d',
        'neumorph-3d': '15px 15px 30px #d9d9d9, -15px -15px 30px #ffffff, 0 0 0 3px rgba(108, 92, 231, 0.2)',
        'neumorph-3d-dark': '15px 15px 30px #0a0a0f, -15px -15px 30px #2a2a4d, 0 0 0 3px rgba(108, 92, 231, 0.2)',
        'neumorph-btn': '5px 5px 10px #d9d9d9, -5px -5px 10px #ffffff',
        'neumorph-btn-dark': '5px 5px 10px #0a0a0f, -5px -5px 10px #2a2a4d',
        'neumorph-btn-active': 'inset 5px 5px 10px #d9d9d9, inset -5px -5px 10px #ffffff',
        'neumorph-btn-active-dark': 'inset 5px 5px 10px #0a0a0f, inset -5px -5px 10px #2a2a4d'
      },
      animation: {
        'float': 'float 6s ease-in-out infinite',
        'float-2': 'float 4s ease-in-out infinite',
        'float-3': 'float 5s ease-in-out infinite',
        'pulse-slow': 'pulse 6s infinite',
        'spin-slow': 'spin 20s linear infinite'
      },
      keyframes: {
        float: {
          '0%, 100%': { transform: 'translateY(0)' },
          '50%': { transform: 'translateY(-20px)' }
        }
      }
    }
  }
}
