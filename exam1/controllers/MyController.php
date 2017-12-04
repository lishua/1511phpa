<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\data\Pagination;
use DfaFilter\SensitiveHelper;

class MyController extends Controller
{    
    public $enableCsrfValidation=false;
    //注册
     public function actionRegister(){
        return $this->render('register');
     }
     public function actionAd(){
        $data = Yii::$app->request->post();//接收表单提交数据
        //判断手机号非空
        if($data['tel']=='')
        {
           echo "<script>alert('手机号不能为空！')</script>";
           return $this->render('register');
        }
        $db = Yii::$app->db;
        $arr= $db->createCommand()->insert('register',$data)->execute();//添加数据入库
        if($arr)
        {
           echo "注册成功";
           return $this->redirect('index.php?r=my/show');
        }else
        {
           echo "注册失败";
        }
     }
     //展示
     public function actionShow(){
        $db = Yii::$app->db;
        $sql= "select * from register";//查询表单
        $data= $db->createCommand($sql)->queryAll();//给查询出的所有数据赋值
        // print_r($arr);die;
        // return $this->render('lists',['array'=>$data]);
        return $this->render('show',['array'=>$data]);//跳转页面赋值
     }
     //删除
     public function actionDel(){
        $id = Yii::$app->request->get('id');//接收页面提交要删除的id
        // var_dump($id);die;
        $db = Yii::$app->db;
        $sql= "delete from register where id = $id";//查询表中对应要的id
        $arr= $db->createCommand($sql)->execute();//执行
        return $this->redirect('index.php?r=my/show');//删除后返回展示页面查看

     }
     //修改
     public function actionSave(){
        $id = Yii::$app->request->get('id');
        // var_dump($id);die;
        $db = Yii::$app->db;
        $sql = "select * from register where id = $id";
        $arr = $db->createCommand($sql)->queryOne();
        return $this->render('save',['arr'=>$arr]);
     }
     public function actionUpdate(){
        $id = Yii::$app->request->post('id');
        $name = Yii::$app->request->post('name');
        $pwd = Yii::$app->request->post('pwd');
        $content = Yii::$app->request->post('content');
        $tel = Yii::$app->request->post('tel');
        $sex = Yii::$app->request->post('sex');
        $db = Yii::$app->db;
        $sql = "update register set name='$name',pwd=$pwd,content='$content',tel=$tel,sex='$sex' where id=$id";
        // var_dump($sql);die;
        $arr = $db->createCommand($sql)->execute();
        
        $this->redirect('index.php?r=my/show');
     }
}