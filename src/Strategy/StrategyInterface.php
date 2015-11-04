<?php
/**
 * Created by PhpStorm.
 * User: Marco Bunge
 * Date: 04.11.2015
 * Time: 14:44
 */

namespace Blast\Application\Strategy;


use Blast\Application\Kernel\KernelInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

interface StrategyInterface
{
    /**
     * @param KernelInterface $kernel
     * @param RequestInterface $request
     * @param ResponseInterface $response
     * @return ResponseInterface
     */
    public function dispatch(KernelInterface $kernel, RequestInterface $request, ResponseInterface $response);

}
