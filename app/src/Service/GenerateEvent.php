<?php
namespace App\Service;
use App\Event\MoviePlacedEvent;
use App\Service\Interfaces\GenerateEventInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use App\Entity\Interfaces\EntityInterface;

class GenerateEvent implements GenerateEventInterface
{

    public function generate(string $value,EntityInterface $entity,EventDispatcherInterface $eventDispatcher): void
    {
        $event = new $value($entity);
        $eventDispatcher->dispatch($event, $value::NAME);
    }
}

