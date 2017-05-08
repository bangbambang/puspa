<?php

namespace Puspa\TaxObject;

interface ObjectTaxable
{
    public const ROUNDDOWN  = -1;
    public const NEARESTINT = 0;
    public const ROUNDUP    = 1;

    public function setTaxedAmount(int $amount) : void;
    public function getTaxedAmount() : int;
    public function setUntaxedAmount(int $amount) : void;
    public function getUntaxedAmount() : int;
    public function setRoundingMode(int $mode) : void;
    public function getRoundingMode() : int;
}

