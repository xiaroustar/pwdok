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
                        <h4 class="xp-page-title">网站设置</h4>
                    </div>
                    <div class="col-md-6 col-lg-6">
                        <div class="xp-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php"><i class="icon-home">首页</i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">网站设置</li>
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
                                <h5 class="card-title text-black">网站设置</h5>
                                <h6 class="card-subtitle">配置你的网站信息.</h6>
                            </div>

                            <div class="card-body">

                                <form id="doc-vld-msg">
                                  <div class="form-group row">
                                    <label for="user-name" class="col-sm-4 col-form-label">网站标题</label>
                                    <div class="col-sm-8">
                                      <input type="text" value="<?=$conf['title'];?>" class="form-control" id="title" placeholder="请填写标题" name="title" required>
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="user-name" class="col-sm-4 col-form-label">网站描述</label>
                                    <div class="col-sm-8">
                                      <input type="text" value="<?=$conf['describe'];?>" class="form-control" id="describe" placeholder="请填写描述信息" name="describe" required>
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="user-name" class="col-sm-4 col-form-label">网站关键词</label>
                                    <div class="col-sm-8">
											<input type="text" value="<?=$conf['keywords'];?>" class="form-control" id="keywords" placeholder="请填写描述信息" name="keywords" required>
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="user-name" class="col-sm-4 col-form-label">IP黑名单</label>
                                    <div class="col-sm-8">
<textarea class="form-control" id="ipadmin" name="ipadmin"  placeholder="请填写黑名单"><?=$conf['ipadmin'];?></textarea>
											<small id="info">多ＩＰ用,分隔</small>
											</div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="user-name" class="col-sm-4 col-form-label">网站注册开关</label>
                                    <div class="col-sm-8">
												<input type="checkbox" class="form-control" <?php if($conf['sign']==1){echo 'checked=""';}?> name="sign" id="sign"　data-am-ucheck>
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="user-name" class="col-sm-4 col-form-label">调试模式</label>
                                    <div class="col-sm-8">
                                                <input type="checkbox" class="form-control" <?php if($conf['debug']==1){echo 'checked=""';}?> name="debug" id="debug"　data-am-ucheck>                                    </div>
                                  </div>
                                 
                                  <button type="button" class="btn btn-primary" onclick="set_setting()">提交</button>
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
		function set_setting(){
			var title=$('#title').val();
			var describe=$('#describe').val();
			var keywords=$('#keywords').val();
			var ipadmin=$('#ipadmin').val();
			var sign = $("#sign").is(':checked') ? 1 : 0;
			var debug = $("#debug").is(':checked') ? 1 : 0;
			console.log(sign);
			console.log(debug);
			$.post('ajax.php?action=setting', {title:title,describe:describe,keywords:keywords,ipadmin:ipadmin,sign:sign,debug:debug}, function(res){
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