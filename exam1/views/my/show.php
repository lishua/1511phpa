<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
?>
<meta charset="utf8">

<style>
table{ border-collapse: collapse; border: 1px solid #ddd; width: 800px; margin: 0 auto;margin-top: 50px; background: rgba(121, 217, 221, 0.4); color: #666}
table tr{ height: 40px;}
table td{ border: 1px solid #ddd; text-align: center}

*{margin: 0; padding:0 ; font-family: 微软雅黑}
a{ text-decoration: none; color: #666;}

.top{ width: 100%; background: rgba(14, 196, 210, 0.99); color: #fff; height: 100px; line-height: 150px; text-align: right;}
.top span{ margin-right: 20px}


.left{ width: 260px; float: left; height: 100%; background: rgba(121, 217, 221, 0.4)}
.left ul{ list-style: none; width: 100%;}
.left ul li{ height: 40px; width: 100%; border: 1px solid #ddd; line-height: 40px; text-align: center;}
.left .selected{ background: rgba(14, 196, 210, 0.99);}
.left .selected a{ color: #fff;}


.right{ float: left; width: 1000px;}
.title{ background: rgba(14, 196, 210, 0.99); color: #fff}
.search-box{ width: 900px; margin: 0 auto; margin-top: 100px; }
</style>

<div class="top">
    <span>欢迎管理员：admin</span>
</div>

<div class="left">
    <ul>
        <li class="selected"><a href="#">查看注册字段</a></li>
        <li><a href="./add.html">添加注册字段</a></li>
    </ul>
</div>

<div class="right">
    <div class="search-box">
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
                <a href="<?= Url::toRoute(['my/save','id'=>$v['id']])?>">修改</a>
                <a href="<?= Url::toRoute(['my/del','id'=>$v['id']]);?>">删除</a>
            </td>
        </tr>
      <?php endforeach ?>
   </table>
    </div>
</div>