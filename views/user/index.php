<?php

use themes\metronic\helpers\Html;
use themes\metronic\widgets\GridView;

;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">
    <div class="portlet">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-gift"></i><?= Html::encode($this->title) ?>
            </div>
            <div class="actions">
                <?= Html::a('Add User', ['create'], ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>
    <div class="wrapper-md">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i><?= Html::encode($this->title) ?>
                </div>
                <div class="tools">
                </div>
            </div>
            <div class="portlet-body">
                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
                <?php Pjax::begin(); ?>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => '\yii\grid\CheckboxColumn'],
                        ['class' => '\yii\grid\SerialColumn'],
                        'first_name',
                        'last_name',
                        'username',
                        // 'password_hash',
                        // 'password_reset_token',
                        // 'status',
                        // 'created_at',
                         'updated_at:datetime',
                        ['class' => 'themes\metronic\components\ActionColumn']
                    ]
                ]); ?>
                <?php Pjax::end(); ?>
            </div>
        </div>
    </div>
</div>
