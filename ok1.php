<?php
file_put_contents("./aaaaa.txt",json_encode($_POST));
 /*$json='{"PayJe":"1.00","PayMore":"2019072223012021446","key":"23076824","pay":"3","ddh":"10156380772766304853839640861729","text1":"","text2":"","text3":"","text4":"0","text5":"0","paytime":"2019-07-22 23:02:07","catime":"1563807727","appid":"15628506334556","zhanghao":"2","moneyactual":"1.00","posttype":"3"}';
$_POST=json_decode($json,true);*/
/*echo "<Pre>";
var_dump($_POST);die; */
include('system/inc.php');
//以下代码请不要修改=======================================================================================================================================
//加载fastpay支付插件

/*/if (!function_exists('get_openid')) {
    require $_SERVER['DOCUMENT_ROOT'].'/fastpay/Fast_Cofig.php';
}

$sign=$_POST['sign_notify'];//获取签名2.07以下请使用$sign=$_POST['sign'];
$check_sign=notify_sign($_POST);
if($sign!=$check_sign){
    exit("签名失效");
    //签名计算请查看怎么计算签名,或者下载我们的SDK查看
}*/

$uid         = $_POST['uid'];//支付用户
$total_fee   = $_POST['PayJe'];//支付金额
$pay_title   = $_POST['pay_title'];//标题
$sign        = $_POST['sign'];//签名
$order_no    = $_POST['PayMore'];//订单号
$me_pri      = $_POST['me_pri'];//我们网站生成的金额,参与签名的,跟实际金额有差异


//下面是接收软件返回的信息，然后通过这些信息在对网站的订单等进行处理
$key="83006896";	//改成你的秘钥（登陆网站在会员中心的用户信息页面里）
$pay       =   3; //接收支付方式参数 1 代表支付宝 2 代表QQ钱包 3 代表微信  基本用不到
$ddh	    =	"";  //接收交易号这个是支付宝财付通微信的 官方流水账号   能用到
$Money2		=	floatval($_POST['PayJe']);
$money     =   floatval($_POST['PayJe']);//订单金额  能用到
$dingdan		=	$_POST['PayMore']; //自己网站上订单的订单号  能用到


$bjsnk = 0;

   function userkouliangsl($uid,$zt)
{
	//$zt = 0未扣量  1 已扣量
	$result = mysql_query('select  count(*) as sl  from '.flag.'order where uid = '.$uid.'  and  zt = 1  and kouliang  = '.$zt.' ');
	if (!!($row = mysql_fetch_array($result))) {
		
		if ($row['sl']!='')
		{return $row['sl'];}
		else
		{return 0;}
		 
	} else {
		return 0;
	}
}




 
  function kouliangorder($uid)
{
 
	$result = mysql_query('select  count(*) as sl  from '.flag.'kouliangorder where uid = '.$uid.'   ');
	if (!!($row = mysql_fetch_array($result))) {
		
		if ($row['sl']!='')
		{return $row['sl'];}
		else
		{return 0;}
		 
	} else {
		return 0;
	}
}
 
  
	 
	  $results = mysql_query('select * from '.flag.'order where  dingdanhao="'.$dingdan.'"  ');

$rows = mysql_fetch_array($results);
/*echo "<Pre>";
var_dump($rows);die;*/
{
	//查询是否有扣量条件
		  $checkkl = mysql_query('select * from '.flag.'kouliang where  uid='.$rows['uid'].'  ');
 if ($ckrow = mysql_fetch_array($checkkl))
{$ifkouliang=1;}
	else
{$ifkouliang=0;}
	//用户上级
	  $shangjiid=get_user('shangji',$rows['uid']);
	//上级提成
	  $shangjitc=(get_user('ticheng',$shangjiid)/100);
	  //上级提成金额
	  $shangjiticheng=$money*$shangjitc;
	  	
	
  	//用户扣量条件值
	 $kouliangnum=get_kouliang('num',$rows['uid']); 
  	//用户扣量值
	 $kouliangnums=get_kouliang('nums',$rows['uid']); 
 	 //条件达到这个数开始执行
	 $shijizhi=$kouliangnum-$kouliangnums;
 	//获取未扣量过的订单数量
	$weikouliangnum=userkouliangsl($rows['uid'],0);
	//获取已扣量过的订单数量
	$yikouliangnum=userkouliangsl($rows['uid'],1);
	
	//获取扣量订单表里的数量
	 $kordersl=kouliangorder($rows['uid']);
  
  if ($shangjiid>0)
//  {$shijidashangje=$money-$shangjiticheng;}
  {$shijidashangje=$money;}
  else
  {$shijidashangje=$money;}
  
  
    if  ($kordersl==$kouliangnums)
   { $kouchu=0;
	 $dksql = 'delete from '.flag.'kouliangorder   where uid = '.$rows['uid'].' ';
     mysql_query($dksql);
	 
	 if ($shangjiid>0)
	 {
		
	$_sjrmbdata['uid'] = $shangjiid;
	$_sjrmbdata['type'] = 1;// 0扣除1增加;
	$_sjrmbdata['qje'] = get_user('rmb',$shangjiid);
	$_sjrmbdata['je'] = $shangjiticheng;
	$_sjrmbdata['hje'] = get_user('rmb',$shangjiid)+$shangjiticheng;
	$_sjrmbdata['remark'] = '下级打赏提成|金额:'.$shangjiticheng.'';
 	$_sjrmbdata['date'] =date('Y-m-d H:i:s');
  	$sjrmbstr = arrtoinsert($_sjrmbdata);
	$sjrmbsql = 'insert into '.flag.'rmbjl ('.$sjrmbstr[0].') values ('.$sjrmbstr[1].')';
	 mysql_query($sjrmbsql);
   $sjusersql = 'update '.flag.'user set rmb= rmb+'.$shangjiticheng.'   where ID='.$shangjiid.'  ';
  mysql_query($sjusersql);
   
	 }
	 
	 
	 
	  	$_rmbdata['uid'] = $rows['uid'];
	$_rmbdata['type'] = 1;// 0扣除1增加;
	$_rmbdata['qje'] = get_user('rmb',$rows['uid']);
	$_rmbdata['je'] = $shijidashangje;
	$_rmbdata['hje'] = get_user('rmb',$rows['uid'])+$shijidashangje;
	$_rmbdata['remark'] = '用户打赏|金额:'.$shijidashangje.'|资源ID:'.$rows['vid'].'';
 	$_rmbdata['date'] =date('Y-m-d H:i:s');
  	$rmbstr = arrtoinsert($_rmbdata);
	$rmbsql = 'insert into '.flag.'rmbjl ('.$rmbstr[0].') values ('.$rmbstr[1].')';
	 mysql_query($rmbsql);
   $usersql = 'update '.flag.'user set rmb= rmb+'.$shijidashangje.'   where ID='.$rows['uid'].'  ';
  mysql_query($usersql);
  
  
  
   }	 
   else
   {$kouchu=1;}
   
   //是否需要继续扣掉
   if ($kordersl==0)
   {  $jixukou=0;}  // 不需要继续扣
   else
   {  $jixukou=1; }//需要继续扣}
    
  
 if  ($jixukou==1 && $kouchu==1 && $ifkouliang==1)
 {
 	 	 //继续扣掉这笔订单
	 $kouliang=1;
	 $kouliangsql = 'update '.flag.'order set kouliang=1 where uid = '.$rows['uid'].' ';
     mysql_query($kouliangsql);
	 
	 $klsql = 'update '.flag.'order set kl=1 where dingdanhao = "'.$rows['dingdanhao'].'" ';
     mysql_query($klsql);
	 
  	$_kldata['uid'] =$rows['uid'];
 	$_kldata['dingdanhao'] =$rows['dingdanhao'];
 	$_kldata['laiyuan'] ='继续扣掉';
  	$klstr = arrtoinsert($_kldata);
	$ksql = 'insert into '.flag.'kouliangorder ('.$klstr[0].') values ('.$klstr[1].')';
	 mysql_query($ksql);
	 
	 
}	 
 
  
 
   //满足扣量条件
 	if ($weikouliangnum==$shijizhi && $ifkouliang==1)
	{
	 //扣掉这笔订单
	 $kouliang=1;
	 $kouliangsql = 'update '.flag.'order set kouliang=1 where uid = '.$rows['uid'].' ';
     mysql_query($kouliangsql);
	 
	 $klsql = 'update '.flag.'order set kl=1 where dingdanhao = "'.$rows['dingdanhao'].'" ';
     mysql_query($klsql);
	 
  	$_kldata['uid'] =$rows['uid'];
 	$_kldata['dingdanhao'] =$rows['dingdanhao'];
 	$_kldata['laiyuan'] ='满足条件扣';
  	$klstr = arrtoinsert($_kldata);
	$ksql = 'insert into '.flag.'kouliangorder ('.$klstr[0].') values ('.$klstr[1].')';
	 mysql_query($ksql);
  		 
     }
	else
	{   $kouliang=0;}	 
		
  
	  if ($kouliang==0 && $jixukou==0)  {
		  
		  
		  
		  	 if ($shangjiid>0)
	 {
		
	$_sjrmbdata['uid'] = $shangjiid;
	$_sjrmbdata['type'] = 1;// 0扣除1增加;
	$_sjrmbdata['qje'] = get_user('rmb',$shangjiid);
	$_sjrmbdata['je'] = $shangjiticheng;
	$_sjrmbdata['hje'] = get_user('rmb',$shangjiid)+$shangjiticheng;
	$_sjrmbdata['remark'] = '下级打赏提成|金额:'.$shangjiticheng.'';
 	$_sjrmbdata['date'] =date('Y-m-d H:i:s');
  	$sjrmbstr = arrtoinsert($_sjrmbdata);
	$sjrmbsql = 'insert into '.flag.'rmbjl ('.$sjrmbstr[0].') values ('.$sjrmbstr[1].')';
	 mysql_query($sjrmbsql);
   $sjusersql = 'update '.flag.'user set rmb= rmb+'.$shangjiticheng.'   where ID='.$shangjiid.'  ';
  mysql_query($sjusersql);
   
	 }
	 
	 
	 
 	$_rmbdata['uid'] = $rows['uid'];
	$_rmbdata['type'] = 1;// 0扣除1增加;
	$_rmbdata['qje'] = get_user('rmb',$rows['uid']);
	$_rmbdata['je'] = $shijidashangje;
	$_rmbdata['hje'] = get_user('rmb',$rows['uid'])+$shijidashangje;
	$_rmbdata['remark'] = '用户打赏|金额:'.$shijidashangje.'|资源ID:'.$rows['vid'].'';
 	$_rmbdata['date'] =date('Y-m-d H:i:s');
  	$rmbstr = arrtoinsert($_rmbdata);
	$rmbsql = 'insert into '.flag.'rmbjl ('.$rmbstr[0].') values ('.$rmbstr[1].')';
	 mysql_query($rmbsql);
   $usersql = 'update '.flag.'user set rmb= rmb+'.$shijidashangje.'   where ID='.$rows['uid'].'  ';
  mysql_query($usersql);
	  }
  
}
 
$sql = 'update '.flag.'order set jiaoyihao=  "'.$ddh.'",zt=1,payprice='.$shijidashangje.',pdate="'.date('Y-m-d H:i:s').'"   where dingdanhao="'.$dingdan.'"  ';
  mysql_query($sql);




  
//-----------------------------------------------------------------
if ($bjsnk===0)
{ echo "SUCCESS";//返回成功

}else{
echo 'Key';//返回Key秘钥错误
}
?>