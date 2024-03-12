<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "productstate".
 *
 * @property int $id
 * @property string $name
 *
 * @property Product[] $products
 * @property Producttype[] $producttypes
 */
class Productstate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'productstate';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 20],
            [['name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
        ];
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::class, ['productstate_id' => 'id']);
    }

    /**
     * Gets query for [[Producttypes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducttypes()
    {
        return $this->hasMany(Producttype::class, ['productstate_id' => 'id']);
    }
}
