<?php
// src/Command/CreateUserCommand.php
namespace App\Command;

use App\Util\Calculator;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * An example test command
 */
class TestCommand extends Command
{
    // The name of the command (the part after "bin/console")
    /**
     * @var string|null The default command name
     */
    protected static $defaultName = 'app:test-command';

    /**
     * @var Calculator|null
     */
    private $calculator = null;

    /**
     * @var LoggerInterface|null
     */
    private $logger = null;

    /**
     * TestCommand constructor.
     *
     * @param Calculator|null        $calculator
     * @param LoggerInterface        $doctrineLogger
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(Calculator $calculator = null, LoggerInterface $doctrineLogger, EntityManagerInterface $entityManager)
    {
        parent::__construct();

        // best practices recommend to call the parent constructor first and
        // then set your own properties. That wouldn't work in this case
        // because configure() needs the properties set in this constructor
        $this->calculator = $calculator;

        $this->logger = $doctrineLogger;

        $this->entityManager = $entityManager;
    }

    protected function configure()
    {
        $this
            // the short description shown while running "php bin/console list"
            ->setDescription('This is just a test command.')

            // the full command description shown when running the command with
            // the "--help" option
            ->setHelp('This command just give you an example to create a Symfony command...');
    }

    /**
     * @param InputInterface  $input
     * @param OutputInterface $output
     *
     * @return int|void|null
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Hello World!');

        $result = $this->calculator->add(10,10);

        $output->writeln("10 + 10 = $result");

        $this->logger->info("10 + 10 = $result");

        return 0;
    }
}
