<?php 
/**
 * 网站头部
 */
if ($islogin == 1||$Ulogin==1) {} else exit("<script language='javascript'>window.location.href='./login.php';</script>");
?>
<!-- logo -->
<!--<div class="am-fl tpl-header-logo">-->
<!--    <a href="index.php"><img src="/assets/img/logo.png" alt=""></a>-->
<!--</div>-->



<!-- 右侧内容 -->

<!--<script type="text/javascript">-->
<!--    function notepad_type(){-->
<!--        $.ajax({-->
<!--            url: 'ajax.php?action=notepad_type',-->
<!--            type: 'GET',-->
<!--            dataType: 'json',-->
<!--        })-->
<!--        .done(function(res) {-->
<!--            $('#notepad_type').html('');-->
<!--            for (var i = 0; i < res['data'].length; i++) {-->
<!--                var text = '<li class="tpl-dropdown-menu-notifications">\-->
<!--                <a href="notepad.php" class="tpl-dropdown-menu-notifications-item am-cf">\-->
<!--                <div class="tpl-dropdown-menu-notifications-title" title="'+res['data'][i]['title']+'">\-->
<!--                <i class="am-icon-star"></i>\-->
<!--                <span> '+res['data'][i]['title']+'</span>\-->
<!--                </div>\-->
<!--                <div class="tpl-dropdown-menu-notifications-time" title="'+res['data'][i]['stime']+'">'+res['data'][i]['stime']+'</div>\-->
<!--                </a>\-->
<!--                </li>';-->
<!--                console.log(res['data'][i]['id']);-->
<!--                $('#notepad_type').append(text);-->
<!--            }-->
<!--            $('#notepad_type').append('\-->
<!--                <li class="tpl-dropdown-menu-notifications">\-->
<!--                <a href="notepad.php" class="tpl-dropdown-menu-notifications-item am-cf">\-->
<!--                <i class="am-icon-bell"></i> 进入列表…\-->
<!--                </a>\-->
<!--                </li>'-->
<!--                );-->
<!--        })-->
<!--        .fail(function(res) {-->
            
<!--        })-->
        
<!--    }-->
<!--</script>-->