<?php

namespace App;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class SayHelloCommand extends Command
{
    public function configure()
    {
        $this->setName('hi')
            ->setDescription('Offer a greeing to the given person')
            ->addArgument('name', InputArgument::REQUIRED, 'Your NAme')
        ->addOption('greeting', null, InputOption::VALUE_OPTIONAL, 'Override the default greeting', 'Hello');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        //$message = 'Hello, ' . $input->getArgument('name');

        $message = sprintf('%s, %s', $input->getOption('greeting'), $input->getArgument('name'));

        $output->writeln("<info>{$message}</info>");
    }

}