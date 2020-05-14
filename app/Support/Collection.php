<?php


namespace App\Support;


use Exception;
use Traversable;

class Collection implements \IteratorAggregate, \JsonSerializable
{
    protected $items = [];

    public function __construct(array $items = [])
    {
        $this->items = $items;
    }

    public function get()
    {
        return $this->items;
    }

    public function count()
    {
        return $this->items;
    }

    public function getIterator()
    {
        // TODO: Implement getIterator() method.
        return new \ArrayIterator($this->items);
    }
    public function merge(Collection $collection)
    {
        return $this->add($collection->get());
    }
    public function add(array $items)
    {
          $this->items = array_merge($this->get(), $items);
    }

    public function toJson()
    {
        return json_encode($this->items, true);
    }

    public function jsonSerialize()
    {
        // TODO: Implement jsonSerialize() method.
        return $this->items;
    }
}