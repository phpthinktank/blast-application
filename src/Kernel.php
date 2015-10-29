<?php
/*
*
* (c) Marco Bunge <marco_bunge@web.de>
*
* For the full copyright and license information, please view the LICENSE.txt
* file that was distributed with this source code.
*
* Date: 19.10.2015
* Time: 22:55
*/

namespace Blast;

use Blast\Application\KernelInterface;
use Blast\Application\Middleware\Runner\FilterRunner;
use Blast\Application\Middleware\Runner\TerminateRunner;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\HttpKernelInterface;

class Kernel extends AbstractKernel
{

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
            KernelInterface $application,
            Request $request,
            Response $response
        ) {
            return $application->getStrategy()->run($application, $request, $response);
        };

        $runner = new FilterRunner($this->getMiddlewareCollection());
        $response = $runner->run($this, $request, $response, $callback);

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
        $runner = new TerminateRunner($this->getMiddlewareCollection());
        $runner->run($this, $request, $response);
    }
}