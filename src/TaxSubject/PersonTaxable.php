<?php

namespace Puspa\TaxSubject;

class PersonTaxable extends BaseSubjectTaxable
{
    private $married = false;
    private $children = 0;
    private $guardian = false;

    public function setMaritalStatus(boolean $status) : void
    {
        $this->married = $status;
    }

    public function isMarried() : boolean
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

    public function setGuardianStatus(boolean $status) : void
    {
        $this->guardian = $status;
    }

    public function isGuardian() : boolean
    {
        return $this->guardian;
    }
}
