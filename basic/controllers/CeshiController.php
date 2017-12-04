<?php 

	namespace app\controllers;

  
	use Yii;
	use yii\web\Controller;
	use app\models\Ceshi;
	use app\models\Tent;
	use yii\data\Pagination;
    use DfaFilter\SensitiveHelper;

	class CeshiController extends Controller{
		// public $layout = false;
		public $enableCsrfValidation=false;
		public function actionSay(){
        	return $this->render('say');
    	}
    
    	public function actionLists(){

    		$obj = Yii::$app->request;
    		$arr = $obj->post();
    		$db = Yii::$app->db;
    		
    		$res = Ceshi::find()->where("name = '$arr[name]'")->one();
    		if(!$res){
    			echo '用户名错误';
    		}
            else
            {  
                $ary = Ceshi::find()->where("password = '$arr[password]'")->one();
                if(!$ary)
                {
                    echo '密码错误';
                }
                else
                {
                    echo '登录成功!';
                    $this->redirect(['add','id'=>$ary['id']]);
                }
    			
    		}

    	}
    		public function actionAdd(){
    			$id = Yii::$app->request->get();
    			
    			return $this->render('add',['id'=>$id['id']]);
    	}
    	public function actionDoadd(){
    		$data = Yii::$app->request->post();
            // var_dump($data);die;

            // 获取感词库索引数组
            $wordData = array(
                '察象蚂',
                '拆迁灭',
                '车牌隐',
                '成人电',
                '成人卡通',
                '傻逼',
                '尼玛',
            );
    	   
           $data['checked'] = SensitiveHelper::init()->setTree($wordData)->replace($data['checked'], '~~~~');

	    	$db = Yii::$app->db;
        	$arr = $db->createCommand()->insert('tent',$data)->execute();

        	if($arr){
        		echo '入库成功！';
        		$this->redirect('index.php?r=ceshi/show');
        	}else{
        		echo '入库失败';die;
        	}
    	}
    	public function actionShow(){
            $sql = Tent::find();

			$pages = new Pagination(['totalCount' =>$sql->count(), 'pageSize' => '3']);    //实例化分页类,带上参数(总条数,每页显示条数)
			$model = $sql->joinWith(['ceshi'])->select('name,Tent.user_id,Tent.id,Tent.checked,tent.biaoti')->offset($pages->offset)->limit($pages->limit)->asArray()->all();
			
			return $this->render('show',['pages' => $pages,'model' => $model]);
    	}
    	public function actionDelete(){
           $id = Yii::$app->request->get('id');
           $arr = Tent::deleteall("id='$id'");
           if($arr){
				$this->redirect("index.php?r=ceshi/show");
			}else{
				echo "失败";
			}
    	}
    	public function actionUpdate(){
          $id = Yii::$app->request->get('id');
          $db = Tent::find()->where("id='$id'")->one();
          return $this->render('update',array('result'=>$db));
    	}
    	public function actionSave(){
    		$arr = Yii::$app->request->post();
        	// print_r($arr);die;
        	$id = $arr['id'];
        	$biaoti = $arr['biaoti'];
        	$checked = $arr['checked'];
        	$db = Tent::find()->where("id='$id'")->One();
        	$db->biaoti = $biaoti;
        	$db->checked = $checked;
        	$info = $db->save();
        	if($info){
        		$this->redirect("index.php?r=ceshi/show");
        	}else{
        		echo "失败";
        	}
    	}
	}
?>