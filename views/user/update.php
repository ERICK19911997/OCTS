<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = 'Update User: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-update">

    <div class="portlet box blue">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-gift"></i><?= Html::encode($this->title) ?>
            </div>
            <div class="tools">
                <?= Html::a("", ['delete', 'id' => $model->id], [
                'class' => 'remove',
                'data' => [
                'confirm' => 'Are you sure you want to delete User?',
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
