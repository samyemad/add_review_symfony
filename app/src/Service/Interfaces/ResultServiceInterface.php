<?php

namespace App\Service\Interfaces;

use App\Entity\Interfaces\EntityInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

interface ResultServiceInterface
{
    public function get(string $class,string $type,array $options): array;
}
