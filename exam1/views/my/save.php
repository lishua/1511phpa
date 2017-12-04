<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>注册</title>
</head>
<body>
<form action="index.php?r=my/update" method="post">
	<center>
		<table>
			<tr>
				<td>用户名:</td>
				<td><input type="text" name="name" value="<?php echo $arr['name']?>"></td>
			</tr>
			<tr>
				<td>手机号:</td>
				<td><input type="text" name="tel" value="<?php echo $arr['tel']?>"></td>
			</tr>
			<tr>
				<td>性别:</td>
				<td><input type="text" name="sex" value="<?php echo $arr['sex']?>"></td>
			</tr>
			<tr>
				<td>密码:</td>
				<td><input type="text" name="pwd" value="<?php echo $arr['pwd']?>"></td>
			</tr>
			<tr>
				<td>个人描述</td>
				<td><textarea name="content" cols="20" rows="5" value="<?php echo $arr['content']?>"></textarea></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value="<?= $arr['id']?>"></td>
				<td><input type="submit" value="修改"></td>
			</tr>
		</table>
	</center>
</body>
</html>