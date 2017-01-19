<?php

use Illuminate\Database\Seeder;

class MoreStuffTableSeeder extends Seeder {

	public function run() {

		DB::table( 'more_stuff' )->delete();

		$more_stuff = array(
			array(
				'id'       => 1,
				'data'     => 'Is not good with PC plz do send halp',
				'stuff_id' => 1
			),
			array(
				'id'       => 2,
				'data'     => 'AHMG',
				'stuff_id' => 2
			),
			array(
				'id'       => 3,
				'data'     => 'Muuuuuuuudde',
				'stuff_id' => 3
			),
		);

		DB::table( 'more_stuff' )->insert( $more_stuff );

	}

}