<?php

namespace Okpose\Algorithm\Tests;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Response;
use Mockery\Matcher\AnyArgs;
use Okpose\Algorithm\Collection;
use Okpose\Algorithm\Helper;
use PHPUnit\Framework\TestCase;
use Rink\Weather\Exceptions\HttpException;
use Rink\Weather\Exceptions\InvalidArgumentException;
use Rink\Weather\Weather;

class AlgorithmTest extends TestCase
{
    public function testMergeSort()
    {
        $arr = Helper::generateRandomArray(3000, 0,1000);
        $col = new Collection($arr);
        $col->sort(['method' => Collection::SORT_METHOD_MERGE, 'showProfile' => true]);
        $this->assertTrue(Helper::isSorted($col));
    }

    public function testBubbleSort()
    {
        $arr = Helper::generateRandomArray(3000, 0,1000);
        $col = new Collection($arr);
        $col->sort(['method' => Collection::SORT_METHOD_BUBBLE, 'showProfile' => true]);
        $this->assertTrue(Helper::isSorted($col));
    }

    public function testInsertionSort()
    {
        $arr = Helper::generateRandomArray(3000, 0,1000);
        $col = new Collection($arr);
        $col->sort(['method' => Collection::SORT_METHOD_INSERTION, 'showProfile' => true]);
        $this->assertTrue(Helper::isSorted($col));
    }

    public function testSelectionSort()
    {
        $arr = Helper::generateRandomArray(3000, 0,1000);
        $col = new Collection($arr);
        $col->sort(['method' => Collection::SORT_METHOD_SELECTION, 'showProfile' => true]);
        $this->assertTrue(Helper::isSorted($col));
    }

    public function testShellSort()
    {
        $arr = Helper::generateRandomArray(3000, 0,1000);
        $col = new Collection($arr);
        $col->sort(['method' => Collection::SORT_METHOD_SHELL, 'showProfile' => true]);
        $this->assertTrue(Helper::isSorted($col));
    }
}
