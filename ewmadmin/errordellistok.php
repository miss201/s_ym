<?php require_once(dirname(__FILE__).'/inc/config.inc.php');

    $result = $dosql->ExecNoneQuery("DELETE FROM `#@__errorddh`");
    if($result)
     {
	 $response['status'] = "y";
     }else{
     $response['status'] = "n";
     }
echo json_encode($response);
?>