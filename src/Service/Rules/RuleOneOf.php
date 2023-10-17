<?php

namespace App\Service\Rules;

class RuleOneOf implements Rule
{
    /**
     * @var int[]
     */
    private array $numbers;

    /**
     * @param int[] $numbers
     */
    public function __construct(array $numbers)
    {
        $this->numbers = $numbers;
    }


    public function isSatisfied(int $number): bool
    {
        return in_array($number, $this->numbers, true);
    }

}