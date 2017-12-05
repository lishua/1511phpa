<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<center>
		<table>
			<tr>
				<td>序号</td>
				<td>用户名称</td>
				<td>内容</td>
				<td>操作</td>
			</tr>
			<?php foreach($res as $k=>$v):?>
				<tr>
					<td><?php echo $v->id?></td>
					<td><?php echo $v->name?></td>
					<td><?php echo $v->content?></td>
					<td>
						<a href="del?id=<?php echo $v->id?>">删除</a>
						<a href="edit?id=<?php echo $v->id?>">修改</a>
					</td>
				</tr>
			<?php endforeach;?>
		</table>
	</center>
</body>
</html>