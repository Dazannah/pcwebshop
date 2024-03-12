<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "price".
 *
 * @property int $id
 * @property string $startdate
 * @property int $price
 * @property int $product_id
 * @property int $vat_id
 *
 * @property Product $product
 * @property Vat $vat
 */
class Price extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'price';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['startdate', 'price', 'product_id', 'vat_id'], 'required'],
            [['startdate'], 'safe'],
            [['price', 'product_id', 'vat_id'], 'integer'],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::class, 'targetAttribute' => ['product_id' => 'id']],
            [['vat_id'], 'exist', 'skipOnError' => true, 'targetClass' => Vat::class, 'targetAttribute' => ['vat_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'startdate' => Yii::t('app', 'Startdate'),
            'price' => Yii::t('app', 'Price'),
            'product_id' => Yii::t('app', 'Product ID'),
            'vat_id' => Yii::t('app', 'Vat ID'),
        ];
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::class, ['id' => 'product_id']);
    }

    /**
     * Gets query for [[Vat]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVat()
    {
        return $this->hasOne(Vat::class, ['id' => 'vat_id']);
    }
}
