var gulp   = require('gulp');
var sass   = require('gulp-sass');
var rename = require('gulp-rename');

var outputStyleExpanded = {
    errLogToConsole: true,
    outputStyle: 'expanded',
    precision: 8
};

var outputStyleCompressed = {
    errLogToConsole: true,
    outputStyle: 'compressed',
    precision: 8
}; 

// one task compiles both compressed and expanded version
gulp.task('reload',function() {
    gulp.watch('scss/**/*.scss',['reloadFiles']);
});

gulp.task('reloadFiles', ['styles', 'compressed']);

gulp.task('styles', function() {
    return gulp.src('scss/**/styles.scss')
        .pipe(sass(outputStyleExpanded))
        .on('error', sass.logError)
        .pipe(gulp.dest('./css/'))
});     

gulp.task('compressed', function() {
    return gulp.src('scss/**/styles.scss')
        .pipe(sass(outputStyleCompressed))
        .on('error', sass.logError)
        .pipe(rename('styles-min.css'))
        .pipe(gulp.dest('./css/'))
});     