<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;
class Tent extends ActiveRecord{
    public static function tableName(){
        return "tent";
    }
    public function getCeshi(){
     return $this->hasOne(Ceshi::className(),['id'=>'user_id']);
    }
}

?>
