<?php
/**
 * Created by PhpStorm.
 * User: Phil
 * Date: 23.01.2017
 * Time: 20:45
 */

namespace App;


class PrinterDecorator
{

    private $printer;

    public function __construct(Printer $printer)
    {
        $this->printer = $printer;
    }

    public function print()
    {
        echo '--- Верх ---';
        $this->printer->print();
        echo '--- Низ ---';
    }

}