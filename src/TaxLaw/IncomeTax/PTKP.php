<?php
/**
 * Base interface for Income Tax Laws
 *
 * Part of Puspa tax library
 * @author Bambang Catur Pamungkas <bambangcatuz@gmail.com>
 * @license MIT
 */

namespace Puspa\TaxLaw\IncomeTax;

interface PTKP
{
    public function getReferenceLaw() : string;
    public static function validFrom() : \DateTime;
    public function getPersonalThreshold() : int;
    public function getMarriageAddition() : int;
    public function getDependentAddition(int $dependent) : int;
}
