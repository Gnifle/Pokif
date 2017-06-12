<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovesTable extends Migration {
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		
		Schema::create( 'moves', function( Blueprint $table ) {
			
			$table->integer( 'id' )->primary();
			$table->string( 'identifier' )->unique();
			$table->integer( 'generation_id' );
			$table->foreign( 'generation_id' )->references( 'id' )->on( 'generations' )->onDelete( 'cascade' );
			$table->integer( 'type_id' );
			$table->foreign( 'type_id' )->references( 'id' )->on( 'types' )->onDelete( 'cascade' );
			$table->integer( 'power' )->nullable();
			$table->integer( 'pp' )->nullable();
			$table->integer( 'accuracy' )->nullable();
			$table->integer( 'priority' );
			$table->integer( 'target_id' );
			$table->foreign( 'target_id' )->references( 'id' )->on( 'move_targets' )->onDelete( 'cascade' );
			$table->integer( 'damage_class_id' );
			$table->foreign( 'damage_class_id' )->references( 'id' )->on( 'move_damage_classes' )->onDelete( 'cascade' );
			$table->integer( 'effect_id' );
			$table->foreign( 'effect_id' )->references( 'id' )->on( 'move_effects' )->onDelete( 'cascade' );
			$table->integer( 'effect_chance' )->nullable();
			$table->integer( 'contest_type_id' )->nullable();
			$table->integer( 'contest_effect_id' )->nullable();
			$table->integer( 'super_contest_effect_id' )->nullable();
		} );
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		
		Schema::dropIfExists( 'moves' );
	}
}
