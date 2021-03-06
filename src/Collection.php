<?php

namespace Okpose\Algorithm;

use Okpose\Algorithm\Exceptions\InvalidSortException;

class Collection implements \ArrayAccess
{
    const SORT_METHOD_BUBBLE_MERGE = 'BubbleMerge';
    const SORT_METHOD_RECURSION_MERGE = 'RecursionMerge';
    const SORT_METHOD_INSERTION = 'Insertion';
    const SORT_METHOD_SELECTION = 'Selection';
    const SORT_METHOD_BUBBLE = 'Bubble';
    const SORT_METHOD_SHELL = 'Shell';
    const SORT_METHOD_INDEXMAXHEAP = 'IndexMaxHeap';

    private $options = ['method' => self::SORT_METHOD_BUBBLE_MERGE, 'showProfile' => false];
    private $arr = [];
    public function __construct($arr)
    {
        $this->arr = $arr;
    }

    public function offsetUnset($offset)
    {
        unset($this->arr[$offset]);
    }

    public function offsetExists($offset)
    {
        return isset($this->arr[$offset]);
    }

    public function offsetGet($offset)
    {
        return $this->arr[$offset];
    }

    public function offsetSet($offset, $value)
    {
        $this->arr[$offset] = $value;
    }

    public function sort($options = [])
    {
        $this->options = $options + $this->options;
        $className = __NAMESPACE__ . "\\Sorts\\" . $this->options['method'];
        if (!class_exists($className)) {
            throw new InvalidSortException("不存在此排序算法:" . $this->options['algorithm']);
        }

        $startTime = Helper::mstime();
        $ref = new \ReflectionClass($className);
        if(!$ref->isInstantiable()) {
            throw new InvalidSortException("类{$className} 不存在");
        }
        $obj = $ref->newInstanceArgs();
        $obj->sort($this->arr);

        $endTime = Helper::mstime();
        assert(Helper::isSorted($this->arr));
        if ($options['showProfile'] == true) {
            echo $obj->title() . ": " . ($endTime - $startTime) / 1000 . "s; 描述:" . $obj->desc() . (Helper::is_cli() ? PHP_EOL : "<br />");
        }
    }
}
