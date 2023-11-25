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

/* @var $class ActiveRecordInterface */
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
