<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reciept".
 *
 * @property int $id
 * @property int $order_id
 * @property string|null $date
 * @property string $price_end
 *
 * @property Order $order
 */
class Reciept extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reciept';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_id', 'price_end'], 'required'],
            [['order_id'], 'integer'],
            [['date'], 'safe'],
            [['price_end'], 'string', 'max' => 20],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Order::class, 'targetAttribute' => ['order_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'Заявка',
            'date' => 'Дата выписки квитанции',
            'price_end' => 'Цена услуги',
        ];
    }

    /**
     * Gets query for [[Order]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Order::class, ['id' => 'order_id']);
    }
}
