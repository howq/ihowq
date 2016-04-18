<?php
/* @var $this yii\web\View */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
  <title>登录表单</title>
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
  <script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
  <script src="http://apps.bdimg.com/libs/bootstrap/3.3.4/js/bootstrap.min.js"></script> 
   <script type="text/javascript" src="http://www.francescomalagrino.com/BootstrapPageGenerator/3/js/jquery-ui"></script> 
<!--  <link href="http://www.francescomalagrino.com/BootstrapPageGenerator/3/css/bootstrap-combined.min.css" rel="stylesheet" media="screen"> -->
<script>
  // $(function(){
  //   $(".btn").click(function(){
  //     alert('nihao');
  //   });
  // });
</script>


</head>
<body>
<!-- <form class="form-horizontal" role="form" >

  <div class="form-group">
    
    <div class="col-sm-10">
      <input type="email" class="form-control" id="inputEmail" placeholder="邮箱">
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword" placeholder="密码">
    </div>
  </div>

  <div class="checkbox">
    <div class="col-sm-offset-0 col-sm-10">
      <label>
      <input type="checkbox" id="rememberMe">记住密码
      </label>
    </div>
   </div>

  <div class="form-group">
    <div class="col-sm-offset-0 col-sm-10">
      <button type="submit" class="btn btn-default">登录</button>
    </div>
  </div>

</form> -->

<!-- <div class="container-fluid" id="LG">
  <div class="row-fluid">
    <div class="span7">
      <form class="form-horizontal">
        <div class="control-group">
           // <label class="control-label" for="inputEmail">Email</label> 
          <div class="controls">
            <input type="email" class="form-control" id="inputEmail" placeholder="邮箱">
          </div>
        </div>
        <div class="control-group">
           // <label class="control-label" for="inputPassword">密码</label> 
          <div class="controls">
            <input type="password" class="form-control" id="inputPassword" placeholder="密码">
          </div>
        </div>
        <div class="control-group">
          <div class="controls">
             <label class="checkbox"><input type="checkbox" /> 记住我</label> 
             <button type="submit" class="btn btn-default">登陆</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div> -->

<div class="modal-content">      
  <div class="modal-header">        
    <button data-dismiss="modal" class="close" type="button" onclick="window.location.href='http://localhost/xinminnews/web/index.php?r=news/index'">
      <span aria-hidden="true">×</span>
      <span class="sr-only">Close</span>
    </button>        
      <h4 class="modal-title">登录</h4>      
  </div>
  
  <div class="modal-body">        
    <p class="sfModal-content">
    <div class="row bg-white login-modal">
        <div class="col-md-4 col-sm-12 col-md-push-7 login-wrap">
            <h1 class="h4 text-muted login-title">用户登录</h1>
            <form class="mt30" role="form" method="POST" action="http://localhost/xinminnews/web/index.php?r=user/login">
                <div class="form-group">
                    <label class="control-label" for="name">用户名</label>
                    <input type="text" placeholder="" required="" name="user_login" class="form-control">
                </div>
                <div class="form-group">
                    <label class="control-label">密码</label>
                    <input type="password" placeholder="密码" required="" name="user_psw" class="form-control">
                </div>
                <div class="form-group clearfix">
                    <div class="checkbox pull-left">
                        <label><input type="checkbox" checked="" value="1" name="rememberMe"> 记住登录状态</label>
                    </div>
                    <button class="btn btn-primary pull-right pl20 pr20" type="submit">登录</button>
                </div>
            </form>
    <!--         <p class="h4 text-muted visible-xs-block h4">快速登录</p>
            <div class="widget-login mt30">
                <p class="text-muted mt5 mr10 pull-left hidden-xs">快速登录</p>
                <a class="btn pl5 pr5 mb5 btn-default btn-sm btn-sn-weibo" href="/user/oauth/weibo"><span class="icon-sn-weibo"></span> <strong class="visible-xs-inline">新浪微博账号</strong></a>
                <a class="btn pl5 pr5 mb5 btn-default btn-sm btn-sn-qq" href="/user/oauth/qq"><span class="icon-sn-qq"></span> <strong class="visible-xs-inline">QQ 账号</strong></a>
                <a class="btn pl5 pr5 mb5 btn-default btn-sm btn-sn-wechat" href="/user/oauth/weixin"><span class="icon-sn-wechat"></span> <strong class="visible-xs-inline">微信账号</strong></a>
                <button id="loginShowMore" class="btn mb5 btn-default btn-sm btn-sn-more" type="button">...</button>

                <a class="btn pl5 pr5 mb5 btn-default btn-sn-douban btn-sm hidden" href="/user/oauth/douban"><span class="icon-sn-douban"></span> <strong class="visible-xs-inline">豆瓣账号</strong></a>
            </div> -->
        </div>
        <div class="login-vline hidden-xs hidden-sm"></div>
        <div class="col-md-4 col-md-pull-3 col-sm-12 login-wrap">
            <h1 class="h4 text-muted login-title">创建新账号</h1>
            <form class="mt30" role="form" method="POST" action="http://localhost/xinminnews/web/index.php?r=user/register">
                <div class="form-group">
                    <label class="control-label" for="name">用户名</label>
                    <input type="text" placeholder="字母、数字等，用户名唯一" required="" name="user_login" class="form-control">
                </div>
                <div class="form-group">
                    <label class="control-label" for="mail">Email</label>
                    <input type="hidden" name="user_email" style="display:none">
                    <div class="typehelper" style="position: relative;"><input type="email" placeholder="hello@segmentfault.com" required="" name="user_email" class="form-control register-mail" autocomplete="off"><ul role="menu" class="dropdown-menu" style="display: none; min-width: 297px;"></ul></div>
                </div>
                <div class="form-group">
                    <label class="control-label" for="password">密码</label>
                    <input type="password" placeholder="不少于 6 位" required="" name="user_psw" class="form-control">
                </div>
<!--                 <div style="display:none;" class="form-group">
                    <label class="required control-label">验证码</label>
                    <input type="text" placeholder="请输入下方的验证码" name="captcha" id="captcha" class="form-control">
                    <div class="mt10"><a href="javascript:void(0)" id="loginReloadCaptcha"><img width="240" height="50" class="captcha" data-src="/user/captcha?w=240&amp;h=50"></a></div>
                </div> -->
                <div class="form-group clearfix">
                    <div class="checkbox pull-left">
                        同意并接受<a target="_blank" href="/tos">《服务条款》</a>
                    </div>
                    <button class="btn btn-primary pl20 pr20 pull-right" type="submit">注册</button>
                </div>
            </form>
        </div>
    </div>
    <div class="text-center text-muted mt30">
        <a class="ml5" href="#">找回密码</a>
    </div>
    </p>
    </div>          
    <div class="modal-footer hidden">
  </div>        
</div>



</body>
</html>
