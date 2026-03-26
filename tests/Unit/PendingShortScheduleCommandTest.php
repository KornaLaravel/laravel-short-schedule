<?php

use Illuminate\Console\Command;
use Spatie\ShortSchedule\PendingShortScheduleCommand;

it('will generate command from command class', function () {
    $pendingCommand = new PendingShortScheduleCommand();
    $pendingCommand->command(TestCommand::class);
    $reflectionClass = new ReflectionClass($pendingCommand);

    $commandProperty = $reflectionClass->getProperty('command');

    $artisanCommand = 'test-command';

    expect($commandProperty->getValue($pendingCommand))
        ->toBe('"' . PHP_BINARY . "\" artisan {$artisanCommand}");
});

class TestCommand extends Command
{
    protected $signature = 'test-command';

    public function handle(): void
    {
    }
}
