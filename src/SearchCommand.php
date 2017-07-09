<?php
namespace App;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;


class SearchCommand extends Command
{

    public function configure()
    {
        $this->setName('show')
            ->setDescription('Search repository that relevant to the name provide ')
            ->addArgument('word', InputArgument::REQUIRED, 'word');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $opts = [
            'http' => [
                'method' => 'GET',
                'header' => [
                    'User-Agent: PHP'
                ]
            ]
        ];
        $context = stream_context_create($opts);

        $word =  $input->getArgument('word');

        $url = 'https://api.github.com/search/repositories?q='.$word.'&order=desc&per_page=1000';

        $content = file_get_contents($url, true , $context);

        $data = json_decode($content);

        $items = $data->items;

        $count = array_unique($this->langCount($items));


        foreach($count as  $value) { //foreach element in $arr
            $num = $this->total_lang_count($items,$value);
            $output->writeln("<info>{$value}: {$num}</info>");

        }
        $total = count($items);
        $output->writeln("<info>=> {$total} result(s) found</info>");

    }

    private function langCount($items)
    {
        $arr = [];
        foreach($items as $item) { //foreach element in $arr
            array_push($arr, $item->language);
            //$output->writeln("<info>{$item->language}:</info>");
        }
        return $arr;
    }

    private function total_lang_count($items,$word)
    {
        $i = 0;
        foreach ($items as $item){
            if($item->language == $word){
                $i++;
            }
        }
        return $i;

    }


}
