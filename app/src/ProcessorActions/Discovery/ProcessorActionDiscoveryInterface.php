<?php

namespace App\ProcessorActions\Discovery;

use Symfony\Component\Finder\SplFileInfo;

interface ProcessorActionDiscoveryInterface
{
    /**
     * Returns a list of available ProcessorActions.
     *
     * @return array
     */
    public function getProcessorActions():array;
}