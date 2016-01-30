<?php

namespace LondonBusRoutes\AppBundle\Command;

use Blackfire\Player\Player;
use Blackfire\Player\Scenario;
use GuzzleHttp\Client;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SyncServiceChangesCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this->setName('lbr:sync:service-changes');
        $this->setAliases(['service-changes']);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $tableCount = $this->scrapeServiceChanges();

        $output->writeln(sprintf('Found %d tables', $tableCount));

        return 0;
    }

    private function scrapeServiceChanges()
    {
        $player = new Player(new Client());
        $scenario = new Scenario();

        $scenario
            ->endpoint('http://londonbusroutes.net')
            ->visit("url('/changes.htm')")
            ->expect('status_code() == 200')
            ->extract('table_count', 'css("table").count()')

//            ->extract('latest_post_title', 'css(".post h2").first()')
//            ->extract('latest_post_href', 'css(".post h2 a").first().attr("href")')
//            ->extract('latest_posts', 'css(".post h2 a").extract(["_text", "href"])'
//            ->extract('age', 'header("Age")')
//            ->extract('content_type', 'header("Content-Type")')
//            ->extract('token', 'regex(\'/name="_token" value="([^"]+)"/\')')
        ;

        $r = $player->run($scenario);

        return $r['table_count'];
    }
}
