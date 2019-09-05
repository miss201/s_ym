<?php require_once(dirname(__FILE__).'/inc/config.inc.php');

if($pid==2){
    $result = $dosql->ExecNoneQuery("DELETE FROM `#@__ewmddh`");
}else{
    $result = $dosql->ExecNoneQuery("DELETE FROM `#@__ewmddh` where dingdanok=0");
}
    if($result)
     {
	 $response['status'] = "y";
     }else{
     $response['status'] = "n";
     }
echo json_encode($response);
?>