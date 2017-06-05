<?php

/**
 * Parses a CSV to a list of seed arrays.
 *
 * Uses fopen() to open the file, and fgetcsv() to read the CSV lines internally.
 *
 * @param string $file_name     The Pokif CSV file to parse without extension.
 * @param string $file_mode     See fopen(). Defaults to 'r'.
 * @param int    $csv_length    See fgetcsv(). Defaults to 0.
 * @param string $csv_delimiter See fgetcsv(). Defaults to ',' (comma)
 * @param string $csv_enclosure See fgetcsv(). Defaults to chr(8).
 * @param string $csv_escape    See fgetcsv(). Defaults to '\' (backslash)
 *
 * @return array|bool The list of generated seeds from the CSV file or FALSE if $file_name omitted or opening was
 *                    insuccessful.
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
	$csv_file = fopen( base_path() . "/resources/assets/csv/{$file_name}.csv", $file_mode );
	
	if( $csv_file !== false ) {
		
		// Read the first line in the CSV and store as keys
		$keys = fgetcsv( $csv_file, $csv_length, $csv_delimiter, $csv_enclosure, $csv_escape );
		
		// Continue to iterate each line of CSV in the file
		while( ( $current_item = fgetcsv( $csv_file, $csv_length, $csv_delimiter, $csv_enclosure, $csv_escape ) ) !== false ) {
			
			if( [ NULL ] !== $current_item ) {
				
				$seed = [];
				
				// Iterate each key and loop over the CSV line values using the index
				foreach( $keys as $index => $key ) {
					
					if( isset( $current_item[ $index ] ) ) {
						
						$value        = $current_item[ $index ];
						$seed[ $key ] = ! empty( $value ) || $value === '0' ? $value : NULL;
						
					} else {
						
						break;
					}
				}
				
				// Add the seed to the seed list
				$seed_list[] = $seed;
				
			}
		}
		
	} else {
		
		return false;
	}
	
	return $seed_list;
}

/**
 * Parses a CSV file and replaces double newlines.
 *
 * All parameters will followingly be passed to pokif_csv_to_seed().
 *
 * @param string $file_name     The Pokif CSV file to parse without extension.
 * @param string $file_mode     See fopen(). Defaults to 'r'.
 * @param int    $csv_length    See fgetcsv(). Defaults to 0.
 * @param string $csv_delimiter See fgetcsv(). Defaults to ',' (comma)
 * @param string $csv_enclosure See fgetcsv(). Defaults to chr(8).
 * @param string $csv_escape    See fgetcsv(). Defaults to '\' (backslash)
 *
 * @return array|bool The list of generated seeds from the CSV file or FALSE if $file_name omitted or opening was
 *                    insuccessful.
 */
function pokif_csv_to_seed_replace_double_newline( $file_name, $file_mode = 'r', $csv_length = 0, $csv_delimiter = ',', $csv_enclosure = '"', $csv_escape = '\\' ) {
	
	if( ! $file_name ) {
		return false;
	}
	
	$file_contents = file_get_contents( base_path() . "/resources/assets/csv/{$file_name}.csv" );
	
	$file_contents = delete_all_between( 'Moves without a listed base power are assigned one as follows:', "\n109,9,Ignores", $file_contents );
	
	file_put_contents( base_path() . "/resources/assets/csv/{$file_name}_parsed.csv", str_replace( [
		PHP_EOL . PHP_EOL,
	], [
		' ',
	], $file_contents ) );
	
	return pokif_csv_to_seed( "{$file_name}_parsed", $file_mode, $csv_length, $csv_delimiter, $csv_enclosure, $csv_escape );
}

/**
 * Deletes part of a string between a given string beginning and a given string end, the beginning part only included for deletion.
 *
 * @param string $beginning The beginning to search for.
 * @param string $end       The end to search for.
 * @param string $string    The string for partial removal between beginning and end.
 *
 * @return string|array The full string with the specified part removed.
 */
function delete_all_between( $beginning, $end, $string ) {
	
	$beginningPos = strpos( $string, $beginning );
	$endPos       = strpos( $string, $end );
	
	if( $beginningPos === false || $endPos === false ) {
		
		return $string;
	}
	
	$textToDelete = substr( $string, $beginningPos, ( $endPos + strlen( $end ) ) - $beginningPos );
	
	return str_replace( $textToDelete, '', $string );
}