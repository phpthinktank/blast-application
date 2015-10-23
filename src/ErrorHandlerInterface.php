<?php
/**
 * Created by PhpStorm.
 * User: Marco Bunge
 * Date: 19.10.2015
 * Time: 13:21
 */

namespace Blast\Application;


use SebastianBergmann\RecursionContext\Exception;

interface ErrorHandlerInterface
{

    public function handle(\Exception $exception, ApplicationInterface $application);

}