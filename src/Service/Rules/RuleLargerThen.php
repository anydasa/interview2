<?php

namespace App\Service\Rules;

class RuleLargerThen implements Rule
{
    private int $number;

    public function __construct(int $number)
    {
        $this->number = $number;
    }


    public function isSatisfied(int $number): bool
    {
        return $number > $this->number;
    }
}