<?php

namespace App\Service\Interfaces;

use App\Entity\Interfaces\EntityInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

interface HandlerCollectionInterface
{
    public function serialize($entity,$groupName):array;
}
