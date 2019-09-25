/*
    npm install gulp-ruby-sass gulp-imagemin gulp-newer gulp-autoprefixer gulp-minify-css gulp-jshint jshint-stylish gulp-concat gulp-uglify gulp-imagemin gulp-notify gulp-rename gulp-livereload gulp-cache del require-dir --save-dev
*/

var gulp = require('gulp');
var livereload = require('gulp-livereload');
var requireDir = require('require-dir')('./gulp-tasks');

var scripts = ['js/**/*.js', '!js/vendor/**/*.js']

gulp.task('watch', function() {
    livereload.listen();
    // Watch .svg files
    // gulp.watch('assets/svg/font/*.svg', ['iconfont']);
    // Watch .scss files
    gulp.watch('css/scss/**/*.scss', ['styles']);
    // Watch .js files
    // gulp.watch(scripts, ['jshint']);
    // gulp.watch(scripts, ['scripts']);
});

// gulp.task('default', ['iconfont', 'styles', 'jshint', 'scripts', 'sassdoc']);
gulp.task('default', ['styles', 'sassdoc']);
