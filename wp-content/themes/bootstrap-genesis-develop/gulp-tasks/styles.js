var gulp = require('gulp');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var cleanCss = require('gulp-clean-css');
var gcmq = require('gulp-group-css-media-queries');
var notify = require('gulp-notify');
var rename = require('gulp-rename');
var livereload = require('gulp-livereload');
var sourcemaps = require("gulp-sourcemaps");



gulp.task('styles', function() {
    return gulp
		.src("css/scss/theme-styles.scss")
		.pipe(sourcemaps.init())
		.pipe(sass().on("error", sass.logError))
		.pipe(autoprefixer({
				browsers: ["last 2 versions", "Safari >= 8"]
			}))
		.pipe(gcmq())	
		.pipe(rename("theme-styles.css"))

		.pipe(gulp.dest("./css/"))
		.pipe(cleanCss())
		.pipe(sass({ outputStyle: 'compact', sourceComments: 'map' }))
		.pipe(sourcemaps.write('./'))
		.pipe(rename({ suffix: ".min" }))
		.pipe(gulp.dest("./css/"))
		.pipe(livereload())
		.pipe(notify({ message: "Styles task complete" }));
});
