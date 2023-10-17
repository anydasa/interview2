<?php

namespace App\Service\Rules;

interface Rule
{
    public function isSatisfied(int $number): bool;
}