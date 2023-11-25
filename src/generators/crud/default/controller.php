<?php

/**
 * This is the template for generating a CRUD controller class file.
 */
use yii\helpers\StringHelper;

$controllerClass = StringHelper::basename($generator->controllerClass);
$baseControllerClass = ltrim($generator->baseControllerClass, '\\');
$modelClass = StringHelper::basename($generator->modelClass);
$namespace = StringHelper::dirname(ltrim($generator->controllerClass, '\\'));
$searchModelClass = StringHelper::basename($generator->searchModelClass);
$oasPathName = $generator->usePluralize ? \yii\helpers\Inflector::pluralize(substr($controllerClass,0,-10)) : substr($controllerClass,0,-10);
$oasPath = strtolower(\yii\helpers\Inflector::camel2id($oasPathName)) ;
if ($modelClass === $searchModelClass) {
    $searchModelAlias = $searchModelClass . 'Search';
}

/* @var $class ActiveRecordInterface */
$class = $generator->modelClass;

echo "<?php\n";
?>

namespace <?= $namespace ?>;

use <?= ltrim($generator->modelClass, '\\') ?>;
<?php if (strpos($baseControllerClass, $namespace) !== 0): ?>
use <?= $baseControllerClass ?>;
<?php endif; ?>
<?php if (!empty($generator->searchModelClass)): ?>
use <?= ltrim($generator->searchModelClass, '\\') . (isset($searchModelAlias) ? " as $searchModelAlias" : "") ?>;
<?php else: ?>
<?php endif; ?>

class <?= $controllerClass ?> extends <?= StringHelper::basename($generator->baseControllerClass) . "\n" ?>
{
<?php
    $lastPos = strripos($generator->modelClass,"\\") + 1 ;
    $class = substr($generator->modelClass, $lastPos) . '::class';
?>
    public $modelClass = <?= $class ?>;
}
