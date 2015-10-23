<?php
/**
 * Created by PhpStorm.
 * User: Marco Bunge
 * Date: 21.10.2015
 * Time: 12:23
 */

namespace Blast\Application\Middleware;


use Blast\Application\ApplicationInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

interface RunnerInterface
{

    /**
     * Execute runner and return response or boolean
     * @param ApplicationInterface $application
     * @param Request $request
     * @param Response $response
     * @param callable|null $callback
     * @return Response|bool
     */
    public function run(ApplicationInterface $application, Request $request, Response $response, callable $callback = null);

}