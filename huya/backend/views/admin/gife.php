<?php
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;
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
														
														<th>礼物名称</th>
														<th>礼物图片</th>
														<th>礼物明细</th>
														<th>礼物价格</th>
														<th>操作</th>
													</tr>
												</thead>

												<tbody>
													<?php foreach ($data as $key => $val) { ?>
												<tr>
													<td><?= $val['id']?></td>
													<td><?= $val['name']?></td>
													<td><img src="<?= $val['img']?>" alt="" width="77" height="100" ></td>
													<td><?= $val['content']?></td>
													<td><?= $val['price']?></td>
													<td><a href="<?= Url::toRoute(['admin/gife_del','id'=>$val['id']])?>">删除</a></td>
												</tr>
												<?php } ?>
												</tbody>
											</table>
											<center><?= LinkPager::widget(['pagination' => $pages]); ?></center>
										</div><!-- /.table-responsive -->
									</div><!-- /span -->
								</div><!-- /row -->
					</div><!-- /.page-content -->