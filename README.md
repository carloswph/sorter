# Sorter

Collection of sorting algorithms implemented in PHP classes. Also, a benchmarking class for doing performance tests using any array and passing it through all available sorting algorithms. At this moment, this library can sort arrays in the following sorting algorithms:

* Quick Sorting
* Bubble Sorting
* Heap Sorting
* Gnome Sorting
* Shell Sorting
* Matos-Goulart Simple Sorting (recently created by myself)

All sorting algorithms can be applied to any array of integers using the respective static method. Also, using the class Benchmark() the developer can perform all sorting methods at once, and get a var_dump() of the benchmark times in seconds.

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