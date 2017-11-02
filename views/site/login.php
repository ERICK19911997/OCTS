<?php

//

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use themes\metronic\components\ActiveForm;
use yii\helpers\Html;


$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;

?>
<!-- BEGIN LOGIN FORM -->
<!--<form class="login-form" action="index.html" method="post">-->

<?php $form = ActiveForm::begin(['id' => 'login-form', 'class' => 'login-form']); ?>

<h3 class="form-title">Sign In</h3>
<div class="alert alert-danger display-hide">
    <button class="close" data-close="alert"></button>
    <span>
        Enter your username and password. </span>
</div>
<div class="form-group">
    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
    <label class="control-label visible-ie8 visible-ie9">Username</label>
    <?= $form->field($model, 'username')->label(false)->textInput(['autocomplete' => 'off', 'class' => 'form-control form-control-solid placeholder-no-fix', 'placeholder' => 'Username']) ?>
</div>
<div class="form-group">
    <label class="control-label visible-ie8 visible-ie9">Password</label>
    <?= $form->field($model, 'password')->passwordInput(['autocomplete' => 'off', 'class' => 'form-control form-control-solid placeholder-no-fix', 'placeholder' => 'Password'])->label(false) ?>
</div>
<div class="form-actions">
    <button type="submit" class="btn btn-success uppercase">Login</button>
    <label class="rememberme check">
        <input type="checkbox" name="LoginForm[rememberMe]" value="1"/>Remember </label>
    <a href="javascript:;" id="forget-password" class="forget-password">Forgot Password?</a>
</div>
<?php ActiveForm::end(); ?>
<!-- END LOGIN FORM -->
<!-- BEGIN FORGOT PASSWORD FORM -->
<form class="forget-form" action="index.html" method="post">
    <h3>Forget Password ?</h3>
    <p>
        Enter your e-mail address below to reset your password.
    </p>
    <div class="form-group">
        <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email"/>
    </div>
    <div class="form-actions">
        <button type="button" id="back-btn" class="btn btn-default">Back</button>
        <button type="submit" class="btn btn-success uppercase pull-right">Submit</button>
    </div>
</form>
<!-- END FORGOT PASSWORD FORM -->