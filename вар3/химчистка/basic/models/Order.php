<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property int $user_id
 * @property string $type_service
 * @property string $status
 * @property string $price
 * @property string $data
 *
 * @property Reciept[] $reciepts
 * @property User $user
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'type_service', 'price'], 'required'],
            [['user_id'], 'integer'],
            [['data'], 'safe'],
            [['type_service', 'status', 'price'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'Клиент',
            'type_service' => 'Тип сервиса',
            'status' => 'Статус',
            'price' => 'Цена',
            'data' => 'Дата заявки',
        ];
    }

    /**
     * Gets query for [[Reciepts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReciepts()
    {
        return $this->hasMany(Reciept::class, ['order_id' => 'id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
