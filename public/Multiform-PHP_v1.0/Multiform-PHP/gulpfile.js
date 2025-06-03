const { series, src, dest, parallel, watch } = require("gulp");
const browsersync = require("browser-sync");
const concat = require("gulp-concat");
const cleanCSS = require("clean-css");
const del = require("del");
const fileinclude = require("gulp-file-include");
const imagemin = require("gulp-imagemin");
const npmdist = require("gulp-npm-dist");
const newer = require("gulp-newer");
const rename = require("gulp-rename");
const sourcemaps = require("gulp-sourcemaps");
const sass = require("gulp-sass")(require("sass"));
const uglify = require("gulp-uglify");
const postcss = require('gulp-postcss');
const autoprefixer = require("autoprefixer");
const gulpautoprefixer = require("gulp-autoprefixer");
const tailwindcss = require('tailwindcss');

const paths = {
 
    baseSrcAssets: "src/assets/",            // source assets directory
    baseDistAssets: "src/assets/",          // build assets directory
    configTailwind: "./tailwind.config.js",  // tailwind.config.js file
};

const vendor = function () {
    const out = paths.baseDistAssets + "libs/";
    return src(npmdist(), { base: "./node_modules" })
        .pipe(rename(function (path) {
            path.dirname = path.dirname.replace(/\/dist/, '').replace(/\\dist/, '');
        }))
        .pipe(dest(out));
};


const cssOptions = {
    compatibility: "*", // (default) - Internet Explorer 10+ compatibility mode
    inline: ["all"],    // enables all inlining, same as ['local', 'remote']
    level: 2,           // Optimization levels. The level option can be either 0, 1 (default), or 2, e.g.
};

const style = function () {
    const out = paths.baseDistAssets + "css/";

    return src(paths.baseSrcAssets + "scss/style.scss")
        .pipe(sourcemaps.init())
        .pipe(sass.sync()) // scss to css
        .pipe(postcss([
            tailwindcss(paths.configTailwind),
            autoprefixer()
        ]))
        .pipe(dest(out))
        .on("data", function (file) {
            const buferFile = new cleanCSS(cssOptions).minify(file.contents);
            return (file.contents = Buffer.from(buferFile.styles));
        })
        .pipe(rename({ suffix: ".min" }))
        .pipe(sourcemaps.write("./")) // source maps
        .pipe(dest(out));
};


function watchFiles() {

    watch([paths.baseSrcAssets + "scss/**/*.scss", paths.configTailwind], series(style));
}

// Producaton Tasks
exports.default = series(

    vendor,
    parallel(style),
    parallel(watchFiles)
);


// Build Tasks
exports.build = series(
    vendor,
    parallel(style)
);