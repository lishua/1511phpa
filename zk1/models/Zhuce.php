<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "zhuce".
 *
 * @property integer $id
 * @property string $username
 * @property string $sr
 * @property string $dz
 * @property string $sjh
 * @property string $password
 * @property string $hobby
 */
class Zhuce extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zhuce';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'sr', 'dz', 'sjh', 'password', 'hobby'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'sr' => 'Sr',
            'dz' => 'Dz',
            'sjh' => 'Sjh',
            'password' => 'Password',
            'hobby' => 'Hobby',
        ];
    }
}
