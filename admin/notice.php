<?php
include("../include/init.php");
$title = '公告管理';
include 'header.php';
// if ($islogin == 1) {} else exit("<script language='javascript'>window.location.href='./404.php';</script>");
?>
		<?php include 'left-nav.php';?>
		<!-- 内容区域 -->
		<!-- Start XP Breadcrumbbar -->
             <div class="xp-breadcrumbbar">
                <div class="row">
                    <div class="col-md-6 col-lg-6">
                        <h4 class="xp-page-title">网站公告</h4>
                    </div>
                    <div class="col-md-6 col-lg-6">
                        <div class="xp-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php"><i class="icon-home">首页</i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">网站公告</li>
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
                                <h5 class="card-title text-black">网站公告<div class="widget-function am-fr">
									<a href="javascript:inc_notice();" class="am-icon-plus-square" title="新增公告"></a>
								</div></h5>
                                <h6 class="card-subtitle">编辑你的网址公告.</h6>
                            </div>
<div class="widget-body  widget-body-lg am-fr">
								<div>
								</div>
								<div class="am-fl tpl-header-search"></div>


								<table class="layui-hide layui-bg-black" id="notice_list" lay-filter="notice_list"></table>
								<script type="text/html" id="chaozuo">
									<a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del"><font color="white">删除</font></a>
								</script>
							</div>
                            </div>
                        </div>
                    </div> 
                    <!-- End XP Col -->

                </div> <!-- end row -->   

            </div>

	<script>

		layui.use('table', function(){
			var table = layui.table
			,form = layui.form;
			table.render({
				skin: 'nob'
				,even: false
				,elem: '#notice_list'
				,url:'ajax.php?action=notice_list'
				,cellMinWidth: 80
				,cols: [[
				{type:'numbers'}
				,{field:'content', title:'内容'}
				,{field:'time', title:'时间'}
				,{field:'level', title:'权重',sort: true}
				,{title:'操作',templet: '#chaozuo', width:180}
				]]
				,page: true
			});
			table.on('tool(notice_list)', function(obj){
				var data = obj.data;
				if(obj.event === 'del'){
					layer.confirm('真的删除行么', function(index){
						del(data.id);
						obj.del();
						layer.close(index);
					});
				}
			});

		});

		function del(id){
			$.post('ajax.php?action=notice_del',{id:id}, function(res){
				if(res['code']==200){
					layui.use('layer', function(){
						layer.msg('删除成功');
					});
				}else{
					layui.use('layer', function(){
						layer.msg('删除失败')
					});
				}
			})

		}

		function inc_notice(){
			var text = '<form class="layui-form" action="" lay-filter="info" >\
			<div class="layui-fluid">\
			<input type="hidden" id="id_info" name="id">\
			<div class="layui-form-item">\
			<label class="layui-form-label">内容</label>\
			<div class="layui-input-block">\
			<input type="text"  lay-verify="title"  placeholder="内容" class="layui-input"  name="content" id="content_info">\
			</div>\
			</div>\
			<div class="layui-form-item">\
			<label class="layui-form-label">权重</label>\
			<div class="layui-input-block">\
			<input type="text"  lay-verify="text" autocomplete="off" placeholder="权重" class="layui-input"  name="level" id="level_info">\
			</div>\
			</div>\
			<div class="layui-form-item">\
			<div class="layui-input-block">\
			<button class="layui-btn" lay-submit="" lay-filter="formGet_inc">立即提交</button>\
			<button type="reset" class="layui-btn layui-btn-primary">重置</button>\
			</div>\
			</div>\
			</div>\
			</form>'
			layer.open({
				type: 1,
				title: '新增公告',
				skin: 'layui-layer-rim',
				area: ['420px', '300px'],
				content: text
			});
		}
	</script>

	<script type="text/javascript">

		layui.use('form', function(){
			var form = layui.form;
			form.on('submit(formGet_inc)', function(data){
				var content = $('#content_info').val();
				var level = $('#level_info').val();
				$.post('ajax.php?action=notice_inc', {content:content,level:level}, function(res){
					if(res['code']==200){
						layui.use('layer', function(){
							layer.closeAll();
							layer.msg(res['msg'])
						});
					}else{
						layui.use('layer', function(){
							layer.closeAll();
							layer.msg(res['msg'])
						});
					}
				})
				return false;
			});
		});
	</script>
	<script src="/assets/js/amazeui.min.js"></script>
	<script src="/assets/js/amazeui.datatables.min.js"></script>
	<script src="/assets/js/dataTables.responsive.min.js"></script>
	<script src="/assets/js/app.js"></script>


</html>