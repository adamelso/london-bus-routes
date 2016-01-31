<?php

namespace LondonBusRoutes\AppBundle\Entity;

use Sylius\Component\Resource\Model\ResourceInterface;

class ServiceChange implements ResourceInterface
{
    /**
     * @var mixed
     */
    private $id;

    /**
     * @var BusRoute
     */
    private $busRoute;

    /**
     * @var \DateTime
     */
    private $expectedDate;

    /**
     * @var \DateTime
     */
    private $updated;

    /**
     * @var string
     */
    private $type;

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }
}
