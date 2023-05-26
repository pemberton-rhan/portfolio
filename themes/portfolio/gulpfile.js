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
const rename = require('gulp-rename');
const flatten = require('gulp-flatten');
const path = require('path');

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
	.src('styles/main.scss')
	 .pipe(sourcemaps.init())
	 .pipe(concat('dist.css'))
	 .pipe(sass({ includePaths: ['./node_modules'] }).on('error', sass.logError))
	 .pipe(postcss([autoprefixer()]))
	 .pipe(cleanCSS())
	 .pipe(sourcemaps.write(''))
	 .pipe(gulp.dest('dist'));
});

/* Blocks .scss
-------------------------------------------------------------- */
gulp.task('blockSass', function() {
	return gulp.src('blocks/**/*.scss') // Finds all .scss files within the 'blocks' folder and its subdirectories
		.pipe(sourcemaps.init()) // Initializes sourcemaps
		.pipe(sass().on('error', sass.logError)) // Compiles the SCSS to CSS
		.pipe(cleanCSS()) // Minifies the CSS
		.pipe(sourcemaps.write('.')) // Writes the sourcemaps
		.pipe(gulp.dest(function(file) {
			return file.base; // Outputs the CSS file in the same location as the source .scss file
		}));
});

/* Theme .js
-------------------------------------------------------------- */
gulp.task('scripts', function() {
	return gulp
		.src('scripts/main.js')
		.pipe(concat('dist.js'))
		.pipe(include())
		.pipe(uglify())
		.pipe(gulp.dest('dist'));
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
gulp.task('watch', gulp.series('adminSass', 'sass', 'scripts', 'imgOpt', 'blockSass', function() {
	gulp.watch('admin/**/*.scss', gulp.series('adminSass'));
	gulp.watch('styles/**/*.scss', gulp.series('sass'));
	gulp.watch('scripts/**/*.js', gulp.series('scripts'));
	gulp.watch('assets/images/*', gulp.series('imgOpt'));
	gulp.watch('blocks/**/*.scss', gulp.series('blockSass'));
}));
