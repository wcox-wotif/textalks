var gulp = require('gulp');
var autoprefixer = require('gulp-autoprefixer');
var cssmin = require('gulp-cssmin');
var browserSync = require('browser-sync').create();

gulp.task('compile', function() {
  // place code for your default task here
  return gulp.src('css/styles.css')
    .pipe(autoprefixer())
    .pipe(cssmin())
    .pipe(gulp.dest('css/compiled'));

});

