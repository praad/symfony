<?php
// src/Command/CreateUserCommand.php
namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TestCommand extends Command
{
    // The name of the command (the part after "bin/console")
    protected static $defaultName = 'app:test-command';

    protected function configure()
    {
        $this
            // the short description shown while running "php bin/console list"
            ->setDescription('This is just a test command.')

            // the full command description shown when running the command with
            // the "--help" option
            ->setHelp('This command just give you an example to create a Symfony command...')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        echo "Hello World! \n";

        return 0;
    }
}
