var gulp = require('gulp');
var autoprefixer = require('gulp-autoprefixer');

gulp.task('compile', function() {
  // place code for your default task here
  return gulp.src('css/styles.css')
    .pipe(autoprefixer())
    .pipe(gulp.dest('css/'));

});

