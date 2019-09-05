<?

  
include('../system/inc.php');
include('./admin_config.php');
include('./check.php');
$nav='user';

if(empty($_GET['uid']))
{
	alert_href('参数缺失!','dali.php');
}


if(isset($_POST['提交'])){
	
	$_data['uid'] = $_POST['uid'];
	$_data['one'] = $_POST['one'];
  	$_data['two'] = $_POST['two'];
  	$_data['three'] = $_POST['three'];
  	
  	$is_update = $_POST['is_update'];
  	$id = 	 $_POST['id'];	
  
  	if($is_update)
    {
    	$sql = 'update '.flag.'fencheng set '.arrtoupdate($_data).' where ID = '.$id;
    }
  else
  {
  		$sql = 'insert into '.flag."fencheng (one,two,three,uid) value('".$_data['one']."','".$_data['two']."','".$_data['three']."','".$_data['uid']."')";
    
  	} 
  	//echo $sql;die;
  if(mysql_query($sql)){
            alert_href('比例修改成功!','userfc.php?uid='.$_data['uid']);
        }else{
            alert_back('修改失败!');
        }
  	
}
$result = mysql_query("select * from ".flag."fencheng where uid = {$_GET['uid']}");
  	$row = mysql_fetch_array($result);

					?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>代理分成比例设置设置</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">
	
 <link rel="stylesheet" href="../editor/themes/default/default.css" />
  <script type="text/javascript" src="../js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="../ui/ui.js"></script>
<script type="text/javascript" src="../js/admin.js"></script>
<script charset="utf-8" type="text/javascript" src="../editor/kindeditor.js"></script>


<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>

<body>
	<? include('header.php');?>
		
	<? include('left.php');?><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="admin_index.php"><span class="glyphicon glyphicon-home">管理首页</span></a></li>
				<li class="active">分成比例设置</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
<h1 class="page-header">分成比例设置</h1>			</div>
		</div><!--/.row-->
        
   
	 
			 
		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading"><span class="glyphicon glyphicon-envelope"></span> Sys</div>
					<div class="panel-body">
						<form class="form-horizontal" action="" method="post">
							<fieldset>
							
							                 
                 		
					   
								
								
								
								
							
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">一级</label>
									<div class="col-md-9">
			                <input name="one" type="text" class="form-control"  value="<?php echo $row['one'] ?>" placeholder="请输入一级比例">
		</div>
								</div>
                              <div class="form-group">
									<label class="col-md-3 control-label" for="name">二级</label>
									<div class="col-md-9">
			                <input name="two" type="text" class="form-control"  value="<?php echo $row['two'] ?>" placeholder="请输入二级比例">
		</div>
								</div>
                              <div class="form-group">
									<label class="col-md-3 control-label" for="name">三级</label>
									<div class="col-md-9">
			                <input name="three" type="text" class="form-control"  value="<?php echo $row['three'] ?>" placeholder="请输入三级比例">
		</div>
								</div>
								
								
								
								
							
								
							 
								
								<!-- Form actions -->
								<div class="form-group">
									<div class="col-md-12 widget-right">
															<input name="提交"  type="hidden"  class="btn btn-default btn-md pull-right"  value="提交">
                                      <input name="uid"  type="hidden"  class="btn btn-default btn-md pull-right"  value="<?php echo $_GET['uid'] ?>">
									<input name="is_update"  type="hidden"  class="btn btn-default btn-md pull-right"  value="<?php echo $row?1:0 ?>">
									<input name="id"  type="hidden"  class="btn btn-default btn-md pull-right"  value="<?php echo $row['ID']?>">
										<button type="submit" class="btn btn-default btn-md pull-right">提交</button>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
				</div>
				
		  </div>
			<!--/.col-->
			<!--/.col-->
        </div>
		<!--/.row-->
	</div>	<!--/.main-->
		  

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
		$('#calendar').datepicker({
		});

		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
		        $(this).find('em:first').toggleClass("glyphicon-minus");      
		    }); 
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
</body>

</html>
