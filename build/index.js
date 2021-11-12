const fsPromise = require("fs/promises");
const fsExtra = require("fs-extra");

(async () => {
    const BUILD_FOLDER = "./dist/";

    const copy = async (src, dest) => {
        try {
            await fsExtra.copy(src, dest);
        } catch (error) {
            throw error;
        }
    };

    await fsExtra.remove(BUILD_FOLDER);

    try {
        const argvs = process.argv;
        const files = await fsPromise.readdir("./");
        const defaultExcludeFiles = ["package.json", "package-lock.json"];
        const excludeFiles = [
            ...defaultExcludeFiles,
            ...argvs
                .find((argv) => argv.indexOf("-files") !== -1)
                .replace("-files", "")
                .replace("[", "")
                .replace("]", "")
                .split(",")
                .map((file) => file.replace(/'/g, "")),
        ];
        const excludeFolders = argvs
            .find((argv) => argv.indexOf("-folders") !== -1)
            .replace("-folders", "")
            .replace("[", "")
            .replace("]", "")
            .split(",")
            .map((file) => file.replace(/'/g, ""));
        for (const file of files) {
            const path = `./${file}`;
            const stats = await fsPromise.stat(path);

            try {
                if (
                    stats.isDirectory() &&
                    !excludeFolders.includes(file) &&
                    file[0] !== "."
                ) {
                    await copy(path, `${BUILD_FOLDER}${file}`);
                } else if (
                    stats.isFile() &&
                    !excludeFiles.includes(file) &&
                    file[0] !== "." &&
                    !file.includes(".config.js")
                ) {
                    await copy(path, `${BUILD_FOLDER}${file}`);
                }
            } catch (error) {
                console.log("Build error: " + error);
            }
        }
        console.log("Build completed ^_^!");
    } catch (error) {
        console.log(error);
    }
})();
