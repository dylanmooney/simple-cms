const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
    purge: {
        content: [
            "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
            "./storage/framework/views/*.php",
            "./resources/views/**/*.blade.php",
        ],
        options: {
            safelist: [/data-theme$/],
        },
    },

    theme: {
        extend: {
            fontFamily: {
                sans: ["Lato", ...defaultTheme.fontFamily.sans],
            },
        },
    },

    variants: {
        extend: {
            opacity: ["disabled"],
            gridColumn: ["first"],
        },
    },

    plugins: [require("@tailwindcss/typography"), require("daisyui")],
};
