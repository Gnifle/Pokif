<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoveFlavorSummariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('move_flavor_summaries', function (Blueprint $table) {
	
	        $table->integer( 'move_id' );
	        $table->foreign( 'move_id' )->references( 'id' )->on( 'items' )->onDelete( 'cascade' );
	        $table->integer( 'language_id' );
	        $table->foreign( 'language_id' )->references( 'id' )->on( 'languages' )->onDelete( 'cascade' );
	        $table->mediumText( 'flavor_summary' );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('move_flavor_summaries');
    }
}
