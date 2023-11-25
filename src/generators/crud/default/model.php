<?php
/**
 * This is the template for generating a CRUD controller class file.
 */

use yii\db\ActiveRecordInterface;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$controllerClass = StringHelper::basename($generator->controllerClass);
$modelClass = StringHelper::basename($generator->modelClass);
$searchModelClass = StringHelper::basename($generator->searchModelClass);
$oasPathName = $generator->usePluralize ? \yii\helpers\Inflector::pluralize(substr($controllerClass,0,-10)) : substr($controllerClass,0,-10);
$oasPath = strtolower(\yii\helpers\Inflector::camel2id($oasPathName));
if ($modelClass === $searchModelClass) {
    $searchModelAlias = $searchModelClass . 'Search';
}

/* @var $class ActiveRecordInterface */
$class = $generator->modelClass;
$pks = $class::primaryKey();
$urlParams = $generator->generateUrlParams();
$actionParams = $generator->generateActionParams();
$actionParamComments = $generator->generateActionParamComments();

echo "<?php\n";
?>

namespace <?= StringHelper::dirname(ltrim($generator->modelClass, '\\')) ?>;

class <?= $modelClass ?> extends \common\models\<?= $modelClass . "\n" ?>
{
    public function rules(): array
    {
        return array_merge(parent::rules(), [

        ]);
    }
}
