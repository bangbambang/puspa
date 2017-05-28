<?php

use \Puspa\TaxCalculator\IncomeTaxCalculator;
use \Puspa\TaxSubject\PersonTaxable;
use \Puspa\TaxObject\IncomeTaxable;
use \Puspa\TaxLaw\IncomeTax\PPh21;

class IncomeCalculatorCest
{
    public function incomeBelowTreshold(TaxCalculatorTester $I)
    {
        $calc = new IncomeTaxCalculator(new PersonTaxable('foo'), new IncomeTaxable(0,'01-2017'));
        $result = $calc->calculate(new PPh21());
        $I->assertNotEmpty($result);
        foreach ($result as $report) {
            $I->assertArrayHasKey('tax_deductible', $report);
            $I->assertArrayHasKey('tax_free', $report);
            $I->assertArrayHasKey('tax', $report);
        }
        $I->assertEquals(0, $result[0]['tax']);
    }

    public function incomeAboveTreshold(TaxCalculatorTester $I)
    {
        $calc = new IncomeTaxCalculator(new PersonTaxable('foo'), new IncomeTaxable(60000000, '01-2017'));
        $result = $calc->calculate(new PPh21());
        $I->assertNotEmpty($result);
        $I->assertEquals(54000000, $result[0]['tax_free']);
        $I->assertEquals(6000000, $result[0]['tax_deductible']);
        $I->assertEquals(300000, $result[0]['tax']);
    }
}
