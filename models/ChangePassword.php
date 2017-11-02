<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\models;

/**
 * Description of ChangePassword
 *
 * @author Ramadan Juma
 */
class ChangePassword extends \yii\base\Model {

    public $old_pwd;
    public $new_pwd;
    public $confirm_pwd;

    public function rules() {
        return[
            [['old_pwd', 'new_pwd', 'confirm_pwd'], 'required'],
            [['new_pwd','confirm_pwd'], 'string', 'min' => 6],
            ['confirm_pwd', 'compare', 'compareAttribute' => 'new_pwd', 'message' => "Passwords don't match"]
        ];
    }

    public function attributeLabels() {
        return [
            'new_pwd' => 'New Password',
            'confirm_pwd' => 'Confirm Password',
            'old_pwd' => 'Old Password'
        ];
    }

}
