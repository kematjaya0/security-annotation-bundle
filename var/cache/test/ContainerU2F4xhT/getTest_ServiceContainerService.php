<?php

namespace ContainerU2F4xhT;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getTest_ServiceContainerService extends Kematjaya_SecurityAnnotationBundle_Test_AppKernelTestTestDebugContainer
{
    /**
     * Gets the public 'test.service_container' shared service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Test\TestContainer
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->services['test.service_container'] = new \Symfony\Bundle\FrameworkBundle\Test\TestContainer(($container->services['kernel'] ?? $container->get('kernel', 1)), 'test.private_services_locator');
    }
}
