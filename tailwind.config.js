import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";
const colors = require("tailwindcss/colors");
/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        width: {
            128: "32rem",
        },
        colors: {
            transparent: "transparent",
            current: "currentColor",
            black: colors.black,
            blue: colors.blue,
            cyan: colors.cyan,
            emerald: colors.emerald,
            fuchsia: colors.fuchsia,
            slate: colors.slate,
            gray: colors.gray,
            neutral: colors.neutral,
            stone: colors.stone,
            green: colors.green,
            indigo: colors.indigo,
            lime: colors.lime,
            orange: colors.orange,
            pink: colors.pink,
            purple: colors.purple,
            red: colors.red,
            rose: colors.rose,
            sky: colors.sky,
            teal: colors.teal,
            violet: colors.violet,
            yellow: colors.amber,
            white: colors.white,
        },
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};
