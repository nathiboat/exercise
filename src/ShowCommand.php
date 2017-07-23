<?php
/**
 * Created by PhpStorm.
 * User: Nathi
 * Date: 09/07/2017
 * Time: 10:34
 */

namespace App;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class ShowCommand
{
    public function __construct(DatabaseAdapter $database)
    {
        $this->database = $database;

        parent::__construct();
    }

    public function configure()
    {
        $this->setName('show')
            ->setDescription('Show all tasks');

    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $this->showTasks($output);
    }

    private function showTasks(OutputInterface $output)
    {

        $tasks = $this->database->fetchAll('tasks');

        $table = new Table($output);
        $table->setHeaders(['id', 'Description'])
            ->setRows([
               $tasks
            ])->render();
    }

}