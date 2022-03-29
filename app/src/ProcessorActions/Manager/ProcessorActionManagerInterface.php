<?php
namespace App\ProcessorActions\Manager;

use Symfony\Component\Finder\SplFileInfo;

interface ProcessorActionManagerInterface
{
    /**
     * Returns a list of available ProcessorActions.
     * @return array
     */
    public function getProcessorActions();
    /**
     * Returns one processorAction by name
     * @param $name
     * @return arrays
     * @throws \Exception
     */
    public function getProcessorAction($name);
    /**
     * Creates a processorAction
     * @param $name
     * @return ProcessorActionInterface
     * @throws \Exception
     */
    public function create($name);
}