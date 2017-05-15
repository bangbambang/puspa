<?php
/**
 * Generic Tax object class definition.
 * Part of Puspa tax library
 * @author Bambang Catur Pamungkas <bambangcatuz@gmail.com>
 * @license MIT
 */

namespace Puspa\TaxObject;


/**
 * Base class for tax objects. Object-specific method should be defined
 * at concrete child classes.
 */
abstract class BaseObjectTaxable implements ObjectTaxable
{
    /** @var $taxedAmount amount of tax-deductible value */
    private $taxedAmount;
    /** @var $untaxedAmount amount of tax-free value */
    private $untaxedAmount;
    /** @var $roundingMode default to round down */
    private $roundingMode = ObjectTaxable::ROUNDDOWN;
    /** @var $date date (and time) period of tax calculation */
    private $date;

    /**
     * {@inheritDoc}
     * @throws \InvalidArgumentException if amount is less than zero
     */
    public function setTaxedAmount(int $amount) : void
    {
        if($amount < 0) {
            throw new \InvalidArgumentException("Minimum taxed amount is zero (0)");
        }
        $this->taxedAmount = $amount;
    }

    /** {@inheritDoc} */
    public function getTaxedAmount() : int
    {
        return $this->taxedAmount;
    }

    /**
     * {@inheritDoc}
     * @throws \InvalidArgumentException if amount is less than zero
     */
    public function setUntaxedAmount(int $amount) : void
    {
        if($amount < 0) {
            throw new \InvalidArgumentException("Minimum untaxed amount is zero (0)");
        }
        $this->untaxedAmount = $amount;
    }

    /** {@inheritDoc} */
    public function getUntaxedAmount() : int
    {
        return $this->untaxedAmount;
    }

    /** {@inheritDoc} */
    final public function setRoundingMode(int $mode) : void
    {
        if(!in_array($mode, [Taxable::ROUNDUP, Taxable::ROUNDDOWN, Taxable::NEARESTINT])) {
            throw new \Exception("Unsupported rounding mode");
        }
        $this->roundingMode = $mode;
    }

    /** {@inheritDoc} */
    public function getRoundingMode() : int
    {
        return $this->roundingMode;
    }

    /** {@inheritDoc} */
    public function setDate(\DateTimeInterface $date)
    {
        $this->date = $date;
    }

    /** {@inheritDoc} */
    public function getDate() : \DateTimeInterface
    {
        return $this->date;
    }
}
