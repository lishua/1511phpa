<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Zb_list".
 *
 * @property integer $id
 * @property string $zb_name
 * @property integer $room_num
 * @property integer $u_id
 */
class ZbList extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Zb_list';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['room_num', 'u_id'], 'integer'],
            [['zb_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'zb_name' => 'Zb Name',
            'room_num' => 'Room Num',
            'u_id' => 'U ID',
        ];
    }
}
