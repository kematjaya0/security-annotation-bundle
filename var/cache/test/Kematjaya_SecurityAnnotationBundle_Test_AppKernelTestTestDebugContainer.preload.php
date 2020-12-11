<?php

// This file has been auto-generated by the Symfony Dependency Injection Component
// You can reference it in the "opcache.preload" php.ini setting on PHP >= 7.4 when preloading is desired

use Symfony\Component\DependencyInjection\Dumper\Preloader;

if (in_array(PHP_SAPI, ['cli', 'phpdbg'], true)) {
    return;
}

require dirname(__DIR__, 3).'/vendor/autoload.php';
require __DIR__.'/ContainerU2F4xhT/Kematjaya_SecurityAnnotationBundle_Test_AppKernelTestTestDebugContainer.php';
require __DIR__.'/ContainerU2F4xhT/getTest_ServiceContainerService.php';
require __DIR__.'/ContainerU2F4xhT/getTest_PrivateServicesLocatorService.php';
require __DIR__.'/ContainerU2F4xhT/getTest_Client_HistoryService.php';
require __DIR__.'/ContainerU2F4xhT/getTest_Client_CookiejarService.php';
require __DIR__.'/ContainerU2F4xhT/getTest_ClientService.php';
require __DIR__.'/ContainerU2F4xhT/getServicesResetterService.php';
require __DIR__.'/ContainerU2F4xhT/getSecrets_VaultService.php';
require __DIR__.'/ContainerU2F4xhT/getErrorHandler_ErrorRenderer_HtmlService.php';
require __DIR__.'/ContainerU2F4xhT/getErrorControllerService.php';
require __DIR__.'/ContainerU2F4xhT/getContainer_EnvVarProcessorsLocatorService.php';
require __DIR__.'/ContainerU2F4xhT/getContainer_EnvVarProcessorService.php';
require __DIR__.'/ContainerU2F4xhT/getCache_SystemClearerService.php';
require __DIR__.'/ContainerU2F4xhT/getCache_SystemService.php';
require __DIR__.'/ContainerU2F4xhT/getCache_GlobalClearerService.php';
require __DIR__.'/ContainerU2F4xhT/getCache_DefaultMarshallerService.php';
require __DIR__.'/ContainerU2F4xhT/getCache_AppClearerService.php';
require __DIR__.'/ContainerU2F4xhT/getCache_AppService.php';
require __DIR__.'/ContainerU2F4xhT/getArgumentResolver_VariadicService.php';
require __DIR__.'/ContainerU2F4xhT/getArgumentResolver_SessionService.php';
require __DIR__.'/ContainerU2F4xhT/getArgumentResolver_ServiceService.php';
require __DIR__.'/ContainerU2F4xhT/getArgumentResolver_RequestAttributeService.php';
require __DIR__.'/ContainerU2F4xhT/getArgumentResolver_RequestService.php';
require __DIR__.'/ContainerU2F4xhT/getArgumentResolver_DefaultService.php';
require __DIR__.'/ContainerU2F4xhT/get_ServiceLocator_Xbsa8iGService.php';
require __DIR__.'/ContainerU2F4xhT/get_Container_Private_FilesystemService.php';
require __DIR__.'/ContainerU2F4xhT/get_Container_Private_CacheClearerService.php';

$classes = [];
$classes[] = 'Kematjaya\SecurityAnnotationBundle\SecurityAnnotationBundle';
$classes[] = 'Symfony\Bundle\FrameworkBundle\FrameworkBundle';
$classes[] = 'Symfony\Component\HttpKernel\CacheClearer\ChainCacheClearer';
$classes[] = 'Symfony\Component\Filesystem\Filesystem';
$classes[] = 'Symfony\Component\DependencyInjection\ServiceLocator';
$classes[] = 'Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadataFactory';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ArgumentResolver';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ArgumentResolver\DefaultValueResolver';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ArgumentResolver\RequestValueResolver';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ArgumentResolver\RequestAttributeValueResolver';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ArgumentResolver\ServiceValueResolver';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ArgumentResolver\SessionValueResolver';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ArgumentResolver\VariadicValueResolver';
$classes[] = 'Symfony\Component\Cache\Adapter\FilesystemAdapter';
$classes[] = 'Symfony\Component\HttpKernel\CacheClearer\Psr6CacheClearer';
$classes[] = 'Symfony\Component\Cache\Marshaller\DefaultMarshaller';
$classes[] = 'Symfony\Component\Cache\Adapter\AdapterInterface';
$classes[] = 'Symfony\Component\Cache\Adapter\AbstractAdapter';
$classes[] = 'Symfony\Component\DependencyInjection\EnvVarProcessor';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Controller\ControllerResolver';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\DebugHandlersListener';
$classes[] = 'Symfony\Component\HttpKernel\Debug\FileLinkFormatter';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\DisallowRobotsIndexingListener';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ErrorController';
$classes[] = 'Symfony\Component\ErrorHandler\ErrorRenderer\HtmlErrorRenderer';
$classes[] = 'Symfony\Component\EventDispatcher\EventDispatcher';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\ErrorListener';
$classes[] = 'Symfony\Component\HttpKernel\HttpKernel';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\LocaleListener';
$classes[] = 'Symfony\Component\HttpKernel\Log\Logger';
$classes[] = 'Symfony\Component\HttpFoundation\RequestStack';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\ResponseListener';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Secrets\SodiumVault';
$classes[] = 'Symfony\Component\DependencyInjection\ContainerInterface';
$classes[] = 'Symfony\Component\HttpKernel\DependencyInjection\ServicesResetter';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\StreamedResponseListener';
$classes[] = 'Symfony\Bundle\FrameworkBundle\KernelBrowser';
$classes[] = 'Symfony\Component\BrowserKit\CookieJar';
$classes[] = 'Symfony\Component\BrowserKit\History';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Test\TestContainer';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\TestSessionListener';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\ValidateRequestListener';

Preloader::preload($classes);
