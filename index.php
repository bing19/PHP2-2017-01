<?php

require __DIR__ . '/autoload.php';

$ordering = new \App\Ordering();
$ordering->order(new \App\Models\Fruit());