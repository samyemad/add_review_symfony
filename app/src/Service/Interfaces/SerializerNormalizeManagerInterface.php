<?php

namespace App\Service\Interfaces;


interface SerializerNormalizeManagerInterface
{
    public function generate($serializer,$entity,$groupName): array;
}
