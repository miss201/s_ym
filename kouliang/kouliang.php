﻿<?

  
include('../system/inc.php');
include('./admin_config.php');
include('./check.php');
$dh ='kouliang';
 
if($_GET['act'] =='del'){
	$sql = 'delete from '.flag.'kouliang where id = '.$_GET['id'].'';
	if(mysql_query($sql)){
		alert_href('删除成功!','kouliang.php');
	}else{
		alert_back('删除失败！');
	}
}


if($_POST['btnSave']){
 if(empty($_POST['id'])){
    echo"<script>alert('必须选择一个ID,才可以删除!');history.back(-1);</script>";
    exit;
  }else{
/*如果要获取全部数值则使用下面代码*/
   $id= implode(",",$_POST['id']);
   $str="DELETE FROM ".flag."kouliang where id in ($id)";
   mysql_query($str);
  echo "<script>alert('删除成功！');window.location.href='kouliang.php';</script>";
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
	<style type="text/css">
	.pagelist {padding:10px 0; text-align:center;}
.pagelist span,.pagelist a{ border-radius:3px; border:1px solid #dfdfdf;display:inline-block; padding:5px 12px;}
.pagelist a{ margin:0 3px;}
.pagelist span.current{ background:#09F; color:#FFF; border-color:#09F; margin:0 2px;}
.pagelist a:hover{background:#09F; color:#FFF; border-color:#09F; }
.pagelist label{ padding-left:15px; color:#999;}
.pagelist label b{color:red; font-weight:normal; margin:0 3px;}

.i_hits {
    border: 1px solid #fff;
    width: 50px;
    text-align: center;
    line-height: 27px; }
    .table input.i_hits:focus {
      border-color: #e1e6eb; }

</style>
	<script type="text/javascript" src="/statics/js/jquery.min.js"></script>
	<script type="text/javascript" src="/statics/js/ui.js"></script>
	<script type="text/javascript" src="/statics/js/public.js"></script>
	<script type="text/javascript" src="/statics/layui/layui.js"></script>
	<script type="text/javascript" src="/statics/js/global.js"></script>
	<script type="text/javascript" language="javascript">
    function selectBox(selectType){
    var checkboxis = document.getElementsByName("id[]");
    if(selectType == "reverse"){
      for (var i=0; i<checkboxis.length; i++){
        //alert(checkboxis[i].checked);
        checkboxis[i].checked = !checkboxis[i].checked;
      }
    }
    else if(selectType == "all")
    {
      for (var i=0; i<checkboxis.length; i++){
        //alert(checkboxis[i].checked);
        checkboxis[i].checked = true;
      }
    }
   }
</script>

	<title>扣量管理</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
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
					<span>扣量管理</span>
				</div>
 				
					<a class="btn fl mr10" href="kouliang_add.php">添加扣量</a>
					  
               
                                      
				<div class="search fr">
<form name='form1' action='' method='get'>     
					<input type="text" id="key" name="key" value="" placeholder="请输入用户UID" >
 
					<input name=""  type="submit" class="icon-search" value=" ">
					<a class="icon-search"  href='javascript:document.form1.submit();' style="color: #FFFFFF"></a>
 					</form>
				</div>
				<div class="clear"></div>

				<div class="table"><form id="form2" name="form2" method="post" action="" onSubmit="return checkF(this)">

					<table>
						<thead>
							<tr>
								<th   width="20"><span onClick="selectBox('reverse')">选</span></th>
								<th width="180" class="sort"><span>用户信息</span></th>
								<th class="sort" width="95">笔数</th>
								<th class="sort" width="80">扣量</th>
							 
								<th width="226"><span>操作</span></th>
							</tr>
						</thead>
						<tbody>
						
						
						<?php
						
 
						
  if (isset($_GET['key'])) {
 $sql = 'select * from '.flag.'kouliang where uid = '.$_GET['key'].'    order by ID desc , id desc';
 							}
							else{
									$sql = 'select * from '.flag.'kouliang  order by ID desc , id desc';
 								}
							
								$pager = page_handle('page',20,mysql_num_rows(mysql_query($sql)));
								$result = mysql_query($sql.' limit '.$pager[0].','.$pager[1].'');
							while($row= mysql_fetch_array($result)){
						
 						 
 							?>
							


						 
						
															<tr>
									<td><input type="checkbox" name="id[]" value="<? echo $row['ID']?>" style="background:none; border:none;" /></td>
									<td align="">
									 <?=get_user('username',$row['uid'])?>[<?=$row['uid']?>]								</td>
									<td><?=$row['num']?></td>
									<td><?=$row['nums']?></td>
									  
									<td>
								 
                                         <a class="btn" href="kouliang_edit.php?id=<? echo $row['ID']?>" >编辑</a>
                                <a class="btn" href="?act=del&id=<? echo $row['ID']?>" >删除</a>								</tr>
															 
											 
														
														
													 
								<? }?>
								<tr align="left">
															  <td colspan="9"  align="left"><input type="button" value="全选"   onClick="selectBox('all')"/>
<input type="button" value="反选"  onClick="selectBox('reverse')"/>
<input type="submit" name="btnSave"  onclick="Javascript:return confirm('您确定要删除所选ID吗');"     value="删除"/>&nbsp;						  						  </td>
						  </tr>
								
												<tr>
															  <td colspan="9"><div class="pagelist"> 
 <?php echo xiaoyewl_pape($pager[2],$pager[3],$pager[4],2);?>  
 </div>			 						  						  </td>
						  </tr>
														</tbody>
					</table>
					</FORM>
				</div>
			</div>
		</div>
	</div>
<script>
      $(document).on('click','.download', function () {
        var id=$(this).attr('data-id');
        var obs=$(this);
        $.ajax({
            url: 't.php?act=download',
            dataType: "json",
            data:{'id':id},
            type: "get",
            success: function(data){
                if(data.code == 1){
                    obs.find('div').removeClass('layui-form-onswitch');
                    layer.msg(data.msg,{icon:2,time:1500,shade: 0.1,});
                }else{
                    obs.find('div').addClass('layui-form-onswitch');
                    layer.msg(data.msg,{icon:1,time:1500,shade: 0.1,});
                }
            }
        });
    });

    
      $(document).on('click','.i_tj', function () {
        var id=$(this).attr('data-id');
        var obs=$(this);
        $.ajax({
            url: 't.php?act=tj',
            dataType: "json",
            data:{'id':id},
            type: "get",
            success: function(data){
                if(data.code == 1){
                    obs.find('div').removeClass('layui-form-onswitch');
                    layer.msg(data.msg,{icon:2,time:1500,shade: 0.1,});
                }else{
                    obs.find('div').addClass('layui-form-onswitch');
                    layer.msg(data.msg,{icon:1,time:1500,shade: 0.1,});
                }
            }
        });
    });
	
	
	
	      $(document).on('click','.i_hot', function () {
        var id=$(this).attr('data-id');
        var obs=$(this);
        $.ajax({
            url: 't.php?act=hot',
            dataType: "json",
            data:{'id':id},
            type: "get",
            success: function(data){
                if(data.code == 1){
                    obs.find('div').removeClass('layui-form-onswitch');
                    layer.msg(data.msg,{icon:2,time:1500,shade: 0.1,});
                }else{
                    obs.find('div').addClass('layui-form-onswitch');
                    layer.msg(data.msg,{icon:1,time:1500,shade: 0.1,});
                }
            }
        });
    });
	
	
	  $(document).on('blur','.sort', function () {
        var id = $(this).attr('data-id');
        var obs = $(this);
        $.ajax({
            url: 't.php?act=order',
            dataType: "json",
            data:{'id':id,'sort':obs.val()},
            type: "get",
            success: function(data){
                //layer.msg(data.msg,{icon:1,time:500,shade: 0.1,});
            },
            error:function(ajaxobj)
            {
                if(ajaxobj.responseText!='')
                    alert(ajaxobj.responseText);
            }
        });
   	});



	
	  $(document).on('blur','.i_hits', function () {
        var id = $(this).attr('data-id');
        var obs = $(this);
        $.ajax({
            url: 't.php?act=i_hits',
            dataType: "json",
            data:{'id':id,'sort':obs.val()},
            type: "get",
            success: function(data){
                //layer.msg(data.msg,{icon:1,time:500,shade: 0.1,});
            },
            error:function(ajaxobj)
            {
                if(ajaxobj.responseText!='')
                    alert(ajaxobj.responseText);
            }
        });
   	});


</script>

 
<?PHP

//返回翻页条
//参数说明：1.总页数。2.当前页。3.分页参数。4.分页半径。
function xiaoyewl_pape($t0, $t1, $t2, $t3) {
	$page_sum = $t0;
	$page_current = $t1;
	$page_parameter = $t2;
	$page_len = $t3;
	$page_start = '';
	$page_end = '';
	$page_start = $page_current - $page_len;
	if ($page_start <= 0) {
		$page_start = 1;
		$page_end = $page_start + $page_end;
	}
	$page_end = $page_current + $page_len;
	if ($page_end > $page_sum) {
		$page_end = $page_sum;
	}
	$page_link = $_SERVER['REQUEST_URI'];
	$tmp_arr = parse_url($page_link);
	if (isset($tmp_arr['query'])){
		$url = $tmp_arr['path'];
		$query = $tmp_arr['query'];
		parse_str($query, $arr);
		unset($arr[$page_parameter]);
		if (count($arr) != 0){
			$page_link = $url.'?'.http_build_query($arr).'&';
		}else{
			$page_link = $url.'?';
		}
	}else{
		$page_link = $page_link.'?';
	}
	$page_back = '';
	$page_home = '';
	$page_list = '';
	$page_last = '';
	$page_next = '';
	$tmp = '';
	if ($page_current > $page_len + 1) {
		$page_home = '<a href="'.$page_link.$page_parameter.'=1" title="首页">1...</a>';
	}
	if ($page_current == 1) {
		$page_back = '';
	} else {
		$page_back = '<a href="'.$page_link.$page_parameter.'='.($page_current - 1).'" title="上一页">上一页</a>';
	}
	for ($i = $page_start; $i <= $page_end; $i++) {
		if ($i == $page_current) {
			$page_list = $page_list.'<span class="current">'.$i.'</span>';
		} else {
			$page_list = $page_list.'<a href="'.$page_link.$page_parameter.'='.$i.'" title="第'.$i.'页">'.$i.'</a>';
		}
	}
	if ($page_current < $page_sum - $page_len) {
		$page_last = '<a href="'.$page_link.$page_parameter.'='.$page_sum.'" title="尾页">...'.$page_sum.'</a>';
	}
	if ($page_current == $page_sum) {
		$page_next = '';
	} else {
		$page_next = '<a href="'.$page_link.$page_parameter.'='.($page_current + 1).'" title="下一页">下一页</a>';
	}
	$tmp = $tmp.$page_back.$page_home.$page_list.$page_last.$page_next.'';
	return $tmp;
}

function xiaoyewl_papes($t0, $t1, $t2, $t3) {
	$page_sum = $t0;
	$page_current = $t1;
	$page_parameter = $t2;
	$page_len = $t3;
	$page_start = '';
	$page_end = '';
	$page_start = $page_current - $page_len;
	if ($page_start <= 0) {
		$page_start = 1;
		$page_end = $page_start + $page_end;
	}
	$page_end = $page_current + $page_len;
	if ($page_end > $page_sum) {
		$page_end = $page_sum;
	}

	$page_back = '';
	$page_home = '';
	$page_list = '';
	$page_last = '';
	$page_next = '';
	$tmp = '';
	if ($page_current > $page_len + 1) {
		$page_home = '<a href="'.$page_parameter.'1.html" title="首页">1...</a>';
	}
	if ($page_current == 1) {
		$page_back = '';
	} else {
		$page_back = '<a href="'.$page_parameter.($page_current - 1).'.html" title="上一页">上一页</a>';
	}
	for ($i = $page_start; $i <= $page_end; $i++) {
		if ($i == $page_current) {
			$page_list = $page_list.'<li  class="active"><span href="javascript:void(0)" >'.$i.'</span>';
		} else {
			$page_list = $page_list.'<a href="'.$page_parameter.$i.'.html" title="第'.$i.'页">'.$i.'</a>';
		}
	}
	if ($page_current < $page_sum - $page_len) {
		$page_last = '<a href="'.$page_parameter.$page_sum.'.html" title="尾页">...'.$page_sum.'</a>';
	}
	if ($page_current == $page_sum) {
		$page_next = '';
	} else {
		$page_next = '<a href="'.$page_parameter.($page_current + 1).'.html" title="下一页">>></a>';
	}
	$tmp = $tmp.$page_back.$page_home.$page_list.$page_last.$page_next.'';
	return $tmp;
}



?>
 		<? include('f.php'); ?>

</body>
</html>