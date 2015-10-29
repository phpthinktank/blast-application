<?php
/**
 * Created by PhpStorm.
 * User: Marco Bunge
 * Date: 29.10.2015
 * Time: 08:33
 */

namespace Blast;


use Blast\Application\Kernel\StrategyInterface;
use Blast\Application\KernelInterface;
use Blast\Application\Middleware\Collection;
use Interop\Container\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\HttpKernelInterface;

abstract class AbstractKernel implements KernelInterface
{

    /**
     * An array of configuration
     * @var array
     */
    private $config;

    /**
     * @var Response
     */
    private $response;

    /**
     * @var StrategyInterface
     */
    private $strategy;

    /**
     * @var Collection
     */
    private $middlewareCollection;

    /**
     * @var ContainerInterface
     */
    private $container;

    public function __construct(array $config = [])
    {
        $this->setConfig($config);
    }
    /**
     * @return array
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * @param array $config
     * @return $this
     */
    public function setConfig($config)
    {
        $this->config = $config;
        return $this;
    }

    /**
     * @return ContainerInterface
     */
    public function getContainer()
    {
        return $this->container;
    }

    /**
     * @param ContainerInterface $container
     * @return $this
     */
    public function setContainer($container)
    {
        $this->container = $container;
    }

    /**
     * @return Response
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @param Response $response
     * @return Kernel
     */
    public function setResponse($response)
    {
        $this->response = $response;
        return $this;
    }

    /**
     * @return StrategyInterface
     */
    public function getStrategy()
    {
        return $this->strategy;
    }

    /**
     * @param StrategyInterface $strategy
     * @return Kernel
     */
    public function setStrategy($strategy)
    {
        $this->strategy = $strategy;
        return $this;
    }

    /**
     * @return Collection
     */
    public function getMiddlewareCollection()
    {
        return $this->middlewareCollection;
    }

    /**
     * @param Collection $collection
     */
    public function setMiddlewareCollection($collection)
    {
        $this->middlewareCollection = $collection;
    }

    abstract public function handle(Request $request, $type = HttpKernelInterface::MASTER_REQUEST, $catch = true);
}