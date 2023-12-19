<?php
include("../include/init.php");
$title = '密码生成';
include 'header.php';
if ($islogin == 1||$Ulogin==1) {} else exit("<script language='javascript'>window.location.href='./404.php';</script>");
?>
		<?php include 'left-nav.php';?>
		<!-- 内容区域 -->
	<div class="xp-breadcrumbbar">
                <div class="row">
                    <div class="col-md-6 col-lg-6">
                        <h4 class="xp-page-title">密码生成</h4>
                    </div>
                    <div class="col-md-6 col-lg-6">
                        <div class="xp-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php"><i class="icon-home">首页</i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">密码生成</li>
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
                  <div class="col-lg-12">
                        <div class="card m-b-30">

                            <div class="card-header bg-white">
							<div class="widget-title am-fl">密码生成</div>
							<div class="widget-function am-fr">
								<a href="javascript:;" class="am-icon-cog"></a>
							</div>
						</div>
						<div class="widget-body am-fr">

							<div class="am-form-group">
								<h3>选项</h3>
								<label class="am-checkbox-inline">
									<input type="checkbox"  value="" data-am-ucheck id="include_number" checked> 数字
								</label>
								<label class="am-checkbox-inline">
									<input type="checkbox"  value="" data-am-ucheck id="include_lowercaseletters" checked> 小写字母
								</label>
								<label class="am-checkbox-inline">
									<input type="checkbox"  value="" data-am-ucheck id="include_uppercaseletters" checked> 大写字母
								</label>
								<label class="am-checkbox-inline">
									<input type="checkbox"  value="" data-am-ucheck id="include_punctuation"> 标点符号
								</label>
								<label class="am-checkbox-inline">
									<input type="checkbox"  value="" data-am-ucheck id="password_unique"> 字符不重复
								</label>
							</div>
							<div class="layui-form-item">

								<div class="layui-inline">
									<label class="layui-label">密码长度</label>
									<input type="number"  required="" lay-verify="required" lay-vertype="tips" placeholder="请输入密码" autocomplete="off" class="layui-input" min="0" value="8"  id="password_length">
								</div>

								<div class="layui-inline">
									<label class="layui-label">密码数量</label>
									<input type="number" required="" lay-verify="required" lay-vertype="tips" placeholder="请输入密码" autocomplete="off" class="layui-input" min="0" value="5" id="password_quantity">
								</div>
							</div>
							<div class="layui-input-item">
								<textarea placeholder="请输入内容" class="layui-textarea" id="output" rows="7"></textarea>
							</div>
							<div class="layui-form-item">
								<button class="layui-btn" lay-submit="" id="generate">立即提交</button>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>

</div>
</div>

<script src="/assets/js/rand_key.js"></script>
<script src="/assets/js/amazeui.min.js"></script>
<script src="/assets/js/amazeui.datatables.min.js"></script>
<script src="/assets/js/dataTables.responsive.min.js"></script>
<script src="/assets/js/app.js"></script>


<script>

</script>

</html>