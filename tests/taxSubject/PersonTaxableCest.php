<?php

use Puspa\TaxSubject\PersonTaxable;

class PersonTaxableCest
{
	private $name = 'Fulan';

    public function marriageStatus(TaxSubjectTester $I)
    {
        $subject = new PersonTaxable($this->name);
        $I->assertFalse($subject->isMarried());
        $subject->setMarried(true);
        $I->assertTrue($subject->isMarried());
    }

    public function childrenAndGuardianStatus(TaxSubjectTester $I)
    {
        $subject = new PersonTaxable($this->name);
        $I->assertFalse($subject->hasChildren());
        $I->assertEquals(0, $subject->getChildCount());

        $subject->setChildCount(2);
        $I->assertEquals(2, $subject->getChildCount());
        $I->assertTrue($subject->hasChildren());
    }

    public function childrenCountValidation(TaxSubjectTester $I)
    {
        $subject = new PersonTaxable($this->name);

        /* FIXME: should be UnexpectedValueException */
        $I->expectException(Exception::class, function() {
            $subject->setChildCount(0.5);
        });

        /* FIXME: should be RangeException */
        $I->expectException(Exception::class, function() {
            $subject->setChildCount(-1);
        });
    }
}
