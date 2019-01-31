<?php

namespace Okpose\Algorithm\Sorts;

use Okpose\Algorithm\Interfaces\Sort;

class Shell implements Sort
{
    public function title()
    {
        return "希尔排序";
    }

    public function desc()
    {
        return "时间复杂度为O(n^（1.3—2）), 空间复杂度为O(1), 希尔排序(Shell's Sort)是插入排序的一种又称“缩小增量排序”（Diminishing Increment Sort），是直接插入排序算法的一种更高效的改进版本。希尔排序是非稳定排序算法";
    }

    public function sort(&$arr)
    {
        $arrLength = count($arr);
        $inc = $arrLength;
        while (true) {
            $inc = ceil($inc / 2);
            for ($i = 0; $i < $arrLength; $i += $inc) {
                $temp = $arr[$i];
                for ($j = $i; $j > 0 && $arr[$j - $inc] > $temp; $j -= $inc) {
                    $arr[$j] = $arr[$j - $inc]; //记录后移
                }
                //插入
                $arr[$j] = $temp;
            }

            if ($inc == 1) {
                break;
            }
        }
    }
}
