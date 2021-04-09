<?php 

namespace Sorter;

/**
 *
 * @uses  Sorter\SorterAbstract
 * @since  1.0.0
 * @author  WP Helpers | Carlos Matos
 * @link  https://en.wikipedia.org/wiki/Heapsort
 */
class Comb
{
	use SorterAbstract;

	public static function sort(array $array)
	{
		$count = count($array);
		$swap = true;

		while ($count > 1 || $swap){

			if($count > 1) $count /= 1.25;
 			$swap = false;
			$i = 0;
		
			while($i+$count < count($array)){
				if($array[$i] > $array[$i+$count]){
					list($array[$i], $array[$i+$count]) = array($array[$i+$count],$array[$i]);
					$swap = true;
				}
				
				$i++;
			}
		}
		
		return $array;
	}

}
