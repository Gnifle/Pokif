<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAbilitiesTable extends Migration {
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		
		Schema::create( 'abilities', function( Blueprint $table ) {
			
			$table->integer( 'id' )->unique();
			$table->string( 'identifier' );
			$table->integer( 'generation_id' );
			$table->foreign( 'generation_id' )->references( 'id' )->on( 'generations' )->onDelete( 'cascade' );
			$table->boolean( 'is_main_series' );
		} );
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		
		Schema::dropIfExists( 'abilities' );
	}
}
