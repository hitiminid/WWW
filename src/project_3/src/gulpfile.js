var gulp = require('gulp');
var sass = require('gulp-sass');


var ouputStyleExpanded = {
    errLogToConsole: true,
    outputStyle: 'expanded',
    precision: 8
};

var ouputStyleCompressed = {
    errLogToConsole: true,
    outputStyle: 'compressed',
    precision: 8
}; 

gulp.task('reload',function() {
    gulp.watch('scss/**/*.scss',['styles']);
});

gulp.task('styles', function() {
    return gulp.src('scss/**/main_style.scss')
        .pipe(sass(ouputStyleExpanded))
        .on('error', sass.logError)
        .pipe(gulp.dest('./css/'))
});     