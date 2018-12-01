## phalcon-framwork的扩展

#### volt扩展在服务中使用
``` php
use use PhalconExtensions\Volt as VoltExtension;
...

$di->setShared('viewEngineVolt', function (View $view, DI $di) {
    ...
    // 获取编译器对象
    $compiler = $viewEngineVolt->getCompiler();
    // 添加扩展
    $compiler->addExtension(new VoltExtension());
    return $viewEngineVolt;
});
```