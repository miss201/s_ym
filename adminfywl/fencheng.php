<?php

include('../system/inc.php');
include('./admin_config.php');
include('./check.php');

if (isset($_POST['提交'])){
 	$_data['one'] = $_POST['one']?:0;
	$_data['two'] = $_POST['two']?:0;
   	$_data['three'] = $_POST['three']?:0;
  
  	$result = mysql_query("select * from ".flag."fencheng");
  	$row = mysql_fetch_array($result);

  	if(!$row)
    {  	  var_dump("select * from ".flag."fencheng");
      	$str = arrtoinsert($_data);
    	$sql = 'insert into '.flag.'fencheng ('.$str[0].') values ('.$str[1].')';
        if (mysql_query($sql)) {

          alert_href('代理分成设置成功!','fencheng.php');
      } else {
          alert_back('添加失败!');
      }
    }
  else
  {
    mysql_query("update ".flag."fencheng set one='".$_data['one']."',two='".$_data['two']."',three='".$_data['three']."'");
  	 alert_href('代理分成设置成功!','fencheng.php');
  }
  	
	
}

	$result = mysql_query("select * from ".flag."fencheng");	
	$row = mysql_fetch_array($result);
	$one = $row['one'];
	$two = $row['two'];
	$three = $row['three'];
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>系统设置</title>

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
				<li class="active">代理分成</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
<h1 class="page-header">代理分成</h1>			</div>
		</div><!--/.row-->
        
   
	 
			 
		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading"><span class="glyphicon glyphicon-envelope"></span> fencheng</div>
					<div class="panel-body">
						<form class="form-horizontal" action="" method="post">
							<fieldset>
				
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">一级分成 </label>
									<div class="col-md-4">
                                      <div class='input-group'>
                                      	<input type='text' name='one' placeholder="一级分成" class="form-control" value="<?php echo $one ?>">
                                      <div class="input-group-addon">%</div>
                                        </div>
    								</div>
								</div>
                              
                              <div class="form-group">
									<label class="col-md-3 control-label" for="name">二级分成 </label>
									<div class="col-md-4">
                                      <div class='input-group'>
                                      	<input type='text' name='two' placeholder="二级分成" class="form-control" value="<?php echo $two ?>">
                                      <div class="input-group-addon">%</div>
                                        </div>
    								</div>
								</div>
                              
                              <div class="form-group">
									<label class="col-md-3 control-label" for="name">三级分成 </label>
									<div class="col-md-4">
                                      <div class='input-group'>
                                      	<input type='text' name='three' placeholder="三级分成" class="form-control" value="<?php echo $three ?>">
                                      <div class="input-group-addon">%</div>
                                        </div>
    								</div>
								</div>
								
							 
								
								<!-- Form actions -->
								<div class="form-group">
									<div class="col-md-12 widget-right">
															<input name="提交"  type="hidden"  class="btn btn-default btn-md pull-right"  value="提交">

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
	
	</script>	
</body>

</html>
