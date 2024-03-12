<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "producttype".
 *
 * @property int $id
 * @property string $typename
 * @property string|null $image
 * @property int $productstate_id
 *
 * @property Product[] $products
 * @property Productstate $productstate
 */
class Producttype extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'producttype';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['typename', 'productstate_id'], 'required'],
            [['productstate_id'], 'integer'],
            [['typename'], 'string', 'max' => 45],
            [['image'], 'string', 'max' => 100],
            [['productstate_id'], 'exist', 'skipOnError' => true, 'targetClass' => Productstate::class, 'targetAttribute' => ['productstate_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'typename' => Yii::t('app', 'Typename'),
            'image' => Yii::t('app', 'Image'),
            'productstate_id' => Yii::t('app', 'Productstate ID'),
        ];
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::class, ['producttype_id' => 'id']);
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
}
