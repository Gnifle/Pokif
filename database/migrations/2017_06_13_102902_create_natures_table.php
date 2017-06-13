<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNaturesTable extends Migration {
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		
		Schema::create( 'natures', function( Blueprint $table ) {
			
			$table->integer( 'id' )->primary();
			$table->string( 'identifier' )->unique();
			$table->integer( 'decreased_stat_id' );
			$table->foreign( 'decreased_stat_id' )->references( 'id' )->on( 'stats' )->onDelete( 'cascade' );
			$table->integer( 'increased_stat_id' );
			$table->foreign( 'increased_stat_id' )->references( 'id' )->on( 'stats' )->onDelete( 'cascade' );
			$table->integer( 'hates_flavor_id' );
			$table->foreign( 'hates_flavor_id' )->references( 'id' )->on( 'berry_firmness' )->onDelete( 'cascade' );
			$table->integer( 'likes_flavor_id' );
			$table->foreign( 'likes_flavor_id' )->references( 'id' )->on( 'berry_firmness' )->onDelete( 'cascade' );
			$table->integer( 'game_index' );
		} );
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		
		Schema::dropIfExists( 'natures' );
	}
}
