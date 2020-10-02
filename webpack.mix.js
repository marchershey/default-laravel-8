const mix = require("laravel-mix");
const tailwindcss = require("tailwindcss");

mix.js("resources/js/app.js", "public/js");

mix.sass("resources/sass/app.scss", "public/css").options({
    processCssUrls: false,
    postCss: [tailwindcss("./tailwind.config.js")]
});

if (mix.inProduction()) {
    mix.version();
}

mix.browserSync({ proxy: "http://localhost:8000" });
