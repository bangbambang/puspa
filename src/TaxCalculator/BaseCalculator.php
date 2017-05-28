<?php
/**
 * Income Tax Calculator
 * Part of Puspa tax library
 * @author Bambang Catur Pamungkas <bambangcatuz@gmail.com>
 * @license MIT
 */

namespace Puspa\TaxCalculator;

use Puspa\TaxSubject\SubjectTaxable;
use Puspa\TaxObject\ObjectTaxable;
use Puspa\TaxLaw\LawApplicable;

abstract class BaseCalculator implements Calculator
{
    protected $taxSubject;
    protected $taxObject;
    protected $taxLaws;

    /** {@inheritDoc} */
    public function __construct(SubjectTaxable $subject, ObjectTaxable $object)
    {
        $this->taxSubject = $subject;
        $this->taxObject = $object;
    }

    /** {@inheritDoc} */
    public function calculate(LawApplicable ...$taxLaws) : iterable
    {
        $this->taxLaws = $taxLaws;
        foreach($taxLaws as $law) {
            if(!$law->isApplicable($this->taxSubject, $this->taxObject)) {
                throw new \InvalidArgumentException(
                    sprintf(
                        '%s and %s is not compatible',
                        get_class($this->taxSubject),
                        get_class($this->taxObject)
                    )
                );
            }
        }
        //implementor should do calculation here
        return [];
    }

    public function getTaxSubject() : SubjectTaxable
    {
        return $this->taxSubject;
    }

    public function getTaxObject() : ObjectTaxable
    {
        return $this->taxObject;
    }

}
