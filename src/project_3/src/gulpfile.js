var gulp = require('gulp');
var sass = require('gulp-sass');

gulp.task('styles', function() {
    gulp.src('scss/**/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('./css/'))
});


// const concat = require('gulp-concat');
// const uglify = require('gulp-uglify');

// gulp.task('styles', function() {
// return gulp.src('scss/**/*.scss')
//   .pipe(sass())
//   .pipe(concat('styles.css'))
//   .pipe(uglify())

//   // .pipe(rename({
//    //  basename: "styles",
//    //   suffix: ".min",
//    //   extname: ".css"
//   //  }))

//   .pipe(gulp.dest('css1'))
// });

//Watch task
gulp.task('reload',function() {
    gulp.watch('scss/**/*.scss',['styles']);
});

