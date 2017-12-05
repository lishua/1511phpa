<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Liuyan;
use app\models\User;
use app\models\Zhuce;
use DfaFilter\SensitiveHelper;
class LianxiController extends Controller
{
    public $layout = false;
   	public $enableCsrfValidation = false;
   	public function actionAdd_do1()
    {
        $cookie = Yii::$app->request->cookies;
        if(isset($cookie['id']))
        {
          $id = $cookie['id'];
          $sjh = Yii::$app->request->post('sjh');
          $password = Yii::$app->request->post('password');
          $qrpassword = Yii::$app->request->post('qrpassword');
          if($password != $qrpassword)
          {
            echo "<script>alert('两项密码不相同');location.href='index.php?r=site/index'</script>";
          }
          $model = Zhuce::findOne($id);
          $model->sjh = $sjh;
          $model->password = $password;
          $res = $model->save();
          if($res)
          {
            return $this->redirect('index.php?r=lianxi/add_2'); 
          }else{
            echo "<script>alert('添加失败');location.href='index.php?r=site/index'</script>";
          }
        }else{
          $sjh = Yii::$app->request->post('sjh');
          $password = Yii::$app->request->post('password');
          $qrpassword = Yii::$app->request->post('qrpassword');
          if($password != $qrpassword)
          {
            echo "<script>alert('两项密码不相同');location.href='index.php?r=site/index'</script>";
          }
          $model = new Zhuce();
          $model->sjh = $sjh;
          $model->password = $password;
          $res = $model->save();
          if($res)
          {
            $id = $model->db->getLastInsertID();
            $cookie = new \yii\web\Cookie();
            $cookie -> name = 'id';        //cookie的名称
            $cookie -> expire = time() + 3600;   //存活的时间
            $cookie -> httpOnly = true;     //无法通过js读取cookie
            $cookie -> value =  $id;     //cookie的值
            \Yii::$app->response->getCookies()->add($cookie);
            return $this->redirect('index.php?r=lianxi/add_2'); 
          }else{
            echo "<script>alert('添加失败');location.href='index.php?r=site/index'</script>";
          }
        }    
    }
    public function actionAdd_2()
    {
      $cookie = Yii::$app->request->cookies;
      if(isset($cookie['id'])){
            $id = $cookie['id'];
            $model = new Zhuce();
            $data=$model->find()->where(['id'=>$id])->asArray()->One();
            return $this->render('add_2',['data'=>$data]);
      }else{
          $data = array(
              'username'=>'',
              'sr'=>'',
              'dz'=>''
          );
          return $this->render('add_2',['data'=>$data]);
      }
    }
    public function actionAdd_do2()
    {
        $cookie = Yii::$app->request->cookies;
        $id = $cookie['id'];
        $username = Yii::$app->request->post('username');
        $sr = Yii::$app->request->post('sr');
        $dz = Yii::$app->request->post('dz');
        $db = Zhuce::findOne($id);
        $db->username = $username;
        $db->sr = $sr;
        $db->dz = $dz;
        $res = $db->save();
        if($res)
        {
          return $this->redirect('index.php?r=lianxi/add_3');
        }else{
          echo "<script>alert('添加失败');location.href='index.php?r=site/add_2'</script>";
        }
    }
    public function actionAdd_3()
    {
      $sql="SELECT * FROM hobby";
      $data = Yii::$app->db->createCommand($sql)->queryAll();
      return $this->render('add_3',['data'=>$data]);
    }
    public function actionWc()
    {
        $cookie = Yii::$app->request->cookies;
        $id = $cookie['id'];
        $bq_id = Yii::$app->request->post('hobby');
        $hobby = json_encode($bq_id);
        $db = Zhuce::findOne($id);
        $db->hobby = $hobby;
        $res = $db->save();
        if($res)
        {
          \yii::$app->response->cookies->remove('id');
          return $this->redirect('index.php?r=site/index');
        }else{
          \yii::$app->response->cookies->remove('id');
          echo "<script>alert('添加失败');location.href='index.php?r=site/index'</script>";
        }
    }
}
?>