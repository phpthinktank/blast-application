<?php
/**
 * Created by PhpStorm.
 * User: Marco Bunge
 * Date: 21.10.2015
 * Time: 12:22
 */

namespace Blast\Application\Middleware\Runner;


use Blast\Application\KernelInterface;
use Blast\Application\Middleware\Collection;
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

    abstract public function run(KernelInterface $application, Request $request, Response $response, callable $callback = null);

}