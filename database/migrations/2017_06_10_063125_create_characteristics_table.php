<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCharacteristicsTable extends Migration {
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		
		Schema::create( 'characteristics', function( Blueprint $table ) {
			
			$table->integer( 'id' )->primary();
			$table->integer( 'stat_id' );
			$table->foreign( 'stat_id' )->references( 'id' )->on( 'stats' )->onDelete( 'cascade' );
			$table->integer( 'gene_mod_5' );
		} );
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		
		Schema::dropIfExists( 'characteristics' );
	}
}
