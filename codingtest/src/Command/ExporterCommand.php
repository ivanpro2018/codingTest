<?php

namespace App\Command;

use PDO;
use SplFileObject;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;


class ExporterCommand extends Command
{
    protected static $defaultName = 'api:export-csv';

    protected function configure()
    {
        $this->setDescription('Exporte la table QuestionHistoric');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $dsn = "mysql:host=127.0.0.1;dbname=apidb;port=3307;charset=utf8mb4";
        try {
            $pdo = new \PDO($dsn, 'root', '');
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
        
        
        $query = $pdo->query("SELECT * FROM question_historic");

        $questions = [];
        $questions[] = array('id','title','status','updated');
        while($rs = $query->fetch(PDO::FETCH_ASSOC)){
            $questions[] = array($rs['id'], $rs['title'], $rs['status'], $rs['updated']);
        }

        $filename = 'questionHistoric.csv';
        $output_file = new SplFileObject('questionHistoric.csv', 'w');
        foreach($questions as $row) {
            $output_file->fputcsv($row, ";");
        }

        $output->writeln(['', 'Export csv successfully generated !', '============', '']);
    }
 
}