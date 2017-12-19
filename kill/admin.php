<?php
	header("content-type:text/html;charset=UTF-8");
	if(!empty($_POST)){
		require_once 'Model.php';
		$post = $_POST;
		// print_r($post);die;
		$post['start_time'] = strtotime($post['start_time']);
		$post['end_time'] = strtotime($post['end_time']);
		$model = Model::getDB('seckill');
		$id = $model->insert($post);
		if($id){
			$redis = new Redis();
			$redis->connect('127.0.0.1',6379);
			for($i = 0; $i < $post['goods_num']; $i++){
				$redis->rpush('seckill_' . $id , 1);
			}

			echo '创建成功';die;
		}else{
			echo '创建失败';die;
		}

	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="" method="post">
		<table>
	<tr>
		<td>商品名称</td>
		<td><input type="text" name="goods_name"></td>
	</tr>
	<tr>
		<td>商品价格</td>
		<td><input type="text" name="goods_price"></td>
	</tr>
	<tr>
		<td>秒杀价格</td>
		<td><input type="text" name="kill_price"></td>
	</tr>
	<tr>
		<td>商品数量</td>
		<td><input type="text" name="goods_num"></td>
	</tr>
	<tr>
		<td>开始时间</td>
		<td><input type="date" name="start_time"></td>
	</tr>
	<tr>
		<td>结束时间</td>
		<td><input type="date" name="end_time"></td>
	</tr>
	<tr>
		<td></td>
		<td><input type="submit" value="点击秒杀"></td>
	</tr>
</table>

	</form>
</body>
</html>

