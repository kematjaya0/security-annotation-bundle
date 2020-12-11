<?php

namespace Kematjaya\SecurityAnnotationBundle\Test;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * @author Nur Hidayatullah <kematjaya0@gmail.com>
 */
class SecurityAnnotationBundleTest extends WebTestCase
{
    public function testInstanceBundle()
    {
        $client = parent::createClient();
        $container = $client->getContainer();
        $this->assertInstanceOf(ContainerInterface::class, $container);
    }
    
    public static function getKernelClass() 
    {
        return AppKernelTest::class;
    }
}
