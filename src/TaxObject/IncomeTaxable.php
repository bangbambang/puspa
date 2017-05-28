<?php
/**
 * Income tax object. part of Puspa tax library
 * @author Bambang Catur Pamungkas <bambangcatuz@gmail.com>
 * @license MIT
 */

namespace Puspa\TaxObject;

/**
 * The taxable income define some basic property to facilitate income tax calculation
 */
class IncomeTaxable extends BaseObjectTaxable
{
    /** @var $income gross income */
    private $income;
    /** @var $period period of tax calculation */
    private $period;

    public function __construct(int $income, string $period)
    {
        $this->setIncome($income);
        $this->setPeriod($period);
    }

    /**
     * Set gross income.
     *
     * @param int $income
     * @return void
     */
    public function setIncome(int $income) : void
    {
        $this->income= $income;
    }

    /**
     * Get gross income
     *
     * @return int period
     */
    public function getIncome() : int
    {
        return $this->income;
    }

    /**
     * Set period of tax calculation.
     *
     * @param string $period
     * @return void
     */
    public function setPeriod(string $period) : void
    {
        $this->period = \DateTime::createFromFormat('m-Y', $period);
    }

    /**
     * Get the time
     *
     * @return \DateTimeInterface period
     */
    public function getPeriod() : \DateTimeInterface
    {
        return $this->period;
    }
}
