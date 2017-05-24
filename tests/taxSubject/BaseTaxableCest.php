<?php

use Puspa\TaxSubject\SubjectTaxable;
use Puspa\TaxSubject\PersonTaxable;

class BaseTaxableCest
{
    
    public function defaultNoNPWP(TaxSubjectTester $I)
    {
        $subject = new PersonTaxable('Fulan');
        $I->assertNull($subject->getNPWP());
        $I->assertFalse($subject->hasNPWP());
        $I->assertEquals('Fulan', $subject->getName());
        $I->assertNull($subject->getAddress());
    }

    public function validNPWPFormat(TaxSubjectTester $I)
    {
        $subject = new PersonTaxable('Fulan', '11.111.111.1-111.111');

        /* FIXME: should be InvalidArgumentException */
        $I->expectException(Exception::class, function() {
            $subject->setNPWP();
        });
        /* FIXME: should be InvalidArgumentException */
        $I->expectException(Exception::class, function() {
            $subject->setNPWP(1);
        });
        /* FIXME: should be InvalidArgumentException */
        $I->expectException(Exception::class, function() {
            $subject->setNPWP(str_replace('XX.XXX.XXX.X-XXX.XXX', $npwp));
        });
		$I->assertEquals('11.111.111.1-111.111', $subject->getNPWP());
    }
}