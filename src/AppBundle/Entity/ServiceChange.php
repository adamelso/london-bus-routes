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
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
}
