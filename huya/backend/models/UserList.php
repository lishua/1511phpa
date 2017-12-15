<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_list".
 *
 * @property integer $id
 * @property string $name
 * @property string $pwd
 * @property string $time
 * @property string $sex
 */
class UserList extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_list';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['time'], 'safe'],
            [['name', 'pwd', 'sex'], 'string', 'max' => 255],
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
            'pwd' => 'Pwd',
            'time' => 'Time',
            'sex' => 'Sex',
        ];
    }
}
