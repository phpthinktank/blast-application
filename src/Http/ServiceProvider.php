<?php
/**
 * Created by PhpStorm.
 * User: Marco Bunge
 * Date: 21.10.2015
 * Time: 11:42
 */

namespace Blast\Application\Http;


use Blast\Application\ApplicationInterface;
use Blast\Application\ErrorHandlerInterface;
use Blast\Application\Application;
use League\Container\ServiceProvider\AbstractServiceProvider;
use League\Container\ServiceProvider\BootableServiceProviderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\HttpKernelInterface;

class ServiceProvider extends AbstractServiceProvider implements BootableServiceProviderInterface
{

    /**
     * @var array
     */
    protected $provides = [
        // ...
    ];

    /**
     * Method will be invoked on registration of a service provider implementing
     * this interface. Provides ability for eager loading of Service Providers.
     *
     * @return void
     */
    public function boot()
    {
        $container = $this->getContainer();
        $container->add(ErrorHandlerInterface::class, ErrorHandler::class);
        $container->add(ApplicationInterface::class, ApplicationInterface::class);
        $container->add(Request::class);
        $container->add(Response::class);
        $container->add(MiddlewareCollection::class);
        $container->add(HttpKernelInterface::class, Application::class)
            ->withArgument(ApplicationInterface::class)
            ->withArgument(Request::class)
            ->withArgument(Response::class);
    }

    /**
     * Use the register method to register items with the container via the
     * protected $this->container property or the `getContainer` method
     * from the ContainerAwareTrait.
     *
     * @return void
     */
    public function register()
    {
        // TODO: Implement register() method.
    }
}