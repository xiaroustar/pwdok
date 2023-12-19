<?php
/**
* 网站左侧栏
*/
if ($islogin == 1||$Ulogin==1) {} else exit("<script language='javascript'>window.location.href='./login.php';</script>");
?>
<script src="/assets/js/theme.js"></script>
<!-- 头部 -->
<header>
    <?php include 'header-nav.php';?>
</header>


<?php $set->table_name = 'pwd_notepad';$arr = array('uid'=>$udata['id'],'type'=>0); $count = $set->findCount($arr,'','');?>
 <div id="xp-container">

        <!-- Start XP Leftbar -->
        <div class="xp-leftbar">

            <!-- Start XP Sidebar -->
            <div class="xp-sidebar">

                <!-- Start XP Logobar -->
                <div class="xp-logobar text-center">
                    <a href="index.html" class="xp-logo"><img src="https://tucdn.wpon.cn/2023/12/11/3a8b534dd9b7c.jpg" class="img-fluid" alt="logo"></a>
                </div>
                <!-- End XP Logobar -->

                <!-- Start XP Navigationbar -->
                <div class="xp-navigationbar">
                    <div class="slimScrollDiv active" style="position: relative; overflow: hidden; width: auto; height: 700px;">
                        <ul class="xp-vertical-menu in" style="overflow: hidden; width: auto; height: 700px;">
                            <li class="xp-vertical-header">菜单</li>
                            <li>
                                <a href="index.php">
                                    <i class="icon-speedometer"></i><span>首页</span>
                                </a>
                            </li>
                            
                           
                            <li>
                                <a href="pwd_list.php">
                                  <i class="icon-event"></i><span>密码本</span>
                                </a>
                            </li>
                            <li>
                                <a href="rand_key.php">
                                  <i class="icon-event"></i><span>密码生成</span>
                                </a>
                            </li>
                            <li>
                                <a href="notepad.php">
                                  <i class="icon-event"></i><span>备忘录</span><span class="badge badge-pill badge-danger pull-right"><?=$count;?>条</span>
                                </a>
                            </li>
                            <li>
                            <a href="javaScript:void();">
                                <i class="icon-social-dropbox"></i><span>管理员操作</span><i class="icon-arrow-right pull-right"></i>
                            </a>
                            <ul class="xp-vertical-submenu">                                
                                <li><a href="userlist.php">用户列表</a></li>                                
                                <li><a href="setting.php">网站设置</a></li>
                                <li><a href="notice.php">网站公告</a></li>
                                <li><a href="smtp.php">SMTP配置</a></li>
                            </ul>
                        </li>
                        </ul>
                        <div class="slimScrollBar" style="background-color: rgb(207, 216, 220); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 700px;"></div>
                        <div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background-color: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div>
                    </div>
                </div>
                <!-- End XP Navigationbar -->

            </div>
            <!-- End XP Sidebar -->

        </div>

        <!-- Start XP Rightbar -->
        <div class="xp-rightbar">

            <!-- Start XP Topbar -->
            <div class="xp-topbar">

                <!-- Start XP Row -->
                <div class="row">

                    <!-- Start XP Col -->
                    <div class="col-2 col-md-1 col-lg-1 order-2 order-md-1 align-self-center">
                        <div class="xp-menubar">
                            <a class="xp-menu-hamburger" href="javascript:void();">
                                <i class="icon-menu font-20 text-white"></i>
                            </a>
                        </div>
                    </div>
                    <!-- End XP Col -->

                    <!-- Start XP Col -->
                    <div class="col-10 col-md-11 col-lg-11 order-1 order-md-2">
                        <div class="xp-profilebar text-right">
                            <ul class="list-inline mb-0">


<div class="xp-profilebar text-right">
                            <ul class="list-inline mb-0">
                                
                                  
                
                                <li class="list-inline-item">
                                    <div class="dropdown xp-notification">
                                        <a class="dropdown-toggle  text-white" href="javascript;" id="xp-userprofile" onclick="notepad_type()" role="button" id="xp-notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="icon-bell font-18 v-a-m"></i>
                                            <span class="badge badge-pill bg-danger-gradient xp-badge-up"><?=$count;?></span>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="xp-notification" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(21px, 19px, 0px);">
                                            <ul class="list-unstyled"  id="notepad_type" >
                                           
                                            </ul>                                            
                                        </div>
                                    </div>
                                </li>
                                <li class="list-inline-item mr-0">
                                    <div class="dropdown xp-userprofile">
                                        <a class="dropdown-toggle " href="#" role="button" id="xp-userprofile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="https://img.api.aa1.cn/2023/01/30/bf6a5ac0a5260.png" alt="user-profile" class="rounded-circle img-fluid"><span class="xp-user-live"></span></a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="xp-userprofile" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(40px, 28px, 0px);">
                                            <a class="dropdown-item py-3 text-white text-center font-16" href="#">Welcome, <?=$udata['username'];?></a>
                                            <a class="dropdown-item" href="https://api.aa1.cn" target="_blank"><i class="icon-user text-primary mr-2"></i> 免费API</a>
                                            <a class="dropdown-item" href="login.php?logout=1"><i class="icon-power text-danger mr-2"></i> 退出</a>
                                        </div>
                                    </div>                                   
                                </li>
                            </ul>
                        </div>
                               
                            </ul>
                        </div>
                    </div>
                    <!-- End XP Col -->

                </div>
                <!-- End XP Row -->

            </div>
            <!-- End XP Topbar -->
        
             <script type="text/javascript">
    function notepad_type(){
        $.ajax({
            url: 'ajax.php?action=notepad_type',
            type: 'GET',
            dataType: 'json',
        })
        .done(function(res) {
            $('#notepad_type').html('');
             $('#notepad_type').append('\
                   <li class="media">\
                                                <div class="media-body">\
                                                  <h5 class="mt-0 mb-0 py-3 text-white text-center font-16"><?=$count;?> 个备忘录信息</h5>\
                                                </div>\
                                              </li>  \
                                              '
                );
            for (var i = 0; i < res['data'].length; i++) {
                var text = '<li class="media xp-noti"><div class="mr-3 xp-noti-icon success-rgba"><i class="icon-basket-loaded text-success"></i></div>\
                                                <div class="media-body"><a href="#"><h5 class="mt-0 mb-1 font-14">'+res['data'][i]['title']+'</h5><p class="mb-0 font-12 f-w-4">'+res['data'][i]['stime']+'</p>\
                                                    </a>\
                                                </div>\
                                              </li>\
                ';
            
                console.log(res['data'][i]['id']);
                $('#notepad_type').append(text);
            }
           $('#notepad_type').append('\
                  <li class="media">\
                                                <div class="media-body">\
                                                    <h5 class="mt-0 mb-0 py-3 text-black text-center font-14">\
                                                        <a href="notepad.php" class="text-primary" target="_blank">查看更多</a>\
                                                    </h5>\
                                                </div>\
                                              </li> \
                                              '
                );
        })
        .fail(function(res) {
            
        })
        
    }
</script>

    <script src="/assets/js/amazeui.min.js"></script>
	<script src="/assets/js/amazeui.datatables.min.js"></script>
	<script src="/assets/js/dataTables.responsive.min.js"></script>
	<script src="/assets/js/app.js"></script>
	<script src="/assets/js/jquery.dataTables.min.js"></script>
	<script src="/assets/js/dataTables.bootstrap4.min.js"></script>
	<script src="/assets/js/jquery.min.js"></script>/
	<script src="/assets/js/table-datatable-init.js"></script>
	 <script src="http://cdn.bootstrapmb.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  <!--Start JS -->
    <script src="/assets/nonejs/js/jquery.min.js"></script>
    <script src="/assets/nonejs/js/popper.min.js"></script>
    <script src="http://cdn.bootstrapmb.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="/assets/nonejs/js/modernizr.min.js"></script>
    <script src="/assets/nonejs/js/detect.js"></script>
    <script src="/assets/nonejs/js/jquery.slimscroll.js"></script>

 