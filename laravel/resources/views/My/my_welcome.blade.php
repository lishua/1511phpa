<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="create" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <table>
    	<tr>
    		<td>用户名</td>
    		<td><input type="text" name="name"></td>
    	</tr>
    	<tr>
    		<td>密码</td>
    		<td><input type="text" name="pwd"></td>
    	</tr>
        <tr>
            <td>内容</td>
           <td><textarea name="content" cols="30" rows="10"></textarea></td>
        </tr>
    	<tr>
    		<td><input type="submit" value="提交"></td>
    		<td></td>
    	</tr>
    </table>
    </form>
</body>
</html>