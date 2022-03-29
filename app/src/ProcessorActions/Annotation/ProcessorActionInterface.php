<?php

namespace App\ProcessorActions\Annotation;

use Symfony\Component\Finder\SplFileInfo;

interface ProcessorActionInterface
{
    /**
     * Returns the name of specified Management.
     *
     * @return array
     */
    public function getName():string;

}