<?php

namespace App;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class RenderCommand extends Command
{
    public function configure()
    {
        $this->setName('render')
            ->setDescription('Render github repo and group by language in table format.')
            ->addArgument('word', InputArgument::REQUIRED, 'word');;
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $table = new Table($output);

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

        $arr = [];
        foreach($count as $key =>  $value) {
            $num = $this->total_lang_count($items,$value);
            array_push($arr,[`$value`,$num]);

        }
        $total = count($items);


        $table->setHeaders(['Language', 'Number'])
            ->setRows([
                $arr
            ])->render();

        $output->writeln("<info>=> {$total} result(s) found</info>");
    }

    private function langCount($items)
    {
        $arr = [];
        foreach($items as $item) {
            array_push($arr, $item->language);

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