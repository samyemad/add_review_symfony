<?php

namespace App\ProcessorActions\Manager;

use App\ProcessorActions\Discovery\ProcessorActionDiscoveryInterface;

class ProcessorActionManager implements ProcessorActionManagerInterface
{
    /**
     * @var ProcessorActionDiscoveryInterface
     */
    private $discovery;

    public function __construct(ProcessorActionDiscoveryInterface $processorActionDiscovery)
    {
        $this->discovery = $processorActionDiscovery;
    }
    /**
     * Returns a list of available ProcessorActions.
     *
     * @return array
     */
    public function getProcessorActions()
    {
        return $this->discovery->getProcessorActions();
    }
    /**
     * Returns one processorAction by name
     *
     * @param $name
     * @return array
     * @throws \Exception
     */
    public function getProcessorAction($name):array
    {
        $processorActions = $this->discovery->getProcessorActions();
        if (isset($processorActions[$name]))
        {
            return $processorActions[$name];
        }
        throw new \Exception('ProcessorAction not found.');
    }
    /**
     * Creates a processorAction
     * @param $name
     * @return ProcessorActionInterface
     * @throws \Exception
     */
    public function create($name)
    {
        $processorActions = $this->discovery->getProcessorActions();
        if (array_key_exists($name, $processorActions))
        {
            $class = $processorActions[$name]['class'];
            if (!class_exists($class))
            {
                throw new \Exception('ProcessorAction class does not exist.');
            }
            return new $class();
        }
        throw new \Exception('ProcessorAction does not exist.');
    }
}