<?php

namespace App\Logger;

use App\Entity\Log;
use Doctrine\ORM\EntityManagerInterface;
use Monolog\Handler\AbstractProcessingHandler;

class DoctrineHandler extends AbstractProcessingHandler
{
    private $initialized;
    private $entityManager;
    private $channel = 'doctrine_channel';

    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct();

        $this->entityManager = $entityManager;
    }

    /**
     * @param array $record
     */
    protected function write(array $record): void
    {
        if (!$this->initialized) {
            $this->initialize();
        }

        /*
        if ($this->channel != $record['channel']) {
            return;
        }
        */

        $log = new Log();
        $log->setMessage($record['message']);
        $log->setLevel($record['level_name']);

        $this->entityManager->persist($log);
        $this->entityManager->flush();
    }

    private function initialize()
    {
        $this->initialized = true;
    }
}
