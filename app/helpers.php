<?php

/**
 * Parses a CSV to a list of seed arrays
 *
 * @param string $file_name     The Pokif CSV file to parse without extension.
 * @param string $file_mode     See fopen(). Defaults to 'r'.
 * @param int    $csv_length    See fgetcsv(). Defaults to 0.
 * @param string $csv_delimiter See fgetcsv(). Defaults to ',' (comma)
 * @param string $csv_enclosure See fgetcsv(). Defaults to chr(8).
 * @param string $csv_escape    See fgetcsv(). Defaults to '\' (backslash)
 *
 * @return array|bool The list of generated seeds from the CSV file or FALSE if $file_name omitted.
 */
function pokif_csv_to_seed( $file_name, $file_mode = 'r', $csv_length = 0, $csv_delimiter = ',', $csv_enclosure = '', $csv_escape = '\\' ) {
	
	if( ! $file_name ) {
		return false;
	}
	
	/**
	 * If there is no enclosure, fallback to chr(8) which corresponds to a backspace character
	 * @see https://stackoverflow.com/a/16897250
	 */
	if( $csv_enclosure === '' ) {
		$csv_enclosure = chr( 8 );
	}
	
	// List of seeds that will be returned later
	$seed_list = [];
	
	// Open the CSV file in read-only 'r' mode.
	$csv_file = fopen( base_path() . "/resources/assets/csv/{$file_name}.csv", 'r' );
	
	if( $csv_file !== false ) {
		
		// Read the first line in the CSV and store as keys
		$keys = fgetcsv( $csv_file, $csv_length, $csv_delimiter, $csv_enclosure, $csv_escape );
		
		// Continue to iterate each line of CSV in the file
		while( ( $current_item = fgetcsv( $csv_file, $csv_length, $csv_delimiter, $csv_enclosure, $csv_escape ) ) !== false ) {
			
			// Combine the keys from the keys array with the values from the CSV line.
//			$current_item = array_combine( $keys, $current_item );
			
			$seed = [];
			
			// Iterate each key and loop over the CSV line values using the index
			foreach( $keys as $index => $key ) {
				
				$value = $current_item[ $index ];
				$seed[ $key ] = ! empty( $value ) || $value === '0' ? $value : NULL;
			}
			
			// Add the seed to the seed list
			$seed_list[] = $seed;
		}
	}
	
	return $seed_list;
}