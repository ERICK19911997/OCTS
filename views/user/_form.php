<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form themes\metronic\components\ActiveForm */
?>

<?php $form = ActiveForm::begin(['layout' => 'horizontal', ]); ?>
<div class="panel-body">

        <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

</div>
<div class="panel-footer">
    <div class="col-md-offset-3">
        <?= Html::submitButton($model->isNewRecord ? 'Add'        : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn
        btn-primary']) ?>
    </div>
</div>
<?php ActiveForm::end(); ?>
