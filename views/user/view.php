<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <div class="portlet">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-gift"></i><?= Html::encode($this->title) ?>
            </div>
            <div class="actions">
                <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
                ],
                ]) ?>
            </div>
        </div>
    </div>
    <div class="portlet box blue">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-gift"></i><?= Html::encode($this->title) ?>
            </div>
            <div class="tools">
            </div>
        </div>
        <div class="portlet-body">
            <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                        'id',
            'first_name',
            'last_name',
            'username',
            'auth_key',
            'password_hash',
            'password_reset_token',
            'status',
            'created_at',
            'updated_at',
            ],
            ]) ?>
        </div>
    </div>
</div>
