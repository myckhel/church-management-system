const mix = require('laravel-mix');
const path = require('path');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.extract();

let config = {
  output: { chunkFilename: 'js/chunks/dev/[name].js' },
  resolve: {
    alias: {
      '@': path.resolve('resources/js')
    }
  },
};

mix.js('resources/js/app.js', 'public/js')
    .react()
    .sass('resources/sass/app.scss', 'public/css')
    .options({
      postCss: [
        require('postcss-import'),
        require('@tailwindcss/jit'),
        require('autoprefixer')
      ]
    })
    .webpackConfig((env, argv) => {
      if (argv.mode === 'production') {
        config.output.chunkFilename = 'js/chunks/prod/[name].js';
      }
      return config;
    })
    .version()
    .sourceMaps()
    .browserSync('localhost:8000');
