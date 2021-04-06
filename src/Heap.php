<?php 

namespace Sorter;

/**
 * The heapsort algorithm can be divided into two parts.
 *
 * In the first step, a heap is built out of the data (see Binary heap § Building a heap). The heap is often placed in an array with 
 * the layout of a complete binary tree. The complete binary tree maps the binary tree structure into the array indices; each array 
 * index represents a node; the index of the node's parent, left child branch, or right child branch are simple expressions. For a 
 * zero-based array, the root node is stored at index 0; if i is the index of the current node, then
 *
 *  iParent(i)     = floor((i-1) / 2) where floor functions map a real number to the smallest leading integer.
 *  iLeftChild(i)  = 2*i + 1
 *  iRightChild(i) = 2*i + 2
 *
 * In the second step, a sorted array is created by repeatedly removing the largest element from the heap (the root of the heap), and 
 * inserting it into the array. The heap is updated after each removal to maintain the heap property. Once all objects have been 
 * removed from the heap, the result is a sorted array.
 * 
 * Heapsort can be performed in place. The array can be split into two parts, the sorted array and the heap. The storage of heaps as 
 * arrays is diagrammed here. The heap's invariant is preserved after each extraction, so the only cost is that of extraction.
 *
 * @uses  Sorter\SorterAbstract
 * @since  1.0.0
 * @author  WP Helpers | Carlos Matos
 * @link  https://en.wikipedia.org/wiki/Heapsort
 */
class Heap
{
	use SorterAbstract;

	public static function sort(array $array)
	{
		$count = count($array);
		$first = $array[0];

		$heap = new self;

		for ($j = ($count - 1) / 2; $j >= 0; $j--) {
			$heap->heapify($array, $count, $j);
		}

		for ($i = $count - 1; $i > 0; $i--) {

			$temp = $array[$i];
			$array[$i] = $array[0];
			$array[0] = $temp;

			$count--;
			$heap->heapify($array, $count, 0);
		}

		return $array;

	}

	public function heapify(&$array, $count, $i) {

		$left = ($i + 1) * 2 - 1;
		$right = ($i + 1) * 2;
		$largest = 0;

		if ($left < $count && $array[$left] > $array[$i]) {

			$largest = $left;
		} else {
			$largest = $i;
		}

		if ($right < $count && $array[$right] > $array[$largest]) {
			$largest = $right;
		}

		if ($largest != $i)	{

			$temp = $array[$i];
			$array[$i] = $array[$largest];
			$array[$largest] = $temp;

			$this->heapify($array, $count, $largest);
		}
	}

}
