<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"> 
	<title>Document</title>
</head>
<body>
	<centent>
		<form action="update" method="post">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<table>
				<tr>
					<td>名称</td>
					<td><input type="text" name="name"  value="<?php echo $res->name?>"></td>
				</tr>
				<tr>
					<td>内容</td>
					<td><textarea name="content" cols="30" rows="10" ><?php echo $res->content?></textarea></td>
				</tr>
				<tr>
					<td><input type="hidden" name="id" value="<?= $res->id?>"></td>
					<td><input type="submit" value="提交"></td>
				</tr>
			</table>
		</form>
	</centent>
</body>
</html>