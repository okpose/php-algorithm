<?php
/**
 * Created by PhpStorm.
 * User: 28112
 * Date: 2019/1/30
 * Time: 16:53
 */

namespace Okpose\Algorithm\Sorts;

/**
 * 二分查找法，在有序数组中查找指定target
 * Class BinarySearch
 * @package Okpose\Algorithm\Sorts
 */
class BinarySearch
{
     public function search($arr, $target)
     {
         $n = count($arr);
         $l = 0;
         $r = $n - 1;

         //以下代码是通过迭代方式实现的，当然也可以通过递归实现，但性能略输于迭代
         while ($l <= $r) {
             //$mid = floor(($r + $l) / 2);  //如果$l和$r都是Int中的最大值，加在一起可能会出现内存溢出的问题
             $mid = $l + intval(($r - $l) / 2);    //完美解决方案
             if (($arr[$mid] == $target)) {
                 return $mid;
             }

             if ($target < $arr[$mid]) {
                 $r = $mid - 1;
             } else {
                 $l = $mid + 1;
             }
         }

         return -1;
     }

}