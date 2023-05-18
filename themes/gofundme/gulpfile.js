/* Required plugins
-------------------------------------------------------------- */
const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const concat = require('gulp-concat');
const include = require('gulp-include');
const uglify = require('gulp-uglify')
const cleanCSS = require('gulp-clean-css');
const sourcemaps = require('gulp-sourcemaps');
const imagemin = require('gulp-imagemin');
const imageResize = require('gulp-image-resize');
const postcss = require('gulp-postcss');
const autoprefixer = require('autoprefixer');

/* Admin .scss
-------------------------------------------------------------- */
gulp.task('adminSass', function () {
	 return gulp
	 .src('admin/acf-custom-styles/acf-custom-styles.scss')
	 .pipe(sourcemaps.init())
	 .pipe(concat('dist.css'))
	 .pipe(sass().on('error', sass.logError))
	 .pipe(postcss([autoprefixer()]))
	 .pipe(cleanCSS())
	 .pipe(sourcemaps.write())
	 .pipe(gulp.dest('admin'));
});

/* Theme .scss
-------------------------------------------------------------- */
gulp.task('sass', function () {
	return gulp
	.src('styles/compile.scss')
	 .pipe(sourcemaps.init())
	 .pipe(concat('dist.css'))
	 .pipe(sass({ includePaths: ['./node_modules'] }).on('error', sass.logError))
	 .pipe(postcss([autoprefixer()]))
	 .pipe(cleanCSS())
	 .pipe(sourcemaps.write(''))
	 .pipe(gulp.dest('styles'));
});

/* Theme .js
-------------------------------------------------------------- */
gulp.task('scripts', function() {
	return gulp
		.src('scripts/compile.js')
		.pipe(concat('dist.js'))
		.pipe(include())
		.pipe(uglify())
		.pipe(gulp.dest('scripts/'));
});

/* Media
-------------------------------------------------------------- */
// imgOpt - This task will crop any image inside the assets/images folder to a max-width of 1400px and compress and optimize the image.
gulp.task('imgOpt', function() {
	return gulp.src('assets/images/*')
		.pipe(imageResize({
			width: 1400,
			height: null,
			crop: false,
			upscale: false
		}))
		.pipe(imagemin())
		.pipe(gulp.dest('assets/images'))
});

/* Watch task
-------------------------------------------------------------- */
gulp.task('watch', gulp.series('adminSass', 'sass', 'scripts', 'imgOpt', function() {
	gulp.watch('admin/**/*.scss', gulp.series('adminSass'));
	gulp.watch('styles/**/*.scss', gulp.series('sass'));
	gulp.watch('scripts/**/*.js', gulp.series('scripts'));
	gulp.watch('assets/images/*', gulp.series('imgOpt'));
}));
