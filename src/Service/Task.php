<?php

namespace App\Service;

class Task
{
    private string $name;
    private string $separator;
    private int $rangeStart;
    private int $rangeFinish;
    /**
     * @var TaskRules[]
     */
    private array $rules;

    /**
     * @param string $name
     * @param string $separator
     * @param int $rangeStart
     * @param int $rangeFinish
     * @param TaskRules[] $rules
     */
    public function __construct(string $name, string $separator, int $rangeStart, int $rangeFinish, array $rules)
    {
        $this->name = $name;
        $this->separator = $separator;
        $this->rangeStart = $rangeStart;
        $this->rangeFinish = $rangeFinish;
        $this->rules = $rules;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSeparator(): string
    {
        return $this->separator;
    }

    public function getRangeStart(): int
    {
        return $this->rangeStart;
    }

    public function getRangeFinish(): int
    {
        return $this->rangeFinish;
    }

    public function getRules(): array
    {
        return $this->rules;
    }

    /**
     * @return int[]
     */
    public function getRange(): array
    {
        return range($this->rangeStart, $this->rangeFinish);
    }
}