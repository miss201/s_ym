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
    <title>打赏页模版设置</title>
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
            <form id="myform" class="layui-form layui-form-pane" action="ajax.php?act=update_tpl" method="post">
                <input type="hidden" name="do" value="udpate" />
                <div class="layui-form-item">
                    <label class="layui-form-label">打赏页模板</label>
                    <div class="layui-input-block">
                         <select name="template" class=""   >
  			                <option <?  if ($t_id =='01') { echo "selected";}?>  value="01"  >默认风格</option>
  			                <option <?  if ($t_id =='02') { echo "selected";}?>  value="02"  >风格2</option>
  			                <option <?  if ($t_id =='03') { echo "selected";}?>  value="03"  >风格3</option>
  			                <option <?  if ($t_id =='04') { echo "selected";}?>  value="04"  >风格4</option>
                           <option <?  if ($t_id =='05') { echo "selected";}?>  value="05"  >风格5</option>
                           <option <?  if ($t_id =='06') { echo "selected";}?>  value="06"  >风格6</option>
                           <option <?  if ($t_id =='07') { echo "selected";}?>  value="07"  >风格7</option>
                           <option <?  if ($t_id =='08') { echo "selected";}?>  value="08"  >风格8</option>
  								 
						  </select>	
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

</script>

<script>;</script> </body>
</html>