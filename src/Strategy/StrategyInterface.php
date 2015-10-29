<?php
/**
 * Created by PhpStorm.
 * User: Marco Bunge
 * Date: 29.10.2015
 * Time: 08:11
 */

namespace Blast\Application\Kernel;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\HttpKernelInterface;

interface StrategyInterface
{
    /**
     * The resolver is taking your request and is executing custom logic
     * @param HttpKernelInterface $kernel
     * @param Request $request
     * @param Response $response
     * @return mixed
     */
    public function run(HttpKernelInterface $kernel, Request $request, Response $response);

}