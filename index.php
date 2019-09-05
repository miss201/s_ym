<? 

if(empty($_GET['s']) || $_GET['s'] != '/wei')
{
	header('location:https://www.baidu.com');
}
//var_dump($_GET['s']);die;
include('system/inc.php'); 
 
 $file = 'install/index.php'; 
if (is_readable($file) == false) { 
  //alert_url('wei.php');
  header('location:/wei.php');
  } else { 
alert_url ('/install/'); 
} 


 ?>
 