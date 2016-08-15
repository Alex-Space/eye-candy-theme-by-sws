'use strict';

const gulp = require('gulp');
const sass = require('gulp-sass');
const concat = require('gulp-concat');
const debug = require('gulp-debug');
const sourcemaps = require('gulp-sourcemaps');
const gulpIf = require('gulp-if');

const isDevelopment = (process.env.NODE_ENV === 'production') ? false : true;

gulp.task('styles', function(callback) {
    gulp.src('./colors/light/scss/*.scss')
        .pipe(debug({title: 'src'}))
        .pipe(gulpIf(isDevelopment, sourcemaps.init()))
        .pipe(sass())
        .pipe(debug({title: 'sass'}))
        .pipe(concat('eye-candy-light.css'))
        .pipe(debug({title: 'concat'}))
        .pipe(gulpIf(isDevelopment, sourcemaps.write()))
        .pipe(gulp.dest('./colors/light/css/'));

    // Exit from task when all finished
    callback();
});

// Watcher
gulp.task('default', function() {
    gulp.watch('./colors/light/scss/*.scss', ['styles'] );
});
