<?php
/**
 * Base class for Income Tax Laws
 *
 * Part of Puspa tax library
 * @author Bambang Catur Pamungkas <bambangcatuz@gmail.com>
 * @license MIT
 */

namespace Puspa\TaxLaw\IncomeTax;

use Puspa\TaxLaw\BaseTaxLaw;
use Puspa\TaxCalculator\Calculator;
use Puspa\TaxObject\ObjectTaxable;
use Puspa\TaxObject\IncomeTaxable;
use Puspa\TaxSubject\SubjectTaxable;
use Puspa\TaxSubject\PersonTaxable;

/**
 * Define PPh21 calculation. Extending classes should only need to override
 * tresholds
 */
class PPh21 extends BaseTaxLaw
{
    /** {@inheritDoc} */
    const ALIAS       = "PPh 21";
    /** {@inheritDoc} */
    const LAWNUMBER   = "UU Nomor 7 Tahun 1983";
    /** {@inheritDoc} */
    const LAWYEAR     = 1983;

    /**
     * @var PTKP ptkp, can be injected
     *      during instatiation or left empty, to be infered during calculation
     */
    private $ptkp     = null;
    
    public function __construct(PTKP $ptkp = null)
    {
        $this->ptkp = $ptkp ?? null;
    }

    public static function withPTKP(\DateTimeInterface $date) : PPh21
    {
        return new self((new self)->inferPTKP($date));
    }

    /** {@inheritDoc} */
    public function getLawNumber() : string
    {
        if($this->ptkp) {
            return $this->ptkp->getReferenceLaw();
        }
        return $this::LAWNUMBER;
    }

    /** {@inheritDoc} */
    public function getYear() : string
    {
        if($this->ptkp) {
            return date_format($this->ptkp::validFrom(), 'Y');
        }
        return (string) $this::LAWYEAR;
    }

    public function calculate(Calculator $calc) : iterable
    {
        $this->ptkp = $this->ptkp ?? $this->inferPTKP($calc->getTaxObject()->getPeriod());
        $subject = $calc->getTaxSubject();
        $threshold = $this->ptkp->getPersonalThreshold();
        if($subject->isMarried()) {
            $threshold += $this->ptkp->getMarriageAddition();
        }
        if($subject->hasChildren()) {
            $threshold += $this->ptkp->getDependentAddition($subject->getChildCount());
        }
        $tax = 0;
        //TODO: add biaya jabatan, dll.
        $taxDeductible = max($calc->getTaxObject()->getIncome() - $threshold, 0);
        if($taxDeductible > 0) {
            $tax = (new PKP())->getProgressiveAmount($taxDeductible);
        }
        return [
            'ptkp'              => min($threshold),
            'tax_deductible'    => $taxDeductible,
            'tax_free'          => 0, //TODO: add biaya jabatan, dll
            'tax'               => $tax,
        ];
    }

    protected function inferPTKP(\DateTimeInterface $date) : PTKP
    {
        if($date > PTKP2016::validFrom()) {
            return new PTKP2016();
        }
        throw new \RangeException("No applicable law for the specified date");
    }

    public function isApplicable(SubjectTaxable $subject, ObjectTaxable $object): bool
    {
        //TODO: check eligibility
        return (get_class($subject) == PersonTaxable::class && get_class($object) == IncomeTaxable::class);
    }
}
