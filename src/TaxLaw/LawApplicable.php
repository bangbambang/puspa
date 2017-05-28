<?php
/**
 * Generic Tax law interface.
 * Part of Puspa tax library
 * @author Bambang Catur Pamungkas <bambangcatuz@gmail.com>
 * @license MIT
 */

namespace Puspa\TaxLaw;

use Puspa\TaxCalculator\Calculator;

/**
 * Basic interface for tax laws.
 * Specific contracts should be provided under child namespace.
 */
interface LawApplicable
{
    /**
     * Law Alias a.k.a Popular name.
     *
     * The name of the law as known to public
     * e.g "PPh 21 Untuk Pegawai Tetap"
     * @return string law name
     */
    public function getAlias() : string;
    
    /**
     * Full name of the law in Indonesian 
     * 
     * e.g UU No. X Tahun XXXX
     * @return string the law number
     */
    public function getLawNumber() : string;

    /**
     * Year of implementation
     *
     * Do note that in some cases, in a single year there can be more than one
     * applicable law. As such, rather than returning \DateTimeInterface object,
     * We return either 4 digit year or 7 digit year-and-month (with dash as separator)
     *
     * @return string year (or month-year) of law implementation
     */
    public function getYear() : string;

    /**
     * tax calculation method
     *
     * @param Calculator $calc calculator object
     * @return iterable iterable breakdown of tax calculation result
     */
    public function calculate(Calculator $calc) : iterable;
}
