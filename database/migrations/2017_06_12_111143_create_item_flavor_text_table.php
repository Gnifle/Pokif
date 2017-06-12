<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemFlavorTextTable extends Migration {
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		
		Schema::create( 'item_flavor_text', function( Blueprint $table ) {
			
			$table->integer( 'item_id' );
			$table->foreign( 'item_id' )->references( 'id' )->on( 'items' )->onDelete( 'cascade' );
			$table->integer( 'version_group_id' );
			$table->foreign( 'version_group_id' )->references( 'id' )->on( 'version_groups' )->onDelete( 'cascade' );
			$table->integer( 'language_id' );
			$table->foreign( 'language_id' )->references( 'id' )->on( 'languages' )->onDelete( 'cascade' );
			$table->mediumText( 'flavor_text' );
		} );
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		
		Schema::dropIfExists( 'item_flavor_text' );
	}
}
