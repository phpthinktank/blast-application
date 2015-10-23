<?php
/**
 * Created by PhpStorm.
 * User: Marco Bunge
 * Date: 19.10.2015
 * Time: 11:32
 */

namespace Blast\Application;

use League\Container\ContainerAwareInterface;
use League\Event\EmitterAwareInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\HttpKernelInterface;

interface ApplicationInterface extends ContainerAwareInterface
{

    public function init();
    public function dispatch(Request $request, Response $response);

}