## phalcon-framwork的扩展

#### volt扩展在服务中使用
``` php
use use PhalconExtensions\Volt as VoltExtension;
...

$di->setShared('viewEngineVolt', function (View $view, DI $di) {
    $voltConfig = $this->getConfig()->services->view_engine_volt->toArray();
    $voltConfig = Common::convertArrKeyUnderline($voltConfig);
    $viewEngineVolt = new ViewEngineVolt($view, $di);
    $voltConfig['compiledPath'] = isset($voltConfig['compiledPath']) ? Common::dirFormat($voltConfig['compiledPath']) : BASE_PATH . 'runtime/' . DEFAULT_MODULE . '/compiled/volt' . DS;
    $mkdirRes = Common::mkdir($voltConfig['compiledPath']);
    if (! $mkdirRes) {
        throw new \Exception('创建目录 ' . $voltConfig['compiledPath'] . ' 失败');
    }
    $viewEngineVolt->setOptions($voltConfig);
    // 获取编译器对象
    $compiler = $viewEngineVolt->getCompiler();
    // 添加扩展
    $compiler->addExtension(new VoltExtension());
    return $viewEngineVolt;
});
```