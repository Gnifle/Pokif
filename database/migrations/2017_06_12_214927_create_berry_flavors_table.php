<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBerryFlavorsTable extends Migration {
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		
		Schema::create( 'berry_flavors', function( Blueprint $table ) {
			
			$table->integer( 'berry_id' );
			$table->foreign( 'berry_id' )->references( 'id' )->on( 'berries' )->onDelete( 'cascade' );
			$table->integer( 'contest_type_id' );
			$table->integer( 'flavor' );
		} );
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		
		Schema::dropIfExists( 'berry_flavors' );
	}
}
