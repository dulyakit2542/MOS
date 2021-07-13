'use strict';

const {src, dest, series, watch} = require('gulp');
const sass        = require('gulp-sass');
const rtlcss       = require('gulp-rtlcss');
const rename       = require("gulp-rename");
const browserSync = require('browser-sync').create();

// Sass to css conversion
const scss = function() {
	return src('src/assets/scss/*.scss')
		.pipe(sass({
            outputStyle: 'expanded'
        }).on('error', sass.logError))
		.pipe(dest('src/assets/css'))
		.pipe(browserSync.reload({
            stream: true
        }));
};

const rtl = function() {
    return src('src/assets/css/mono.css')
      .pipe(rtlcss())
      .pipe(rename({ suffix: '.rtl' }))
      .pipe(dest('src/assets/css'))
      .pipe(browserSync.reload({
        stream: true
      }));
  };

// Static Server + hot reload + watching scss/js/html files
const watcher = function() {
    watch('src/assets/scss/*.scss', scss);
    watch('src/assets/css/mono.css', rtl);
    watch('src/assets/js/*.js');
    watch('src/*.html');
    browserSync.init({
        server: {
        baseDir: 'src'
        },
        port: 8080
    });
};

exports.default = series(scss, rtl, watcher);