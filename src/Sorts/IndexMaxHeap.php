<?php

namespace Okpose\Algorithm\Sorts;

use Okpose\Algorithm\Interfaces\Sort;
use SebastianBergmann\CodeCoverage\Report\PHP;

class IndexMaxHeap implements Sort
{
    private $data = [];
    private $indexes = [];
    private $count = 0;

    public function title()
    {
        return "索引堆排序";
    }

    public function desc()
    {
        return "时间复杂度为O(n log n), 空间复杂度O(1),。";
    }

    public function sort(&$arr)
    {
        $this->data = $arr;
        $start = 0;
        foreach ($arr as $key=>$value) {
            $start += 1; //索引从1开始
            $this->indexes[$start] = $key;
        }

        $this->count = $start;

        $lastParent = intval(($this->count)/2);
        for ($i = $lastParent; $i >= 1; $i--) {
            $this->shiftDown($i);
        }

        $arr = [];
        while ($this->data) {
            $arr[] = $this->extractMax();
        }
    }

    private function shiftUp($k) {
        while ($k >=1) {
            $parent = floor($k/2);
            if ($this->data[$this->indexes[$k]] > $this->data[$this->indexes[$parent]]) {
                $this->swap($k, $parent);
            }
            else {
                break;
            }
            $k = $parent;
        }
    }

    private function shiftDown($k) {
        while ($k*2 <= $this->count) {
            $leftChildren = $k*2;
            $rightChildren = $leftChildren + 1;
            $d = $leftChildren;
            if ($rightChildren <= $this->count && $this->data[$this->indexes[$rightChildren]] > $this->data[$this->indexes[$leftChildren]]) {
                $d = $rightChildren;
            }

            if ($this->data[$this->indexes[$k]] < $this->data[$this->indexes[$d]]) {
                $this->swap($k, $d);
                $k = $d;
            } else {
                break;
            }
        }
    }

    public function extractMax()
    {
        $ret = $this->data[$this->indexes[1]];
        $this->data[$this->indexes[1]] = $this->data[$this->indexes[$this->count]];
        unset($this->data[$this->indexes[$this->count]]);
        $this->count -= 1;
        $this->shiftDown(1);
        return $ret;
    }

    private function swap($i,$j)
    {
        $temp = $this->indexes[$i];
        $this->indexes[$i] = $this->indexes[$j];
        $this->indexes[$j] = $temp;
    }
}
