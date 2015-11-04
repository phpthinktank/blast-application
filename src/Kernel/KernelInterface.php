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
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

interface KernelInterface
{

    /**
     * @return ContainerInterface
     */
    public function getContainer();

    /**
     * @param ContainerInterface $container
     * @return Foundation
     */
    public function setContainer(ContainerInterface $container);

    /**
     * @return array
     */
    public function getConfig();

    /**
     * @param array $config
     * @return Foundation
     */
    public function setConfig(array $config);

    /**
     * @return StrategyInterface
     */
    public function getStrategy();

    /**
     * @param StrategyInterface $strategy
     * @return Foundation
     */
    public function setStrategy(StrategyInterface $strategy);

    /**
     * Dispatch the application
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @return mixed
     */
    public function dispatch(ServerRequestInterface $request, ResponseInterface $response);

}
