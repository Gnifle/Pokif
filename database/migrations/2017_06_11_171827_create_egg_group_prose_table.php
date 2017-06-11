<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEggGroupProseTable extends Migration {
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		
		Schema::create( 'egg_group_prose', function( Blueprint $table ) {
			
			$table->integer( 'egg_group_id' );
			$table->foreign( 'egg_group_id' )->references( 'id' )->on( 'egg_groups' )->onDelete( 'cascade' );
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
		
		Schema::dropIfExists( 'egg_group_prose' );
	}
}
