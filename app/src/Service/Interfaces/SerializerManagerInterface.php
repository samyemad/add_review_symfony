<?php

namespace App\Service\Interfaces;

use Symfony\Component\Serializer\Serializer;

interface SerializerManagerInterface
{
    public function generate(): Serializer;
}
