/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./index.html",
    "./assets/**/*.{js,scss}",
    "./site/**/*.{php,js,ts,jsx,tsx,blade.php}",
  ],
  theme: {
    container: {
      center: true,
      padding: "1.5rem",
    },
    extend: {},
  },
  plugins: [require("@tailwindcss/typography"), require("@tailwindcss/forms")],
};
