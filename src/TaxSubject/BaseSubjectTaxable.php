<?php
/**
 * Generic Tax subject class definition.
 * Part of Puspa tax library
 * @author Bambang Catur Pamungkas <bambangcatuz@gmail.com>
 * @license MIT
 */

namespace Puspa\TaxSubject;

abstract class BaseSubjectTaxable implements SubjectTaxable
{
    /** @var string regex to validate NPWP pattern */
    protected $pattern = '/^[0-9]{2}\.{1}([0-9]{3}\.{1}){2}[0-9]{1}-{1}[0-9]{3}\.{1}[0-9]{3}$/';
    /** @var string pattern format to be displayed on error */
    protected $patternFormat = 'XX.XXX.XXX.X-XXX.XXX';
    /** @var string NPWP (Taxpayer Identification Number) */
    protected $npwp;
    /** @var string taxpayer's name */
    protected $name;
    /** @var string taxpayer's address */
    protected $address;

    /**
     * object constructor
     * 
     * It's possible to set NPWP at object initialization or manually (by calling setNPWP())
     * @param string        $name taxpayers name.
     * @param string|null   $npwp default to null.
     * @return void
     */
    public function __construct($name, $npwp = null)
    {
        $this->name = $name;
        if(!empty($npwp)) {
            $this->setNPWP($npwp);
        }
    }

    /** {@inheritDoc} */
    final public function setNPWP(string $npwp) : void
    {
        if(preg_match($this->pattern, $npwp) !== 1 || strlen($npwp) !== 20) {
            throw new \InvalidArgumentException("Invalid NPWP format, valid format should be {$this->$patternFormat}");
        }
        $this->npwp = $npwp;
    }

    /** {@inheritDoc} */
    final public function getNPWP() : ?string
    {
        return $this->npwp;
    }

    /** {@inheritDoc} */
    final public function hasNPWP() : bool
    {
        return (!empty($this->npwp));
    }

    /** {@inheritDoc} */
    final public function setName(string $name) : void
    {
        $this->name = $name;
    }

    /** {@inheritDoc} */
    final public function getName() : ?string
    {
        return $this->name;
    }

    /** {@inheritDoc} */
    final public function setAddress(string $address) : void
    {
        $this->address = $address;
    }

    /** {@inheritDoc} */
    final public function getAddress() : ?string
    {
        return $this->address;
    }
}
