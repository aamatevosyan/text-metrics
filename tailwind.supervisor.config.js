module.exports = {
    content: [
        './vendor/laravel/framework/app/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/themes/supervisor/scripts/**/*.vue',
        './resources/scripts/**/*.vue',
    ],
    theme: {
        extend: {},
    },
    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
}
