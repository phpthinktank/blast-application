<?php
/**
 * Created by PhpStorm.
 * User: Marco Bunge
 * Date: 19.10.2015
 * Time: 10:43
 */

namespace Blast\Application\Middleware;


use Blast\Application\ApplicationInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\HttpKernelInterface;

interface BeforeInterface
{

    /**
     * @param ApplicationInterface $app
     * @param Request $request
     * @param Response $response
     * @return mixed
     */
    public function before(ApplicationInterface $app, Request $request);

}