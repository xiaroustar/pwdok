<?php
include("../include/init.php");
$title = '后台设置';
include 'header.php';
// if ($islogin == 1) {} else exit("<script language='javascript'>window.location.href='./404.php';</script>");
?>
		<?php include 'left-nav.php';?>

		<!-- 内容区域 -->
		<!-- Start XP Breadcrumbbar -->
            <div class="xp-breadcrumbbar">
                <div class="row">
                    <div class="col-md-6 col-lg-6">
                        <h4 class="xp-page-title">SMTP配置</h4>
                    </div>
                    <div class="col-md-6 col-lg-6">
                        <div class="xp-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php"><i class="icon-home">首页</i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">SMTP配置</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End XP Breadcrumbbar -->

            <!-- Start XP Contentbar -->
           <div class="xp-contentbar">

                <!-- Start XP Row -->
                <div class="row">                    

                    <!-- Start XP Col -->
                    <div class="col-lg-6">
                        <div class="card m-b-30">

                            <div class="card-header bg-white">
                                <h5 class="card-title text-black">SMTP配置</h5>
                                <h6 class="card-subtitle">配置你的发信信息.</h6>
                            </div>

                            <div class="card-body">
	                            <?php
    								$set->table_name = 'pwd_smtp';
    								$smtp_set = $set->find(array('id'=>1),'','*');
    								if(!$smtp_set){exit('获取配置失败');}
    							?>
                                <form id="doc-vld-msg" id="doc-vld-msg_smtp">
                                  <div class="form-group row">
                                    <label for="user-name" class="col-sm-4 col-form-label">邮件服务器</label>
                                    <div class="col-sm-8">
											<input type="text" value="<?=$smtp_set['host'];?>" class="form-control" id="host" placeholder="请填写标题" name="host" required>
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="user-name" class="col-sm-4 col-form-label">发信端口</label>
                                    <div class="col-sm-8">
											<input type="text" value="<?=$smtp_set['port'];?>" class="form-control" id="port" placeholder="发信端口" name="port" required>
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="user-name" class="col-sm-4 col-form-label">发信账号</label>
                                    <div class="col-sm-8">
											<input type="text" value="<?=$smtp_set['username'];?>" class="form-control" id="username" placeholder="发信账号" name="username" required>
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="user-name" class="col-sm-4 col-form-label">发信密码</label>
                                    <div class="col-sm-8">
											<input type="password" value="<?=$smtp_set['password'];?>" class="form-control" id="password" placeholder="发信账号" name="password" required>
											</div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="user-name" class="col-sm-4 col-form-label">发件人</label>
                                    <div class="col-sm-8">
											<input type="text" value="<?=$smtp_set['sub'];?>" class="form-control" id="sub" placeholder="发件人" name="sub" required>
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="user-name" class="col-sm-4 col-form-label">ssl开关</label>
											<div class="col-sm-8">
												<input type="checkbox" class="form-control" <?php if($smtp_set['ssl']==1){echo 'checked=""';}?> name="ssl" id="ssl"　data-am-ucheck>
												<div class="tpl-switch-btn-view">
													<div></div>
												</div>
											</div>
											
									</div>
                                  </div>
                                 
                                  <button type="button" class="btn btn-primary" onclick="set_smtp()">提交</button>
                                </form>                                            

                            </div>
                        </div>
                    </div> 
                    <!-- End XP Col -->

                </div> <!-- end row -->   

            </div>

	<script src="/assets/js/amazeui.min.js"></script>
	<script src="/assets/js/amazeui.datatables.min.js"></script>
	<script src="/assets/js/dataTables.responsive.min.js"></script>
	<script src="/assets/js/app.js"></script>


	<script>
		$(function() {
			$('#doc-vld-msg').validator({
				onValid: function(validity) {
					$(validity.field).closest('.am-form-group').find('#info').hide();
				},

				onInValid: function(validity) {
					var $field = $(validity.field);
					var $group = $field.closest('.am-form-group');
					var $alert = $group.find('#info');
					var msg = $field.data('validationMessage') || this.getValidationMessage(validity);

					$alert.html(msg).show();
				}
			});
		});
		$(function() {
			$('#doc-vld-msg_smtp').validator({
				onValid: function(validity) {
					$(validity.field).closest('.am-form-group').find('#info').hide();
				},

				onInValid: function(validity) {
					var $field = $(validity.field);
					var $group = $field.closest('.am-form-group');
					var $alert = $group.find('#info');
					var msg = $field.data('validationMessage') || this.getValidationMessage(validity);

					$alert.html(msg).show();
				}
			});
		});

		function set_smtp(){
			var host=$('#host').val();
			var port=$('#port').val();
			var username=$('#username').val();
			var password=$('#password').val();
			var sub = $('#sub').val();
			var ssl = $("#ssl").is(':checked') ? 1 : 0;
			$.post('ajax.php?action=set_smtp', {host:host,port:port,username:username,password:password,sub:sub,ssl:ssl}, function(res){
				if(res['code']==200){
					layui.use('layer', function(){
						layer.msg('修改成功')
					});
				}else{
					layui.use('layer', function(){
						layer.msg('修改失败:'+res['msg'])
					});
				}
			})
			.error(function(res) {
				layui.use('layer', function(){
					layer.msg('ERROR:请求服务器失败'+res)
				});
			});
		}

	</script>

</html>