<?php

include('../system/inc.php');
include('./admin_config.php');
include('./check.php'); 

$act = $_GET['act'];

if($act == 'fangke')
{
	 $result = mysql_query('select  count(*) AS SL from '.flag.'fangwen');
$row = mysql_fetch_array($result);
{ $num=$row['SL'];} 
    
    $where  = '(1=1) ';
   
    if(isset($_POST['time1']))
    {
    	$where .= ' and fangwen_time >='.strtotime($_POST['time1']); 
    }
    
    if(isset($_POST['time2']))
    {
    	$where .= ' and fangwen_time <='.strtotime($_POST['time2']); 
    }
    
  	$page = $_POST['page'];
  	$limit = $_POST['limit'];
  	$start = ($page-1) * $limit;	
  
  
 	$sql = 'select * from '.flag.'fangwen  where '.$where.'    order by id desc  limit  '.$start.','.$limit;
								$result = mysql_query($sql);
							while($row= mysql_fetch_array($result)){
								
 
							$time_res = date('Y-m-d H:i:s',$row['fangwen_time']);
							$list=$list.'{"id":"'.$row['id'].'","ip":"'.$row['fangwen_ip'].'","time_res":"'.$time_res.'"},';
							}
				$shipinlist=substr($list, 0, -1);			
  
 	die ('{"code":0,"list":['.$shipinlist.'],"total":"'.$num.'"}');
}

