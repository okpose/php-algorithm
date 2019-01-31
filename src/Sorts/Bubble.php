<?php

namespace Okpose\Algorithm\Sorts;

use Okpose\Algorithm\Interfaces\Sort;

class Bubble implements Sort
{
    public function title()
    {
        return "冒泡排序";
    }

    public function desc()
    {
        return "时间复杂度为O(n^2), 空间复杂度O(1), 是稳定的排序方法。";
    }

    public function sort(&$arr)
    {
        $arrLength = count($arr);
        for ($i = 0; $i < $arrLength; $i++) {
            for ($j = $i; $j < $arrLength; $j++) {
                if ($arr[$j] < $arr[$i]) {
                    $temp = $arr[$i];
                    $arr[$i] = $arr[$j];
                    $arr[$j] = $temp;
                }
            }
        }
    }
}
