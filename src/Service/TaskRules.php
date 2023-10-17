<?php

namespace App\Service;

use App\Service\Rules\Rule;

class TaskRules
{
    private string $word;

    private array $rules;

    /**
     * @param string $word
     * @param Rule[] $rules
     */
    public function __construct(string $word, array $rules)
    {
        $this->word = $word;
        $this->rules = $rules;
    }

    public function getWord(): string
    {
        return $this->word;
    }

    /**
     * @return int[]
     */
    public function getRules(): array
    {
        return $this->rules;
    }
}