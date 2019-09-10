var gulp = require("gulp");
var sourcemaps = require('gulp-sourcemaps');

gulp.task('sass', function () {
	return gulp
		.src("styles/scss/**/*.scss")
		.pipe(sourcemaps.init())
		.pipe(sass().on("error", sass.logError))
		.pipe(sourcemaps.write())
		.pipe(gulp.dest("styles/css"));
});