# Sorter

Collection of sorting algorithms implemented in PHP classes. Also, a benchmarking class for doing performance tests using any array and passing it through all available sorting algorithms. At this moment, this library can sort arrays in the following sorting algorithms:

* PHP sort()
* Quick Sorting
* Bubble Sorting
* Heap Sorting
* Gnome Sorting
* Shell Sorting
* Comb Sorting
* Insertion Sorting
* Merge Sorting
* Matos-Goulart Simple Sorting (recently created by myself)

Matos-Goulart Simple Sorting Algorithm © 2021 by Carlos Artur C. S. Matos is licensed under Attribution 4.0 International .

All sorting algorithms can be applied to any array of integers using the respective static method. Also, using the class Benchmark() the developer can perform all sorting methods at once, and get a var_dump() of the benchmark times in seconds. Also, we compare all sort methods in the becnhmark with PHP's native sort() function, as reference.

# Usage

```php
require __DIR__ . '/vendor/autoload.php';

$matos = \Sorter\MatosGoulart::sort([2, 6, 78, 11, 23, 1, 4, 1902, 192]);

/*
Results in:

array(9) {
  [0]=>
  int(1)
  [1]=>
  int(2)
  [2]=>
  int(4)
  [3]=>
  int(6)
  [4]=>
  int(11)
  [5]=>
  int(23)
  [6]=>
  int(78)
  [7]=>
  int(192)
  [8]=>
  int(1902)
}

*/
```
Obviously, all other sorting methods will result in the same response array - as the main objective of this library is to realize benchmarking tests amongst all possible algorithms, rather than sorting numbers itself. All details on the algorithms and some pseudocode for implementations in other programming languages can be found on each class' docblock comments.

## Benchmark

Also, this library has a Benchmark class, which can be used to subject an array to all sorting methods, and then return benchmark times for each of the sorting algorithms. As simple as follows:

```php
use Sorter\Benchmark;

require __DIR__ . '/vendor/autoload.php';



$ro = new Benchmark([2, 4, 1, 23, 32, 11, 45, 67, 5, 233455, 344 , 7, 24, 67, 1111111, 111, 34, 2344]);
$ro->get();

/*
RESULTS IN:

array(8) {
  ["quick"]=>
  string(14) "0.127814000000"
  ["bubble"]=>
  string(14) "0.033583000000"
  ["heap"]=>
  string(14) "0.035445000000"
  ["gnome"]=>
  string(14) "0.015428000000"
  ["shell"]=>
  string(14) "0.012064000000"
  ["comb"]=>
  string(14) "0.000609000000"
  ["insertion"]=>
  string(14) "0.015089000000"
  ["matos_goulart"]=>
  string(14) "0.011882000000"
}
*/
```