<?php 

namespace Sorter;

/**
 * Insertion sort iterates, consuming one input element each repetition, and grows a sorted output list. At each iteration, insertion
 * sort removes one element from the input data, finds the location it belongs within the sorted list, and inserts it there. It 
 * repeats until no input elements remain.
 *
 * Sorting is typically done in-place, by iterating up the array, growing the sorted list behind it. At each array-position, it 
 * checks the value there against the largest value in the sorted list (which happens to be next to it, in the previous 
 * array-position checked). If larger, it leaves the element in place and moves to the next. If smaller, it finds the correct 
 * position within the sorted list, shifts all the larger values up to make a space, and inserts into that correct position.
 *
 * Pseudocode:
 * ==========
 *
 * i ← 1
 * while i < length(A)
 *   x ← A[i]
 *   j ← i - 1
 *   while j >= 0 and A[j] > x
 *       A[j+1] ← A[j]
 *       j ← j - 1
 *   end while
 *   A[j+1] ← x[3]
 *   i ← i + 1
 * end while
 *
 * @uses  Sorter\SorterAbstract
 * @since  1.2.0
 * @author  WP Helpers | Carlos Matos
 * @link  https://en.wikipedia.org/wiki/Heapsort
 */
class Insertion
{
	use SorterAbstract;

	public static function sort(array $array)
	{
		for($i = 0; $i < count($array); $i++) {

			$value = $array[$i];
			$j = $i - 1;

			while($j>=0 && $array[$j] > $value) {

				$array[$j + 1] = $array[$j];
				$j--;
			}

			$array[$j + 1] = $value;
		}

		return $array;
	}

}