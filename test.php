<?php

$x = 1;
$y = -1;

[$y, $x] = [$x, $y];

var_dump($x);
var_dump($y);