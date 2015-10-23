<?php
/**
 * Created by PhpStorm.
 * User: Marco Bunge
 * Date: 21.10.2015
 * Time: 12:22
 */

namespace Blast\Application\Middleware;


use Blast\Application\ApplicationInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

abstract class AbstractRunner implements RunnerInterface
{

    /**
     * @var Collection
     */
    private $collection = null;

    /**
     * Runner constructor.
     */
    public function __construct(Collection $collection)
    {
        $this->collection;
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

    abstract public function run(ApplicationInterface $application, Request $request, Response $response, callable $callback = null);

}