<?php
/**
 * Income Tax Calculator
 * Part of Puspa tax library
 * @author Bambang Catur Pamungkas <bambangcatuz@gmail.com>
 * @license MIT
 */

namespace Puspa\TaxCalculator;

use Puspa\TaxLaw\LawApplicable;
use Puspa\TaxObject\ObjectTaxable;
use Puspa\TaxSubject\SubjectTaxable;

class IncomeTaxCalculator extends BaseCalculator
{
    /** {@inheritDoc} */
    public function __construct(SubjectTaxable $subject, ObjectTaxable $object)
    {
        $this->taxSubject = $subject;
        $this->taxObject = $object;
    }

    /** {@inheritDoc} */
    public function calculate(LawApplicable ...$taxLaws) : iterable
    {
        parent::calculate(...$taxLaws);
        foreach($taxLaws as $law) {
            $result[] = $law->calculate($this);
        }
        return $result;
    }
}
