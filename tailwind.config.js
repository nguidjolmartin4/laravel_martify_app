/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "node_modules/preline/dist/*.js",
        "vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "node_modules/flowbite/**/*.js",
        "node_modules/lodash/*.js",
        "node_modules/dropzone/dist/*.js",
    ],
    theme: {
        extend: {},
    },
    plugins: [
        require("preline/plugin"),
        require("@tailwindcss/aspect-ratio"),
        require("flowbite/plugin")({
            datatables: true,
            charts: true,
        }),
    ],
};
