<?php
/**
 * Created by PhpStorm.
 * User: Marco Bunge
 * Date: 04.11.2015
 * Time: 14:35
 */

namespace Blast\Application\Kernel;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class Foundation extends AbstractKernel implements KernelInterface
{

    /**
     * Dispatch the application
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @return mixed
     */
    public function dispatch(ServerRequestInterface $request, ResponseInterface $response)
    {
        return $this->getStrategy()->dispatch($this, $request, $response);
    }

}
