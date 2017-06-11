<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGrowthRateProseTable extends Migration {
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		
		Schema::create( 'growth_rate_prose', function( Blueprint $table ) {
			
			$table->integer( 'growth_rate_id' );
			$table->foreign( 'growth_rate_id' )->references( 'id' )->on( 'growth_rates' )->onDelete( 'cascade' );
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
		
		Schema::dropIfExists( 'growth_rate_prose' );
	}
}
