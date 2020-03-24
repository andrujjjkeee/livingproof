'use strict';

var gulp            = require('gulp');
var run             = require('run-sequence');
var sourcemaps      = require('gulp-sourcemaps');
var babel           = require('gulp-babel');
var sass            = require('gulp-sass');
var imagemin        = require('gulp-imagemin');
var concat          = require('gulp-concat');
var uglify          = require('gulp-uglify');
var autoprefixer    = require('gulp-autoprefixer');
var browserSync     = require('browser-sync').create();
var del             = require('del');

var distPath = 'dist/wp-content/themes/livingproof/assets';

var paths = {
    views: 'app/**/*.html',
    styles: 'app/sass/**/*.scss',
    vendorStyles: 'app/css/*.css',
    scripts: [
        {
            dist: 'common.min.js',
            contains: [
                'app/js/main.js',
                'app/js/jquery.main.js',
                'app/js/jquery.popup.js'
            ]
        }
    ],
    vendorScripts: 'app/js/vendors/**/*.js',
    watchScripts: 'app/js/**/*.js',
    images: 'app/img/**/*',
    pictures: 'app/pic/**/*',
    php: 'app/php/**/*'
};

gulp.task('clean', function (cb) {
    return del( distPath, cb );
});

gulp.task('serve', ['watch'], function() {
    browserSync.init({
        server: distPath,
        port: 3010
    });
});

gulp.task('views', function () {
    return gulp.src(paths.views, {
        base: 'app'
    })
        .pipe(gulp.dest( distPath ));
});

gulp.task('vendorScripts', function () {
    return gulp.src(paths.vendorScripts, {
        base: 'app/js/vendors'
    }).pipe(gulp.dest( distPath + '/js/vendors' ));
});

gulp.task('vendorStyles', function () {
    return gulp.src(paths.vendorStyles, {
        base: 'app/css'
    }).pipe(gulp.dest( distPath +'/css'));
});

gulp.task('php', function () {
    return gulp.src(paths.php, {
        base: 'app/php'
    }).pipe(gulp.dest( distPath +'/php'));
});

gulp.task('styles', function () {
    return gulp.src(paths.styles)
        // .pipe(sourcemaps.init())
        .pipe(sass( {outputStyle: 'compressed'} ).on('error', sass.logError))
        .pipe(autoprefixer({ browsers: ['last 2 versions'] }))
        // .pipe(sourcemaps.write())
        .pipe(gulp.dest(distPath +'/css'))
        .pipe(browserSync.stream());
});

gulp.task('scripts', function () {
    for ( var i = 0; i < paths.scripts.length; i++ ){
        gulp.src( paths.scripts[ i ].contains )
            // .pipe(sourcemaps.init())
            .pipe(uglify())
            // .pipe(babel({presets: ['es2015']}))
            .pipe(concat(paths.scripts[ i ].dist))
            // .pipe(sourcemaps.write())
            .pipe(gulp.dest(distPath +'/js/'));
    }
});

gulp.task('images', function() {
    return gulp.src(paths.images)
    //.pipe(imagemin({optimizationLevel: 5}))
        .pipe(gulp.dest(distPath +'/img'));
});

gulp.task('pictures', function() {
    return gulp.src(paths.pictures)
    //.pipe(imagemin({optimizationLevel: 5}))
        .pipe(gulp.dest(distPath +'/pic'));
});

gulp.task('watch', function() {
    gulp.watch(paths.watchScripts,   ['scripts', browserSync.reload]);
    gulp.watch(paths.images,         ['images',  browserSync.reload]);
    gulp.watch(paths.pictures,       ['pictures',  browserSync.reload]);
    gulp.watch(paths.styles,         ['styles', browserSync.reload]);
    gulp.watch(paths.vendorStyles,   ['vendorStyles']);
    gulp.watch(paths.views,          ['views',   browserSync.reload]);
});

function serve() {
    return run('styles', 'scripts', 'vendorScripts', 'vendorStyles', 'php',  'images', 'pictures', 'views', 'serve');
}

gulp.task('default', ['clean'], serve());