<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\components;

/**
 * Description of RoleFactory
 *
 * @author Ramadan Juma
 */
class RoleFactory {

    public static $user;
    
    public static function is($role, $user_id = false) {
        if ($user_id == FALSE) {
            $user_id = user()->id;
        }
        
        $user = \app\models\User::findOne(['id' => $user_id]);
        if ($user != FALSE) {
            return $user->role == $role;
        }
    }

    public static function isOwner($user_id = false) {
        return self::is("Owner", $user_id);
    }

    public static function isSalesman($user_id = false) {
        return self::is("Salesman", $user_id);
    }

    public static function isPurchaser($user_id = false) {
        return self::is("Purchaser", $user_id);
    }
    
    public static function getCurrentRole(){
        return user()->identity->role;
    }

}
