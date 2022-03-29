<?php

namespace App\Service\Interfaces;

use App\Entity\Interfaces\EntityInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

interface GenerateEventInterface
{
    public function generate(string $value, EntityInterface $entity,EventDispatcherInterface $eventDispatcher): void;
}
