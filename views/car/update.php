<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Car */

$this->title = 'Update Car: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cars', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="car-update">

    <div class="portlet box blue">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-gift"></i><?= Html::encode($this->title) ?>
            </div>
            <div class="tools">
                <?= Html::a("", ['delete', 'id' => $model->id], [
                'class' => 'remove',
                'data' => [
                'confirm' => 'Are you sure you want to delete Car?',
                'method' => 'post',
                ],
                ]) ?>
            </div>
        </div>
        <div class="portlet-body form">
            <?= $this->render('_form', [
            'model' => $model,
            ]) ?>
        </div>
    </div>
</div>
