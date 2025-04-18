/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php", // File Blade trong thư mục resources/views
    "./resources/**/*.vue",       // File Vue trong thư mục resources
    "./resources/**/*.js",        // File JS trong thư mục resources
    "./public/**/*.{html,js}",    // File HTML/JS trong thư mục public (nếu có)
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}
