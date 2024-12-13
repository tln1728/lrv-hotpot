/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
    ],
    theme: {
        extend: {
            colors: {
                "tomato": {
                    900: "rgba(255, 99, 71, 0.9)",
                    800: "rgba(255, 99, 71, 0.8)",
                    700: "rgba(255, 99, 71, 0.7)",
                    600: "rgba(255, 99, 71, 0.6)",
                    500: "rgba(255, 99, 71, 0.5)",
                    400: "rgba(255, 99, 71, 0.4)",
                    300: "rgba(255, 99, 71, 0.3)",
                    200: "rgba(255, 99, 71, 0.2)",
                    100: "rgba(255, 99, 71, 0.1)",
                },
            }
        },
    },
    plugins: [],
}

