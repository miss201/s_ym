<? include('../system/inc.php'); ?>
<? include('check.php'); ?>
<? $nav='my';?> 
<?
if ($_POST['do']=='save')
{
null_back($_POST['template'],'请选择风格');

	$t = $_POST['template'];
   
  	$result = mysql_query("select id from ".flag."tpl where uid = {$member_id}");
  	if(mysql_fetch_array($result))
    {
    	mysql_query("update ".flag."tpl set tpl_id = '{$t}' where uid = {$member_id}");
    }
  	else
    {
    	mysql_query("INSERT INTO ".flag."tpl VALUES(null,'{$t}',{$member_id})");
    }
	
	alert_href('系统设置修改成功!','dashangye.php');
	
}
		$result = mysql_query("select * from ".flag."tpl where uid = {$member_id}");

  		$row = mysql_fetch_array($result);
		$t_id = $row['tpl_id'];

?><!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="format-detection" content="telephone=no">
        <title>上传视频-<?=$site_name?></title>
         <link href="agency/css/style.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="agency/js/jquery-1.11.2.min.js"></script>
         <script type="text/javascript" src="agency/js/public.js"></script>
        <script type="text/javascript" src="agency/js/winset.js"></script>
        
        	
 <link rel="stylesheet" href="../editor/themes/default/default.css" />
  <script type="text/javascript" src="../js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="../ui/ui.js"></script>
<script type="text/javascript" src="../js/admin.js"></script>
<script charset="utf-8" type="text/javascript" src="../editor/kindeditor.js"></script>

 
 
    </head>
    <body>
        <section id="container">
            <div id="ts_loadering"></div>
            <!-------------------mid0------------>
            <div class="toptitle_box">
                <div class="conbox"><i onclick="javascript:history.go(-1);"><img src="agency/images/back.png"></i><span>打赏页设置</span>
                </div>
            </div>
            <div class="h_updatepwd_box">
                <form method="post" name="" action="">
 <input type="hidden" name="do" value="save" />
                    <div class="m_con"><span>风格：</span>
                         
                                            <select name="template" class="form-control"    data-val="true" lay-filter="pid"  lay-verify="required">
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
                  
                     
                    <input   type="submit" class="m_sub" value="提交"  >
                </form>
            </div>
 
         

            <div class="f_padheght"></div>
            <!-------------------mid1------------>
            <!---------------bottom0------------>
          <? include('footer.php'); ?>

            <!---------------bottom1------------>
        </section>
    </body>

</html>