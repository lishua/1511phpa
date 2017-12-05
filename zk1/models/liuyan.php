<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "liuyan".
 *
 * @property integer $id
 * @property string $biaoti
 * @property string $neirong
 * @property integer $user_id
 */
class liuyan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'liuyan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'integer'],
            [['biaoti', 'neirong'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'biaoti' => 'Biaoti',
            'neirong' => 'Neirong',
            'user_id' => 'User ID',
        ];
    }
}
