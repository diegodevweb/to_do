// /** @type {import('tailwindcss').Config} */
// export default {
//     content: [],
//     theme: {
//         extend: {},
//     },
//     plugins: [],
// }

const colors = require("tailwindcss/colors")

module.exports = {
    content: ["./resources/**/*.blade.php", "./vendor/filament/**/*.blade.php"],
    darkMode: "class",
    theme: {
        extend: {
            colors: {
                danger: colors.red,
                primary: colors.sky,
                success: colors.green,
                warning: colors.yellow,
                btn: colors.blue,
            },
        },
    },
    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
    ],
};
