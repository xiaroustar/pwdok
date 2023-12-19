<?php
include("../include/init.php");
$title = '密码本管理';
include 'header.php';
if ($islogin == 1||$Ulogin==1) {} else exit("<script language='javascript'>window.location.href='./404.php';</script>");
?>

<style type="text/css">
.theme-black .key-btn{background: center;color: white;}
.theme-black .token-btn{background: steelblue;color:white;}
.default {background: #eeeeee ;}
.weak {background: #FF0000 !important;}
.medium {background: #FF9900 !important;}
.strong {background: #33CC00 !important;}
#passqd span {display: inline-block;width: 70px;height: 10px;line-height: 30px;background: #ddd;text-align: center;margin: 4px 2px;}
</style>
        <?php include 'left-nav.php';?>
        <!-- 内容区域 -->
		<!-- Start XP Breadcrumbbar -->
            <div class="xp-breadcrumbbar">
                <div class="row">
                    <div class="col-md-6 col-lg-6">
                        <h4 class="xp-page-title">密码本</h4>
                    </div>
                    <div class="col-md-6 col-lg-6">
                        <div class="xp-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php"><i class="icon-home">首页</i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">密码本</li>
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
                                <div class="widget-title am-fl">密码管理中心</div>
                                <div class="widget-function am-fr">
                                    <a href="javascript:inc_pwd();" class="am-icon-plus-square am-icon-sm" title="新增密码"></a>
                                    <a href="javascript:import_pwd();" class="am-icon-code am-icon-sm" title="json导入"></a>
                                </div>
                            </div>
                            <div class="widget-body  widget-body-lg am-fr">
                                <div>
                                    <!--<select id="js-selected" data-am-selected="{btnWidth: '20%', btnSize: 'sm', btnStyle: 'secondary'}" lay-verify="test" name="test">-->
                                    <!--    <option value="1" selected>标题</option>-->
                                    <!--    <option value="2" >用户名</option>-->
                                    <!--    <option value="3">网址</option>-->
                                    <!--</select>-->
                                    <!--<form class="tpl-header-search-form" action="javascript:;" style="display:inline">-->
                                    <!--    <button class="tpl-header-search-btn am-icon-search"></button>-->
                                    <!--    <input class="tpl-header-search-box" type="text" placeholder="搜索内容,回车提交" id="search">-->
                                    <!--</form>-->
                                </div>
                                <div class="am-fl tpl-header-search"></div>


                                <table class="layui-hide layui-bg-black" id="pwd_list" lay-filter="pwd_list"></table>
                                <script type="text/html" id="chaozuo">
                                    <a class="layui-btn layui-btn-xs" lay-event="edit"><font color="white">编辑</font></a>
                                    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del"><font color="white">删除</font></a>
                                </script>
                            </div>
                            <style type="text/css">.layui-form input{color: green;}</style>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="card m-b-30">
                            <div class="card-header bg-white">
                                <div class="card-title text-black">功能说明</div>
                                <h6 class="card-subtitle">关于批量导入密码记录格式及要求.</h6>
                            </div>
                            <div class="card-body">
                                
                                <p>批量导入是为了方便用户在多账号的情况，无需重复操作即可导入非常多的账号信息</p>
                                <p>要求和格式请一定要遵守，否则数据将不能正常识别.</p>
                                <p>必要的参数有title:标题,descr:描述,user:用户名,passw:密码,weburl:网站地址</p>
                                <p>温馨提示:如果key参数不存在，将会使用普通token加密</p>
                                <p>demo数据</p>
                                <pre>[{"title":"测试1","descr":"测试1","user":"admin","passw":"pass","weburl":"google.com"}]</pre>

                            </div>
                        </div>
                    </div>

                </div>

        </div>
        
<script src="https://cdn.bootcdn.net/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>
<script src="https://cdn.bootcdn.net/ajax/libs/layui/2.5.7/layui.all.min.js"></script>


    <script>
 var table = layui.table,
        layer = layui.layer;

    // 初始化 Clipboard.js
    var clipboardTitle = new ClipboardJS('.copy-btn-title');
    var clipboardDescr = new ClipboardJS('.copy-btn-descr');
    var clipboardUser = new ClipboardJS('.copy-btn-user');
    var clipboardPwdDecode = new ClipboardJS('.copy-btn-pwd-decode');

    // 监听复制成功事件
    clipboardTitle.on('success', function(e) {
        layer.msg('标题已复制到剪贴板', {icon: 1});
        e.clearSelection();
    });

    clipboardDescr.on('success', function(e) {
        layer.msg('描述已复制到剪贴板', {icon: 1});
        e.clearSelection();
    });
    
    clipboardUser.on('success', function(e) {
        layer.msg('用户名已复制到剪贴板', {icon: 1});
        e.clearSelection();
    });

    clipboardPwdDecode.on('success', function(e) {
        layer.msg('密码已复制到剪贴板', {icon: 1});
        e.clearSelection();
    });

    // 监听复制失败事件
    clipboardTitle.on('error', function(e) {
        layer.msg('复制失败，请手动复制', {icon: 2});
    });

    clipboardDescr.on('error', function(e) {
        layer.msg('复制失败，请手动复制', {icon: 2});
    });

    clipboardPwdDecode.on('error', function(e) {
        layer.msg('复制失败，请手动复制', {icon: 2});
    });
        layui.use('table', function(){
          var table = layui.table
          ,form = layui.form;
          table.render({
            skin: 'nob'
            ,even: false
            ,elem: '#pwd_list'
            ,url:'ajax.php?action=pwd_list'
            ,cellMinWidth: 80
            ,cols: [[
            {type:'numbers'}
             , {field: 'title', title: '标题', sort: true, templet: function(d){
                return '<span class="copy-btn-title" data-clipboard-text="' + d.title + '">' + d.title + '</span>';
            }},
            {field: 'descr', title: '描述', sort: true, templet: function(d){
                return '<span class="copy-btn-descr" data-clipboard-text="' + d.descr + '">' + d.descr + '</span>';
            }},
            {field: 'user', title: '用户名', sort: true, templet: function(d){
                return '<span class="copy-btn-user" data-clipboard-text="' + d.user + '">' + d.user + '</span>';
            }},
            {field: 'pwd_decode', title: '密码', sort: true, templet: function(d){
                return '<span class="copy-btn-pwd-decode" data-clipboard-text="' + d.pwd_decode + '">' + d.pwd_decode + '</span>';
            }},
            {field: 'weburl', title: '网址', sort: true, templet: function(d){
                return '<a href="' + d.weburl + '" target="_blank">' + d.weburl + '</a>';
            }},
            {field: 'intime', title: '添加时间', sort: true},
            {field: 'lasttime', title: '最后修改时间', sort: true},
            {title: '操作', templet: '#chaozuo', sort: true, align: 'center', fixed: 'right', width: 180}
        ]]
        
            ,page: true
        });
        
// data是需要复制的内容
function copyFunction(self) {
    var timer = null;
    clearTimeout(timer);
    var data = self.getAttribute('data-website');
    
    let copyInput = document.createElement("input");
    document.body.appendChild(copyInput);
    copyInput.setAttribute("value", data);
    copyInput.select();
    var res = document.execCommand("Copy", false, null);
    document.body.removeChild(copyInput);

    document.getElementsByClassName("copySuc")[0].style.display = "block";

    timer = setTimeout(function copySucHide() {
        document.getElementsByClassName("copySuc")[0].style.display = "none";
    }, 1000);

    return res;
}
          table.on('tool(pwd_list)', function(obj){
            var data = obj.data;
            if(data.type==0){

            }
            if(obj.event === 'detail'){
                var list_type = data.type;
                if(data.type==0){
                    layer.alert(data.pwd_decode, {
                        skin: 'layui-layer-lan'
                        ,closeBtn: 0
                        ,anim: 5
                        ,title: '您的密码'
                    });
                    return false;
                }
                var list_id = data.id;
                layer.prompt({title: '输入二代密码，并确认', formType: 1,maxlength:32}, function(pass, index){
                  $.post('ajax.php?action=see_pwd',{list_id:list_id,key:pass},function(res){
                    if(res['code']==200){
                        layer.close(index);
                        layer.alert(res['msg'], {
                            skin: 'layui-layer-lan'
                            ,closeBtn: 0
                            ,anim: 5
                            ,title: '您的密码'
                        });
                    }else{
                        layer.close(index);
                        layer.msg(res['msg']);
                    }
                })
                  .error(function(res){
                    layer.msg('服务器连接失败');
                })
              });
            } else if(obj.event === 'del'){
              layer.confirm('真的要删除吗（数据找不回了哦！）', function(index){
                del(data.id);
                obj.del();
                layer.close(index);
            });
          } else if(obj.event === 'edit'){
            var text = '<form class="layui-form" action="" lay-filter="info" >\
            <div class="layui-fluid">\
            <input type="hidden" id="id_info" name="id">\
            <div class="layui-form-item">\
            <label class="layui-form-label">标题</label>\
            <div class="layui-input-block">\
            <input type="text"  lay-verify="title"  placeholder="标题" class="layui-input"  name="title" id="title_info">\
            </div>\
            </div>\
            <div class="layui-form-item">\
            <label class="layui-form-label">描述</label>\
            <div class="layui-input-block">\
            <input type="text"  lay-verify="text" autocomplete="off" placeholder="描述" class="layui-input"  name="descr" id="descr_info">\
            </div>\
            </div>\
            \
            <div class="layui-form-item">\
            <label class="layui-form-label">网址</label>\
            <div class="layui-input-block">\
            <input type="text"  lay-verify="text" autocomplete="off" placeholder="网址" class="layui-input"  name="weburl" id="weburl_info">\
            </div>\
            </div>\
            <div class="layui-form-item">\
            <label class="layui-form-label">用户名</label>\
            <div class="layui-input-block">\
            <input type="text"  lay-verify="text" autocomplete="off" placeholder="用户名不改留空" class="layui-input"  name="user" id="user_info" maxlength="32">\
            </div>\
            </div>\
            <div class="layui-form-item">\
            <label class="layui-form-label">密码</label>\
            <div class="layui-input-block">\
            <input type="text"  lay-verify="text" autocomplete="off" placeholder="密码不改留空" class="layui-input"  name="pass" id="pass_info" maxlength="32">\
            </div>\
            </div>\
            <div class="layui-form-item" style="display:none;">\
            <label class="layui-form-label">二代密码</label>\
            <div class="layui-input-block">\
            <input type="radio"  class="layui-input"  name="type" id="type_on" title="启用" value="1">\
            <input type="radio"  class="layui-input"  name="type" id="type_off" title="禁用" value="0">\
            </div>\
            </div>\
            <div class="layui-form-item">\
            <div class="layui-input-block">\
            <button class="layui-btn" lay-submit="" lay-filter="formGet">立即提交</button>\
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>\
            </div>\
            </div>\
            </div>\
            </form>'
            layer.open({
              type: 1,
              title: '信息修改',
              skin: 'layui-layer-rim',
              area: ['420px', '400px'],
              content: text
          });
            $('#id_info').val(data.id);
            $('#title_info').val(data.title);
            $('#descr_info').val(data.descr);
            $('#weburl_info').val(data.weburl);
            if(data.type==1){
                $('#type_on').attr('checked','checked');
            }else{
                $('#type_off').attr('checked','checked');
            }
            layui.use('form', function(){
              var form = layui.form;
              form.render('radio');
          });
        }
    });

});
</script>
<script type="text/javascript">

    $("#search").keydown(function() {
        if(event.keyCode == "13") {
            search()
        }
    })
    $("#search").blur(function(){
        var v = $("#js-selected option:selected").val();
        console.log(v);
    });
    function search(){
        var v = $("#js-selected option:selected").val();
        var content = $('#search').val();
        layui.use('table', function(){
            var table = layui.table;
            table.reload('pwd_list', {
                url: 'ajax.php?action=pwd_search'
                ,method:'post'
                ,where: {type:v,content:content}
                ,page: {curr: 1}
            });
        });
    }
    function del(id){
      $.post('ajax.php?action=pwd_delete',{id:id}, function(res){
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
  layui.use('form', function(){
      var form = layui.form;
      form.on('submit(formGet)', function(data){
        console.log(data.field);
        var id_info = $('#id_info').val();
        var title_info = $('#title_info').val();
        var descr_info = $('#descr_info').val();
        var weburl_info = $('#weburl_info').val();
        var user_info = $('#user_info').val();
        var pass_info = $('#pass_info').val();
        var type = data.field['type'];
        console.log(type);
        if(type==1){
            layer.prompt({title:'输入二代密码，并确认', formType: 1,maxlength:32}, function(pass, index){
                $.post('ajax.php?action=set_pwd', {id_info:id_info,title_info:title_info,descr_info:descr_info,weburl_info:weburl_info,user_info:user_info,pass_info:pass_info,key:pass,type:type}, function(res){
                    if(res['code']==200){
                        layui.use('layer', function(){
                            layer.close(index);
                            layer.msg(res['msg'])
                        });
                    }else{
                        layui.use('layer', function(){
                            layer.close(index);
                            layer.msg(res['msg'])
                        });
                    }
                })
                .error(function(res){
                    layer.msg('服务器连接失败');
                })
            });
        }else{
            $.post('ajax.php?action=set_pwd', {id_info:id_info,title_info:title_info,descr_info:descr_info,weburl_info:weburl_info,user_info:user_info,pass_info:pass_info,type:0}, function(res){
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
            .error(function(res){
                layer.closeAll();
                layer.msg('服务器连接失败');
            })
        }
        return false;
    });
  });
</script>

<script type="text/javascript">
    function inc_pwd(){
        var text = '<form class="layui-form" action="" lay-filter="info" >\
        <div class="layui-fluid">\
        <div class="layui-form-item">\
        <label class="layui-form-label">标题</label>\
        <div class="layui-input-block">\
        <input type="text"  lay-verify="title"  placeholder="标题" class="layui-input"  name="title" id="title_info">\
        </div>\
        </div>\
        <div class="layui-form-item">\
        <label class="layui-form-label">描述</label>\
        <div class="layui-input-block">\
        <input type="text"  lay-verify="text" autocomplete="off" placeholder="描述" class="layui-input"  name="descr" id="descr_info">\
        </div>\
        </div>\
        \
        <div class="layui-form-item">\
        <label class="layui-form-label">网址</label>\
        <div class="layui-input-block">\
        <input type="text"  lay-verify="text" autocomplete="off" placeholder="网址" class="layui-input"  name="weburl" id="weburl_info">\
        </div>\
        </div>\
        <div class="layui-form-item">\
        <label class="layui-form-label">用户名</label>\
        <div class="layui-input-block">\
        <input type="text"  lay-verify="text" autocomplete="off" placeholder="用户名" class="layui-input"  name="user" id="user_info" maxlength="32">\
        </div>\
        </div>\
        <div class="layui-form-item">\
        <label class="layui-form-label">密码</label>\
        <div class="layui-input-block">\
        <input type="text"  lay-verify="text" autocomplete="off" placeholder="密码" class="layui-input"  name="pass" id="pass_info" maxlength="32">\
        </div>\
        </div>\
        <div class="layui-form-item" id="passqd">\
        <label class="layui-form-label">密码强度</label>\
        <div class="layui-input-block">\
        <span name="span_info"></span><span name="span_info"></span><span name="span_info"></span>\
        </div>\
        </div>\
        <div class="layui-form-item" style="display:none;">\
        <label class="layui-form-label">二代密码</label>\
        <div class="layui-input-block">\
        <input type="radio"  class="layui-input"  name="type" id="type_on" title="启用" value="1">\
        <input type="radio"  class="layui-input"  name="type" id="type_off" title="禁用" value="0" checked>\
        </div>\
        </div>\
        <div class="layui-form-item">\
        <div class="layui-input-block">\
        <button class="layui-btn" lay-submit="" lay-filter="formGet_pwd">立即提交</button>\
        <button type="reset" class="layui-btn layui-btn-primary">重置</button>\
        </div>\
        </div>\
        </div>\
        </form>'
        layer.open({
          type: 1,
          title: '新增记录',
          skin: 'layui-layer-rim',
          area: ['420px', '400px'],
          content: text
      });
        /*密码强度检测*/
        var oInput = document.getElementById('pass_info');
        oInput.value = '';
        var spans = document.getElementsByName("span_info");

        oInput.onkeyup = function(){
            spans[0].className = spans[1].className = spans[2].className = "default";

            var pwd = this.value;
            var result = 0;
            for(var i = 0, len = pwd.length; i < len; ++i){
                result |= charType(pwd.charCodeAt(i));
            }
            var level = 0;
            for(var i = 0; i <= 4; i++){
                if(result & 1){
                    level ++;
                }
                result = result >>> 1;
            }
            if(pwd.length >= 6){
                switch (level) {
                    case 1:
                    spans[0].className = "weak";
                    break;
                    case 2:
                    spans[0].className = "medium";
                    spans[1].className = "medium";
                    break;
                    case 3:
                    case 4:
                    spans[0].className = "strong";
                    spans[1].className = "strong";
                    spans[2].className = "strong";
                    break;
                }
            }
        }
        layui.use('form', function(){
          var form = layui.form;
          form.render('radio');
      });
    }

    layui.use('form', function(){
        var form = layui.form;
        form.on('submit(formGet_pwd)', function(data){
            console.log(data.field);
            var title_info = $('#title_info').val();
            var descr_info = $('#descr_info').val();
            var weburl_info = $('#weburl_info').val();
            var user_info = $('#user_info').val();
            var pass_info = $('#pass_info').val();
            var type = data.field['type'];
            if(type==1){
                layer.prompt({title: '输入二代密码，并确认', formType: 1,maxlength:32}, function(pass, index){
                    $.post('ajax.php?action=inc_pwd', {title_info:title_info,descr_info:descr_info,weburl_info:weburl_info,user_info:user_info,pass_info:pass_info,key:pass,type:type}, function(res){
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
                    .error(function(res){
                        layer.closeAll();
                        layer.msg('服务器连接失败');
                    })
                });
            }else{
                $.post('ajax.php?action=inc_pwd', {title_info:title_info,descr_info:descr_info,weburl_info:weburl_info,user_info:user_info,pass_info:pass_info,type:0}, function(res){
                    if(res['code']==200){
                        layui.use('layer', function(){
                            layer.close(layer.index);
                            layer.msg(res['msg'])
                        });
                    }else{
                        layui.use('layer', function(){
                            layer.close(layer.index);
                            layer.msg(res['msg'])
                        });
                    }
                })
                .error(function(res){
                    layer.closeAll();
                    layer.msg('服务器连接失败');
                })
            }
            return false;
        });
    });
    function import_pwd(){
        var text = '<form class="layui-form" action="" lay-filter="info" >\
        <div class="layui-fluid">\
        <div class="layui-form-item">\
        <label class="layui-form-label">数据</label>\
        <div class="layui-input-block">\
        <input type="text"  lay-verify="title"  placeholder="" class="layui-input"  name="json_arr" id="json_arr_info">\
        </div>\
        </div>\
        <div class="layui-form-item">\
        <div class="layui-input-block">\
        <button class="layui-btn" lay-submit="" lay-filter="import_pwd">立即提交</button>\
        <button type="reset" class="layui-btn layui-btn-primary">重置</button>\
        </div>\
        </div>\
        </div>\
        </form>'
        layer.open({
          type: 1,
          title: '批量导入密码',
          skin: 'layui-layer-rim',
          area: ['420px', '200px'],
          content: text
      });
        layui.use('form', function(){
            var form = layui.form;
            $("#json_arr_info").attr('placeholder','[{"title":"测试1","descr":"测试1","user":"admin","passw":"pass","weburl":"google.com"},{"title":"测试2","descr":"测试2","user":"admin","passw":"admin","weburl":"baidu.com","key":"xxxxx"}]');
            form.on('submit(import_pwd)', function(data){
                if($('#json_arr_info').val()==''){
                    layui.use('layer', function(){
                        layer.msg('不能为空');
                    });
                }else{
                    var json_arr = $('#json_arr_info').val();
                    $.post('ajax.php?action=import', {json:json_arr},function(res){
                        if(res['code']=='200'){
                            layui.use('layer', function(){
                                layer.closeAll();
                                layer.msg(res['msg']);
                            });
                        }else{
                            layui.use('layer', function(){
                                layer.closeAll();
                                layer.msg(res['msg']);
                            });
                        }
                    })
                    .error(function(res){
                        layer.closeAll();
                        layer.msg('服务器连接失败');
                    })
                }
                return false;
            });

        });
    }
</script>
<script type="text/javascript">
    function charType(num){
        if(num >= 48 && num <= 57){
            return 1;
        }
        if (num >= 97 && num <= 122) {
            return 2;
        }
        if (num >= 65 && num <= 90) {
            return 4;
        }
        return 8;
    }
</script>
<script src="/assets/js/amazeui.min.js"></script>
<script src="/assets/js/amazeui.datatables.min.js"></script>
<script src="/assets/js/dataTables.responsive.min.js"></script>
<script src="/assets/js/app.js"></script>

</body>

</html>