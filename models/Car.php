<?php

namespace app\models;

use app\components\FullStackModel;
use Yii;

/**
 * This is the model class for table "car".
 *
 * @property string $id
 * @property string $reg_no
 * @property string $model
 * @property string $driver
 * @property string $last_lat
 * @property string $last_lng
 * @property string $created_at
 * @property string $created_by
 * @property string $updated_at
 * @property string $updated_by
 *
 * @property User $updatedBy
 * @property User $createdBy
 * @property CarLog[] $carLogs
 */
class Car extends \yii\db\ActiveRecord
{
    use FullStackModel;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'car';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['reg_no', 'model', 'driver'], 'required'],
            [['last_lat', 'last_lng'], 'number'],
            [['created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['reg_no', 'model'], 'string', 'max' => 45],
            [['driver'], 'string', 'max' => 100],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'reg_no' => 'Registration No',
            'model' => 'Model',
            'driver' => 'Driver Name',
            'last_lat' => 'Last Lat',
            'last_lng' => 'Last Lng',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCarLogs()
    {
        return $this->hasMany(CarLog::className(), ['car_id' => 'id']);
    }
}
