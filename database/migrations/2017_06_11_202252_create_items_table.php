<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration {
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		
		Schema::create( 'items', function( Blueprint $table ) {
			
			$table->integer( 'id' )->primary();
			$table->string( 'identifier' )->unique();
			$table->integer( 'category_id' );
			$table->foreign( 'category_id' )->references( 'id' )->on( 'item_categories' )->onDelete( 'cascade' );
			$table->integer( 'cost' );
			$table->integer( 'fling_power' )->nullable();
			$table->integer( 'fling_effect_id' )->nullable();
			$table->foreign( 'fling_effect_id' )->references( 'id' )->on( 'item_fling_effects' )->onDelete( 'cascade' );
		} );
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		
		Schema::dropIfExists( 'items' );
	}
}
