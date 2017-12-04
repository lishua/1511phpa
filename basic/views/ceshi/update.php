<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"> 
	<title>Document</title>
</head>
<body>
	<centent>
		<form action="index.php?r=ceshi/save" method="post">
			<table>
				<tr>
					<td>标题</td>
					<td><input type="text" name="biaoti"  value="<?php echo $result['biaoti']?>"></td>
				</tr>
				<tr>
					<td>内容</td>
					<td><textarea name="checked" cols="30" rows="10"  value="<?php echo $result['checked']?>"></textarea></td>
				</tr>
				<tr>
					<td><input type="hidden" name="id" value="<?= $result['id']?>"></td>
					<td><input type="submit" value="提交" id="sb"></td>
				</tr>
			</table>
		</form>
	</centent>
</body>
</html>