/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      fontFamily: {
        poppins: ["Poppins", "sans-serif"],     
        josefin: ["Josefin Sans", "sans-serif"],
      },
      colors: {
        guruIvory: '#F2EFDE',     
        red_clouds: '#8C030E',
        twoshk_base: '#F9FBF9',
        twoshk_dark:'#131713',
        twoshk_green: '#86A28B',
        twoshk_navy: '#1F394C',
        twoshk_gold: '#F2CB7C',
        twoshk_tan: '#E9E5D0',
        twoshk_blue: '#B4C7CD',
        primary: '#285192',
        info: '#2B89A8',
        success: '#14A44D',
        error: '#B0233A',
       
       },
      screens: {
        xs: '200px',
        sm: '480px',
        md: '768px',
        lg: '976px',
        xl: '1440px',
      },  
    },
  },
  plugins: [],
}

