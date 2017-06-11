<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemFlingEffectsTable extends Migration {
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		
		Schema::create( 'item_fling_effects', function( Blueprint $table ) {
			
			$table->integer( 'id' )->primary();
			$table->string( 'name' );
		} );
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		
		Schema::dropIfExists( 'item_fling_effects' );
	}
}
