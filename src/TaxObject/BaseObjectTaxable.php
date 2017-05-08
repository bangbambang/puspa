<?php

namespace Puspa\TaxObject;

abstract class BaseObjectTaxable implements ObjectTaxable
{
    private $taxedAmount;
    private $untaxedAmount;
    private $total;
    private $roundingMode = Taxable::NEARESTINT;

    public function setTaxedAmount(int $amount) : void
    {
        if($amount < 0) {
            throw new \Exception("Minimum untaxed amount is zero (0)");
        }
        $this->taxedAmount = $amount;
    }

    public function getTaxedAmount() : int
    {
        return $this->taxedAmount;
    }

    public function setUntaxedAmount(int $amount) : void
    {
        if($amount < 0) {
            throw new \Exception("Minimum untaxed amount is zero (0)");
        }
        $this->untaxedAmount = $amount;
    }

    public function getUntaxedAmount() : int
    {
        return $this->untaxedAmount;
    }

    final public function setRoundingMode(int $mode) : void
    {
        if(!in_array($mode, [Taxable::ROUNDUP, Taxable::ROUNDDOWN, Taxable::NEARESTINT])) {
            throw new \Exception("Unsupported rounding mode");
        }
        $this->roundingMode = $mode;
    }

    public function getRoundingMode() : int
    {
        return $this->roundingMode;
    }
}
