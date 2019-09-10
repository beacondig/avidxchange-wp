var gulp = require('gulp');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var cleanCss = require('gulp-clean-css');
var combineMq = require('gulp-combine-mq');
var notify = require('gulp-notify');
var rename = require('gulp-rename');
var livereload = require('gulp-livereload');
var sourcemaps = require("gulp-sourcemaps");



gulp.task('styles', function() {
    return gulp
		.src("styles/scsss/style.scss")
		.pipe(sourcemaps.init())
		.pipe(sass().on("error", sass.logError))
		.pipe(autoprefixer({
				browsers: ["last 2 versions", "Safari >= 8"]
			}))
		.pipe(combineMq({ beautify: true }))
		.pipe(rename("master-style.css"))

		.pipe(gulp.dest("new"))
		.pipe(cleanCss())
		.pipe(sourcemaps.write())
		.pipe(rename({ suffix: ".min" }))
		.pipe(gulp.dest("styles/css.min"))
		.pipe(livereload())
		.pipe(notify({ message: "Styles task complete" }));
});
