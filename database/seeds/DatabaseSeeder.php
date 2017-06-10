<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
	
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		
		$this->call( LanguagesSeeder::class );
		$this->call( LanguageNamesSeeder::class );
		
		$this->call( GenerationsSeeder::class );
		$this->call( GenerationNamesSeeder::class );
		
		$this->call( RegionsTableSeeder::class );
		$this->call( RegionNamesSeeder::class );
		
		$this->call( VersionGroupsSeeder::class );
		$this->call( VersionsSeeder::class );
		$this->call( VersionNamesSeeder::class );
		$this->call( VersionGroupRegionsSeeder::class );
		
		$this->call( PokemonMoveMethodsSeeder::class );
		$this->call( PokemonMoveMethodProseSeeder::class );
		$this->call( VersionGroupPokemonMoveMethodsSeeder::class );
		
		$this->call( PokedexTableSeeder::class );
		$this->call( PokemonTableSeeder::class );
		$this->call( PokemonDexNumbersTableSeeder::class );
		
		$this->call( AbilitiesSeeder::class );
		$this->call( AbilityNamesSeeder::class );
		$this->call( AbilityProseSeeder::class );
		$this->call( AbilityFlavorTextSeeder::class );
		$this->call( AbilityChangelogSeeder::class );
		$this->call( AbilityChangelogProseSeeder::class );
		
		$this->call( MoveDamageClassesSeeder::class );
		$this->call( MoveDamageClassProseSeeder::class );
		
		$this->call( StatsSeeder::class );
		$this->call( StatNamesSeeder::class );
		
		$this->call( CharacteristicsSeeder::class );
		$this->call( CharacteristicTextSeeder::class );
	}
}
