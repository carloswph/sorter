<?php 

namespace Sorter;

/**
 *
 * @uses  Sorter\SorterAbstract
 * @since  1.0.0
 * @author  WP Helpers | Carlos Matos
 * @link  https://en.wikipedia.org/wiki/Heapsort
 */
class Shell
{
	use SorterAbstract;

	public static function sort(array $array)
	{
		$round = round(count($array)/2);

		while($round > 0) {

			for($i = $round; $i < count($array); $i++) {

				$temp = $array[$i];
				$j = $i;

				while($j >= $round && $array[$j-$round] > $temp) {

					$array[$j] = $array[$j - $round];
					$j -= $round;
				}

				$array[$j] = $temp;
			}

			$round = round($round/2.2);
		}
		
		return $array;
	}

}
