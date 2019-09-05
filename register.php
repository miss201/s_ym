<? include('system/inc.php');

if ($_POST['act']=='log')
{
    null_back($_POST['username'],'请输入用户名');
    null_back($_POST['password'],'请输入用户密码');
    null_back($_POST['qq'],'请输入用户QQ');
    null_back($_POST['card'],'请输入邀请码');

    $yqm=base64_decode($_POST['card']);

    if  ($_POST['shangji']!='')
    {
        $result = mysql_query('select * from '.flag.'user where ID=  '.$_POST['shangji'].'    ');
        if (!$row = mysql_fetch_array($result))
        { alert_back('注册失败:推荐人ID'.$_POST['shangji'].'不存在');	}

    }


    $result = mysql_query('select * from '.flag.'user where ID=  '.$yqm.'    ');
    if ($row = mysql_fetch_array($result))
    { $shangjiid=$row['ID'];	}


    else
    {
        $result = mysql_query('select * from '.flag.'yqm where card=  "'.$_POST['card'].'"  and  uid  = 0   ');
        if (!$row = mysql_fetch_array($result))
        { alert_back('注册失败:邀请码'.$_POST['card'].'不正确/已被使用');	}
    }





    $result = mysql_query('select * from '.flag.'user where username=  "'.$_POST['username'].'"   ');
    if ($row = mysql_fetch_array($result))
    {
        alert_back('注册失败:用户名'.$_POST['username'].'已被注册');

    }
    else
    {
        $_data['rmb'] = 0;
        $_data['sxf'] = 0;
        $_data['ticheng'] = $site_morenticheng;
        $_data['username'] =$_POST['username'];
        $_data['nickname'] =$_POST['username'];
        $_data['password'] =$_POST['password'];
        if ($_POST['shangji']!='' && $shangjiid=='')
        {$_data['shangji'] =$_POST['shangji'];}

        if ( $shangjiid!='')
        {$_data['shangji'] =$shangjiid;}



        $_data['qq'] =$_POST['qq'];
        $_data['date'] =date('Y-m-d H:i:s');
        $str = arrtoinsert($_data);
        $sql = 'insert into '.flag.'user ('.$str[0].') values ('.$str[1].')';
        if (mysql_query($sql))
        {
            $uid = mysql_insert_id();
            $cardsql = 'update  '.flag.'yqm set  uid = '.$uid.'  where card="'.$_POST['card'].'" and uid = 0 ';
            mysql_query($cardsql);


            alert_href('注册成功','/login.php');}
        else
        {	alert_back('注册失败:数据写入失败!');	}

    }
}
?>
<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>微赏代理注册</title>
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

        .inset .icon
        {
            float:left;
            background-size:cover;
            background-position:center;
          margin: 12px;
        }

        .inset input
        {
            height:20px;
            width:65%;
            padding-left: 0;

        }

        .btn
        {
            color: #fff;
            cursor: pointer;
            display:inline-block;
            font-weight: 900;
            outline: none;
            font-family: 'Raleway', sans-serif;
            padding: 5px 0px;
            width: 35%;
            font-size: 18px !important;
            background: darkorange;
            border: 2px solid darkorange;
            border-radius: 0.5em;
            -webkit-border-radius: 0.5em;
            -moz-border-radius: 0.5em;
            -o-border-radius: 0.5em;

        }
        .login-head
        {
            padding:10px 0;
        }

        .mine
        {
            height:20px;
            width:20px;
            background-image:url(./agent/login/image/mine.png)
        }
        .password
         {
             height:20px;
             width:20px;
             background-image:url(./agent/login/image/password.png)
         }

        .qq
        {
            height:20px;
            width:20px;
            background-image:url(./agent/login/image/qq.png)
        }
        .id
        {
            height:20px;
            width:20px;
            background-image:url(./agent/login/image/ID.png)
        }
        .yao
        {
            height:20px;
            width:20px;
            background-image:url(./agent/login/image/yao.png)
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
        <div class="login-head" style="background-color:transparent;text-align: center;">
            <div class="btn">用户注册</div>
        </div>
        <form action="" method="post" name="FormInfo" id="FormInfo">
            <li>
                <a class="icon mine"></a>
                <input name="username" placeholder="请输入用户名"  type="text" lay-verify="required" class="layui-input text">
            </li>
            <li>
                <a class="icon password"></a>
                <input name="password" lay-verify="required" placeholder="请输入用户密码"  type="password" class="layui-input">
            </li>
            <li>
                <a class=" icon qq"></a>
                <input name="qq" placeholder="请输入您的QQ联系方式"  type="text" lay-verify="required" class="layui-input text">
            </li>
            <li>
                <a class=" icon id"></a>
                <input name="shangji" placeholder="请输入推荐人ID，没有请留空"  type="text" lay-verify="required" class="layui-input text" value='<?php echo $_GET['uid'] ?>'>
            </li>
            <li>
                <a class=" icon yao"></a>
                <input name="card" placeholder="请输入注册邀请码"  type="text" lay-verify="required" class="layui-input text">
            </li>
            <div class="clear"> </div>
            <input   type="hidden"  name="act" value="log">
            <div class="submit">
                <a href="login.php" style="display:inline-block;width:49%;float:left;">
                    <button style="width:100%;" type="button" class="btn btnlogin" lay-submit="" lay-filter="FormInfo" >登录</button>
                </a>
                <button type="submit" style="float:right;width:49%;background:darkorange;border:2px solid darkorange;" value="注册"  class="btn2 btnsign">注册</button>

                <div class="clear"></div>
            </div>
            <input   type="hidden"  name="act" value="log">

        </form>
    </div>
</div>


</body>
</html>
