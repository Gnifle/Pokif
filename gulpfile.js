const gulp         = require( 'gulp' ),
      sass         = require( 'gulp-sass' ),
      concat       = require( 'gulp-concat' ),
      uglify       = require( 'gulp-uglify' ),
      cleanCss     = require( 'gulp-clean-css' ),
      sourcemaps   = require( 'gulp-sourcemaps' ),
      autoprefixer = require( 'gulp-autoprefixer' ),
      plumbler     = require( 'gulp-plumber' ),
      svgstore     = require( 'gulp-svgstore' ),
      cheerio      = require( 'gulp-cheerio' ),
      svgmin       = require( 'gulp-svgmin' ),
      path         = require( 'path' ),
      normalizeCss = require( 'node-normalize-scss' ),
      browserSync  = require( 'browser-sync' ).create();

var sassAll  = 'resources/assets/scss/**/*.?(s)css';
var sassPath = 'resources/assets/scss/**/[^_]*.?(s)css';

gulp.task( 'sass', function() {
	
	return gulp.src( sassPath )
		.pipe( plumbler() )
		.pipe( sass( {
			includePaths: normalizeCss.includePaths
		} ) )
		.pipe( autoprefixer() )
		.pipe( sourcemaps.write() )
		.pipe( gulp.dest( 'public/css' ) )
		.pipe( cleanCss() )
		.pipe( gulp.dest( 'public/dist' ) )
		.pipe( browserSync.reload( {
			stream: true
		} ) );
} );

gulp.task( 'browserSync', function() {
	
	browserSync.init( {
		open: false,
		host: 'pokif.dev',
		proxy: 'pokif.dev'
	} );
	
} );

gulp.task( 'watch', [ 'browserSync', 'sass' ], function() {
	
	gulp.watch( sassAll, [ 'sass' ] );
	
	gulp.watch( 'resources/views/**/*.blade.php', browserSync.reload );
	gulp.watch( 'resources/assets/js/**/*.js', browserSync.reload );
} );

gulp.task( 'svgstore', function() {
	return gulp
		.src( 'resources/assets/images/svg/*.svg' )
		// Use cheerio to remove all viewBox attributes
		// .pipe( cheerio( {
		// 	run: function( $ ) {
		// 		$( '[viewBox]' ).removeAttr( 'viewBox' );
		// 	},
		// 	parserOptions: {
		// 		xmlMode: true
		// 	}
		// } ) )
		// Minify all the SVG files
		.pipe( svgmin( function( file ) {
			var prefix = path.basename( file.relative, path.extname( file.relative ) );
			return {
				plugins: [ {
					cleanupIDs: {
						prefix: prefix + '-',
						minify: true
					}
				} ]
			}
		} ) )
		// Concatenate them all into symbols
		.pipe( svgstore() )
		.pipe( gulp.dest( 'resources/assets/svg' ) );
} );