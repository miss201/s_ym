<?

  
include('../system/inc.php');
include('./admin_config.php');
include('./check.php');
$dh ='kouliang';

 
if (isset($_POST['提交'])){
	null_back($_POST['uid'],'请输入用户UID');
	null_back($_POST['num'],'请输入笔数');
	null_back($_POST['nums'],'请输入扣量');
 
 
  
  $result = mysql_query('select * from '.flag.'kouliang where uid = '.$_POST['uid'].'');
if ($row = mysql_fetch_array($result))
{
	{ alert_back('添加失败:该用户已有扣量存在'); }

	
}
 
  $result = mysql_query('select * from '.flag.'user where id = '.$_POST['uid'].'');
if ($row = mysql_fetch_array($result))
{
 	
	$_data['uid'] = $_POST['uid'];
	$_data['num'] = $_POST['num'];
	$_data['nums'] = $_POST['nums'];
 
	$str = arrtoinsert($_data);
	$sql = 'insert into '.flag.'kouliang ('.$str[0].') values ('.$str[1].')';
	if (mysql_query($sql)) {
		$order = mysql_insert_id();
      
      	 $kouliangsql = 'update '.flag.'order set kouliang=1 where uid = '.$_POST['uid'].' ';
     mysql_query($kouliangsql);
      
	 
		alert_href('扣量添加成功1!','kouliang.php');
	} else {
		alert_back('添加失败!');
	}
	
	
}
else
{ alert_back('添加失败:用户UID:'.$_POST['uid'].'不存在!!'); }
 	 
}

 ?>
 
 
<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="shortcut icon" href="/statics/favicon.ico" />
	<link rel="stylesheet" type="text/css" href="/statics/layui/css/layui.css">
	<link rel="stylesheet" type="text/css" href="/statics/css/font.css">
	<link rel="stylesheet" type="text/css" href="/statics/css/ui.css">
	<link rel="stylesheet" type="text/css" href="/statics/css/public.css">
	<link rel="stylesheet" type="text/css" href="/statics/Font-Awesome/css/font-awesome.css">
	<script type="text/javascript" src="/statics/js/jquery.min.js"></script>
	<script type="text/javascript" src="/statics/js/ui.js"></script>
	<script type="text/javascript" src="/statics/js/public.js"></script>
	<script type="text/javascript" src="/statics/layui/layui.js"></script>
	<script type="text/javascript" src="/statics/js/global.js"></script>
<script type="text/javascript" src="./js/pinyin.js"></script>

 <link rel="stylesheet" href="../editor/themes/default/default.css" />
  <script type="text/javascript" src="../js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="../ui/ui.js"></script>
<script type="text/javascript" src="../js/admin.js"></script>
<script charset="utf-8" type="text/javascript" src="../editor/kindeditor.js"></script>

 <script type="text/javascript">
KindEditor.ready(function(K) {
	K.create('#i_content');
	var editor = K.editor();
	K('#upload-image').click(function() {
		editor.loadPlugin('image', function() {
			editor.plugin.imageDialog({
			imageUrl : K('#site_logo').val(),
			clickFn : function(url, title, width, height, border, align) {
				K('#site_logo').val(url);
				editor.hideDialog();
				}
			});
		});
	});
	K('#slideshow').click(function() {
		editor.loadPlugin('multiimage', function() {
			editor.plugin.multiImageDialog({
				clickFn : function(urlList) {
					var tem_val = '';
					var tem_s = '';
					K.each(urlList, function(i, data) {
						tem_val = tem_val + tem_s + data.url;
						tem_s = '|';
					});
					K('#d_slideshow').val(tem_val);
					editor.hideDialog();
				}
			});
		});
	});
	K('#i_d1').click(function() {
		editor.loadPlugin('insertfile', function() {
			editor.plugin.fileDialog({
				fileUrl : K('#i_durl1').val(),
				clickFn : function(url, title) {
					K('#i_durl1').val(url);
					editor.hideDialog();
				}
			});
			
 		});
	});
	
	
	K('#i_d2').click(function() {
		editor.loadPlugin('insertfile', function() {
			editor.plugin.fileDialog({
				fileUrl : K('#i_durl2').val(),
				clickFn : function(url, title) {
					K('#i_durl2').val(url);
					editor.hideDialog();
				}
			});
			
 		});
	});
	
	
		K('#i_d3').click(function() {
		editor.loadPlugin('insertfile', function() {
			editor.plugin.fileDialog({
				fileUrl : K('#i_durl3').val(),
				clickFn : function(url, title) {
					K('#i_durl3').val(url);
					editor.hideDialog();
				}
			});
			
 		});
	});
	
	
		K('#i_d4').click(function() {
		editor.loadPlugin('insertfile', function() {
			editor.plugin.fileDialog({
				fileUrl : K('#i_durl4').val(),
				clickFn : function(url, title) {
					K('#i_durl4').val(url);
					editor.hideDialog();
				}
			});
			
 		});
	});
	
	
});

 </script>	
 
 <script>
			KindEditor.ready(function(K) {
				var colorpicker;
				K('#colorpicker').bind('click', function(e) {
					e.stopPropagation();
					if (colorpicker) {
						colorpicker.remove();
						colorpicker = null;
						return;
					}
					var colorpickerPos = K('#colorpicker').pos();
					colorpicker = K.colorpicker({
						x : colorpickerPos.x,
						y : colorpickerPos.y + K('#colorpicker').height(),
						z : 19811214,
						selectedColor : 'default',
						noColor : '无颜色',
						click : function(color) {
							K('#i_color').val(color);
							colorpicker.remove();
							colorpicker = null;
						}
					});
				});
				K(document).click(function() {
					if (colorpicker) {
						colorpicker.remove();
						colorpicker = null;
					}
				});
			});
		</script>

	<title>新增_扣量管理</title>
</head>
<body>
	<div id="main-container">
		 <?
		 include('head.php');
?>
<div class="sidebar">
	<div class="sidebar_tool"><i class="icon-dedent"></i></div>
	 <?
		 include('left.php');
?>
</div>
 		<div class="main">
			<div class="notice">您当前的位置：<a href="/">首页</a> &gt; <a href="" >常用菜单</a> &gt; <a href="" >扣量管理</a></div>
		<div class="main_content">
				<div class="title">
					<span>新增扣量</span>
				</div>
				
				
				<form method="post" name="formrec"  class="layui-form layui-form-pane" id="formrec" role="form">
				
			 
 <script type="text/javascript">
   function getjiekou(){
	   alert('测试');
    var key1 = $("#user").find("option:selected").attr("value");
      document.getElementById('uid').value=key1;
      }
</script>


	
						
					<div class="layui-form-item">
			            <label class="layui-form-label">用户列表</label>
			            <div class="layui-input-inline w300">
						
			                <select    onchange="getjiekou()"   id="user" name="user"  data-val="true"  >
 								
									<?php
						$result = mysql_query('select * from '.flag.'user  order by ID desc ,id desc');
						while($row = mysql_fetch_array($result)){
						?>
			                <option value="<? echo $row['ID'];?>"><? echo $row['username'];?> [UID:<?=$row['ID']?>]</option>
							
							 
		                  <? } ?>
						  </select>
						  
			            </div>
			        </div>
  
					
					
					<div class="layui-form-item">
			            <label class="layui-form-label">用户UID</label>
			            <div class="layui-input-inline">
			                <input name="uid" type="text" class="layui-input" id="uid" placeholder="请输入用户UID"    >
			            </div>
			        </div>


			
					<div class="layui-form-item">
			            <label class="layui-form-label">笔数</label>
			            <div class="layui-input-inline">
			                <input name="num" type="text" class="layui-input" id="" placeholder="请输入笔数"    >
			            </div>
			        </div>

			   

			 
				 	<div class="layui-form-item">
			            <label class="layui-form-label">扣量</label>
			            <div class="layui-input-inline">
			                <input name="nums" type="text" class="layui-input" id="" placeholder="请输入扣量"    >
			            </div>
			        </div>

			   

 
			 

 

				 
 
				 
			 



					<div class="layui-form-item">
	                    <label class="layui-form-label"></label>
	                    <div class="layui-input-inline">
			         
						  
						  <input name="提交" type="submit" id="提交" value="提交">
	                    </div>
			        </div>
				
		  </form>
		  </div>
		</div>
	</div>
		<?
 	include('f.php');
 
?>

<script type="text/javascript">
	var option= {toolbars: [[
            'fullscreen', 'source', '|',
            'bold', 'italic', 'underline', 'strikethrough', 'forecolor', 'backcolor',
            'paragraph', 'fontfamily', 'fontsize', '|',
            'indent', 'justifyleft', 'justifycenter', 'justifyright', 'justifyjustify', '|',
            'link', 'unlink',
        ]]};

    window.UEDITOR_HOME_URL = '/statics/ueditor/';
    window.onload = function() {
        window.UEDITOR_CONFIG.initialFrameWidth=700;
        window.UEDITOR_CONFIG.initialFrameHeight=300;
        UE.getEditor('desc',option);
        UE.getEditor('content');

    }
</script>
<script type="text/javascript" src="/statics/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="/statics/ueditor/ueditor.all.min.js"></script>  

<script>
layui.use(['form','common','upload'], function(){
        var $ = layui.jquery;
        $form = $('form');
        var form = layui.form(),layer = layui.layer, common=layui.common;
         //上传图片
        layui.upload({
            title:'上传图片'
            ,elem: '#upload-image' //指定原始元素，默认直接查找class="layui-upload-file"
          });
 
    //上传图片
        layui.upload({
        
             title:'颜色选择'
            ,elem: '#colorpicker' //指定原始元素，默认直接查找class="layui-upload-file"
             
        });


       
 
    });
</script>
<script>
layui.use(['form','common'], function(){
        var $ = layui.jquery;
        $form = $('form');
        var form = layui.form(),layer = layui.layer,common=layui.common;
 
        form.on('switch(switchTest1)', function(data) {
        	if (this.checked) {
        		$(".area").show();
        	}else{
        		$(".area").hide();
        	}
        });
 
	
	     form.on('switch(switchTest2)', function(data) {
        	if (this.checked) {
        		$(".area1").show();
        	}else{
        		$(".area1").hide();
        	}
        });
    });
</script>
</body>
</HTML>