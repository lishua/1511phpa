<?php
use yii\helpers\Url;
?>
<div class="main-content">
					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<ul class="breadcrumb">
							<li>
								<i class="icon-home home-icon"></i>
								<a href="#">首页</a>
							</li>
							<li class="active">账号管理</li>
                            <li class="active">余额充值</li>
						</ul><!-- .breadcrumb -->
					</div>

					<div class="page-content">
						<form  class="form-horizontal" role="form" action="<?= Url::toRoute(['admin/addgife']); ?>" method="post" enctype="multipart/form-data">
							<table border="0" cellspacing="5" cellpadding="4">
								<tr>
									<td>礼物名称：</td>
									<td><input type="text" name="name"></td>
								</tr>
								<tr>
									<td>礼物图片：</td>
									<td><input type="file" name="img"></td>
								</tr>
								<tr>
									<td>礼物明细：</td>
									<td><textarea name="content" cols="30" rows="10"></textarea></td>
								</tr>
								<tr>
									<td>礼物价格：</td>
									<td><input type="text" name="price"></td>
								</tr>
								<tr>
									<td></td>
									<td><input type="submit" value="提交"></td>
								</tr>
							</table>
						</form>
					</div><!-- /.page-content -->
				</div>