<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvolutionChainsTable extends Migration {
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		
		Schema::create( 'evolution_chains', function( Blueprint $table ) {
			
			$table->integer( 'id' )->primary();
			$table->integer( 'baby_trigger_item_id' )->nullable();
			$table->foreign( 'baby_trigger_item_id' )->references( 'id' )->on( 'items' )->onDelete( 'cascade' );
		} );
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		
		Schema::dropIfExists( 'evolution_chains' );
	}
}
