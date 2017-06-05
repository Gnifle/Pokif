<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVersionGroupsTable extends Migration {
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		
		Schema::create( 'version_groups', function( Blueprint $table ) {
			
			$table->integer( 'id' )->unique();
			$table->string( 'identifier' );
			$table->integer( 'generation_id' );
			$table->foreign( 'generation_id' )->references( 'id' )->on( 'generations' )->onDelete( 'cascade' );
			$table->integer( 'order' );
		} );
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		
		Schema::dropIfExists( 'version_groups' );
	}
}
