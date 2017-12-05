<!DOCTYPE html>
<html>
<head>
    <title>日程安排</title>
    <link rel="stylesheet" href="//apps.bdimg.com/libs/jqueryui/1.10.4/css/jquery-ui.min.css">
    <script src="//apps.bdimg.com/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="//apps.bdimg.com/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="jqueryui/style.css">
    <script>
      $(function(){
        $( "#datepicker" ).datepicker();
      });
    </script>
</head>
<body>
    <center>
        <form action="rcadd" method="post">
            <caption><h2><font color="red">日程安排</font></h2></caption>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <table>
                <tr>
                    <th>选择日期：</th>
                    <td>
                        <input type="text" name="time" id="datepicker">
                    </td>
                </tr>
                <tr>
                    <th>选择时间：</th>
                    <td>
                         <select name="shi" id="hour"></select>时
                         <select name="fen" id="minute"></select>分
                    </td>
                </tr>
                <tr>
                    <td>提醒内容：</td>
                    <td><textarea name="content"></textarea></td>
                </tr>
                <tr>
                    <td>是否提醒</td>
                    <td>
                        <input type="radio" checked="checked" name="type" value="1">提醒
                        <input type="radio" name="type" value="2">不提醒
                    </td>
                </tr>
                <tr>
                    <td><input type="submit" value="提交"></td>
                    <td></td>
                </tr>
            </table>
        </form>
    </center>
</body>
</html>
<script type="text/javascript">
    window.onload = function ()
    {
        var hour = document.getElementById ("hour");
        var min = document.getElementById ("minute");
         
        for ( var i = 0; i < 24; i++)
        {
            var opt = document.createElement("option");
            opt.value = i;
            opt.innerText = i;
            hour.appendChild(opt);
        }
         
        for ( var i = 0; i < 60; i++)
        {
            var opt = document.createElement("option");
            opt.value = i;
            opt.innerText = i;
            min.appendChild(opt);
        }
    }
</script>