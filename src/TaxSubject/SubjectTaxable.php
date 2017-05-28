<?php
/**
 * Base interface for taxable subject
 *
 * Part of Puspa tax library
 * @author Bambang Catur Pamungkas <bambangcatuz@gmail.com>
 * @license MIT
 */

namespace Puspa\TaxSubject;

/**
 * Generic subject
 */
interface SubjectTaxable
{
    /**
     * Set Tax Identification Number (NPWP)
     *
     * @param string $npwp
     * @return void
     */
    public function setNPWP(string $npwp) : void;

    /**
     * Get Tax Identification Number (NPWP)
     *
     * @return string|null npwp
     */
    public function getNPWP() : ?string;

    /**
     * Check if NPWP is set
     *
     * @return boolean 
     */
    public function hasNPWP() : bool;

    /**
     * Set Taxpayer's name
     *
     * @param string $name
     * @return void
     */
    public function setName(string $name) : void;

    /**
     * get taxpayer's name
     *
     * @return string|null name
     */
    public function getName() : ?string;

    /**
     * Set Taxpayer's address
     *
     * @param string $address
     * @return void
     */
    public function setAddress(string $address) : void;

    /**
     * Get Taxpayer's address
     *
     * @return string|null name
     */
    public function getAddress() : ?string;
}
