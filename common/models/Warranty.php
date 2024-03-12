<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "warranty".
 *
 * @property int $id
 * @property string $name
 * @property string $calculate
 *
 * @property Product[] $products
 */
class Warranty extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'warranty';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'calculate'], 'required'],
            [['name', 'calculate'], 'string', 'max' => 45],
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
            'calculate' => Yii::t('app', 'Calculate'),
        ];
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::class, ['warranty_id' => 'id']);
    }
}
