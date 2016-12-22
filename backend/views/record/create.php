<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Record */

$this->title = 'Создать публикацию';
$this->params['breadcrumbs'][] = ['label' => 'Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="record-create">

    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>