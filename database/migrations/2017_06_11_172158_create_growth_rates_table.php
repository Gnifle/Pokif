<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGrowthRatesTable extends Migration {
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		
		Schema::create( 'growth_rates', function( Blueprint $table ) {
			
			$table->integer( 'id' )->primary();
			$table->string( 'identifier' )->unique();
			$table->mediumText( 'formula' );
		} );
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		
		Schema::dropIfExists( 'growth_rates' );
	}
}
