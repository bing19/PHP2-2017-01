<?php

require __DIR__ . '/autoload.php';

$printer = new \App\PrinterDecorator(new \App\Printer());
$printer->print();