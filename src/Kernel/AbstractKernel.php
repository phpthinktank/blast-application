<?php
/**
 * Created by PhpStorm.
 * User: Marco Bunge
 * Date: 04.11.2015
 * Time: 14:35
 */

namespace Blast\Application\Kernel;


use Blast\Application\Strategy\StrategyInterface;
use Interop\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

abstract class AbstractKernel implements KernelInterface
{

    /**
     * @var array
     */
    private $config;

    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * @var StrategyInterface
     */
    private $strategy;

    /**
     * @return ContainerInterface
     */
    public function getContainer()
    {
        return $this->container;
    }

    /**
     * @param ContainerInterface $container
     * @return Foundation
     */
    public function setContainer(ContainerInterface $container)
    {
        $this->container = $container;
        return $this;
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
     * @return Foundation
     */
    public function setConfig(array $config)
    {
        $this->config = $config;
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
     * @return AbstractKernel
     */
    public function setStrategy(StrategyInterface $strategy)
    {
        $this->strategy = $strategy;
        return $this;
    }

    /**
     * Dispatch the application
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @return mixed
     */
    abstract public function dispatch(ServerRequestInterface $request, ResponseInterface $response);

}
