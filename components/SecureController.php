<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace backend\components;

use Yii;
use yii\filters\AccessControl;
/**
 * Description of SecureController
 *
 * @author Ramadan
 */
class SecureController extends Controller {

//    public function __construct($id, $module, $config = array()) {
//        parent::__construct($id, $module, $config);
//        if(Yii::$app->user->isGuest){
//            $this->redirect(['site/login']);
//        }
//    }

    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles'=>['@']
                    ],
                    [
                        'allow' => FALSE,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

}
