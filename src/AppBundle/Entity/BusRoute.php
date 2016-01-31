<?php

namespace LondonBusRoutes\AppBundle\Entity;

use Sylius\Component\Resource\Model\ResourceInterface;

class BusRoute implements ResourceInterface
{
    /**
     * @var mixed
     */
    private $id;

    /**
     * @var string
     */
    private $number;

    /*
     * @var ServiceOperation[];
     *
    private $serviceOperations;*/

    /**
     * @var string[]
     */
    private $vehicleTypes = [];

    /**
     * @var string[]
     */
    private $operationGarages = [];

    /**
     * @var integer
     */
    private $pvr;

    /**
     * @var integer
     */
    private $distance;

    /**
     * @var integer
     */
    private $journeyTimeLowerBound;

    /**
     * @var integer
     */
    private $journeyTimeUpperBound;

    /**
     * @var Frequency[]
     */
    private $frequencies;

    /**
     * @var \DateTime
     */
    private $timetableDate;

    /**
     * @var string
     */
    private $contractSpecification;

    /**
     * @var \DateTime
     */
    private $contractDate;

    /**
     * @var Footnote[]
     */
    private $footnotes;

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
    public function __toString()
    {
        return $this->number;
    }

    /**
     * @return \string[]
     */
    public function getVehicleTypes()
    {
        return $this->vehicleTypes;
    }

    /**
     * @param \string[] $vehicleTypes
     */
    public function setVehicleTypes($vehicleTypes)
    {
        $this->vehicleTypes = $vehicleTypes;
    }

    /**
     * @return \string[]
     */
    public function getOperationGarages()
    {
        return $this->operationGarages;
    }

    /**
     * @param \string[] $operationGarages
     */
    public function setOperationGarages($operationGarages)
    {
        $this->operationGarages = $operationGarages;
    }

    /**
     * @return int
     */
    public function getPvr()
    {
        return $this->pvr;
    }

    /**
     * @param int $pvr
     */
    public function setPvr($pvr)
    {
        $this->pvr = $pvr;
    }

    /**
     * @return int
     */
    public function getDistance()
    {
        return $this->distance;
    }

    /**
     * @param int $distance
     */
    public function setDistance($distance)
    {
        $this->distance = $distance;
    }

    /**
     * @return int
     */
    public function getJourneyTimeLowerBound()
    {
        return $this->journeyTimeLowerBound;
    }

    /**
     * @param int $journeyTimeLowerBound
     */
    public function setJourneyTimeLowerBound($journeyTimeLowerBound)
    {
        $this->journeyTimeLowerBound = $journeyTimeLowerBound;
    }

    /**
     * @return int
     */
    public function getJourneyTimeUpperBound()
    {
        return $this->journeyTimeUpperBound;
    }

    /**
     * @param int $journeyTimeUpperBound
     */
    public function setJourneyTimeUpperBound($journeyTimeUpperBound)
    {
        $this->journeyTimeUpperBound = $journeyTimeUpperBound;
    }

    /**
     * @return Frequency[]
     */
    public function getFrequencies()
    {
        return $this->frequencies;
    }

    /**
     * @param Frequency[] $frequencies
     */
    public function setFrequencies($frequencies)
    {
        $this->frequencies = $frequencies;
    }

    /**
     * @return \DateTime
     */
    public function getTimetableDate()
    {
        return $this->timetableDate;
    }

    /**
     * @param \DateTime $timetableDate
     */
    public function setTimetableDate($timetableDate)
    {
        $this->timetableDate = $timetableDate;
    }

    /**
     * @return string
     */
    public function getContractSpecification()
    {
        return $this->contractSpecification;
    }

    /**
     * @param string $contractSpecification
     */
    public function setContractSpecification($contractSpecification)
    {
        $this->contractSpecification = $contractSpecification;
    }

    /**
     * @return \DateTime
     */
    public function getContractDate()
    {
        return $this->contractDate;
    }

    /**
     * @param \DateTime $contractDate
     */
    public function setContractDate($contractDate)
    {
        $this->contractDate = $contractDate;
    }

    /**
     * @return Footnote[]
     */
    public function getFootnotes()
    {
        return $this->footnotes;
    }

    /**
     * @param Footnote[] $footnotes
     */
    public function setFootnotes($footnotes)
    {
        $this->footnotes = $footnotes;
    }
}
