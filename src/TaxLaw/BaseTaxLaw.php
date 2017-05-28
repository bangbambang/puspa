<?php
/**
 * Base class for Tax Laws
 *
 * Part of Puspa tax library
 * @author Bambang Catur Pamungkas <bambangcatuz@gmail.com>
 * @license MIT
 */

namespace Puspa\TaxLaw;

use Puspa\TaxSubject\SubjectTaxable;
use Puspa\TaxObject\ObjectTaxable;
use Puspa\TaxCalculator\Calculator;

/**
 * This class define methods for tax law's basic property
 * while leaving calculation details to concrete subclasses.
 */
abstract class BaseTaxLaw implements LawApplicable
{
    /** @const ALIAS this should be overwritten by each child class */
    const ALIAS       = "";
    /** @const LAWNUMBER full law name */
    const LAWNUMBER   = "";
    /** @const LAWYEAR year or month and year the law come to effect */
    const LAWYEAR     = 0;

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

    /**
	 * {@inheritDoc}
	 * 
     * @param Calculator $calc calculator object
     * @return iterable iterable breakdown of tax calculation result
	 */
    abstract public function calculate(Calculator $calc) : iterable;

    abstract public function isApplicable(SubjectTaxable $subject, ObjectTaxable $object) : bool;
}
