<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Car */
/* @var $form themes\metronic\components\ActiveForm */
?>

<?php $form = ActiveForm::begin(['layout' => 'horizontal',]); ?>
<div class="panel-body">

    <?= $form->field($model, 'model')->dropDownList([
        'Toyota'=>'Toyota',
        'Nissan'=>'Nissan',
        'Benz'=>'Benz',
        'Fiat'=>'Fiat',
        'BMW'=>'BMW'
    ]) ?>

    <?= $form->field($model, 'reg_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'driver')->textInput(['maxlength' => true]) ?>

</div>
<div class="panel-footer">
    <div class="col-md-offset-3">
        <?= Html::submitButton($model->isNewRecord ? 'Add' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn
        btn-primary']) ?>
    </div>
</div>
<?php ActiveForm::end(); ?>
