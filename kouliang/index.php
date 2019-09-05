<?


include('../system/inc.php');
include('./admin_config.php');

if ($wid!=0)
{		alert_url('404');};

$act = $_POST['act'];
$username = $_POST['username'];
$password = md5($_POST['password']);
$sj = date("Y-m-d H:i:s",intval(time()));
$ip =xiaoyewl_ip();

echo admin_login($act,$username,$password,$a_name,$a_password,$ip,$sj)



?>
<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>扣量管理</title>


    <link rel="stylesheet" type="text/css" href="/statics/layui/css/layui.css">
    <link rel="stylesheet" type="text/css" href="/statics/css/jquery.slider.css">
    <link rel="stylesheet" type="text/css" href="/statics/css/login.css">
    <script type="text/javascript" src="/statics/js/jquery.min.js"></script>
    <script type="text/javascript" src="/statics/layui/layui.js"></script>
    <script type="text/javascript" src="/statics/js/jquery.slider.min.js"></script>

    <link href="../agent/login/style.css" rel="stylesheet" type="text/css" media="all">
    <style>
        form {
            padding: 3em 2em;
            background: rgba(242, 242, 242, 0.39);
        }
        input[type="text"], input[type="password"]
        {
            display:inline-block;
            height:41px;
        }
        .submit
        {
            padding-top:0;
        }


        .icon
        {
            margin: 20px 9px 9px 0px;
        }
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

</head>
<body>

<!-- contact-form -->
<div class="message warning" style="
    background-color: transparent;
    border-shadow: none;
    box-shadow: none;
">
    <div class="inset">
        <div class="login-head" style="background-color:transparent;color:#56275a;">
            <div style="height:80px;width:80px;border-radius:50%;background-color:white;text-align:center;line-height:80px;font-size:30px;margin:0 auto;background-image:url(../agent/login/logo.png);background-size:cover;background-position:center;"></div>
            扣量后台管理
        </div>
        <form action="" method="post" name="FormInfo" id="FormInfo">
            <li>
                <input name="username" placeholder="用户名" id="username" type="text" lay-verify="required" class="layui-input text">
                <a class=" icon user"></a>
            </li>
            <div class="clear"> </div>
            <li>
                <input name="password" lay-verify="required" id="password" placeholder="密码"  type="password" class="layui-input">
                <a class="icon lock"></a>
            </li>
            <div class="clear"> </div>
            <div class="submit">
                <button style="width:100%;" type="submit" class="btn btnlogin" lay-submit="" lay-filter="FormInfo" >登录</button>
                <div class="clear"></div>
            </div>
            <input name="act" type="hidden" value="login">

        </form>
    </div>
</div>
<script>
    layui.use('form', function(){
        var form = layui.form();
        var key = false;
        var slider = $('#slider');
        var verify = function (obj) {
            obj.addClass('layui-form-danger')
                .focus()
                .one('input',function () {
                    obj.removeClass('layui-form-danger').next('span').fadeOut();
                })
                .next('span').slideDown('fast');
        }
        form.on('submit(form)', function(data){
            var input = $(data.form).find('input');
            for(var i=0;i<input.length;i++){
                var t = input.eq(i);
                if(t.val() == ''){
                    verify(t);
                    return false;
                }
            }
            if(!key){
                slider.one('click',function () {
                    slider.next('span').fadeOut();
                }).next('span').slideDown('fast');
            }else{
                $.ajax({
                    url:'/index.php/admin/index/dologin',
                    data:$('#doLogin').serialize(),
                    dataType:"json",
                    error:function(data){
                        common.layerAlertE('链接错误！', '提示');
                    },
                    success:function(data){
                        if(data.code==1){
                            layer.msg(data.msg, {icon: 6,time:1000}, function(index){
                                layer.close(index);
                                window.location.href = data.data;
                            });
                        }else{
                            layer.msg(data.msg, {icon: 5,time:2000});
                            return false;
                        }
                    }
                });
            }
            return false;
        });
        slider.slider({
            width: 420,
            height: 40,
            sliderBg: "#999",
            color: "#fff",
            fontSize: 14,
            bgColor: "#33CC00",
            textMsg: "按住滑块，拖拽验证",
            successMsg: "验证成功",
            successColor: "#fff",
            time: 400,
            callback: function(result) {
                key = result;
            }
        });

    });
</script>


</body>
</html>
