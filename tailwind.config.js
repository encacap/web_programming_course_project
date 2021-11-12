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
