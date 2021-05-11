<?php 

namespace Sorter;

/**
 *
 * @uses  Sorter\SorterAbstract
 * @since  1.3.0
 * @author  WP Helpers | Carlos Matos
 */
class Selection
{
	use SorterAbstract;

	public static function sort(array $array)
	{
		$n = count($array);
			
		for($i = 0; $i < count($array); $i++) {
		   	$min = $i;
		
		  	for($j = $i + 1; $j < $n; $j++){
		       	if($array[$j] < $array[$min]){
		
		           	$min = $j;
		       	}
		   	}
		    
		   	list($array[$i],$array[$min]) = array($array[$min],$array[$i]);
		}

		return $array;
	}
}