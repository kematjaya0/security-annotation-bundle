<?php

namespace Kematjaya\SecurityAnnotationBundle\Test;

use Kematjaya\SecurityAnnotationBundle\SecurityAnnotationBundle;
use Symfony\Bundle\FrameworkBundle\FrameworkBundle;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * @author Nur Hidayatullah <kematjaya0@gmail.com>
 */
class AppKernelTest extends Kernel
{
    public function registerBundles()
    {
        return [
            new SecurityAnnotationBundle(),
            new FrameworkBundle()
        ];
    }
    
    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(function (ContainerBuilder $container) use ($loader) 
        {
            $loader->load(__DIR__ .'/config.yml');
            
            $container->addObjectResource($this);
        });
    }
}
