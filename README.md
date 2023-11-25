Yii2 restful generator for gii
======================
Gii 模块的REST代码生成器，包含Model和Controller。 Forked from mitirrli/yii2-gii-rest。

安装 Installation
------------

通过 [composer](http://getcomposer.org/download/)安装.

项目中直接运行

```
composer require yacon/yii2-gii-rest
```

or add

```
"yacon/yii2-gii-rest": "*"
```

或者添加下面代码到 `composer.json`文件


使用 Usage
-----

在`config/web.php` 配置文件中，`gii`的配置部分增加模版：

```php
$config['modules']['gii'] = [
    'class' => 'yii\gii\Module',
    'generators' => [
        'rest-model' => [
            'class' => 'yacon\gii\generators\model\Generator',
        ],
        'rest-crud' => [
            'class' => 'yacon\gii\generators\crud\Generator',
        ]
    ],
];
```
运行gii，可以看到增加了`REST Model Generator`和`REST CRUD Generator`两个生成器。