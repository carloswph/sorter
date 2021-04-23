<?php 

namespace Sorter;

/**
 * 
 */
class Benchmark
{
	protected $timing = [];

	protected $latte;

	public function __construct(array $array)
	{
		$start = microtime();
		sort($array);
		$end = microtime();
		$this->timing['php'] = number_format(($end - $start), 12);

		$start = microtime();
		\Sorter\Quick::sort($array);
		$end = microtime();
		$this->timing['quick'] = number_format(($end - $start), 12);

		$start = microtime();
		\Sorter\Bubble::sort($array);
		$end = microtime();
		$this->timing['bubble'] = number_format(($end - $start), 12);

		$start = microtime();
		\Sorter\Heap::sort($array);
		$end = microtime();
		$this->timing['heap'] = number_format(($end - $start), 12);

		$start = microtime();
		\Sorter\Gnome::sort($array);
		$end = microtime();
		$this->timing['gnome'] = number_format(($end - $start), 12);

		$start = microtime();
		\Sorter\Shell::sort($array);
		$end = microtime();
		$this->timing['shell'] = number_format(($end - $start), 12);

		$start = microtime();
		\Sorter\Comb::sort($array);
		$end = microtime();
		$this->timing['comb'] = number_format(($end - $start), 12);

		$start = microtime();
		\Sorter\Insertion::sort($array);
		$end = microtime();
		$this->timing['insertion'] = number_format(($end - $start), 12);

		$start = microtime();
		\Sorter\Merge::sort($array);
		$end = microtime();
		$this->timing['merge'] = number_format(($end - $start), 12);

		$start = microtime();
		\Sorter\MatosGoulart::sort($array);
		$end = microtime();
		$this->timing['matos_goulart'] = number_format(($end - $start), 12);
	}

	public function get()
	{
		var_dump($this->timing);
	}
}