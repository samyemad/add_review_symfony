<?php

namespace App\Service\Interfaces;

interface TransformerInterface
{
    public function transform(string $value): string;
}
