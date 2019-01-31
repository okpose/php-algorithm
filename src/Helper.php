<?php

namespace Okpose\Algorithm;

class Helper
{
    public static function mstime() {
        list($msec, $sec) = explode(' ', microtime());
        return (float) sprintf('%.0f', (floatval($msec) + floatval($sec)) * 1000);
    }

    public static function echoArr($arr) {
        foreach ($arr as $value) {
            echo $value . " ";
        }
    }

    /**
     * 生成随机数组
     * @param  int $n      数组长度
     * @param  int $rangeL 数组范围：最小值
     * @param  int $rangeR 数组范围:最大值
     * @return array
     */
    public static function generateRandomArray($n, $rangeL, $rangeR) {
        assert($rangeL <= $rangeR);
        $arr = [];
        for ($i = 0; $i < $n; $i++) {
            $arr[$i] = rand() % ($rangeR - $rangeL + 1) + $rangeL;
        }
        return $arr;
    }

    /**
     * 得到一个接近有序的列表
     * @param  int $n         长度
     * @param  int $swapTimes 交换次数
     * @return array
     */
    public static function generateNearlyOrderedArray($n, $swapTimes) {
        $arr = range(0, $n - 1);
        for ($i = 0; $i < $swapTimes; $i++) {
            $posx = rand() % $n;
            $posy = rand() % $n;
            self::swap($arr[$posx], $posy);
        }

        return $arr;
    }

    /**
     * 交换值
     * @param &$value1
     * @param &$value2
     */
    public static function swap(&$value1, &$value2) {
        $temp = $value1;
        $value1 = $value2;
        $value2 = $temp;
    }

    public static function isSorted($arr) {
        if ($arr[0] < $arr[1]) {
            $flag = "asc";
        } else if ($arr[0] > $arr[1]) {
            $flag = "desc";
        } else {
            $flag = "unknown";
        }

        $arrLength = count($arr);
        for ($i = 0; $i < $arrLength - 1; $i++) {
            if ($flag == "asc") {
                if ($arr[$i] > $arr[$i + 1]) {
                    return false;
                }
            }

            if ($flag == 'desc') {
                if ($arr[$i] < $arr[$i + 1]) {
                    return false;
                }
            }

            if ($flag == "unknown") {
                if ($arr[$i] > $arr[$i + 1]) {
                    $flag = "desc";
                } else if ($arr[$i] < $arr[$i + 1]) {
                    $flag = "asc";
                }
            }
        }

        return true;
    }

    public static function is_cli(){
        return preg_match("/cli/i", php_sapi_name()) ? true : false;
    }
}
