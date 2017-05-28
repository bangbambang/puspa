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
     * @param SubjectTaxable   $subject
     * @param ObjectTaxable     $object
     * @return void
     */
    public function __construct(SubjectTaxable $subject, ObjectTaxable $object);


    public function getTaxSubject() : SubjectTaxable;

    public function getTaxObject() : ObjectTaxable;

    /**
     * Calculate tax based on tax law(s)
     *
     * The actual calculation is defined by the Law object. The calculator's
     * job is to validate and ensure tax subject and object is compatible with 
     * supplied law(s).
     * On some occasion (for example, on calculating yearly tax summary), this
     * method may do multiple calculation.
     * 
     * @param LawApplicable $taxLaw If no specific law supplied,
     *          one (or more) should be inferred based on year.
     * @return iterable calculation result detail. this may be a simple array or
     * advanced data structure (such as generator).
     * @throws \InvalidArgumentException if supplied law(s) are inapplicable 
     * with the tax object or subject.
     */
    public function calculate(LawApplicable ...$taxLaws) : iterable;
}
