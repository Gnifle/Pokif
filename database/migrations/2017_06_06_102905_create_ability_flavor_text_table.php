<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAbilityFlavorTextTable extends Migration {
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		
		Schema::create( 'ability_flavor_text', function( Blueprint $table ) {
			
			$table->increments( 'id' );
			$table->integer( 'ability_id' );
			$table->foreign( 'ability_id' )->references( 'id' )->on( 'abilities' )->onDelete( 'cascade' );
			$table->integer( 'version_group_id' );
			$table->foreign( 'version_group_id' )->references( 'id' )->on( 'version_groups' )->onDelete( 'cascade' );
			$table->integer( 'language_id' );
			$table->foreign( 'language_id' )->references( 'id' )->on( 'languages' )->onDelete( 'cascade' );
			$table->string( 'flavor_text' );
		} );
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		
		Schema::dropIfExists( 'ability_flavor_text' );
	}
}
