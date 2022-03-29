<?php

namespace App\ProcessorActions\Discovery;

use App\ProcessorActions\Annotation\ProcessorAction;
use Doctrine\Common\Annotations\Reader;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;
use Symfony\Component\HttpKernel\Config\FileLocator;

class ProcessorActionDiscovery implements ProcessorActionDiscoveryInterface
{
    /**
     * @var string
     */
    private $namespace;
    /**
     * @var string
     */
    private $directory;
    /**
     * @var Reader
     */
    private $annotationReader;

    /**
     * The Kernel root directory
     * @var string
     */
    private $rootDir;
    /**
     * The Annontation Class
     * @var mixed
     */
    private $annontationClass;
    /**
     * @var array
     */
    private $processorActions = [];
    /**
     * ProcessorActionDiscovery constructor.
     * @param $namespace
     *   The namespace of the processorActions
     * @param $directory
     *   The directory of the processorActions
     * @param $rootDir
     * @param Reader $annotationReader
     */
    public function __construct($namespace, $directory,$annontationClass, $rootDir, Reader $annotationReader)
    {
        $this->namespace = $namespace;
        $this->annotationReader = $annotationReader;
        $this->directory = $directory;
        $this->rootDir = $rootDir;
        $this->annontationClass= $annontationClass;
    }
    /**
     * Returns all the processorActions
     */
    public function getProcessorActions(): array
    {
        if (!$this->processorActions)
        {
            $this->discoverProcessorActions();
        }
        return $this->processorActions;
    }
    /**
     * Discovers processorActions
     */
    private function discoverProcessorActions()
    {
        $path = $this->rootDir . '/src/' . $this->directory.'/Types';
        $finder = new Finder();
        $finder->files()->in($path);
        /** @var SplFileInfo $file */
        foreach ($finder as $file) {
            $class = $this->namespace . '\\Types\\' . $file->getBasename('.php');
            if($file->getBasename('.php')  != $this->annontationClass)
            {
                $annotation = $this->annotationReader->getClassAnnotation(new \ReflectionClass($class), ProcessorAction::class);
                if (!$annotation)
                {
                    continue;
                }
                /** @var ProcessorAction $annotation */
                $this->processorActions[$annotation->getName()] = [
                    'class' => $class,
                    'annotation' => $annotation,
                ];
            }
        }
    }
}