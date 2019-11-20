const localURL = 'statica.test'; // *** change this to your local url ***
const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');

require('laravel-mix-purgecss');

mix.sass('./src/sass/main.scss', './css/')
    .options({
      processCssUrls: false,
      postCss: [
        tailwindcss('tailwind.config.js')
      ]
    })
    .sass(
      './src/sass/vendor/vendor.scss', './css/')
    .options({ processCssUrls: false })
    // .copy([
    //   './node_modules/photoswipe/dist/default-skin/default-skin.png',
    //   './node_modules/photoswipe/dist/default-skin/default-skin.svg',
    //   './node_modules/photoswipe/dist/default-skin/preloader.gif',
    // ], './img/photoswipe/')
    // Use this if you want to import css files from node_modules
    // .combine([
      // to set the assets folder, we’re importing these in vendor/photoswipe.scss
      // ./css/vendor.css'
      // './node_modules/photoswipe/dist/photoswipe.css',
      // './node_modules/photoswipe/dist/default-skin/default-skin.css'
    // ], './vendor.css')
    .combine([
      // './node_modules/jquery/dist/jquery.js',
      './node_modules/lozad/dist/lozad.js',
      // './node_modules/photoswipe/dist/photoswipe.js',
      // './node_modules/photoswipe/dist/photoswipe-ui-default.min.js',
      './src/js/vendor/*.js'
    ], './js/vendor.js')
    .babel([
      './src/js/components/*.js'
    ], './js/main.js')
    .browserSync({
      proxy: localURL,
      files: ['./src/sass/**/*.scss', './src/js/components/*.js', './templates/*.html', './partials/*.html']
});

// ==== purgeCSS
if (mix.inProduction()) {
    mix.purgeCss({
        enabled: true,
        globs: [
            path.join(__dirname, 'layouts/*.html'),
            path.join(__dirname, 'templates/*.html'),
            path.join(__dirname, 'templates/**/*.html'),
            path.join(__dirname, 'partials/*.html'),
            path.join(__dirname, 'partials/**/*.html'),
            path.join(__dirname, 'js/**.js'),
            path.join(__dirname, 'img/**.svg'),
        ],
        extensions: ['html', 'js', 'php', 'svg'],
        whitelist: ['animated', 'active', 'loaded', 'pagination'],
        whitelistPatterns: [/$lg-/],
    })
};