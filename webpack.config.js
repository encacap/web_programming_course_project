const path = require("path");

module.exports = {
    mode: process.env.NODE_ENV || "development",
    entry: {},
    output: {
        filename: "[name].min.js",
        path: path.resolve(__dirname, "assets/js"),
    },
    devtool: "source-map",
};
