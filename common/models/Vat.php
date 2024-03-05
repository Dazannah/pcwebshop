<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vat".
 *
 * @property int $id
 * @property int $vatrate
 *
 * @property Price[] $prices
 */
class Vat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['vatrate'], 'required'],
            [['vatrate'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'vatrate' => Yii::t('app', 'Vatrate'),
        ];
    }

    /**
     * Gets query for [[Prices]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPrices()
    {
        return $this->hasMany(Price::class, ['vat_id' => 'id']);
    }
}
