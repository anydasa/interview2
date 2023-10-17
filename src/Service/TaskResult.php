<?php

namespace App\Service;

class TaskResult
{
    private string $title;
    private string $result;

    /**
     * @param string $title
     * @param string $result
     */
    public function __construct(string $title, string $result)
    {
        $this->title = $title;
        $this->result = $result;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getResult(): string
    {
        return $this->result;
    }
}