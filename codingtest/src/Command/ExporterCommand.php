<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ExporterCommand extends Command
{
    protected static $defaultName = 'api:export-csv';
 
    protected function configure()
    {
        $this
            ->setDescription('Exporte la table QuestionHistoric');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        
        $output->writeln([
            '',
            'Export csv successfully generated !',
            '============',
            '',
        ]);
    }
 
}