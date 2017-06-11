<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemCategoriesTable extends Migration {
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		
		Schema::create( 'item_categories', function( Blueprint $table ) {
			
			$table->integer( 'id' )->primary();
			$table->integer( 'pocket_id' );
			$table->foreign( 'pocket_id' )->references( 'id' )->on( 'item_pockets' )->onDelete( 'cascade' );
			$table->string( 'identifier' );
		} );
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		
		Schema::dropIfExists( 'item_categories' );
	}
}
