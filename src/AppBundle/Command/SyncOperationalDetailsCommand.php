<?php

namespace LondonBusRoutes\AppBundle\Command;

use Blackfire\Player\Player;
use Blackfire\Player\Scenario;
use GuzzleHttp\Client;
use LondonBusRoutes\AppBundle\Entity\BusRoute;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\VarDumper\VarDumper;

class SyncOperationalDetailsCommand extends ContainerAwareCommand
{
    /**
     * @var Player
     */
    private $player;

    protected function configure()
    {
        $this->setName('lbr:sync:operational-details');
        $this->setAliases(['operational-details']);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $data = $this->extractRouteNumbers();

        foreach ($data['day'] as $dayBus) {
            $busRoute = new BusRoute();

            $busRoute->setNumber($dayBus);
            $busRoute->setNightBus(false);
        }

        VarDumper::dump($data);

        return 0;
    }

    private function extractRouteNumbers()
    {
        $player = $this->getPlayer();
        $scenario = new Scenario();

        $offline = false;

        $endpoint = $offline ? 'http://127.0.0.1/legacy' : 'http://londonbusroutes.net';

        $scenario
            ->endpoint($endpoint)
            ->visit("url('/details.htm')")
            ->expect('status_code() == 200')
            ->extract('route_numbers', 'css("pre > font > a").extract("_text")')
            ->extract('nodes', 'css("pre > font > *").extract("_text")')
        ;

        $r = $player->run($scenario);

        $routeNumbers = $this->filterRouteNumbers($r['route_numbers']);
        $data = $this->filterRouteDetails($r['nodes'], $routeNumbers);

        return $data;
    }

    /**
     * @param string[] $textValues
     *
     * @return array
     */
    private function filterRouteNumbers(array $textValues)
    {
        $dayRouteNumbers = [];
        $nightRouteNumbers = [];

        foreach ($textValues as $value) {
            if (strlen($value) <= 4) {
                $isNightBus = in_array($value, $dayRouteNumbers, true) || false !== strpos($value, 'N');

                if ($isNightBus) {
                    $dayRouteNumbers[] = $value;
                } else {
                    $nightRouteNumbers[] = $value;
                }
            }
        }

        sort($dayRouteNumbers);
        sort($nightRouteNumbers);

        return [
            'day'   => $dayRouteNumbers,
            'night' => $nightRouteNumbers,
        ];
    }

    /**
     * @return Player
     */
    private function getPlayer()
    {
        if (! $this->player) {
            $this->player = new Player(new Client());
        }

        return $this->player;
    }

    private function filterRouteDetails(array $nodes, array $routeNumbers)
    {
        $lastRouteFound = null;

        $dayDetails = [];
        $nightDetails = [];

        foreach ($nodes as $node) {
            if (in_array($node, $routeNumbers['day'], true) || in_array($node, $routeNumbers['night'], true)) {
                $lastRouteFound = $node;

                continue;
            }

            $node = trim($node);

            if (isset($dayDetails[$lastRouteFound])) {
                $dayDetails[$lastRouteFound][] = $node;
            } else {
                $nightDetails[$lastRouteFound][] = $node;
            }
        }

        ksort($dayDetails);
        ksort($nightDetails);

        return [
            'day'   => $dayDetails,
            'night' => $nightDetails,
        ];
    }
}
