<?php
namespace App\ProcessorActions\Types;

use Doctrine\ORM\EntityManagerInterface;
use App\Service\Serializer\HandlerCollection;

interface ProcessorActionTypeViewInterface
{
    /**
     * Does the processorAction
     *
     * @return NULL
     */
    public function run(EntityManagerInterface $em,HandlerCollection $handlerCollection): array;
}