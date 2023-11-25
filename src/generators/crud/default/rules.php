<?php

/**
 * This is the template for generating a CRUD rule file.
 */

use yii\helpers\StringHelper;

$controllerClass = StringHelper::basename($generator->controllerClass);

/* @var $class ActiveRecordInterface */
$class = $generator->modelClass;
$controllerName = str_replace('controller', '', strtolower($controllerClass));

//modelClass获取表名
$routeName = strtolower(StringHelper::basename($class));
$routeContent = file_get_contents(Yii::getAlias('@' . str_replace('\\', '/', ltrim($generator->routeFile, '\\'))));

$routeArray = require Yii::getAlias('@' . str_replace('\\', '/', ltrim($generator->routeFile, '\\')));

if (array_search(['controller' => $routeName, 'class' => 'yii\rest\UrlRule'], $routeArray) === false) {
    $routeContent = sprintf(str_replace('];', '
    [
        \'controller\' => \'%s\',
        \'class\' => \'yii\rest\UrlRule\',
    ],
];', $routeContent), $routeName);
}

echo $routeContent;
