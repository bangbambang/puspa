<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 29/05/2017
 * Time: 2:23
 */

namespace Puspa\TaxLaw\IncomeTax;


class PKP
{

    private $progressiveThreshold = [
        [ 'limit' => 50000000, 'tax' => 0.05 ],
        [ 'limit' => 250000000, 'tax' => 0.15 ],
        [ 'limit' => 500000000, 'tax' => 0.25 ],
        [ 'limit' => PHP_INT_MAX, 'tax' => 0.3 ]
    ];
    public function getProgressiveAmount(int $income) : int
    {
        $tax = $this->deduce($income, 0, 0);
        return $tax;
    }

    private function deduce(int $income, int $taxable, int $index) : int
    {
        if($income > 0) {
            $taxable += $this->progressiveThreshold[$index]['tax'] * $income;
            $income -= $this->progressiveThreshold[$index]['limit'];
            $this->deduce($income, $taxable, $index++);
        }
        return $taxable;
    }

}