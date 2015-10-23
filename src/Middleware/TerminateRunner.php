<?php
/**
 * Created by PhpStorm.
 * User: Marco Bunge
 * Date: 21.10.2015
 * Time: 12:30
 */

namespace Blast\Application\Middleware;


use Blast\Application\ApplicationInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\TerminableInterface;

class TerminateRunner extends AbstractRunner implements RunnerInterface
{

    public function run(ApplicationInterface $application, Request $request, Response $response, callable $callback = null){
        foreach ($this->getCollection() as $middleware) {
            $middleware = $application->getContainer()->get($middleware);

            if ($middleware instanceof TerminableInterface) {
                $middleware->terminate($request, $response);
            } else {
                throw new \InvalidArgumentException(sprintf('Unable to call middleware %s', gettype($middleware)));
            }
        }
    }

}