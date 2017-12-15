<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gife".
 *
 * @property string $id
 * @property string $name
 * @property string $img
 * @property string $content
 * @property double $price
 */
class Gife extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gife';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['price'], 'number'],
            [['name', 'img', 'content'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'img' => 'Img',
            'content' => 'Content',
            'price' => 'Price',
        ];
    }
}
