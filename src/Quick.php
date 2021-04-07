<?php 

namespace Sorter;

/**
 * Quicksort is a type of divide and conquer algorithm for sorting an array, based on a partitioning routine; the details of this
 * partitioning can vary somewhat, so that quicksort is really a family of closely related algorithms. Applied to a range of at least 
 * two elements, partitioning produces a division into two consecutive non empty sub-ranges, in such a way that no element of the 
 * first sub-range is greater than an element of the second sub-range. After applying this partition, quicksort then recursively 
 * sorts the sub-ranges, possibly after excluding from them an element at the point of division that is at this point known to be 
 * already in its final location. Due to its recursive nature, quicksort (like the partition routine) has to be formulated so as to 
 * be callable for a range within a larger array, even if the ultimate goal is to sort a complete array. The steps for in-place 
 * quicksort are:
 *
 * If the range has less than two elements, return immediately as there is nothing to do. Possibly for other very short lengths a 
 * special-purpose sorting method is applied and the remainder of these steps skipped.
 * Otherwise pick a value, called a pivot, that occurs in the range (the precise manner of choosing depends on the partition routine, 
 * and can involve randomness).
 * Partition the range: reorder its elements, while determining a point of division, so that all elements with values less than the 
 * pivot come before the division, while all elements with values greater than the pivot come after it; elements that are equal to 
 * the pivot can go either way. Since at least one instance of the pivot is present, most partition routines ensure that the value 
 * that ends up at the point of division is equal to the pivot, and is now in its final position (but termination of quicksort does 
 * not depend on this, as long as sub-ranges strictly smaller than the original are produced).
 *
 * Pseudocode:
 * ==========
 *
 * algorithm quicksort(A, lo, hi) is
 *   if lo < hi then
 *       p := partition(A, lo, hi)
 *       quicksort(A, lo, p - 1)
 *       quicksort(A, p + 1, hi)
 *
 * algorithm partition(A, lo, hi) is
 *   pivot := A[hi]
 *   i := lo
 *   for j := lo to hi do
 *       if A[j] < pivot then
 *           swap A[i] with A[j]
 *           i := i + 1
 *   swap A[i] with A[hi]
 *   return i
 *
 * Recursively apply the quicksort to the sub-range up to the point of division and to the sub-range after it, possibly excluding 
 * form both ranges the element equal to the pivot at the point of division. (If the partition produces a possibly larger sub-range 
 * near the boundary where all elements are known to be equal to the pivot, these can be excluded as well.)
 * The choice of partition routine (including the pivot selection) and other details not entirely specified above can affect the 
 * algorithm's performance, possibly to a great extend for specific input arrays. In discussing the efficiency of quicksort, it is 
 * therefore necessary to specify these choices first. Here we mention two specific partition methods.
 *
 * @uses  Sorter\SorterAbstract
 * @since  1.0.0
 * @author  WP Helpers | Carlos Matos
 * @link  https://en.wikipedia.org/wiki/Heapsort
 */
class Quick
{
	use SorterAbstract;

	public static function sort(array $array)
	{
		$quick = new self; 
		$quick->quick($array);
	}

	/**
	 * Separate method to enable the recursion.
	 *
	 * @since  1.0.0
	 * @param  $array  array
	 * @return  $final  array  Sorted array.
	 */
	public function quick(array $array)
	{
		$below = [];
		$above = [];

		if (count($array) < 2) {
			return $array;
		}

		$initial = key($array);
		$initialValue = array_shift($array);

		foreach($array as $value) {

			if($value < $initialValue) {
				$below[] = $value;
			} elseif($value > $initialValue) {
				$above[] = $value;
			}
		}

		$left = array_merge($this->quick($below), [$initialValue]);
		$final = array_merge($left, $this->quick($above));

		return $final;
	}

}