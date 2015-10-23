<?php
/**
 * Created by PhpStorm.
 * User: Marco Bunge
 * Date: 19.10.2015
 * Time: 08:44
 */

namespace Blast\Application\Http;

use Blast\Application\ApplicationInterface;
use Blast\Application\Middleware\AfterInterface;
use Blast\Application\Middleware\BeforeInterface;
use Blast\Application\Middleware\Collection;
use Blast\Application\Middleware\FilterRunner;
use Blast\Application\Middleware\TerminateRunner;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Component\HttpKernel\TerminableInterface;

class Kernel implements HttpKernelInterface, TerminableInterface
{

    protected $application;
    protected $response;
    protected $request;
    protected $collection;

    public function __construct(ApplicationInterface $application)
    {
        $this->collection = new Collection();
        $this->application = $application;
    }

    /**
     * @return ApplicationInterface
     */
    public function getApplication()
    {
        return $this->application;
    }

    /**
     * @param ApplicationInterface $application
     */
    public function setApplication($application)
    {
        $this->application = $application;
    }

    /**
     * @return Response
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @param Response $response
     */
    public function setResponse($response)
    {
        $this->response = $response;
    }

    /**
     * @return Request
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @param Request $request
     */
    public function setRequest($request)
    {
        $this->request = $request;
    }

    /**
     * @return Collection
     */
    public function getCollection()
    {
        return $this->collection;
    }

    /**
     * @param Collection $collection
     */
    public function setCollection($collection)
    {
        $this->collection = $collection;
    }

    /**
     * Handles a Request to convert it to a Response.
     *
     * When $catch is true, the implementation must catch all exceptions
     * and do its best to convert them to a Response instance.
     *
     * @param Request $request A Request instance
     * @param int $type The type of the request
     *                         (one of HttpKernelInterface::MASTER_REQUEST or HttpKernelInterface::SUB_REQUEST)
     * @param bool $catch Whether to catch exceptions or not
     *
     * @return Response A Response instance
     *
     * @throws \Exception When an Exception occurs during processing
     */
    public function handle(Request $request, $type = self::MASTER_REQUEST, $catch = true)
    {
        $response = new Response();
        $callback = function (
            ApplicationInterface $application,
            Request $request,
            Response $response
        ) {
            return $application->dispatch($request, $response);
        };

        $runner = new FilterRunner($this->getCollection());
        $response = $runner->run($this->getApplication(), $request, $response, $callback);

        return $response;
    }

    /**
     * Terminates a request/response cycle.
     *
     * Should be called after sending the response and before shutting down the kernel.
     *
     * @param Request $request A Request instance
     * @param Response $response A Response instance
     */
    public function terminate(Request $request, Response $response)
    {
        $runner = new TerminateRunner($this->getCollection());
        $runner->run($this->getApplication(), $request, $response);
    }
}