<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Record */

$this->title = 'Обновить публикацию: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="record-update">

    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>