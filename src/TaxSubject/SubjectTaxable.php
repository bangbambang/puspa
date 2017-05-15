<?php

namespace Puspa\TaxSubject;

interface SubjectTaxable
{
    public function setNPWP(string $npwp) : void;
    public function getNPWP() : string;
    public function hasNPWP() : bool;
    public function setName(string $name) : void;
    public function getName() : string;
    public function setAddress(string $address) : void;
    public function getAddress() : string;
}
