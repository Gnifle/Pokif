<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemCategoryProseTable extends Migration {
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		
		Schema::create( 'item_category_prose', function( Blueprint $table ) {
			
			$table->integer( 'item_category_id' );
			$table->foreign( 'item_category_id' )->references( 'id' )->on( 'item_categories' )->onDelete( 'cascade' );
			$table->integer( 'local_language_id' );
			$table->foreign( 'local_language_id' )->references( 'id' )->on( 'languages' )->onDelete( 'cascade' );
			$table->string( 'name' );
		} );
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		
		Schema::dropIfExists( 'item_category_prose' );
	}
}
