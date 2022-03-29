<?php

namespace App\Service\Interfaces;

interface RetrieveErrorsInterface
{
    public static function show(array $formErrors): array;
}
