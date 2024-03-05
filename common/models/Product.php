<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property int $producttype_id
 * @property string $productcode
 * @property string $ean
 * @property string $brandname
 * @property string $productname
 * @property string|null $image
 * @property float|null $weight
 * @property int $warranty_id
 * @property int $productstate_id
 *
 * @property Orderitem[] $orderitems
 * @property Price[] $prices
 * @property Productstate $productstate
 * @property Producttype $producttype
 * @property Stock[] $stocks
 * @property Warranty $warranty
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['producttype_id', 'productcode', 'ean', 'brandname', 'productname', 'warranty_id', 'productstate_id'], 'required'],
            [['producttype_id', 'warranty_id', 'productstate_id'], 'integer'],
            [['weight'], 'number'],
            [['productcode'], 'string', 'max' => 15],
            [['ean'], 'string', 'max' => 13],
            [['brandname', 'productname'], 'string', 'max' => 45],
            [['image'], 'string', 'max' => 100],
            [['productcode'], 'unique'],
            [['ean'], 'unique'],
            [['productstate_id'], 'exist', 'skipOnError' => true, 'targetClass' => Productstate::class, 'targetAttribute' => ['productstate_id' => 'id']],
            [['producttype_id'], 'exist', 'skipOnError' => true, 'targetClass' => Producttype::class, 'targetAttribute' => ['producttype_id' => 'id']],
            [['warranty_id'], 'exist', 'skipOnError' => true, 'targetClass' => Warranty::class, 'targetAttribute' => ['warranty_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'producttype_id' => Yii::t('app', 'Producttype ID'),
            'productcode' => Yii::t('app', 'Productcode'),
            'ean' => Yii::t('app', 'Ean'),
            'brandname' => Yii::t('app', 'Brandname'),
            'productname' => Yii::t('app', 'Productname'),
            'image' => Yii::t('app', 'Image'),
            'weight' => Yii::t('app', 'Weight'),
            'warranty_id' => Yii::t('app', 'Warranty ID'),
            'productstate_id' => Yii::t('app', 'Productstate ID'),
        ];
    }

    /**
     * Gets query for [[Orderitems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderitems()
    {
        return $this->hasMany(Orderitem::class, ['product_id' => 'id']);
    }

    /**
     * Gets query for [[Prices]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPrices()
    {
        return $this->hasMany(Price::class, ['product_id' => 'id']);
    }

    /**
     * Gets query for [[Productstate]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductstate()
    {
        return $this->hasOne(Productstate::class, ['id' => 'productstate_id']);
    }

    /**
     * Gets query for [[Producttype]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducttype()
    {
        return $this->hasOne(Producttype::class, ['id' => 'producttype_id']);
    }

    /**
     * Gets query for [[Stocks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStocks()
    {
        return $this->hasMany(Stock::class, ['product_id' => 'id']);
    }

    /**
     * Gets query for [[Warranty]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWarranty()
    {
        return $this->hasOne(Warranty::class, ['id' => 'warranty_id']);
    }
}
