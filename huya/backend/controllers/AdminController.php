<?php
namespace backend\controllers;

use Yii;
use yii\db\query;
use app\models\Gife;
use yii\web\Controller;
use yii\data\Pagination;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;
use common\models\LoginForm;
use yii\filters\AccessControl;

/**
 * Site controller
 */
class AdminController extends Controller
{
	public $enableCsrfValidation = false;//这是啥啊

	public function actionGife()
	{
        $sql = Gife::find();
        $pages = new Pagination(['totalCount' =>$sql->count(), 'pageSize' => '2']);
        $data = $sql->offset($pages->offset)->limit($pages->limit)->asArray()->all();
           return $this->render('gife',[
                 'data' => $data,
                 'pages' => $pages,
           ]);       
		// $sql = "SELECT * from gife";
		// $data = Yii::$app->db->createCommand($sql)->queryAll();

		// return $this->render('gife',['data'=>$data]);
	
	}
	//跳转
	public function actionRecharge()
	{
		return $this->render('recharge');
	}
    //添加
	public function actionAddgife()
	{
		$data = yii::$app->request->post();
		// print_r($data);die;
		$model = new Gife();
		$img = UploadedFile::getInstanceByName('img');
		// print_r($img);die;
		$dir = '../web/upload/';
		$name = 'upload/'.$img->name;

		$status = $img->saveAs($name,true);

		if($status) {
			$model->img = $name;
			$model->name = $data['name'];
			$model->content = $data['content'];
			$model->price = $data['price'];

			$model->save();
			$this->redirect('index.php?r=admin/gife');
		}

	}
	//删除礼物
	public function actionGife_del()
    {
        $id = Yii::$app->request->get('id');//接收页面提交要删除的id
        // var_dump($id);die;
        $db = Yii::$app->db;
        $sql= "delete from gife where id = $id";//查询表中对应要的id
        $arr= $db->createCommand($sql)->execute();//执行
        return $this->redirect('index.php?r=admin/gife');//删除后返回展示页面查看
    }

}