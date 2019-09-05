<?php	require_once(dirname(__FILE__).'/inc/config.inc.php');

    $exec = "DELETE FROM `#@__ewmszb` where fenzuid=99999";
	if($dosql->ExecNoneQuery($exec))
	{
	 echo "<script type=\"text/javascript\">alert(\"OK\");window.opener=null;window.open('','_self');window.close();</script>";
     }else{
     echo "<script type=\"text/javascript\">alert(\"Error\");window.opener=null;window.open('','_self');window.close();</script>";
     }
?>