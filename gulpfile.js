const gulp        = require( 'gulp' ),
      sass        = require( 'gulp-sass' ),
      concat      = require( 'gulp-concat' ),
      concatCss   = require( 'gulp-concat-css' ),
      browserSync = require( 'browser-sync' ).create();

var sassPath = 'resources/assets/scss/**/[^_]*.?(s)css';

gulp.task( 'sass', function() {
	
	return gulp.src( sassPath )
		.pipe( sass() )
		.pipe( gulp.dest( 'public/css' ) )
		.pipe( browserSync.reload( {
			stream: true
		} ) );
} );

gulp.task( 'browserSync', function() {
	
	browserSync.init( {
		host:  'pokif.dev',
		proxy: 'pokif.dev'
	} );
	
} );

gulp.task( 'watch', [ 'browserSync', 'sass' ], function() {
	
	gulp.watch( sassPath, [ 'sass' ] );
} );