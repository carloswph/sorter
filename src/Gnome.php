<?php 

namespace Sorter;

/**
 * The gnome sort is a sorting algorithm which is similar to insertion sort in that it works with one item at a time but gets the 
 * item to the proper place by a series of swaps, similar to a bubble sort. It is conceptually simple, requiring no nested loops. The 
 * average running time is O(n2) but tends towards O(n) if the list is initially almost sorted.[4][note 1]
 *
 * The algorithm finds the first place where two adjacent elements are in the wrong order and swaps them. It takes advantage of the 
 * fact that performing a swap can introduce a new out-of-order adjacent pair next to the previously swapped elements. It does not 
 * assume that elements forward of the current position are sorted, so it only needs to check the position directly previous to the 
 * swapped elements.
 *
 * Pseucode:
 * ========
 *
 * procedure gnomeSort(a[]):
 *   pos := 0
 *  while pos < length(a):
 *      if (pos == 0 or a[pos] >= a[pos-1]):
 *          pos := pos + 1
 *      else:
 *          swap a[pos] and a[pos-1]
 *          pos := pos - 1
 *
 * @uses  Sorter\SorterAbstract
 * @since  1.0.0
 * @author  WP Helpers | Carlos Matos
 * @link  https://en.wikipedia.org/wiki/Heapsort
 */
class Gnome
{
	use SorterAbstract;

	public static function sort(array $array)
	{
		$i = 0;

		while ($i <= count($array) - 1) {

			if($i === 0 || ($array[$i] >= $array[$i -1])) {
				$i++;
			} else {

				$temp = $array[$i];
				$array[$i] = $array[$i - 1];
				$array[$i - 1] = $temp;
				$i--;
			}
		}

		return $array;
	}

}