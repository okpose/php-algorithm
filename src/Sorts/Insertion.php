<?php

namespace Okpose\Algorithm\Sorts;

use Okpose\Algorithm\Interfaces\Sort;

class Insertion implements Sort
{
    public function title()
    {
        return "插入排序";
    }

    public function desc()
    {
        return "时间复杂度为O(n^2),空间复杂度O(1), 是稳定的排序方法。对有序数组会降到O(n)的级别";
    }

    public function sort(&$arr)
    {
        $arrLength = count($arr);
        for ($i = 0; $i < $arrLength; $i++) {
            $e = $arr[$i];
            for ($j = $i; $j > 0 && $arr[$j - 1] > $e; $j--) {
                $arr[$j] = $arr[$j - 1];
            }
            $arr[$j] = $e;
        }
    }
}
