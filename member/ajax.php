<?php include('../system/inc.php');include('check.php');
 
switch ($_GET['act'])
{ 
 
case'pwd';
 
if ($_POST['old_password']=='')
{ die ('{"code":-1,"msg":'.json_encode('请输入旧密码').'}');}
if ($_POST['new_password']=='')
{ die ('{"code":-1,"msg":'.json_encode('请输入新密码').'}');}
if ($_POST['re_new_password']=='')
{ die ('{"code":-1,"msg":'.json_encode('请重复新密码').'}');}

if ($_POST['old_password']!=$member_password)
{ die ('{"code":-1,"msg":'.json_encode('旧密码不正确').'}');}

if ($_POST['new_password']!=$_POST['re_new_password'])
{ die ('{"code":-1,"msg":'.json_encode('两次密码不一致').'}');}

if (md5($_POST['old_password'])==$member_password)
{

$sql = 'update '.flag.'user set password=  "'.$_POST['new_password'].'" where id = '.$member_id.'';
	if (mysql_query($sql)) {
	 die ('{"code":0,"msg":'.json_encode('修改成功').'}');

	} else {
		 die ('{"code":-1,"msg":'.json_encode('修改失败').'}');

	}
	
	
	
	}
 
 break;
 
 
 case'myshipin':
 
 if ($_GET['shikan']=='')
 {$shikan=0;}
 else
 {$shikan=1;}
 
 
 if ($_GET['cid']!='')
{$where=' and cid = '.$_GET['cid'].'';}
else
{$where='';}


$result = mysql_query('select  count(*) AS SL from '.flag.'usershipin where uid  ='.$member_id.' and isdel =0  and shikan = '.$shikan.' '.$where.' ');
$row = mysql_fetch_array($result);
{
 $num=$row['SL'];
 
} 



 


								$sql = 'select * from '.flag.'usershipin  where  uid  ='.$member_id.' and isdel = 0   and shikan = '.$shikan.'  '.$where.' order by ID desc , id desc';
  								$pager = page_handle('page',$_POST['limit'],mysql_num_rows(mysql_query($sql)));
								$result = mysql_query($sql.' limit '.$pager[0].','.$pager[1].'');
							while($row= mysql_fetch_array($result)){
							
							
  $dasresult = mysql_query('select  count(*) AS SL from '.flag.'order where uid  ='.$member_id.' and vid = '.$row['ID'].' and  zt =1  and kl = 0  ');
$dsrow = mysql_fetch_array($dasresult);
{
 $dsnum=$dsrow['SL'];
 
} 

if ($row['urlcn']!='' ||  $row['tcn']!='')
{$zt='已发布';}
else
{$zt='未发布';}

							$price = intval($row['max_price'])?$row['price'].'-'.intval($row['max_price']):$row['price'];
							$list=$list.'{"id":"'.$row['ID'].'","fengmian":'.json_encode($row['fengmian']).',"image":'.json_encode('<a  href="#"   onclick="getimage('.$row['ID'].')"   ><img     src="'.$row['image'].'" /></a>').',"title":'.json_encode($row['name']).',"url":'.json_encode($row['url']).',"price":"'.$price.'","zt":'.json_encode($zt).',"pay_count":"'.$dsnum.'","pv":"'.$row['pv'].'","date":"'.$row['date'].'"},';
							}
				$shipinlist=substr($list, 0, -1);			
  
 die ('{"code":0,"list":['.$shipinlist.'],"total":"'.$num.'"}');
 break;
 
 
 
 
 
 case'xiaji':
 


  $result = mysql_query('select  count(*) AS SL from '.flag.'user where shangji  ='.$member_id.' ');
$row = mysql_fetch_array($result);
{
 $num=$row['SL'];
 
} 

 
								$sql = 'select * from   '.flag.'user where shangji = '.$member_id.'  order by id desc   ';
  								$pager = page_handle('page',20,mysql_num_rows(mysql_query($sql)));
								$result = mysql_query($sql.' limit '.$pager[0].','.$pager[1].'');
							while($row= mysql_fetch_array($result)){
							
   $dasresult = mysql_query('select  count(*) AS SL from '.flag.'order where uid  ='.$row['ID'].'  and  zt =1  and kl = 0  ');
$dsrow = mysql_fetch_array($dasresult);
{
 $dsnum=$dsrow['SL'];
 
}
if ($row['ticheng']>0)
{$tc=$row['ticheng'];}
else
{$tc=$site_morenticheng;} 

 $list=$list.'{"id":"'.$row['ID'].'","title":'.json_encode($row['username']).',"dsnnum":"'.$dsnum.'","ticheng":"'.$tc.'%","date":"'.$row['date'].'"},';
							}
				$xiajilist=substr($list, 0, -1);			
  
 die ('{"code":0,"list":['.$xiajilist.'],"total":"'.$num.'"}');
 break;
 
 
 case'fankui':
 


  $result = mysql_query('select  count(*) AS SL from '.flag.'fankui where uid  ='.$member_id.' ');
$row = mysql_fetch_array($result);
{
 $num=$row['SL'];
 
} 

 
								$sql = 'select * from   '.flag.'fankui where uid = '.$member_id.'  order by id desc   ';
  								$pager = page_handle('page',20,mysql_num_rows(mysql_query($sql)));
								$result = mysql_query($sql.' limit '.$pager[0].','.$pager[1].'');
							while($row= mysql_fetch_array($result)){
	 
 $list=$list.'{"id":"'.$row['ID'].'","remark":'.json_encode($row['remark']).',"date":"'.$row['date'].'","huifu":"'.$row['huifu'].'"},';
							}
				$xiajilist=substr($list, 0, -1);			
  
 die ('{"code":0,"list":['.$xiajilist.'],"total":"'.$num.'"}');
 break;
 
 
 
 
  case'myhezi':
 
  $result = mysql_query('select  count(*) AS SL from '.flag.'hezi where uid  ='.$member_id.' ');
$row = mysql_fetch_array($result);
{
 $num=$row['SL'];
 
} 


								$sql = 'select * from '.flag.'hezi  where  uid  ='.$member_id.' order by ID desc , id desc';
  								$pager = page_handle('page',$_POST['limit'],mysql_num_rows(mysql_query($sql)));
								$result = mysql_query($sql.' limit '.$pager[0].','.$pager[1].'');
							while($row= mysql_fetch_array($result)){
								


								  $result1 = mysql_query('select  count(*) AS SL from '.flag.'hezishipin where uid  ='.$member_id.' and hid = '.$row['ID'].' ');
 if ($rows = mysql_fetch_array($result1))
{  $spnum=$rows['SL'];  } 
 else
{  $spnum=0;  } 

							
							$list=$list.'{"id":"'.$row['ID'].'","title":'.json_encode($row['name']).',"spnum":"'.$spnum.'"},';
							}
				$shipinlist=substr($list, 0, -1);			
  
 die ('{"code":0,"list":['.$shipinlist.'],"total":"'.$num.'"}');
 break;
 
 
   case'myhezidtl':
 
  $result = mysql_query('select  count(*) AS SL from '.flag.'hezidtl where uid  ='.$member_id.' ');
$row = mysql_fetch_array($result);
{
 $num=$row['SL'];
 
} 


								$sql = 'select * from '.flag.'hezidtl  where  uid  ='.$member_id.' order by ID desc , id desc';
  								$pager = page_handle('page',$_POST['limit'],mysql_num_rows(mysql_query($sql)));
								$result = mysql_query($sql.' limit '.$pager[0].','.$pager[1].'');
							while($row= mysql_fetch_array($result)){
							
							
 


							$name=get_hezi('name',$row['hid']);
							$url='http://'.$site_domain.'/url/hezi.php?id='.$row['ID'].$tzinfo.$site_ffurl.'';
							$tgurl=get_dwz($site_dwz,$url);
							$list=$list.'{"id":"'.$row['ID'].'","title":'.json_encode($name).',"hid":"'.$row['hid'].'","url":'.json_encode($row['url']).',"urls":'.json_encode($tgurl).'},';
							}
				$shipinlist=substr($list, 0, -1);			
  
 die ('{"code":0,"list":['.$shipinlist.'],"total":"'.$num.'"}');
 break;
 
 
case'shipin':

if ($_GET['cid']!='')
{$where='where cid = '.$_GET['cid'].'';}
else
{$where='';}


 $result = mysql_query('select  count(*) AS SL from '.flag.'shipin '.$where.' ');
$row = mysql_fetch_array($result);
{
 $num=$row['SL'];
 
} 


								$sql = 'select * from '.flag.'shipin  '.$where.' order by sort desc , id desc';
  								$pager = page_handle('page',$_POST['limit'],mysql_num_rows(mysql_query($sql)));
								$result = mysql_query($sql.' limit '.$pager[0].','.$pager[1].'');
							while($row= mysql_fetch_array($result)){
							
							$result1 = mysql_query('select * from '.flag.'usershipin where vid = '.$row['ID'].' and uid ='.$member_id.' and isdel = 0 ');
 							if ($row1 = mysql_fetch_array($result1))
							{ $zts='已发布';}
							else
							{$zts='未发布';}
							
							
							
							
	 $list=$list.'{"id":"'.$row['ID'].'","title":'.json_encode($row['name']).',"image":'.json_encode('<a  href="#"   onclick="getimage('.$row['ID'].')"   ><img     src="'.$row['image'].'" /></a>').',"url":'.json_encode($row['url']).',"zt":'.json_encode($zts).'},';
							}
				$shipinlist=substr($list, 0, -1);			
die ('{"code":0,"list":['.$shipinlist.'],"total":"'.$num.'","msg":"ok"}');
break; 

case'addshipin':
foreach($_POST['id'] as $key=>$a)
{

 $result1 = mysql_query('select  *  from '.flag.'usershipin where vid = '.$a.' and uid = '.$member_id.' and isdel = 0  ');
if (!$row1 = mysql_fetch_array($result1)){


 $result = mysql_query('select  *  from '.flag.'shipin where ID = '.$a.' ');
$row = mysql_fetch_array($result);

	$_data['isdel'] = 0;
	$_data['uid'] = $member_id;
	$_data['cid'] = $row['cid'];
	$_data['vid'] = $row['ID'];
	$_data['name'] = $row['name'];
	$_data['image'] = $row['image'];
	$_data['url'] = $row['url'];
	$_data['price'] = 1;
	$_data['pv'] = 0;
	$_data['date'] =date('Y-m-d H:i:s');
  	$str = arrtoinsert($_data);
	$sql = 'insert into '.flag.'usershipin ('.$str[0].') values ('.$str[1].')';
	/* echo "<pre>";
	var_dump($sql);die; */
	 mysql_query($sql);
	
	
}
}

die ('{"code":0,"msg":"\u6dfb\u52a0\u6210\u529f"}');

break;


  case'editmyhezi':
  
  null_json($_POST['id'],'非法ID');
null_json($_POST['title'],'请输入标题');
 
 
$sql = 'update '.flag.'hezi set name=  "'.$_POST['title'].'"  where  id =  '.$_POST['id'].' and  uid = '.$member_id.'';
	if (mysql_query($sql)) { alert_json('0','修改成功'); } 
	else { alert_json('-1','修改失败');}
	
	 break;
 
 

case'editmyshipin':
null_json($_POST['id'],'非法ID');
null_json($_POST['title'],'请输入标题');
null_json($_POST['price'],'请输入价格');
 $result = mysql_query('select s_dailiprice from '.flag.'system where id = 1');
	$row = mysql_fetch_array($result);
if(strpos($_POST['price'],'-') !== false)
{
	$price = explode('-',$_POST['price']);
  	if(count($price) !== 2)
    {
    	alert_json('-1','修改失败,金额输入异常');exit;
    }
  $min_price = floatval($price[0]);
  	$max_price = floatval($price[1]);
  	
  if($max_price > $row['s_dailiprice']){
  	alert_json('-1','修改失败,最大金额不能超过'.$row['s_dailiprice']);die; 
  }
  	
  	if($max_price <= $min_price)
        {
        	 alert_json('-1','修改失败,金额输入异常');die; 
        }
  
  	
  $sql = 'update '.flag.'usershipin set fengmian=  "'.$_POST['fengmian'].'",name=  "'.$_POST['title'].'",price=  '.$min_price.',max_price='.$max_price.'  where  id =  '.$_POST['id'].' and  uid = '.$member_id.'';
}
else
{
  if($_POST['price'] > $row['s_dailiprice']){
  	alert_json('-1','修改失败,最大金额不能超过'.$row['s_dailiprice']);die; 
  }
	$sql = 'update '.flag.'usershipin set fengmian=  "'.$_POST['fengmian'].'",name=  "'.$_POST['title'].'",price=  '.$_POST['price'].',max_price=0  where  id =  '.$_POST['id'].' and  uid = '.$member_id.'';
}
    
	if (mysql_query($sql)) { alert_json('0','修改成功'); } 
	else { alert_json('-1','修改失败');}
 break;
 case'delmyshipin':
null_json($_POST['id'],'非法ID');
 
 
 foreach($_POST['id'] as $key=>$a)
{

$sql = 'update    '.flag.'usershipin  set isdel = 1    where  id =  '.$a.' and  uid = '.$member_id.'';
	 mysql_query($sql);
	
	
}
  alert_json('0','删除成功'); 
 

 break;
 
  case'delmyhezi':
null_json($_POST['id'],'非法ID');
 
 
 foreach($_POST['id'] as $key=>$a)
{

$sql = 'delete from  '.flag.'hezi    where  id =  '.$a.' and  uid = '.$member_id.'';
	 mysql_query($sql);
	 
	 $hsql = 'delete from  '.flag.'hezishipin    where  hid =  '.$a.' and  uid = '.$member_id.'';
	 mysql_query($hsql);
	 
	 	 $hsqls = 'delete from  '.flag.'hezidtl    where  hid =  '.$a.' and  uid = '.$member_id.'';
	 mysql_query($hsqls);
	
	
}
  alert_json('0','删除成功'); 
 
 break;
 
 
  case'delmyhezidtl':
null_json($_POST['id'],'非法ID');
 
 
 foreach($_POST['id'] as $key=>$a)
{

$sql = 'delete from  '.flag.'hezidtl    where  id =  '.$a.' and  uid = '.$member_id.'';
	 mysql_query($sql);
	
	
}
  alert_json('0','删除成功'); 
 
 break;
 
 case'editprice':
null_json($_POST['price'],'请输入价格');

function randFloat($min, $max){
    return $min + mt_rand()/mt_getrandmax() * ($max-$min);
}
   $result = mysql_query('select s_dailiprice from '.flag.'system where id = 1');
	$row = mysql_fetch_array($result);
    
    
    
    if(strpos($_POST['price'],"-") > 0){
		
		$pricearr = explode('-',$_POST['price']); 
		$minprice = $pricearr[0]; 
		$maxprice = $pricearr[1]; 
      
      	if($maxprice <= $minprice)
        {
        	 alert_json('-1','金额输入有误');die; 
        }
		if($row['s_dailiprice'] < $maxprice)
        {
        	 alert_json('-1','金额输入有误,最大金额不能超过'.$row['s_dailiprice'] );die; 
        }
		//随机金额 randFloat($minprice,$maxprice)

 	$result = mysql_query('select * from '.flag.'usershipin   where    uid = '.$member_id.'     ');
						while($row = mysql_fetch_array($result)){
 		  $sql = 'update  '.flag.'usershipin   set price = '.$minprice.',max_price='.$maxprice.'  where   ID ='.$row['ID'].'';
	 mysql_query($sql);

	 
						}
  alert_json('0','金额设置成功'); 

}

else
    
	{
  if($row['s_dailiprice'] < $_POST['price'])
        {
        	 alert_json('-1','金额输入有误,最大金额不能超过'.$row['s_dailiprice'] );die; 
        }
 $sql = 'update  '.flag.'usershipin   set price = '.$_POST['price'].',max_price=0  where    uid = '.$member_id.'';
	 mysql_query($sql);
 
  alert_json('0','一键修改成功'); 
  
  }

 
 break;
 
 
  case'geturl':
 
 $u=$_GET['u'];
 
  foreach($_POST['id'] as $key=>$a)
{
  $result = mysql_query('select  *  from '.flag.'usershipin where ID = '.$a.' and uid = '.$member_id.' ');
$row = mysql_fetch_array($result);
$url=shipin_url($row['ID']).$tzinfo.$site_ffurl;
$shikanurl=shikan_url($row['ID']).$tzinfo.$site_ffurl;
   
//$dshurl=get_dwz($site_dwz,$url);
if ($_GET['u']=='shikanurl')
  { 
    $zsurl=get_dwz('urlcn',$shikanurl);  $upsql='update '.flag.'usershipin set urlcn="'.$zsurl.'" where  ID = '.$row['ID'].' ';  mysql_query($upsql); }  
 
    
 if ($_GET['u']=='urlcn' )
 {   $zsurl=get_dwz('urlcn',$url);  $upsql='update '.flag.'usershipin set urlcn="'.$zsurl.'" where  ID = '.$row['ID'].' ';  mysql_query($upsql); } 
 
 if ($_GET['u']=='tcn' )
 {$zsurl=get_dwz('tcn',$url);    $upsql='update '.flag.'usershipin set tcn="'.$zsurl.'" where  ID = '.$row['ID'].' ';
  mysql_query($upsql);
  } 
  
$list=$list.'"'.$row['ID'].'":['.json_encode($zsurl).'],';	
	
}
 
$shipinlist=substr($list, 0, -1);			
 
 
die ('{"code":0,"msg":"success","data":{'.$shipinlist.'}}');
 


  break;
  
  
 case'geturlbak':
 
 $u=$_GET['u'];

  foreach($_POST['id'] as $key=>$a)
{
  $result = mysql_query('select  *  from '.flag.'usershipin where ID = '.$a.' and uid = '.$member_id.' ');
$row = mysql_fetch_array($result);
$url=shipin_url($row['ID']).$tzinfo.$site_ffurl;
$dshurl=get_dwz($site_dwz,$url);

$urlcn=get_dwz('urlcn',$url);
$tcn=get_dwz('tcn',$url);

if ($row['urlcn']=='' && $_GET['u']=='urlcn')
{  mysql_query('update '.flag.'usershipin set urlcn=  "'.$urlcn.'" where ID = '.$row['ID'].''); }
if ($row['tcn']=='' && $_GET['u']=='tcn')
{  mysql_query('update '.flag.'usershipin set tcn=  "'.$tcn.'" where ID = '.$row['ID'].''); }

 
 if ($_GET['u']=='urlcn' && $row['urlcn']!='')
 {$zsurl=$row['urlcn'];}
 if ($_GET['u']=='urlcn' && $row['urlcn']=='')
 {$zsurl=$urlcn;
 if ($urlcn=='')
 {alert_json('-1','url短链接服务无响应,请稍后再试...');}
 
 } 
 
 
  if ($_GET['u']=='tcn' && $row['tcn']!='')
 {$zsurl=$row['tcn'];}
 if ($_GET['u']=='tcn' && $row['tcn']=='')
 {$zsurl=$tcn;
  if ($tcn=='')
 {alert_json('-1','tcn短链接服务无响应,请稍后再试...');}
 
 } 
  
$list=$list.'"'.$row['ID'].'":['.json_encode($zsurl).'],';	
	
}
 
$shipinlist=substr($list, 0, -1);			

die ('{"code":0,"msg":"success","data":{'.$shipinlist.'}}');


  break;
  case'getmyurl':
   if ($site_fangfengurl!='')
{$site_ffurl='&'.$site_fangfengurl;}
else
{$site_ffurl='';}
  
    $url='http://'.$site_domain.'/url/user.php?uid='.$member_id.$tzinfo.$site_ffurl.'';
 
  die ('{"code":0,"msg":"success","data":{"url":"'.get_dwz($site_dwz,$url).'"}}');
  
  break;
  
  case'txjl':

 $result = mysql_query('select  count(*) AS SL from '.flag.'tx where uid ='.$member_id.' ');

$row = mysql_fetch_array($result);
{
 $num=$row['SL'];
 
} 


								$sql = 'select * from '.flag.'tx  where uid = '.$member_id.' order by ID desc , id desc';
  								$pager = page_handle('page',$_POST['limit'],mysql_num_rows(mysql_query($sql)));
								$result = mysql_query($sql.' limit '.$pager[0].','.$pager[1].'');
							while($row= mysql_fetch_array($result)){
							
							 if ($row['zt']==0)
						 {$type='<font color="blue">待审核</font>';}

 						 if ($row['zt']==1)
						 {$type='<font color="green">通过</font>';}

 						 if ($row['zt']==2)
						 {$type='<font color="red">拒绝</font>';}
						 
							
							$list=$list.'{"id":"'.$row['ID'].'","rmb":"￥'.$row['rmb'].'","sxf":"￥'.$row['sxf'].'","money":"￥'.($row['rmb']-$row['sxf']).'","shoukuanfs":"'.$row['shoukuanfs'].'","shoukuanxm":"'.$row['shoukuanxm'].'","shoukuanzh":"'.$row['shoukuanzh'].'","date":"'.$row['date'].'","zt":'.json_encode($type).'},';

							}
				$shipinlist=substr($list, 0, -1);			
die ('{"code":0,"list":['.$shipinlist.'],"total":"'.$num.'","msg":"ok"}');
break; 

 case'rmbjl':

 $result = mysql_query('select  count(*) AS SL from '.flag.'rmbjl where uid ='.$member_id.' ');
$row = mysql_fetch_array($result);
{ $num=$row['SL'];} 
 
				 		$sql = 'select * from '.flag.'rmbjl  where uid = '.$member_id.' order by ID desc , id desc';
  								$pager = page_handle('page',$_REQUEST['limit'],mysql_num_rows(mysql_query($sql)));
								$result = mysql_query($sql.' limit '.$pager[0].','.$pager[1].'');
							while($row= mysql_fetch_array($result)){
 							 if ($row['type']==0)
						 {$type='扣除';}

 						 if ($row['type']==1)
						 {$type='增加';}
 
 							$list=$list.'{"id":"'.$row['ID'].'","qje":"￥'.$row['qje'].'","je":"￥'.$row['je'].'","hje":"￥'.$row['hje'].'","date":"'.$row['date'].'","remark":'.json_encode($row['remark']).',"type":'.json_encode($type).'},';
							}
				$shipinlist=substr($list, 0, -1);			
die ('{"code":0,"list":['.$shipinlist.'],"total":"'.$num.'","msg":"ok"}');
break; 
 
 case'addhezi':
 null_json($_POST['price'],'请输入盒子标题');
 
 	$_data['uid'] = $member_id;
	$_data['name'] = $_POST['price'];
 
  	$str = arrtoinsert($_data);
	$sql = 'insert into '.flag.'hezi ('.$str[0].') values ('.$str[1].')';
	 if (mysql_query($sql))
	 {alert_json('0','添加成功');}
else


	 {alert_json('-1','添加盒子失败');}
	
	
 break;
 
   case'addhezishipin':
null_json($_POST['hid'],'请选择盒子ID');
 
 
 foreach($_POST['id'] as $key=>$a)
{

	$_data['uid'] = $member_id;
	$_data['hid'] = $_POST['hid'];
	$_data['vid'] = $a;
	$_data['date'] = date('Y-m-d H:i:s');
 
  	$str = arrtoinsert($_data);
	$sql = 'insert into '.flag.'hezishipin ('.$str[0].') values ('.$str[1].')';
	 mysql_query($sql);
	 
	
	
}
  alert_json('0','导入成功'); 
 
 break;
 

 case'myorder':
 
  $result = mysql_query('select  count(*) AS SL from '.flag.'order where uid  ='.$member_id.' and zt = 1 and kl = 0  ');
$row = mysql_fetch_array($result);
{
 $num=$row['SL'];
 
} 


								$sql = 'select * from '.flag.'order  where  uid  ='.$member_id.' and zt = 1 and kl = 0  order by ID desc , id desc';
  								$pager = page_handle('page',$_POST['limit'],mysql_num_rows(mysql_query($sql)));
								$result = mysql_query($sql.' limit '.$pager[0].','.$pager[1].'');
							while($row= mysql_fetch_array($result)){
								
 
							
							$list=$list.'{"id":"'.$row['ID'].'","res_id":"'.$row['vid'].'","trade_no":"'.$row['dingdanhao'].'","fee":"'.$row['payprice'].'","create_time":"'.$row['pdate'].'"},';
							}
				$shipinlist=substr($list, 0, -1);			
  
 die ('{"code":0,"list":['.$shipinlist.'],"total":"'.$num.'"}');
 break;
  case 'update_tpl':
    null_back($_POST['template'],'请选择风格');

	$t = $_POST['template'];
   
  	$result = mysql_query("select id from ".flag."tpl where uid = {$member_id}");
  	if(mysql_fetch_array($result))
    {
    	mysql_query("update ".flag."tpl set tpl_id = '{$t}' where uid = {$member_id}");
    }
  	else
    {
    	mysql_query("INSERT INTO ".flag."tpl VALUES(null,'{$t}',{$member_id})");
    }
	alert_href('系统设置修改成功!','dashangye.php');
    

 break;
 }
 

 
  ?>
