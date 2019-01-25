<?php

namespace Okpose\Algorithm\Sorts;

class Selection
{
    public function title()
    {
        return "选择排序";
    }

    public function desc()
    {
        return "时间复杂度为O(n^2), 空间复杂度O(1), 是不稳定的排序方法,最好情况下的时间复杂度是O(n)";
    }

    public function sort(&$arr)
    {
        $arrLength = count($arr);
        for ($i = 0; $i < $arrLength; $i++) {
            $minIndex = $i;
            for ($j = $i + 1; $j < $arrLength; $j++) {
                if ($arr[$j] < $arr[$minIndex]) {
                    $minIndex = $j;
                }
            }
            if ($i != $minIndex) {
                $temp = $arr[$i];
                $arr[$i] = $arr[$minIndex];
                $arr[$minIndex] = $temp;
            }
        }
    }
}
