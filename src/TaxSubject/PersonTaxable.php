<?php
/**
 * Define person as tax subject.
 * Part of Puspa tax library
 * @author Bambang Catur Pamungkas <bambangcatuz@gmail.com>
 * @license MIT
 */

namespace Puspa\TaxSubject;

class PersonTaxable extends BaseSubjectTaxable
{
    /** @var bolean marital status, default to false */
    private $married = false;
    /** @var int child count, default to 0 */
    private $children = 0;

    /**
     * Set marital status 
     *
     * Note that due to type juggling, any scalar that can be evaluated
     * as boolean WILL be casted to boolean
     * @link https://php.net/manual/en/language.types.boolean.php 
     * @param $status boolean
     * @return void
     */
    public function setMarried(bool $status) : void
    {
        $this->married = $status;
    }

    /**
     * Get marital status 
     *
     * @return boolean
     */
    public function isMarried() : bool
    {
        return $this->married;
    }

    /**
     * Set number of children. 
     *
     * Note that according to the law, children should be assigned to the husband
     * except when the wife hold custody of her child(s) after a divorce.
     * This value can be set independently from marital status.
     * @param $count int
     * @return void
     * @throws \UnexpectedValueException if method argument is not integer
     * @throws \RangeException if child count is less than zero
     */
    public function setChildCount(int $count) : void
    {
        if(!is_int($count)) {
            throw new \UnexpectedValueException("Child count should be an integer");
        }
        if($count < 0) {
            throw new \RangeException("Child count is at least 0");
        }
        $this->children = $count;
    }

    /**
     * Number of tax subject's children
     *
     * @return int
     */
    public function getChildCount() : int
    {
        return $this->children;
    }

    /**
     * Wether current subject have children(s)
     *
     * @see setChildCount
     * @param $status
     * @return void
     */
    public function hasChildren() : bool
    {
        return ($this->children > 0);
    }
}
