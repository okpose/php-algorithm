<?php

namespace Okpose\Algorithm\Sorts;

use Okpose\Algorithm\Interfaces\Sort;

class BubbleMerge implements Sort
{
    private $_title = "归并排序";
    private $_desc = "基于冒泡、自底向上，时间复杂度为O(n log n) , 空间复杂度为T(n), 速度仅次于快速排序，为稳定排序算法，一般用于对总体无序，但是各子项相对有序的数列";
    public function title()
    {
        return $this->_title;
    }

    public function desc()
    {
        return $this->_desc;
    }

    public function sort(&$arr)
    {
        $n = count($arr);
        for ($sz = 1; $sz <= $n;$sz += $sz) {
            for ($i = 0; $i + $sz < $n; $i += $sz + $sz) {
                $this->_merge($arr, $i, $i + $sz - 1, min($i + $sz + $sz - 1, $n - 1));
            }
        }
    }

    /**
     * 将arr[l...mid]和arr[mid+1 .... r]两部分进行归并
     * @param array $arr
     * @param  int $l   左壁
     * @param  int $mid 中间
     * @param  int $r   右壁
     */
    private function _merge(&$arr, $l, $mid, $r)
    {
        $aux = [];
        for ($i = $l; $i <= $r; $i++) {
            $aux[] = $arr[$i];
        }

        $i = $l;
        $j = $mid + 1;
        for ($k = $l; $k <= $r; $k++) { 
        	if ($i > $mid) {
        		$arr[$k] = $aux[$j - $l];
        		$j ++;
        	}
        	else if ($j > $r) {
        		$arr[$k] = $aux[$i - $l];
        		$i ++;
        	}
        	else if ($aux[$i - $l] < $aux[$j - $l]) {
        		$arr[$k] = $aux[$i - $l];
        		$i ++;
        	}
        	else {
        		$arr[$k] = $aux[$j - $l];
        		$j ++;
        	}
        }
    }
}
