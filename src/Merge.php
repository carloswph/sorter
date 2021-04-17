<?php 

namespace Sorter;

/**
 *
 * @uses  Sorter\SorterAbstract
 * @since  1.0.0
 * @author  WP Helpers | Carlos Matos
 * @link  https://en.wikipedia.org/wiki/Heapsort
 */
class Merge
{
	use SorterAbstract;

	public static function sort(array $array)
	{
		if(count($array) == 1 ) {
			return $array;
		}

		$merge = new self;

		$mid = count($array) / 2;
	    $left = array_slice($array, 0, $mid);
	    $right = array_slice($array, $mid);
		$left = $merge->sort($left);
		$right = $merge->sort($right);

		return $merge->merge($left, $right);
	}

	public function merge($left, $right)
	{
		$merged = [];
		
		while (count($left) > 0 && count($right) > 0){
			if($left[0] > $right[0]){
				$merged[] = $right[0];
				$right = array_slice($right , 1);
			}else{
				$merged[] = $left[0];
				$left = array_slice($left, 1);
			}
		}
		while (count($left) > 0){
			$merged[] = $left[0];
			$left = array_slice($left, 1);
		}
		while (count($right) > 0){
			$merged[] = $right[0];
			$right = array_slice($right, 1);
		}
		return $merged;

	}
}