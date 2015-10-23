<?php
/**
 * Created by PhpStorm.
 * User: Marco Bunge
 * Date: 19.10.2015
 * Time: 14:04
 */

namespace Blast\Application\Middleware;


use SplStack;

class Collection
{
    /**
     * @var SplStack
     */
    private $stack = null;

    /**
     * @var SplStack[]
     */
    private $mappedStack = [];

    const WILDCARD_PLACEHOLDER = '*';

    public function __construct()
    {
        $this->stack = new SplStack();
    }

    public function add($middleware, array $mappings = [])
    {
        $this->stack->push($middleware);

        if (count($mappings) === 0) {
            return $this;
        }

        foreach ($mappings as $map) {
            $mappedStack = $this->getMap($map);
            $mappedStack->push($middleware);
        }

        return $this;
    }

    /**
     * @param $term
     * @param bool $resolve
     * @return bool
     * @internal param $map
     */
    public function hasMap($term, $resolve = false)
    {
        if($resolve === true){
            $maps = array_keys($this->mappedStack);
            foreach($maps as $map){
                if(0 === strpos($map, $term)){
                    return true;
                }
            }
        }
        return isset($this->mappedStack[$term]);
    }

    /**
     * @param $map
     * @return SplStack
     */
    protected function getMap($map)
    {
        return $this->hasMap($map) ? $this->mappedStack[$map] : new SplStack();
    }

    public function get($map = null){
        return $map !== null && $this->hasMap($map) ? $this->getMap($map) : $this->stack;
    }

}