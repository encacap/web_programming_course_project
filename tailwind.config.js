// eslint-disable-next-line import/no-extraneous-dependencies
const lineClampPlugin = require("@tailwindcss/line-clamp");

module.exports = {
    purge: ["./**/*.php", "./resources/**/*.js"],
    darkMode: false, // or 'media' or 'class'
    theme: {},
    variants: {
        extend: {
            ring: ["responsive", "hover", "focus", "active"],
        },
    },
    plugins: [],
};
