<?php
/**
 * PTKP 2016 for PPh21
 *
 * Part of Puspa tax library
 * @author Bambang Catur Pamungkas <bambangcatuz@gmail.com>
 * @license MIT
 */

namespace Puspa\TaxLaw\IncomeTax;

class PTKP2016 implements PTKP
{

    private $referenceLaw       = 'PMK Nomor 101/PMK.010/2016';
    private $validFrom          = '22-06-2016';
    private $personalThreshold  = 54000000;
    private $marriageAddition   = 4500000;
    private $dependentAddition  = 4500000;

    public function getReferenceLaw(): string
    {
        return $this->referenceLaw;
    }
    public static function validFrom(): \DateTime
    {
        return \DateTime::createFromFormat(
            'd-m-Y',
            (new self)->validFrom,
            new \DateTimeZone('Asia/Jakarta')
        );
    }

    public function getPersonalThreshold() : int
    {
        return $this->personalThreshold;
    }

    public function getMarriageAddition() : int
    {
        return $this->marriageAddition;
    }

    public function getDependentAddition(int $dependent) : int
    {
        if($dependent > 3) {
            $dependent = 3;
        }
        return $dependent * $this->dependentAddition;
    }
}
