<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExperienceTable extends Migration {
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		
		Schema::create( 'experience', function( Blueprint $table ) {
			
			$table->integer( 'growth_rate_id' );
			$table->foreign( 'growth_rate_id' )->references( 'id' )->on( 'growth_rates' )->onDelete( 'cascade' );
			$table->tinyInteger( 'level' );
			$table->integer( 'experience' );
		} );
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		
		Schema::dropIfExists( 'experience' );
	}
}
