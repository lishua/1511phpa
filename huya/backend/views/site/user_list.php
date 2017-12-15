<?php
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;
?>
<style>
	td{
		text-align: center;
		font-size: 18px;
	}
	th{
		text-align: center;
	}
</style>
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
							<li class="active">账户管理</li>
                            <li class="active">用户列表</li>
						</ul><!-- .breadcrumb -->
					</div>

					<div class="page-content">


								<div class="row">
									<div class="col-xs-12">
										<div class="table-responsive">
											<table id="sample-table-1" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th class="center">
															<label>
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</th>
														<th>编号</th>
														<th>用户名称</th>
														<th>用户性别</th>
														<th>注册时间</th>
														<th>操作</th>
													</tr>
												</thead>

												<tbody>
													<?php foreach ($list as $key => $value) { ?>
													<tr>
														<td class="center">
															<label>
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</td>

														<td><?=$value['id'] ?> </td>
														<td><?=$value['name'] ?></td>
														<td><?=$value['sex'] ?></td>
														<td><?=$value['time'] ?></td>
														<td style="text-align: center; width:150px;">
											                <a href="<?= Url::toRoute(['site/user_del','id'=>$value['id']])?>"><button class="btn">删除<tton></a>
											                <a href=""><button class="btn btn-danger">修改<tton></a>
											            </td>
														<!-- <td style="color:red;">交易失败</td> -->
													</tr>
												<?php } ?>
												</tbody>
											</table>
											  <center><?= LinkPager::widget(['pagination' => $pages]); ?></center>
										</div><!-- /.table-responsive -->
									</div><!-- /span -->
								</div><!-- /row -->
					</div><!-- /.page-content -->
				</div><!-- /.main-content -->