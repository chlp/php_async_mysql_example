# php async mysql example

[Script-example](index.php) with several parallel mysql calls from a single php process. Total time = execution time of the longest mysql call.

This script's output:
```
1 0.027875185012817
2 4.0439341068268
|-4.0444800853729
|-4.0465850830078
|-4.0472919940948
4 4.0473229885101

array(3) {
  [0]=>
  array(3) {
    ["id"]=>
    int(1)
    ["sleep"]=>
    int(0)
    ["rand()"]=>
    float(0.8830397649510202)
  }
  [1]=>
  array(3) {
    ["id"]=>
    int(2)
    ["sleep"]=>
    int(0)
    ["rand()"]=>
    float(0.3066259709248561)
  }
  [2]=>
  array(3) {
    ["id"]=>
    int(3)
    ["sleep"]=>
    int(0)
    ["rand()"]=>
    float(0.819778273645582)
  }
}
[Finished in 4.2s]
```
