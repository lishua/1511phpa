<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="show" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
   <center>
	<h1><font color="red">登陆界面</font></h1>
    <table>
    	<tr>
    		<td>用户名</td>
    		<td><input type="text" name="username"></td>
    	</tr>
    	<tr>
    		<td>密码</td>
    		<td><input type="text" name="password"></td>
    	</tr>
    	<tr>
    		<td><input type="submit" value="提交"></td>
    		<td></td>
    	</tr>
    </table>
   </center>
    </form>
</body>
</html>