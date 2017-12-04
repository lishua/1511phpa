<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>展示</title>
</head>
<body>
 <center>
   <table border="">
		<tr>
			<td>用户ID</td>
			<td>用户名</td>
			<td>性别</td>
			<td>用户手机号</td>
			<td>用户描述</td>
			<td>操作</td>
		</tr>
	  <?php foreach ($array as $k=>$v): ?>
		<tr>
			<td><?php echo $v['id']?></td>
			<td><?php echo $v['name']?></td>
			<td><?php echo $v['sex']?></td>
			<td><?php echo $v['tel']?></td>
			<td><?php echo $v['content']?></td>
			<td>
				<a href="<?php echo Url::toRoute(['my/save','id'=>$v['id']])?>">修改</a>
				<a href="<?php echo Url::toRoute(['my/del','id'=>$v['id']])?>">删除</a>
			</td>
		</tr>
      <?php endforeach ?>
   </table>
 </center>
</body>
</html>