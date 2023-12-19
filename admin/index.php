<?php
include("../include/init.php");
if ($islogin == 1||$Ulogin==1) {} else exit("<script language='javascript'>window.location.href='./login.php';</script>");
if($islogin == 1){
	$set->table_name = 'pwd_user';
	$udata = $set->find(array('id'=>1),'','');
	$count_user = $set->findCount('','','');
	$count_user = $count_user ? $count_user : 0;
	$set->table_name = 'pwd_pwd';
	$day_time = date("Y-m-d");
	$count_day = $set->findCount(array("intime like :intime", ":intime" => '%'.$day_time.'%'),'','');
	$count_day = $count_day ? $count_day : 0;
	$count_pwd = $set->findCount('','','');
	$count_pwd = $count_pwd ? $count_pwd : 0;
}elseif($Ulogin==1){
	$set->table_name = 'pwd_user';
	$count_user = $set->findCount('','','');
	$count_user = $count_user ? $count_user : 0;
	$set->table_name = 'pwd_pwd';
	$day_time = date("Y-m-d");
	$count_day = $set->findCount(array("intime like :intime AND uid = :uid", ":intime" => '%'.$day_time.'%','uid'=>$udata['id']),'','');
	$count_day = $count_day ? $count_day : 0;
	$count_pwd = $set->findCount(array('uid'=>$udata['id']),'','');
	$count_pwd = $count_pwd ? $count_pwd : 0;
}
$title = '首页';
include 'header.php';
?>
		<?php include 'left-nav.php';?>
		
		
		<!-- 内容区域 -->
            <!-- Start XP Breadcrumbbar -->
            <div class="xp-breadcrumbbar">
                <div class="row">
                    <div class="col-md-6 col-lg-6">
                        <h4 class="xp-page-title">首页</h4>
                    </div>
                    <div class="col-md-6 col-lg-6">
                        <div class="xp-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php"><i class="icon-home">首页</i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">控制台</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End XP Breadcrumbbar -->

            <!-- Start XP Contentbar -->
            <div class="xp-contentbar">

                <!-- Start Widget -->

                <!-- Start XP Row -->
               <div class="row"> 

                    <!-- Start XP Col -->
                    <div class="col-md-6 col-lg-6 col-xl-4">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <div class="xp-widget-box">
                                    <div class="float-left">
                                        <h4 class="xp-counter text-primary"><?=number_format($count_day);?></h4>
                                        <p class="mb-0 font-16 text-muted">今日增加记录</p>                        
                                    </div>
                                    <div class="float-right">
                                        <div class="xp-widget-icon xp-widget-icon-bg bg-primary-rgba">
                                            <i class="mdi mdi-file-document font-30 text-primary"></i>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="progress mt-3 mb-1" style="height: 5px;">
                                      <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="mb-0 text-primary"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End XP Col -->

                    <!-- Start XP Col -->                       
                    <div class="col-md-6 col-lg-6 col-xl-4">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <div class="xp-widget-box">
                                    <div class="float-left">
                                        <h4 class="xp-counter text-success"><?=number_format($count_pwd);?></h4>
                                        <p class="mb-0 font-16 text-muted">当前记录统计</p>                        
                                    </div>
                                    <div class="float-right">
                                        <div class="xp-widget-icon xp-widget-icon-bg bg-success-rgba">
                                            <i class="mdi mdi-currency-usd font-30 text-success"></i>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="progress mt-3 mb-1" style="height: 5px;">
                                      <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="mb-0 text-success"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End XP Col -->

                    <!-- Start XP Col -->                       
                    <div class="col-md-6 col-lg-6 col-xl-4">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <div class="xp-widget-box">
                                    <div class="float-left">
                                        <h4 class="xp-counter text-warning"><?=number_format($count_user);?></h4>
                                        <p class="mb-0 font-16 text-muted">当前活跃用户</p>                        
                                    </div>
                                    <div class="float-right">
                                        <div class="xp-widget-icon xp-widget-icon-bg bg-warning-rgba">
                                            <i class="mdi mdi-account-multiple font-30 text-warning"></i>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="progress mt-3 mb-1" style="height: 5px;">
                                      <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: 78%" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="mb-0 text-warning"></p>                                        
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End XP Col -->

                    <div class="col-lg-6 col-xl-4">
                            <div class="card m-b-30">
                                <div class="card-header bg-white">
                                    <h5 class="card-title text-black mb-0">Social Profile</h5>
                                </div>
                                <div class="card-body">
                                    <div class="xp-social-profile">
                                        <div class="xp-social-profile-img">
                                            <div class="row">
                                                <div class="col-4 px-1">
                                                    <img src="https://img.api.aa1.cn/2023/12/11/442ded7e06136.png" class="rounded img-fluid" alt="img">
                                                </div>
                                                <div class="col-4 px-1">
                                                    <img src="https://img.api.aa1.cn/2023/12/11/0f389140dfbf6.png" class="rounded img-fluid" alt="img">
                                                </div>
                                                <div class="col-4 px-1">
                                                    <img src="https://img.api.aa1.cn/2023/12/11/44cdabe4d6661.png" class="rounded img-fluid" alt="img">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="xp-social-profile-top">
                                            <div class="row">
                                                <div class="col-3">
                                                    <!--<div class="xp-social-profile-star py-3">-->
                                                    <!--    <i class="icon-star font-20"></i>-->
                                                    <!--</div>-->
                                                </div>
                                                <div class="col-6">
                                                    <!--<div class="xp-social-profile-avatar text-center">-->
                                                    <!--    <img src="https://img.api.aa1.cn/2023/11/11/df5df763f0653.jpg" alt="user-profile" class="rounded-circle img-fluid"><span class="xp-social-profile-live"></span>-->
                                                    <!--</div>-->
                                                </div>
                                                <div class="col-3">
                                                    <!--<div class="xp-social-profile-menu text-right py-3">-->
                                                    <!--    <i class="icon-options font-20"></i>-->
                                                    <!--</div>-->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="xp-social-profile-middle text-center">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="xp-social-profile-title">
                                                        <h5 class="my-1 text-black"><?php if ($islogin == 1){echo '管理员';}else{echo '网站会员';}?></h5>
                                                    </div>
                                                    <div class="xp-social-profile-subtitle">
                                                        <p class="mb-3 text-muted">YoungXJ PWD系统</p>
                                                    </div>
                                                    <div class="xp-social-profile-desc">
                                                        <p class="text-muted mb-1">夏柔公益 二次开发美化 <br>感谢原作者提供...</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="xp-social-profile-bottom text-center">
                                            <div class="row">
                                                <div class="col-7">
                                                    <div class="xp-social-profile-media pt-3">
                                                        <h5 class="text-black my-1"><?=$udata['ltime'];?></h5>
                                                        <p class="mb-0 text-muted">上次登录时间</p>
                                                    </div>
                                                </div>
                                                <div class="col-5">
                                                    <div class="xp-social-profile-followers pt-3">
                                                        <h5 class="text-black my-1"><?=$udata['lip'];?></h5>
                                                        <p class="mb-0 text-muted">上次登录IP  </p>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

 <div class="col-lg-6 col-xl-8">
    <div class="card m-b-30">
      <div class="card-header bg-white">
        <h5 class="card-title text-black mb-0">公告</h5>
      </div>
      <div class="card-body">
        <div class="xp-actions-history">
          <!-- 动态生成的公告列表将会在这里显示 -->
        </div>
      </div>
    </div>
  </div>
                    <!-- End XP Col -->

      <div class="col-lg-12">
                        <div class="card m-b-30">

                            <div class="card-header bg-white">
                                <h5 class="card-title text-black">日志信息</h5>
                                <h6 class="card-subtitle">关于你的操作活动记录.</h6>
                            </div>

                            <div class="card-body">
                                <div class="widget-body widget-body-lg am-fr">
                    <table class="layui-hide layui-bg-black" id="log_list" lay-filter="log_list"></table>
                </div>
                            </div>
                        </div>
                    </div>           </div>
                <!-- End XP Row -->

            </div>
            <!-- End XP Contentbar -->

            <!-- Start XP Footerbar -->
            <div class="xp-footerbar">
                <footer class="footer">
                    <p class="mb-0">© 2019 Neon - All Rights <a href="http://www.bootstrapmb.com/">Reserved</a>.</p>
                </footer>
            </div>
            <!-- End XP Footerbar -->

        </div>
        <!-- End XP Rightbar -->

    </div>

  
  
 <script>
    $(document).ready(function () {
      $.ajax({
        url: 'ajax.php?action=notice_list',
        type: 'GET',
        dataType: 'json',
      })
      .done(function(res) {
        if(res['code'] == 0){
          var historyContainer = $('.xp-actions-history');

          // 清空原有的列表
          historyContainer.empty();

          // 动态生成公告列表
          for (var i = 0; i < res['data'].length; i++) {
            var noticeItem = $('<div class="xp-actions-history-list">\
                                  <div class="xp-actions-history-item">\
                                    <h6 class="mb-1 text-black"></h6>\
                                    <p class="text-muted font-12"></p>\
                                    <p class="m-b-30"></p>\
                                  </div>\
                                </div>');

            // 公告内容
            noticeItem.find('h6').text(res['data'][i]['title']);
            noticeItem.find('.font-12').text(res['data'][i]['time']);
            noticeItem.find('.m-b-30').text(res['data'][i]['content']);

            // 将当前公告添加到历史容器中
            historyContainer.append(noticeItem);
          }
        } else {
          // 处理错误情况
          console.error(res['msg']);
        }
      })
      .fail(function() {
        // 处理请求失败
        console.error('公告获取失败');
      });
    });
  </script>
  
<script>
    layui.use('table', function(){
        var table = layui.table
        , form = layui.form;

        table.render({
            skin: 'nob',
            even: false,
            elem: '#log_list',
            url: 'ajax.php?action=log_list',
            cols: [
                [
                    { type: 'numbers' },
                    { field: 'username', title: '用户' },
                    { field: 'ip', title: 'IP' },
                    { field: 'time', title: '时间' },
                    { field: 'record', title: '事件', sort: true }
                ]
            ],
            page: true
        });
    });

    $.ajax({
        url: 'ajax.php?action=notice_list',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            console.log(data);
        },
        error: function(error) {
            console.error(error);
        }
    });
</script>
	

</body>

</html>