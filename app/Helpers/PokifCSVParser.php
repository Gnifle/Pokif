<?php

namespace App\Helpers;

use parseCSV;

class PokifCSVParser extends parseCSV {
	
	/**
	 * The absolute path to the file to parse
	 *
	 * @access public
	 * @var string
	 */
	public $file_path = NULL;
	
	/**
	 * Nullify
	 * Whether to nullify columns values that are empty strings
	 *
	 * @access public
	 * @var bool
	 */
	public $nullify;
	
	/**
	 * Nullify Columns
	 * List of specific columns to nullify only. Only used if $nullify is set to TRUE.
	 *
	 * @see    $nullify
	 * @access public
	 * @var array
	 */
	public $nullify_columns;
	
	/**
	 * PokifCSVParser constructor.
	 *
	 * @param string $file_name       The CSV string or a direct filepath
	 * @param bool   $nullify         Whether to nullify columns values that are empty strings
	 * @param array  $nullify_columns List of specific columns to nullify only. Only used if $nullify is set to TRUE.
	 * @param int    $offset          Number of rows to ignore from the beginning of  the data
	 * @param int    $limit           Limits the number of returned rows to specified amount
	 * @param string $conditions      Basic SQL-like conditions for row matching
	 */
	public function __construct( $file_name = NULL, $nullify = false, $nullify_columns = [], $offset = NULL, $limit = NULL, $conditions = NULL ) {
		
		if( $file_name !== NULL ) {
			
			$this->file_path = base_path() . "/resources/assets/csv/{$file_name}.csv";
		}
		
		$this->nullify         = $nullify;
		$this->nullify_columns = $nullify_columns;
		
		parent::__construct( $this->file_path, $offset, $limit, $conditions );
		
		if( $this->nullify ) {
			
			$this->data = $this->nullify_empty_strings();
		}
	}
	
	/**
	 * Takes a list of seeds and sets all fields to NULL where the value is an empty string.
	 *
	 * @param array $data            Nested array containing the seed for the database with fields to be nullified if
	 *                               empty strings.
	 * @param array $nullify_columns (Optional) List of columns to only perform nullification on
	 *
	 * @return array The modified, nested list of seeds.
	 */
	public function nullify_empty_strings( $data = NULL, $nullify_columns = NULL ) {
		
//		print_r( gettype( $data ) );
		
		if( $data === NULL ) {
			
			$data = $this->data;
		}
		
		if( $nullify_columns === NULL ) {
			
			$nullify_columns = $this->nullify_columns;
		}
//		print_r( 'test' );
//		print_r( $this->data );
		
		foreach( $data as $index => $seed ) {
			
			// Only perform nullification on certain columns
			if( $nullify_columns ) {
				
				foreach( $nullify_columns as $column ) {
					
					if( '' === $data[ $index ][ $column ] ) {
						
						$data[ $index ][ $column ] = NULL;
					}
				}
				
				// Perform nullification if no specific columns given
			} else {
				
				foreach( $data[ $index ] as $column => $value ) {
					
					if( '' === $data[ $index ][ $column ] ) {
						
						$data[ $index ][ $column ] = NULL;
					}
				}
			}
		}
		
		return $data;
		
	}
}