<? include('../system/inc.php');include('check.php'); ?>
<?php 

		$result = mysql_query("select * from ".flag."tpl where uid = {$member_id}");

  		$row = mysql_fetch_array($result);
		$t_id = $row['tpl_id'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>密码修改</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">
    
    <link rel="stylesheet" href="layui/css/layui.css">
    <link rel="stylesheet" href="css/pc.css">
	
	
 <link rel="stylesheet" href="../editor/themes/default/default.css" />
  <script type="text/javascript" src="../js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="../ui/ui.js"></script>
<script type="text/javascript" src="../js/admin.js"></script>
<script charset="utf-8" type="text/javascript" src="../editor/kindeditor.js"></script>



    
</head>
<body>

<div class="layui-fluid child-body">
    <div class="layui-row">
        <div class="layui-col-md6">
            <form id="myform" class="layui-form layui-form-pane" action="ajax.php?act=update_pwd" method="post">
                <input type="hidden" name="do" value="action" />
                <div class="layui-form-item">
                    <label class="layui-form-label">原密码</label>
                    <div class="layui-input-block">
                       <input name='old_pwd' type='text' class="layui-input" placeholder="请输入原密码" >
                    </div>
                </div>
              <div class="layui-form-item">
                    <label class="layui-form-label">新密码</label>
                    <div class="layui-input-block">
                       <input name='new_pwd' type='text' class="layui-input" placeholder="请输入新密码" >
                    </div>
                </div>
              <div class="layui-form-item">
                    <label class="layui-form-label">确认密码</label>
                    <div class="layui-input-block">
                       <input name='repeat_pwd' type='text' class="layui-input" placeholder="请输入确认密码" >
                    </div>
                </div>
                <div class="layui-form-item layui-">
                    <button id="submit" class="layui-btn" >确定</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="layui/layui.all.js"></script>
<script src="js/pc.min.js"></script>

 <script>
	$('input[name="new_pwd"]').val('');
   $('input[name="repeat_pwd"]').val('');
   $('input[name="old_pwd"]').val('');
</script>

<script>;</script> </body>
</html>