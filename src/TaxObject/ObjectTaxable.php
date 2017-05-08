<?php

namespace Puspa\TaxObject;

interface ObjectTaxable
{
    const ROUNDDOWN  = -1;
    const NEARESTINT = 0;
    const ROUNDUP    = 1;

    public function setTaxedAmount(int $amount) : void;
    public function getTaxedAmount() : int;
    public function setUntaxedAmount(int $amount) : void;
    public function getUntaxedAmount() : int;
    public function setRoundingMode(int $mode) : void;
    public function getRoundingMode() : int;
}

