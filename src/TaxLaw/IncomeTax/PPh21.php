<?php
/**
 * Base class for PPh21 Tax Income
 *
 * Part of Puspa tax library
 * @author Bambang Catur Pamungkas <bambangcatuz@gmail.com>
 * @license MIT
 */

namespace Puspa\TaxLaw\IncomeTax;

use Puspa\TaxLaw\LawApplicable;

/**
 * This class define final methods for LawApplicable inteface as applied to 
 * every Income Tax laws.
 */
abstract class PPh21 implements LawApplicable
{
    /** @const ALIAS this should be overwritten by each child class */
    const   ALIAS       = "PPh 21";
    /** 
     * @const LAWNUMBER defining basic calculation method, child class
     * should overwrite this based on defining law
     */
    const   LAWNUMBER   = "xx";
    /** 
     * @const LAWYEAR year or month and year the law come to effect
     */
    const   LAWYEAR     = 2017;
    
    /** {@inheritDoc} */
    public function getAlias() : string
    {
        return $this::ALIAS;
    }

    /** {@inheritDoc} */
    public function getLawNumber() : string
    {
        return $this::LAWNUMBER;
    }

    /** {@inheritDoc} */
    public function getYear() : string
    {
        return (string) $this::LAWYEAR;
    }
}
