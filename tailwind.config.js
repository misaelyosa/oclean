/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [    
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  "./node_modules/flowbite/**/*.js"],
  theme: {
    extend: {
      fontFamily : {
        'inter' : ['Inter']
      },
      colors : {
        'main_green' : '#235D3A'
      },
      spacing: {
        '18' : '4.5rem',
        '32' : '7.5rem',
      },
    },
  },
  plugins: [
    require('flowbite/plugin')
  ],
}

