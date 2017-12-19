<?php
	header("content-type:text/html;charset=UTF-8");
	require_once 'Model.php';
	$redis = new Redis();
	$redis->connect('127.0.0.1',6379);
	$model = Model::getDB('seckill');
	$list = $model->select();
	
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="">
	<table>
	<tr>
			<td>商品id</td>
			<td>商品名称</td>
			<td>商品价格</td>					
			<td>秒杀价格</td>
			<td>商品数量</td>
			<td>剩余数量</td>
			<td>操作</td>
		</tr>
		<?php foreach ($list as $k => $val) {?>
			<tr>
			<td><?= $val['id'];?></td>
			<td><?= $val['goods_name'];?></td>
			<td><?= $val['goods_price'];?></td>
			<td><?= $val['kill_price'];?></td>
			<td><?= $val['goods_num'];?></td>
			<td><?= $redis->lsize('seckill_'.$val['id']);?></td>
			<td><a href="set_order.php?id=<?= $val['id'];?>">秒杀</a></td>
		</tr>
		<?php 
		}?>
		</table>
	</form>
</body>
</html>