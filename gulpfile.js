var gulp = require( 'gulp' ),
	sass = require( 'gulp-sass' ),
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
		// open: 'external',
		host: 'pokif.dev',
		// port: 80,
		proxy: 'pokif.dev'
	} );
	
} );

gulp.task( 'reload', function() {
	
	browserSync.reload();
} );

gulp.task( 'watch', [ 'browserSync', 'sass' ], function() {
	
	gulp.watch( sassPath, [ 'sass', 'reload' ] );
} );