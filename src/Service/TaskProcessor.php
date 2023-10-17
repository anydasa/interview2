<?php

namespace App\Service;

class TaskProcessor
{
    /**
     * @param int $num
     * @param TaskRules[] $rules
     * @return string
     */
    private function getNumOrWord(int $num, array $rules): string
    {
        foreach ($rules as $rule) {
            $is = true;
            foreach ($rule->getRules() as $subRule) {
                $is = ($is && $subRule->isSatisfied($num));
            }
            if ($is) {
                return $rule->getWord();
            }
        }

        return $num;
    }

    public function processTask(Task $task): TaskResult
    {
        $return = [];
        foreach ($task->getRange() as $num) {
            $return [] = $this->getNumOrWord($num, $task->getRules());
        }

        return new TaskResult(
            $task->getName(),
            implode($task->getSeparator(), $return)
        );
    }
}