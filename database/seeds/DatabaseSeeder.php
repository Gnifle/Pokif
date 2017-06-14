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
		
		$this->call( EggGroupsSeeder::class );
		$this->call( EggGroupProseSeeder::class );
		
		$this->call( GrowthRatesSeeder::class );
		$this->call( GrowthRateProseSeeder::class );
		
		$this->call( ItemPocketsSeeder::class );
		$this->call( ItemPocketNamesSeeder::class );
		$this->call( ItemFlingEffectsSeeder::class );
		$this->call( ItemFlingEffectProseSeeder::class );
		$this->call( ItemCategoriesSeeder::class );
		$this->call( ItemCategoryProseSeeder::class );
		$this->call( ItemsSeeder::class );
		$this->call( ItemSpritesSeeder::class );
		$this->call( ItemNamesSeeder::class );
		$this->call( ItemProseSeeder::class );
		$this->call( ItemGameIndicesSeeder::class );
		$this->call( ItemFlavorTextSeeder::class );
		$this->call( ItemFlavorSummariesSeeder::class );
		$this->call( ItemFlagsSeeder::class );
		$this->call( ItemFlagProseSeeder::class );
		$this->call( ItemFlagMapSeeder::class );
		
		$this->call( TypesSeeder::class );
		$this->call( TypeNamesSeeder::class );
		$this->call( TypeGameIndicesSeeder::class );
		$this->call( TypeEfficacySeeder::class );
		
		$this->call( MoveEffectsSeeder::class );
		$this->call( MoveEffectProseSeeder::class );
		$this->call( MoveTargetsSeeder::class );
		$this->call( MoveTargetProseSeeder::class );
		$this->call( MovesSeeder::class );
		$this->call( MoveNamesSeeder::class );
		$this->call( MoveFlavorTextSeeder::class );
		$this->call( MoveFlavorSummariesSeeder::class );
		$this->call( MoveBattleStylesSeeder::class );
		$this->call( MoveBattleStyleProseSeeder::class );
		$this->call( MoveFlagsSeeder::class );
		$this->call( MoveFlagMapSeeder::class );
		$this->call( MoveFlagProseSeeder::class );
		$this->call( MoveMetaAilmentsSeeder::class );
		$this->call( MoveMetaAilmentNamesSeeder::class );
		$this->call( MoveMetaCategoriesSeeder::class );
		$this->call( MoveMetaCategoryProseSeeder::class );
		$this->call( MoveMetaSeeder::class );
		$this->call( MoveMetaStatChangesSeeder::class );
		
		$this->call( BerryFirmnessSeeder::class );
		$this->call( BerryFirmnessNamesSeeder::class );
		$this->call( BerriesSeeder::class );
		$this->call( BerryFlavorSeeder::class );
		
		$this->call( NaturesSeeder::class );
		$this->call( NatureBattleStylePreferencesSeeder::class );
		
		$this->call( GendersSeeder::class );
		$this->call( ExperienceSeeder::class );
		$this->call( MachinesSeeder::class );
		
		$this->call( EvolutionChainsSeeder::class );
		$this->call( EvolutionTriggersSeeder::class );
		$this->call( EvolutionTriggerProseSeeder::class );
		
		$this->call( PokedexesSeeder::class );
		$this->call( PokedexProseSeeder::class );
		$this->call( PokedexVersionGroupsSeeder::class );
		
		$this->call( LocationsSeeder::class );
		$this->call( LocationNamesSeeder::class );
		$this->call( LocationGameIndicesSeeder::class );
		$this->call( LocationAreasSeeder::class );
		$this->call( LocationAreaProseSeeder::class );
		
		$this->call( PokemonColorsSeeder::class );
		$this->call( PokemonColorNamesSeeder::class );
		$this->call( PokemonShapesSeeder::class );
		$this->call( PokemonShapeProseSeeder::class );
		$this->call( PokemonHabitatsSeeder::class );
		$this->call( PokemonHabitatNamesSeeder::class );
		
		$this->call( PokemonSpeciesSeeder::class );
		$this->call( PokemonSpeciesNamesSeeder::class );
		
		$this->call( PokemonTableSeeder::class );
		$this->call( PokemonDexNumbersTableSeeder::class );
	}
}
