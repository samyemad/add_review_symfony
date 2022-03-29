<?php
namespace App\Service\Serializer;

use Symfony\Component\DependencyInjection\ServiceLocator;
use App\Service\Interfaces\HandlerCollectionInterface;

class HandlerCollection implements  HandlerCollectionInterface
{

    private $locator;
    public function __construct(ServiceLocator $locator)
    {
        $this->locator = $locator;

    }

    public function serialize($entity,$groupName):array
    {
        $serialize=$this->locator->get('handler_serializer');
        $serializerResult=$serialize->generate();
        $normalizer=$this->locator->get('handler_serializer_normalizer');
        $data=$normalizer->generate($serializerResult,$entity,$groupName);
        return $data;
    }
}