<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use yii\widgets\LinkPager;
    use yii\helpers\Url;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
<centent>
	<center>
	<table border="">
		<tr>
			<td>序号</td>
			<td>用户名称</td>
			<td>标题</td>
			<td>内容</td>
			<td>操作</td>
		</tr>
		<?php foreach($model as $k => $val) {?>
			<tr>
			<td><?= $val['id']?></td>
			<td><?= $val['ceshi']['name']?></td>
			<td><?= $val['biaoti']?></td>
			<td><?= $val['checked']?></td>
			<td>
			<a href="<?= Url::toRoute(['ceshi/delete','id'=>$val['id']]);?>">删除</a>
            <a href="<?= Url::toRoute(['ceshi/update','id'=>$val['id']]);?>">修改</a>

			</td>
		</tr>
		<?php }?>
	</table>
	<?= LinkPager::widget(['pagination' => $pages]);?>
	</center>
		
</centent>
</body>
</html>