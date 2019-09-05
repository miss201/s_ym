<?php
require '../../system/incs.php';
//require_once('../system/incs.php');


header('Content-Type: text/html; charset=utf-8');

//加载fastpay支付插件
if (!function_exists('get_openid')) {
require $_SERVER['DOCUMENT_ROOT'].'/fastpay/Fast_Cofig.php';
}


if (get_usershipin('price',$_REQUEST['id'])<0)
{

alert_href('金额不能低于0元','/pay.php?id='.$_REQUEST['id']);
  
}
	
	$sql_select = "select dingdanhao from ".flag."order where dingdanhao = '".$_REQUEST['out_trade_no']."'";
	$result = mysql_query($sql_select);
	$row = mysql_fetch_array($result);
	if(!$row)
    {
    	//订单记录
      $_data1['ip'] =xiaoyewl_ip();
      $_data1['vid'] = $_REQUEST['id'];
      $_data1['uid'] =get_usershipin('uid',$_REQUEST['id']);
      $_data1['dingdanhao'] = $_REQUEST['out_trade_no'];
      $_data1['vprice'] = get_usershipin('price',$_REQUEST['id']);
      $_data1['date'] = date('Y-m-d H:i:s');
      $_data1['zt'] = 0;

      $str1 = arrtoinsert($_data1);
      $sql1 = 'insert into '.flag.'order ('.$str1[0].') values ('.$str1[1].')';
       mysql_query($sql1);
    }
$paydata=array();
$paydata['uid']=get_usershipin('uid',$_REQUEST['id']);//支付用户id
$paydata['order_no']=$_REQUEST['out_trade_no'];//订单号
$paydata['total_fee']=get_usershipin('price',$_REQUEST['id']);//金额
$paydata['param']="";//其他参数
$paydata['me_back_url']="http://".$_SERVER['HTTP_HOST']."/ok.php";//支付成功后跳转
$paydata['notify_url']="http://".$_SERVER['HTTP_HOST']."/ok1.php";//支付成功后异步回调

$geturl=fastpay_order($paydata);//获取支付链接

exit("<meta http-equiv='Refresh' content='0;URL={$geturl}'>");
