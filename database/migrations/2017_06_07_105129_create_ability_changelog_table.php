<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAbilityChangelogTable extends Migration {
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		
		Schema::create( 'ability_changelog', function( Blueprint $table ) {
			
			$table->integer( 'id' )->primary();
			$table->integer( 'ability_id' );
			$table->foreign( 'ability_id' )->references( 'id' )->on( 'abilities' )->onDelete( 'cascade' );
			$table->integer( 'changed_in_version_group_id' );
			$table->foreign( 'changed_in_version_group_id' )->references( 'id' )->on( 'version_groups' )->onDelete( 'cascade' );
		} );
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		
		Schema::dropIfExists( 'ability_changelog' );
	}
}
