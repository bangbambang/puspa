<?php

namespace Puspa\TaxSubject;

class PersonTaxable extends BaseSubjectTaxable
{
    private $married = false;
    private $children = 0;
    private $guardian = false;

    public function setMaritalStatus(bool $status) : void
    {
        $this->married = $status;
    }

    public function isMarried() : bool
    {
        return $this->married;
    }

    public function setChildCount(int $count) : void
    {
        if($count < 0) {
            throw new \Exception("Child count is at least 0");
        }
        $this->children = $count;
    }

    public function getChildCount() : int
    {
        return $this->children;
    }

    /**
     * Wether current subject is a guardian
     *
     * Note that currently, a woman can only be a guardian if she is divorced
     * and hold custody of her children. Otherwise, guardian status should only
     * be set to the husband.
     * @param $status
     * @return void
     */
    public function setGuardianStatus(bool $status) : void
    {
        $this->guardian = $status;
    }

    public function isGuardian() : bool
    {
        return $this->guardian;
    }
}
