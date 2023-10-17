<?php

namespace App\Command;

use App\Service\Rules\RuleLargerThen;
use App\Service\Rules\RuleOneOf;
use App\Service\Rules\RuleOneOfDivider;
use App\Service\Task;
use App\Service\TaskProcessor;
use App\Service\TaskRules;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'test',
    description: 'Add a short description for your command',
)]
class TestCommand extends Command
{
    public function __construct()
    {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $task1 = new Task(
            'Task v1',
            ' ',
            1,
            20,
            [
                new TaskRules('papow', [
                    new RuleOneOfDivider([3, 5])
                ]),
                new TaskRules('pa', [
                    new RuleOneOfDivider([3])
                ]),
                new TaskRules('pow', [
                    new RuleOneOfDivider([5])
                ]),
            ]
        );

        $task2 = new Task(
            'Task v2',
            '-',
            1,
            15,
            [
                new TaskRules('hateeho', [
                    new RuleOneOfDivider([2, 7]),
                ]),
                new TaskRules('hatee', [
                    new RuleOneOfDivider([2]),
                ]),
                new TaskRules('ho', [
                    new RuleOneOfDivider([7]),
                ]),
            ]
        );

        $task3 = new Task(
            'Task v3',
            '-',
            1,
            10,
            [
                new TaskRules('joff', [
                    new RuleOneOf([1, 4, 9]),
                ]),
                new TaskRules('tchoff', [
                    new RuleLargerThen(5),
                ]),
                new TaskRules('jofftchoff', [
                    new RuleOneOf([1, 4, 9]),
                    new RuleLargerThen(5),
                ]),
            ]
        );

        $service = new TaskProcessor();

        $taskResult1 = $service->processTask($task1);
        $taskResult2 = $service->processTask($task2);
        $taskResult3 = $service->processTask($task3);


        echo "\n";
        echo "\n";
        echo $taskResult1->getTitle() . ":";
        echo "\n";
        echo $taskResult1->getResult();
        echo "\n";
        echo $taskResult2->getTitle() . ":";
        echo "\n";
        echo $taskResult2->getResult();
        echo "\n";
        echo $taskResult3->getTitle() . ":";
        echo "\n";
        echo $taskResult3->getResult();
        echo "\n";
        echo "\n";


        return Command::SUCCESS;
    }
}
