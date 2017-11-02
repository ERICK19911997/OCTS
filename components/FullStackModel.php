<?php
/*
 * Copyright (c) 2017 Teratech
 * All rights reserved.
 * Date: 5/18/2017
 * Time: 10:24 PM
 */


namespace app\components;

use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * Class FullStackModel
 *
 * Description of FullStackModel
 *
 * @author Ramadan Juma (ramaj93@yahoo.com)
 *
 * @package common\behaviors
 */
trait FullStackModel
{

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            BlameableBehavior::className()
        ];
    }
}