<?php
/**
 * Basic Cake functionality.
 *
 * Core functions for including other source files, loading models and so forth.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

class RestUtilities {	

/**
 * Remove unwanted fields from the Data of an specific request
 *
 * @param data, 1 dimensional array which contains the data from the request
 * @param filters, 1 dimensional array which contains the following structure
 	protected $allowedFields = array(
		'Model' => array(
			'field1',
			'field2',
			.
			.
			.
			'fieldn'
		)
	);
 * @return filtered request data
 */
	public function filterFieldsOfRequest($data, $filters) {
		$filtered_data = $data;
		foreach($filtered_data as $model => $fields) {			
			$keys = array_keys($filtered_data[$model]);
			foreach($keys as $k) {
				if(!in_array(strtolower($k),$filters[$model])){
					unset($filtered_data[$model][$k]);
				}
			}
		}
		return $filtered_data;
	}
}
