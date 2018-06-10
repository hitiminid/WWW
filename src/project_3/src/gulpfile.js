var gulp = require('gulp');
var sass = require('gulp-sass');


var sassOptions = {
    errLogToConsole: true,
    outputStyle: 'expanded',
    precision: 8
};

var sassOptionsCompressed = {
    errLogToConsole: true,
    outputStyle: 'compressed',
    precision: 8
}; 

gulp.task('reload',function() {
    gulp.watch('scss/**/*.scss',['styles']);
});

gulp.task('styles', function() {
    return gulp.src('scss/**/main_style.scss')
        .pipe(sass(sassOptions))
        .on('error', sass.logError)
        .pipe(gulp.dest('./css/'))
});