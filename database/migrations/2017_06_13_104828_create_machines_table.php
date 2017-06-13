<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMachinesTable extends Migration {
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		
		Schema::create( 'machines', function( Blueprint $table ) {
			
			$table->integer( 'machine_number' );
			$table->integer( 'version_group_id' );
			$table->foreign( 'version_group_id' )->references( 'id' )->on( 'version_groups' )->onDelete( 'cascade' );
			$table->integer( 'item_id' );
			$table->foreign( 'item_id' )->references( 'id' )->on( 'items' )->onDelete( 'cascade' );
			$table->integer( 'move_id' );
			$table->foreign( 'move_id' )->references( 'id' )->on( 'moves' )->onDelete( 'cascade' );
		} );
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		
		Schema::dropIfExists( 'machines' );
	}
}
