# php-algorithm
一个用PHP实现的常用算法库，欢迎下载测试

## 测试用例的使用
在根目录下执行phpunit命令，系统回自动执行phpunit.xml中的测试用例
```
phpunit
```

## 使用方法
```
use \Okpose\Algorithm\Collection;

//按指定算法排序参数：method
$arr = [1,3,56,32,2,5,56,5];
$collection = new Collection($arr);
$collection->sort(['method' => Collection::SORT_METHOD_MERGE]);

//显示算法性能参数:showProfile
$options = ['method' => Collection::SORT_METHOD_MERGE, "showProfile" => true];
$collection->sort($options);



```