<?php 

namespace Sorter;

/**
 * A pseudo-algorithm (Matos-Goulart - 2021) by myself to sort any array of integers by using PHP built-in functions
 * max() and min() to segregate the largest and the smallest values in different arrays, unsetting both
 * values for the next iteration. If an array has an odd number of elements, the last value is merged
 * with the smaller and larger values subarrays, before returning the final sorted array.
 * 
 * 1. Create both arrays for smaller and larger values
 * 2. Iteration while the number of elements is larger than 1
 * 3. Get the key for the minimal value in the array
 * 4. Push the minimal value to smaller numbers array and unset it in the initial array
 * 5. Repeat the process for the maximum value, and push it to the larger numbers array
 * 6. Unset the max value from the initial array
 * 7. Merge the smaller numbers array with the rest from the initial array (null if the initial array has an even number of elements)
 * 8. Merge the result with the larger numbers array
 *
 * @license  Matos-Goulart simple sorting algorithm © 2021 by Carlos Artur C. S. Matos is licensed under Attribution 4.0 International
 * @uses  Sorter\SorterAbstract
 * @since  1.0.0
 * @author  WP Helpers | Carlos Matos
 * @link  https://en.wikipedia.org/wiki/Heapsort
 */
class MatosGoulart
{
	use SorterAbstract;

	public static function sort(array $array)
	{
		$below = [];
		$above = [];

		while (count($array) > 1) {
			
			$minKey = array_search(min($array), $array);
			$below[] = $array[$minKey];
			unset($array[$minKey]);

			$maxKey = array_search(max($array), $array);
			$above[] = $array[$maxKey];
			unset($array[$maxKey]);
		}

		$final = array_merge($below, $array, array_reverse($above));

		return $final;
	}

}