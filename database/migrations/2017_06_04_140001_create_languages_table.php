<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLanguagesTable extends Migration {
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		
		Schema::create( 'languages', function( Blueprint $table ) {
			
			$table->integer( 'id' )->primary();
			$table->string( 'iso639', 2 );
			$table->string( 'iso3166', 2 );
			$table->string( 'identifier' )->unique();
			$table->boolean( 'official' );
			$table->integer( 'order' );
		} );
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		
		Schema::dropIfExists( 'languages' );
	}
}
