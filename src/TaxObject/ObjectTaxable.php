<?php
/**
 * Generic Tax object interface. part of Puspa tax library
 * @author Bambang Catur Pamungkas <bambangcatuz@gmail.com>
 * @license MIT
 */

namespace Puspa\TaxObject;

/**
 * Base contract for tax objects
 */
interface ObjectTaxable
{
    /** @const ROUNDDOWN round fraction down to applicable value */
    const ROUNDDOWN  = -1;
    /** @const NEARESTINT round to the nearest applicable value */
    const NEARESTINT = 0;
    /** @const ROUNDDOWN round fraction up to applicable value */
    const ROUNDUP    = 1;

    /**
     * Set taxed amount/ value
     *
     * Note that this is NOT the gross amount, but amount after reduction
     * applied. On some tax law (e.g VAT) this amount may vary based on
     * taxpayer's role as defined by the law.
     * The implementing class MUST ensure that this value is set accordingly.
     * Either by exposing this method or by providing additional method
     * to infer the amount.
     * @param int $amount
     * @return void
     */
    public function setTaxedAmount(int $amount) : void;

    /**
     * return taxed amount
     * @return int amount of taxed value previously set
     */
    public function getTaxedAmount() : int;

    /**
     * Set tax-free value
     *
     * Some tax law use percentage-based value (e.g 5% "Biaya Jabatan" for
     * Employee), implementing class should provide clear API to calculate
     * and represent the amount accordingly.
     * @param $amount amount of tax-free value
     * @return void
     */
    public function setUntaxedAmount(int $amount) : void;

    /**
     * get total of untaxed amount
     *
     * It's recommended for implementing class to store detailed breakdown
     * of each reductor, but this method MUST return the total.
     * @return int total
     */
    public function getUntaxedAmount() : int;

    /**
     * set rounding mode for tax calculation
     *
     * @param int $mode rouding mode
     * @return void
     */
    public function setRoundingMode(int $mode) : void;

    /**
     * return rounding mode
     *
     * @return int rounding mode
     */
     public function getRoundingMode() : int;

}

