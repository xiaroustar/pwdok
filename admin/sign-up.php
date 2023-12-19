<?php 
/**
 * 注册页面
 */
include("../include/init.php");
if($islogin==1){
    exit("<script language='javascript'>alert('您已登陆！');window.location.href='./';</script>");
}elseif($Ulogin==1){
    exit("<script language='javascript'>alert('您已登陆！');window.location.href='./';</script>");
}else{}
$title = '注册账号';
include 'header.php';
?>

<div id="xp-container" class="xp-container">

        <!-- Start Container -->
        <div class="container">

            <!-- Start XP Row -->
            <div class="row vh-100 align-items-center">
                <!-- Start XP Col -->
                <div class="col-lg-12 ">

                    <!-- Start XP Auth Box -->
                    <div class="xp-auth-box">

                        <div class="card">
                            <div class="card-body">
                                <h3 class="text-center mt-0 m-b-15">
                                    <a href="index.html" class="xp-web-logo"><img src="https://tucdn.wpon.cn/2023/12/11/3a8b534dd9b7c.jpg" height="40" alt="logo"></a>
                                </h3>
                                <div class="p-3">
                                      <form action="ajax.php?action=sign" id="sign-msg" method="post">
                                          
                                          <div class="text-center mb-3">
                                            <h4 class="text-black">立即注册 !</h4>
                                            <p class="text-muted">有账号? <a href="login.php">Login</a> Here</p>
                                        </div>                                        
                                        <!--<div class="login-or">-->
                                            <!--<h6 class="text-muted">OR</h6>-->
            <div class="form-group">
                <input type="email" class="form-control" id="user-email" placeholder="邮箱" required name="email">
                <small id="info"></small>
            </div>

            <div class="form-group">
                <input type="text" class="form-control" id="user-name" placeholder="用户名" required name="username" minlength="3">
                <small id="info"></small>
            </div>

            <div class="form-group">
                <input type="password" class="form-control" id="user-pass" placeholder="请输入密码" required name="pass" minlength="6">
                <small id="info"></small>
            </div>

            <div class="form-group">
                <input type="password" class="form-control" id="user-pass2" placeholder="再次输入密码" required name="pass2" minlength="6">
                <small id="info"></small>
            </div>
            <div class="form-group">
                <input type="text" style="width:calc(100% - 82px);float: left;" name="verifycode" class="form-control" required placeholder="验证码" id="verifycode" />
                <img style="width:82px;float: right;" src="../include/lib/verifycode.php?<?=time();?>" onclick="re_code(this)" id="verifycode_img"> 
            </div>
            <br>
            <br>
            <br>
            <br>
            <div class="form-group">
                <input id="remember-me" type="checkbox" name="read" minchecked="1" required>
                <label for="remember-me">

                    <!--我已阅读并同意 <a href="javascript:RegisterProtocol();" style="color:#999;">《用户注册协议》</a> -->
                    我已阅读并同意 <a href="" style="color:#999;">《用户注册协议》</a> 
                </label>

            </div>
            <div class="am-form-group">

                <button type="button" class="am-btn am-btn-primary  am-btn-block tpl-btn-bg-color-success  tpl-login-btn" lay-filter="formGet" onclick="login_t()"  id="submit" disabled>提交</button>
            </div>
        </form>
    </div>
</div>
<script src="/assets/js/jquery.min.js"></script>
<script src="/assets/js/amazeui.min.js"></script>
<script src="/assets/js/app.js"></script>
<script type="text/javascript" src="/assets/layui/layui.js"></script>
<link rel="stylesheet" type="text/css" href="/assets/layui/css/layui.css">

<script type="text/javascript">
    $(function() {
        $('#sign-msg').validator({
            onValid: function(validity) {
                $(validity.field).closest('.am-form-group').find('#info').hide();
                $('#submit').removeAttr('disabled');
            },

            onInValid: function(validity) {
                var $field = $(validity.field);
                var $group = $field.closest('.am-form-group');
                var $alert = $group.find('#info');
                var msg = $field.data('validationMessage') || this.getValidationMessage(validity);
                $('#submit').attr('disabled','');
                $alert.html(msg).show();
            }
        });
    });

    function login_t(){
        var read = $('#remember-me').val();
        var email = $('#user-email').val();
        var username = $('#user-name').val();
        var pass = $('#user-pass').val();
        var pass2 = $('#user-pass2').val();
        var verifycode = $('#verifycode').val();
        if(pass!=pass2){
            layui.use('layer', function(){
                layer.msg('两次密码不一致')
            });
            return false;
        }
        if(!email&&!username&&!pass&&!pass2){
            layui.use('layer', function(){
                layer.msg('所有内容都不能为空')
            });
            return false;
        }
        layui.use('layer', function(){
            layer.msg('请等待', {
              icon: 16
              ,shade: 0.01
          });
        });
        $.post('ajax.php?action=sign_up', {email:email,username:username,pass:pass,read:read,verifycode:verifycode}, function(res){

            if(res['code']==200){
                layui.use('layer', function(){
                    layer.open({
                      type: 1
                      ,title: false
                      ,closeBtn: false
                      ,area: '300px;'
                      ,shade: 0.8
                      ,id: 'LAY_layuipro'
                      ,resize: false
                      ,btn: ['登录', '确认']
                      ,btnAlign: 'c'
                      ,moveType: 1
                      ,content: '<div style="padding: 50px; line-height: 22px; background-color: #393D49; color: #fff; font-weight: 300;">'+res['msg']+'<br/>请严格遵守《用户注册协议》使用账号，一经发现有违规操作将会禁用您的账号，严重违规者封禁IP<br/>请保存好自己的账号，尽量不要在公共场合登录使用,以免被盗用<br/>现在去登录您的账号吧！</div>'
                      ,success: function(layero){
                        var btn = layero.find('.layui-layer-btn');
                        btn.find('.layui-layer-btn0').attr({
                          href: 'login.php'
                      });
                    }
                });
                });
                $('#verifycode').val('');
            }else{
                $('#verifycode').val('');
                $('#verifycode_img').click();
                layui.use('layer', function(){
                    layer.msg('MSG:'+res['msg'])
                });
            }
        })
        .error(function(res) {
            $('#verifycode').val('');
            $('#verifycode_img').click();
            layui.use('layer', function(){
                layer.msg('ERROR:请求服务器失败')
            });
        })
    }
    function re_code(obj){
        d = new Date();
        $(obj).attr("src","../include/lib/verifycode.php?"+d.getTime());
    }
    function RegisterProtocol(){
        layui.use('layer', function(){
            layer.open({
              type: 2,
              title: '《用户注册协议》',
              shadeClose: true,
              shade: 0.8,
              area: ['380px', '90%'],
              content: '/RegisterProtocol.html'
          });
        });
    }
</script>


</html>