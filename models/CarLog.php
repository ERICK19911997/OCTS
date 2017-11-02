<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "car_log".
 *
 * @property string $id
 * @property string $car_id
 * @property string $lat
 * @property string $lng
 * @property string $speed
 * @property string $alt
 * @property string $created_at
 *
 * @property Car[] $cars
 * @property Car $car
 */
class CarLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'car_log';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['car_id'], 'required'],
            [['car_id', 'created_at'], 'integer'],
            [['lat', 'lng', 'speed', 'alt'], 'number'],
            [['car_id'], 'exist', 'skipOnError' => true, 'targetClass' => Car::className(), 'targetAttribute' => ['car_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'car_id' => 'Car ID',
            'lat' => 'Lat',
            'lng' => 'Lng',
            'speed' => 'Speed',
            'alt' => 'Alt',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCars()
    {
        return $this->hasMany(Car::className(), ['updated_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCar()
    {
        return $this->hasOne(Car::className(), ['id' => 'car_id']);
    }
}
