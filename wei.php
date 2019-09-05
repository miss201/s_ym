<? include('system/inc.php');
if ($_POST['act']=='log')
{
    null_back($_POST['username'],'请输入用户名');
    null_back($_POST['password'],'请输入用户密码');

	//echo $_POST['password'];
    $result = mysql_query('select * from '.flag.'user where username=  "'.$_POST['username'].'"  and password=  "'.$_POST['password'].'" ');
    if ($row = mysql_fetch_array($result))
    {
        $_SESSION['member_id'] = $row['ID'];
        alert_url('/member/');
    }
    else
    {
        alert_href('用户名或密码不正确','');

    }
}
?>
<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>微赏代理登录</title>
	<link href="./agent/login/style.css" rel="stylesheet" type="text/css" media="all">
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
			<div style="height:80px;width:80px;border-radius:50%;background-color:white;text-align:center;line-height:80px;font-size:30px;margin:0 auto;background-image:url(./agent/login/logo.png);background-size:cover;background-position:center;"></div>
			代理管理
      </div>
		<form action="" method="post" name="FormInfo" id="FormInfo">
			<li>
				<input name="username" placeholder="用户名"  type="text" lay-verify="required" class="layui-input text">
				<a class=" icon user"></a>
			</li>
			<div class="clear"> </div>
			<li>
				<input name="password" lay-verify="required" placeholder="密码"  type="password" class="layui-input">
				<a class="icon lock"></a>
			</li>
			<div class="clear"> </div>
			<div class="submit">
				<button style="width:49%;" type="submit" class="btn btnlogin" lay-submit="" lay-filter="FormInfo" >登录</button>
				<a href="register.php" style="display:inline-block;width:49%;float:right;">
					<button type="button" style="width:100%;background:#d197af;border:2px solid #d197af;" value="注册"  class="btn2 btnsign">注册</button>
				</a>
				<div class="clear"></div>
			</div>
			<input   type="hidden"  name="act" value="log">

		</form>
	</div>
</div>


</body>
</html>
