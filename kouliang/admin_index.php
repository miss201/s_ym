<?

  
include('../system/inc.php');
include('./admin_config.php');
include('./check.php');
 
 $klresult = mysql_query('select sum(payprice) AS cje from '.flag.'order where zt =1  and kl = 1   ');
 $klrow = mysql_fetch_array($klresult);
 
 
 if ( $klrow['cje'] !='') { $get_kouliangzongjes= get_xiaoshu($klrow['cje']); }
		else
{ $get_kouliangzongjes=0; }
		
		
 

function get_kouliangzongshu()
{
	$result = mysql_query('select count(*) as sl1 from '.flag.'order where zt =1  and kl = 1 ');
	if (!!($row = mysql_fetch_array($result))) {
		return $row['sl1'];
	} else {
		return '0';
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
	<title>管理控制台</title>
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
<script>
layui.use(['layer', 'common'], function () {
    var $ = layui.jquery , common = layui.common;

    //退出系统
    var adminActive = {
        doLoginOut: function () {
            var url = $(this).data('href');
            var rturl = $(this).data('rturl');
            if (url) {
                common.signOut('确认退出系统？', '请再次确认是否要退出系统！', url, rturl, 'post', 'json', {});
            }
            else {
                common.layerAlertE('123！', '提示');
            }
        }
    };

    $('.doLoginOut').on('click', function (event) {
        var type = $(this).data('type');
        adminActive[type] ? adminActive[type].call(this) : '';
        return false;
    });

    $(document).on('click','.doCache', function () {
        $.ajax({
            	url: '/',
                dataType: "json",
                type: "POST",
                success: function(data){
                    layer.msg(data.msg,{icon:1,time:500,shade: 0.1,});
                },
                error:function(ajaxobj)
                {
                    if(ajaxobj.responseText!='')
                        alert(ajaxobj.responseText);
                }
       	});
  	});
 });
</script>

	<?php
					$result = mysql_query('select   * from '.flag.'log  order by id desc');
					if ($row = mysql_fetch_array($result)){
					
					$dlsj=$row['l_date'];
					$dlip=$row['l_ip'];
				
					}
					?> 124
		<div class="main">
			<div class="notice"></div>
			<div class="main_content">
				<div class="ui_prompt">提示：尊敬的 <? echo $a_name ;?>（超级管理员），欢迎您的使用，您本次登录时间:<? echo $dlsj	 ;?>，登录IP为 <? echo $dlip	 ;?></div>
				 
				 <div class="clearfix">
				 	<div class="index_block index_block_info">
						<i class="icon-信息"></i>
						<div class="fr">
							<p>扣量总数</p>
							<strong><? echo get_kouliangzongshu();?></strong>
						</div>
					</div>
					<div class="index_block index_block_column">
						<i class="icon-栏目"></i>
						<div class="fr">
							<p>扣量总额</p>
							<strong><? echo get_xiaoshu($get_kouliangzongjes);?></strong>
						</div>
					</div>
					 
				 	</div>
					 
                
				<div class="index_box">
					<div class="index_box_tit">网站访问统计</div>
					<div class="index_box_content">
						<div class="index_highcharts"></div>
						<script type="text/javascript" src="/statics/js/highcharts.js"></script>
						<script type="text/javascript">
							var data = [0,0,140,68,0,0,2];
							var today = new Date();
							today.setHours(8 - 24*(data.length-1));
							today.setMinutes(0);
							today.setSeconds(0);
							today.setMilliseconds(0);
							$('.index_highcharts').highcharts({
						        chart: {
						            type: 'areaspline'
						        },
						        title: {
						            text: ''
						        },
						        legend: {
						            layout: 'vertical',
						            align: 'left',
						            verticalAlign: 'top',
						            x: 150,
						            y: 100,
						            floating: true,
						            borderWidth: 1,
						            backgroundColor: '#FFFFFF'
						        },
						        xAxis: {
						            allowDecimals: false,
						            type: 'datetime',
						            dateTimeLabelFormats: {
						                day: '%b-%e'
						            },
						            labels:{
						            	maxStaggerLines :3
						            }
						        },
						        yAxis: {
						            allowDecimals: false,
						            //tickPixelInterval: 200,
						            labels:{
						            	maxStaggerLines :3
						            },
						            title: {
						                text: ''
						            }
						        },
						        tooltip: {
						            pointFormat: '访问量: {point.y}次'
						        },
						        credits: {
						            enabled: false //禁用版权信息
						        },
						        plotOptions: {
						            areaspline: {
						                fillOpacity: 0.5
						            }
						        },
						        series: [{
						            name: '',
						            showInLegend: false,
						            data: data,
						            pointStart: Date.parse(today),
						            pointInterval: 24 * 3600 * 1000
						        }]
						    });
						</script>
					</div>
				</div>
				<div class="index_box">
					<div class="index_box_tit">网站信息</div>
					<div class="index_box_content" style="min-height:auto;">
						<ul class="purple_list">
							<li>操作系统：<?PHP echo PHP_OS; ?> </li>
 							<li>服务器软件：<?PHP echo $_SERVER ['SERVER_SOFTWARE']; ?> </li>
							<li>PHP版本：<?PHP echo PHP_VERSION; ?></li>
							<li>MySQL 支持：<?php echo function_exists (mysql_close)?"是":"否"; ?></li>
							<li>上传文件： <?PHP echo get_cfg_var ("upload_max_filesize")?get_cfg_var ("upload_max_filesize"):"不允许上传附件"; ?></li>
						</ul>
					</div>
				</div>
				<?
				
				include('footer.php');

?>
	<?
 	include('f.php');
 
?>
			</div>
		</div>
	</div>
</body>
</html>