/*-------------------------------------------------------
	Build Configuration Szymon Trzepla
---------------------------------------------------------*/



const browserSync = require('browser-sync').create();
const reload = browserSync.reload;
const runSequence = require('run-sequence');

const gulp = require('gulp');

const sass 			= require('gulp-sass');
const autoprefixer 	= require('gulp-autoprefixer');
const sourcemaps 	= require('gulp-sourcemaps');

const plumber 		= require('gulp-plumber');
const insert 		= require("gulp-insert");
// const header 		= require('./header.json');
const gutil 		= require('gulp-util');
const concat 		= require('gulp-concat');
const uglify 		= require('gulp-uglify');
const babili 		= require('gulp-babel-minify');
const clean 		= require('gulp-clean');
const notify 		= require('gulp-notify');

const strip 		= require('gulp-strip-comments');
const htmlreplace 	= require('gulp-html-replace');

// SETTING // PATHS

const projectName 				= 'nat';

const styleSrc 					= './dev/sass';
const styleDest 				= './';

const bowerPath 				= './bower_components';

const scriptSrc 				= './dev/js/*.js';
const scriptDest				= './dev/script';


//================
//=== browserSync
//================


gulp.task('browserSync', () => {
  var files = [
    './style.css',
    '*.php',
    '/src/js/*.js'
  ];

   browserSync.init(files,{
    proxy: "localhost/" + projectName + "/",
    notify: false
  });
});


//================
// SASS compilation 
//================

gulp.task('sass', () => {
  return gulp.src([
      'src/sass/**/*.scss'
      ])
    .pipe(plumber({errorHandler: notify.onError('Error: <%= error.message %>')}))
    .pipe(sourcemaps.init())
    .pipe(sass({
        errLogToConsole: true,
        // outputStyle: 'compressed',
        outputStyle: 'compact',
        // outputStyle: 'nested',
        // outputStyle: 'expanded',
        precision: 10
      }).on('error', sass.logError)) // Converts Sass to CSS with gulp-sass
    .pipe(autoprefixer({
            browsers: ['last 4 versions']
              }))
    .pipe(sourcemaps.write())
    .pipe(plumber.stop())
    .pipe(gulp.dest('./'))
    // .pipe(gulp.dest('./dist'))
    .pipe( notify( { message: 'TASK: "styles" Completed! 💯', onLast: true } ) )
    // .pipe(gulp.dest('dev/css'))
    .pipe(browserSync.stream());
});

//================
// Minify Scripts
//================

gulp.task('scripts', () => {
  return gulp.src([
      // 'src/js/script2.js',
      'src/js/script.js'
    ])
    .pipe(concat('main.min.js'))
    .pipe(uglify())
    .pipe(babili({
      mangle: {
        keepClassNames: true
      }
    }))
  .on('error', function (err) {
     gutil.log(gutil.colors.red('[Error]'), err.toString());
   })
  .pipe(gulp.dest('scripts/'));
});


//================
//     Images 
//================

gulp.task('images', () => {
  gulp.src('dev/img/**/*.+(png|jpg|jpeg|gif|svg)')
    .pipe(imagemin())
    .pipe(gulp.dest('img'))
});


//================
//      Fonts 
//================

gulp.task('fonts', () => {
  return gulp.src('src/fonts/**/*')
    .pipe(gulp.dest('dist/fonts'))
})

//================
//   SVG sprite 
//================

// gulp.task('svg', () => {
//   return gulp.src('dev/svg/*.svg')
//     .pipe(rename({ prefix: 'icon-'}))
//     // .pipe(svgmin())
//     .pipe(svgstore())
//     .pipe(cheerio({
//       parserOptions: { xmlMode: true }
//     }))
//     .pipe(rename('sprites.svg'))
//     .pipe(gulp.dest('images'));
// })

/////////////////////
// CHANGE FILES SRC + Min
/////////////////////

// gulp.task('useref', () => {
//   return gulp.src('src/*.php')
//     .pipe(htmlreplace({
//       'css': 'main.min.css',
//       'js': 'js/main.min.js'
//     }))
//     .pipe(useref())
//     .pipe(gulpIf('*.css', cssnano()))
//     .pipe(gulp.dest('dist'))
// });

// gulp.task('clean', function() {
// 	return gulp.src('.dist', {force: true})
// 		.pipe(clean());
// });



gulp.task('watch', ['browserSync', 'sass'], () => {
  gulp.watch('src/sass/**/*.scss', ['sass'],  browserSync.reload());
  gulp.watch('src/js/**/*.js').on('change', browserSync.reload);
  gulp.watch('*.php', browserSync.reload());
});


gulp.task('default', function (callback) {
  runSequence(['watch', 'sass', 'browserSync'],
    callback)
});

gulp.task('build', function (callback) {
  runSequence('clean:dist', ['default', 'images', 'fonts'], 'useref', 'scripts',
    callback)
});