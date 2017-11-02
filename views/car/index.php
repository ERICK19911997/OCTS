<?php

use themes\metronic\helpers\Html;
use themes\metronic\widgets\GridView;

;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cars';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="car-index">
    <div class="portlet">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-gift"></i><?= Html::encode($this->title) ?>
            </div>
            <div class="actions">
                <?= Html::a('Add Car', ['create'], ['class' => 'btn btn-success']) ?>
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
                        'reg_no',
                        'model',
                        'driver',
                        'last_lat',
                        'last_lng',
                        // 'created_at',
                        // 'created_by',
                        'updated_at:datetime',
                        // 'updated_by',
                        ['class' => 'themes\metronic\components\ActionColumn']
                    ]
                ]); ?>
                <?php Pjax::end(); ?>
            </div>
        </div>
    </div>
</div>
