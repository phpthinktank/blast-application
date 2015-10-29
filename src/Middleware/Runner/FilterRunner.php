<?php
/**
 * Created by PhpStorm.
 * User: Marco Bunge
 * Date: 21.10.2015
 * Time: 12:08
 */

namespace Blast\Application\Middleware\Runner;


use Blast\Application\KernelInterface;
use Blast\Application\Middleware\AfterInterface;
use Blast\Application\Middleware\BeforeInterface;
use Blast\Facades\FacadeFactory;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class FilterRunner extends AbstractRunner implements RunnerInterface
{

    public function run(KernelInterface $application, Request $request, Response $response, callable $callback = null){
        $container = $application->getContainer();
        $collection = $this->getCollection();

        //run before middleware
        //middleware is modifying the request
        foreach ($collection as $middleware) {
            $middleware = $container->get($middleware);
            if ($middleware instanceof BeforeInterface) {
                $middleware->before($application, $request);
            }
        }

        $response = is_callable($callback) ? call_user_func_array($callback, [$application, $request, $response]) : $response;

        //run after middleware
        //middleware is modifying the request and response
        foreach ($collection as $middleware) {
            $middleware = $container->get($middleware);
            if ($middleware instanceof AfterInterface) {
                $middleware->after($application, $request, $response);
            }
        }

        return $response;
    }

}