<?php
/**
 * Created by PhpStorm.
 * User: Marco Bunge
 * Date: 10.07.2015
 * Time: 14:14
 */

namespace Blast\Application\Facades;


use Blast\Application\ApplicationInterface;
use Blast\Facades\AbstractFacade;

class App extends AbstractFacade
{
    protected static function accessor()
    {
        return ApplicationInterface::class;
    }
}