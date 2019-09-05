<?

  
include('../system/inc.php');
include('./admin_config.php');
include('./check.php');



$dh ='kouliang';
if ( isset($_POST['提交']) ) {

 	null_back($_POST['num'],'请输入笔数');
	null_back($_POST['nums'],'请输入扣量');
	
	
 	$_data['num'] = $_POST['num'];
	$_data['nums'] = $_POST['nums'];
 
	$str = arrtoinsert($_data);
	$sql = 'update '.flag.'kouliang set '.arrtoupdate($_data).' where id = '.$_GET['id'].'';
	if (mysql_query($sql)) {
		$order = mysql_insert_id();
 	}  {
		alert_href('修改成功!','kouliang.php');
	}
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
	<title>修改_扣量管理</title>
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
					<span>修改扣量</span>
				</div>
				<?php
					$result = mysql_query('select * from '.flag.'kouliang where id = '.$_GET['id'].' ');
					if ($row = mysql_fetch_array($result)){
					?>
 					
				<form  class="layui-form layui-form-pane" id="formrec" method="post" role="form">
				
                
                
                	<div class="layui-form-item">
			            <label class="layui-form-label">用户信息</label>
			            <div class="layui-input-inline">
                        			                <input   type="text" class="layui-input"   value="<?=get_user('username',$row['uid'])?> UID:<?=$row['uid']?>"  readonly  >

						 

			            </div>
			        </div>



				 
					<div class="layui-form-item">
			            <label class="layui-form-label">笔数</label>
			            <div class="layui-input-inline">
			                <input name="num" type="text" class="layui-input"   value="<?=$row['num']?>" placeholder="请输入笔数"    >
			            </div>
			        </div>

			   

			 
				 	<div class="layui-form-item">
			            <label class="layui-form-label">扣量</label>
			            <div class="layui-input-inline">
			                <input name="nums" type="text" class="layui-input"  value="<?=$row['nums']?>"  placeholder="请输入扣量"    >
			            </div>
			        </div>

			  
				 
					<div class="layui-form-item">
	                    <label class="layui-form-label"></label>
	                    <div class="layui-input-inline">
 						  
						  <input name="提交"   class="btn" type="submit" value="提交">
	                    </div>
			        </div>
				
				</form>
				<? }?>
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
            url: "/index.php/admin/upload/upload/file/file" //上传接口
            ,before: function(input){
                console.log('图片上传中');
            }
            ,title:'上传图片'
            ,elem: '#upload-image' //指定原始元素，默认直接查找class="layui-upload-file"
            ,method: 'post' //上传接口的http类型
            ,ext: 'jpg|png|gif'
            ,type:'images'
            ,success: function(data){ //上传成功后的回调
                if(data.status == 1){
                    $("#path1").val('/uploads/image/'+data.image_name);
                    $("#img_path1").attr('src', '/uploads/image/' + data.image_name).show();
                }else{
                    alert(data.error_info);
                }
            }
        });

        $('.BrowerPicture').click(function(){
        	var path = $(this).attr('rel');
        	layer.open({
			    type: 2,
			    title: '选择站内图片',
			    shadeClose: true,
			    shade: false,
			    anim: 2,
			    area: ['750px', '350px'],
			    content: ['/index.php/admin/upload/browsefile/stype/picture?docname='+path]
			});
		});

        //监听提交
        form.on('submit(save)', function(data){
            var sub = true;
            var url = $(this).data('href');
            if(url){
                if(sub){
                    $.ajax({
                        url: url,
                        type: 'post',
                        dataType: 'json',
                        data: data.field,
                        success: function (info) {
                            if (info.code == 1) {
                                common.layerAlertSHref(info.msg, '提示', "/index.php/admin/category/index");
                            }
                            else {
                                common.layerAlertE(info.msg, '提示');
                                $(data.elem).removeAttr("disabled").text("提交");
                            }
                        },
                        error: function (XMLHttpRequest, textStatus, errorThrown) {
                            common.layerAlertE(textStatus, '提示');
                        }
                    });
                }
            }else{
                common.layerAlertE('链接错误！', '提示');
            }
            return false;
        });
    });
</script>
</body>
</HTML>