<?php
/**
 * Generic calculator interface. part of Puspa tax library
 * @author Bambang Catur Pamungkas <bambangcatuz@gmail.com>
 * @license MIT
 */

namespace Puspa\TaxCalculator;

use Puspa\TaxSubject\SubjectTaxable;
use Puspa\TaxObject\ObjectTaxable;
use Puspa\TaxLaw\LawApplicable;

/**
 * The calculator interface defines necessary methods to calculate tax amount
 * based on Subject type, Object type, and Tax law in use.
 */
interface Calculator
{
    /**
     * Constructor method definition
     *
     * Every constructor should accept a tax subject and a tax object
     * The compatibility of those two should be resolved when a specific law
     * is assigned to the calculator.
     *
     * @param Puspa\TaxSubject\SubjectTaxable   $subject
     * @param Puspa\TaxObject\ObjectTaxable     $object
     * @return void
     */
    public function __construct(SubjectTaxable $subject, ObjectTaxable $object) : void;

    /**
     * Calculate tax based on tax law(s)
     *
     * The actual calculation is defined by the Law object. The calculator's
     * job is to pass the constructed parameters to the law's calculate method.
     * On some occasion (for example, on calculating yearly tax summary), this
     * method may do multiple calculation.
     * 
     * @param Puspa\TaxLaw\LawApplicable $taxLaw If no specific law supplied, 
     *          one (or more) should be inferred based on year.
     * @return iterable calculation result detail. this may be a simple array or
     * more powerful data structure (such as generator).
     * @throws \InvalidArgumentException if supplied law(s) are inapplicable 
     * with the tax object or subject.
     */
    public function calculate(LawApplicable ...$taxLaw) : iterable;
}
