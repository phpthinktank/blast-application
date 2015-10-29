<?php
/**
 * Created by PhpStorm.
 * User: Marco Bunge
 * Date: 19.10.2015
 * Time: 11:32
 */

namespace Blast\Application;

use Blast\Application\Kernel\StrategyInterface;
use Blast\Application\Middleware\Collection;
use Interop\Container\ContainerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\HttpKernelInterface;

interface KernelInterface extends HttpKernelInterface
{

    public function __construct(array $config = []);

    /**
     * @return array
     */
    public function getConfig();

    /**
     * @param array $config
     * @return $this
     */
    public function setConfig($config);

    /**
     * @return ContainerInterface
     */
    public function getContainer();

    /**
     * @param ContainerInterface $container
     * @return $this
     */
    public function setContainer($container);

    /**
     * @return Response
     */
    public function getResponse();

    /**
     * @param Response $response
     * @return KernelInterface
     */
    public function setResponse($response);

    /**
     * @return StrategyInterface
     */
    public function getStrategy();

    /**
     * @param StrategyInterface $strategy
     * @return KernelInterface
     */
    public function setStrategy($strategy);

    /**
     * @return Collection
     */
    public function getMiddlewareCollection();

    /**
     * @param Collection $collection
     * return KernelInterface
     */
    public function setMiddlewareCollection($collection);

}