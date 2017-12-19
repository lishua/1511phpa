<?php
	header("content-type:text/html;charset=UTF-8");
	require_once 'Model.php';
	$redis = new Redis();
	$redis->connect('127.0.0.1',6379);
	$model = Model::getDB('seckill');

	$id = 3;
	$time = time();
	$model->where('id='. $id .' and start_time < ' . $time .' and end_time > ' .$time);
	$is_kill = $model->find();
	if(!$is_kill){
		echo '秒杀结束';die;
	}

	$key = 'seckill_'.$id;
	if(!$redis->lpop($key)){
		echo '秒杀结束，库存为空';die;
	}
	$model->where('id=' . $id);
	$res = $model->update('goods_num = goods_num - 1');
	if($res){
		
		echo '下单成功';die;
	}
	$redis->rpush($key,1);
	
		echo '下单失败';die;
	

?>