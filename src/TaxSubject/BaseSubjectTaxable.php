<?php

namespace Puspa\TaxSubject;

abstract class BaseSubjectTaxable implements SubjectTaxable
{
    protected $pattern = '/^[0-9]{2}\.{1}([0-9]{3}\.{1}){2}[0-9]{1}-{1}[0-9]{3}\.{1}[0-9]{3}$/';
    protected $npwp;
    protected $name;
    protected $address;

    public function __construct($npwp = null)
    {
        if(!empty($npwp)) {
            $this->setNPWP($npwp);
        }
    }

    final public function setNPWP(string $npwp) : void
    {
        if(preg_match($this->pattern, $npwp) !== 1 || strlen($npwp) !== 20) {
            throw new \Exception("Invalid NPWP format, valid format should be XX.XXX.XXX.X-XXX.XXX");
        }
        $this->npwp = $npwp;
    }

    final public function getNPWP() : string
    {
        return $this->npwp;
    }

    final public function hasNPWP() : boolean
    {
        return (!empty($this->npwp));
    }

    final public function setName(string $name) : void
    {
        $this->name = $name;
    }

    final public function getName() : string
    {
        return $this->name;
    }

    final public function setAddress(string $address) : void
    {
        $this->address = $address;
    }

    final public function getAddress() : string
    {
        return $this->address;
    }
}
