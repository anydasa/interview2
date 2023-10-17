<?php

namespace App\Service\Rules;

class RuleOneOfDivider implements Rule
{
    /**
     * @var int[]
     */
    private array $dividers;

    /**
     * @param int[] $dividers
     */
    public function __construct(array $dividers)
    {
        $this->dividers = $dividers;
    }


    public function isSatisfied(int $number): bool
    {
        $is = true;
        foreach ($this->dividers as $divider) {
            $is = ($is && 0 == $number % $divider);
        }

        return $is;
    }

}