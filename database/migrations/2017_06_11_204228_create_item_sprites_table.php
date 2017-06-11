<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemSpritesTable extends Migration {
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		
		Schema::create( 'item_sprites', function( Blueprint $table ) {
			
			$table->increments( 'id' );
			$table->integer( 'item_id' );
			$table->foreign( 'item_id' )->references( 'id' )->on( 'items' )->onDelete( 'cascade' );
			$table->longText( 'sprites' )->comment = 'JSON encoded array of sprites';
		} );
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		
		Schema::dropIfExists( 'item_sprites' );
	}
}
