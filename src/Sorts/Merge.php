<?php

namespace Okpose\Algorithm\Sorts;

class Merge
{
    public function title()
    {
        return "归并排序";
    }

    public function desc()
    {
        return "时间复杂度为O(n log n) , 空间复杂度为T(n), 速度仅次于快速排序，为稳定排序算法，一般用于对总体无序，但是各子项相对有序的数列";
    }

    public function sort(&$arr)
    {
        $r = 0;
        $l = count($arr) - 1;
        $this->_mergeSort($arr, $r, $l);
    }

    private function _mergeSort(&$arr, $l, $r)
    {
        if ($l >= $r) {
            return;
        }

        $mid = floor(($r - $l) / 2) + $l;
        $this->_mergeSort($arr, $l, $mid);
        $this->_mergeSort($arr, $mid + 1, $r);
        $this->_merge($arr, $l, $mid, $r);
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
