<?php

namespace App;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class NewCommand extends Command
{
    public function configure()
    {
        $this->setName('new')
            ->setDescription('Create a new Laravel application.')
            ->addArgument('name', InputArgument::REQUIRED);


    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        //assert that the folder doesn't already exist
        $directory = getcwd(). '/' . $input->getArgument('name');

        $this->assetApplicationDoesNotExist($directory, $output);
        //download nightly version of laravel

        //extract zip file

    }

    private function assetApplicationDoesNotExist($directory, OutputInterface $output){

        if(is_dir($directory))
        {
            $output->writeln('<error>Application already exists!</error>');

            exit(1);
        }
    }

}