<? include('system/inc.php'); 
	$ip = $_SERVER['REMOTE_ADDR'];
	$time = time();
	//echo "insert into ".flag."fangwen values(null,'{$ip}','".$_GET['uid']."','{$time}')";die;
	mysql_query("insert into ".flag."fangwen values(null,'{$ip}','".$_GET['uid']."','{$time}')");



	$result = mysql_query("select * from ".flag."tpl where uid = {$_GET['uid']}");

  	$row = mysql_fetch_array($result);

	$t_id = $row['tpl_id']?:'01';

	$tpl = 'template/user/'.$t_id.'.php';
	//var_dump($row);die;
	if(file_exists($tpl))
    {
    	include($tpl); 
    }
	else
    {
      include('template/user/01.php'); 
    }

  
?>