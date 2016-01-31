<?php

namespace LondonBusRoutes\AppBundle\Entity;

use Sylius\Component\Resource\Model\ResourceInterface;

class Frequency implements ResourceInterface
{
    /**
     * @var mixed
     */
    private $id;

    /**
     * @var string
     */
    private $period;

    /**
     * @var integer
     */
    private $lowerBound;

    /**
     * @var integer
     */
    private $upperBound;

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * @param string $period
     */
    public function setPeriod($period)
    {
        $this->period = $period;
    }

    /**
     * @return int
     */
    public function getLowerBound()
    {
        return $this->lowerBound;
    }

    /**
     * @param int $lowerBound
     */
    public function setLowerBound($lowerBound)
    {
        $this->lowerBound = $lowerBound;
    }

    /**
     * @return int
     */
    public function getUpperBound()
    {
        return $this->upperBound;
    }

    /**
     * @param int $upperBound
     */
    public function setUpperBound($upperBound)
    {
        $this->upperBound = $upperBound;
    }
}
