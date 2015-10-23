<?php
/**
 * Created by PhpStorm.
 * User: Marco Bunge
 * Date: 19.10.2015
 * Time: 15:27
 */

namespace Blast\Application;


class ErrorHandler implements ErrorHandlerInterface
{

    public function handle(\Exception $exception, ApplicationInterface $application)
    {
        http_response_code(500);
        echo $exception->getMessage();
        exit(1);
    }
}