<? include('../system/inc.php'); ?>
<? include('check.php'); ?>
 <? $nav='my';
 if ($_GET['act']=='del')
 {
	  $a=$_GET['id'];
	$sql = 'delete from  '.flag.'hezi    where  id =  '.$a.' and  uid = '.$member_id.'';
	 mysql_query($sql);
	 
	 $hsql = 'delete from  '.flag.'hezishipin    where  hid =  '.$a.' and  uid = '.$member_id.'';
	 mysql_query($hsql);
	 
	 	 $hsqls = 'delete from  '.flag.'hezidtl    where  hid =  '.$a.' and  uid = '.$member_id.'';
	 mysql_query($hsqls);
	  alert_href('删除成功','?'); 

	 
 }
 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="format-detection" content="telephone=no">
        <title>盒子管理-<?=$site_name?></title>
         <link href="agency/css/style.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="/acms/css/bootstrap.css"/>
        <script type="text/javascript" src="agency/js/jquery-1.11.2.min.js"></script>
        <script type="text/javascript" src="agency/js/lyz.delayLoading.min.js"></script>
        <script type="text/javascript" src="agency/js/lyz_load.js"></script>
        <script type="text/javascript" src="agency/js/public.js"></script>
        <script type="text/javascript" src="agency/js/winset.js"></script>
    </head>

    <style>
        dt{
            text-align: center;
        }
    </style>
    <body class="webbg">
        <section id="container">
         <div class="h_usertitle_box">
      <div class="h_home_box">
               <div class="h_ewwmurl_con">
                    <i class="btn2"><a href="heziadd.php">新增盒子</a></i>
                </div>
</div>

                 

            <!--mid0-->
             <div class="h_invitedagent1">
                    <dl>
                        <dt><span>ID</span></dt>
                        <dt><span>标题</span></dt>
                        <dt><span>视频数</span></dt>
                        <dt><span>操作</span></dt>
                      </dl>
            </div>
            <div class="h_invitedagent_box">
            <?
								$sql = 'select * from '.flag.'hezi  where  uid  ='.$member_id.' order by ID desc , id desc';
  								$pager = page_handle('page',20,mysql_num_rows(mysql_query($sql)));
								$result = mysql_query($sql.' limit '.$pager[0].','.$pager[1].'');
							while($row= mysql_fetch_array($result)){
							
							 $result1 = mysql_query('select  count(*) AS SL from '.flag.'hezishipin where uid  ='.$member_id.' and hid = '.$row['ID'].' ');
 if ($rows = mysql_fetch_array($result1))
{  $spnum=$rows['SL'];  } 
 else
{  $spnum=0;  } 

							
							$list=$list.'{"id":"'.$row['ID'].'","title":'.json_encode($row['name']).',"spnum":"'.$spnum.'"},';
 
 							 
 									
									?>
            <dl>
                        <dt><span><?=$row['ID']?></span></dt> 
                        <dt><span><?=$row['name']?></span></dt> 
                        <dt><span><?=$spnum?></span></dt> 
                        <dt><span> <a   href="heziedit.php?id=<?=$row['ID']?>">修改</a> <a   href="?act=del&id=<?=$row['ID']?>">删除</a></span></dt> 
                       </dl>
<? }?>


                            </div>

 <div class="dataTables_paginate paging_simple_numbers">
            <div class="page_box">
             <?php echo xiaoyewl_pape($pager[2],$pager[3],$pager[4],2);?> 
 
            
            </div></div>   
                        <div class="f_padheght"></div>
            <!--mid1-->
            <!--bottom0-->
 
                <? include('footer.php'); ?>


 
 
            <!---------------bottom1------------>
        </section>
    </body>

 </html>
             
<?PHP

//返回翻页条
//参数说明：1.总页数。2.当前页。3.分页参数。4.分页半径。
function xiaoyewl_pape($t0, $t1, $t2, $t3) {
	$page_sum = $t0;
	$page_current = $t1;
	$page_parameter = $t2;
	$page_len = $t3;
	$page_start = '';
	$page_end = '';
	$page_start = $page_current - $page_len;
	if ($page_start <= 0) {
		$page_start = 1;
		$page_end = $page_start + $page_end;
	}
	$page_end = $page_current + $page_len;
	if ($page_end > $page_sum) {
		$page_end = $page_sum;
	}
	$page_link = $_SERVER['REQUEST_URI'];
	$tmp_arr = parse_url($page_link);
	if (isset($tmp_arr['query'])){
		$url = $tmp_arr['path'];
		$query = $tmp_arr['query'];
		parse_str($query, $arr);
		unset($arr[$page_parameter]);
		if (count($arr) != 0){
			$page_link = $url.'?'.http_build_query($arr).'&';
		}else{
			$page_link = $url.'?';
		}
	}else{
		$page_link = $page_link.'?';
	}
	$page_back = '';
	$page_home = '';
	$page_list = '';
	$page_last = '';
	$page_next = '';
	$tmp = '';
	if ($page_current > $page_len + 1) {
		$page_home = '<a href="'.$page_link.$page_parameter.'=1" title="首页">1...</a>';
	}
	if ($page_current == 1) {
		$page_back = '<i title="上一页">上一页</i>';
	} else {
		$page_back = '<a href="'.$page_link.$page_parameter.'='.($page_current - 1).'" title="上一页">上一页</a>';
	}
	for ($i = $page_start; $i <= $page_end; $i++) {
		if ($i == $page_current) {
			$page_list = $page_list.'<i class="current">'.$i.'</i>';
		} else {
			$page_list = $page_list.'<a href="'.$page_link.$page_parameter.'='.$i.'" title="第'.$i.'页">'.$i.'</a>';
		}
	}
	if ($page_current < $page_sum - $page_len) {
		$page_last = '<a href="'.$page_link.$page_parameter.'='.$page_sum.'" title="尾页">...'.$page_sum.'</a>';
	}
	if ($page_current == $page_sum) {
		$page_next = '<i >下一页</i>';
	} else {
		$page_next = '<a href="'.$page_link.$page_parameter.'='.($page_current + 1).'" title="下一页">下一页</a>';
	}
	$tmp = $tmp.$page_back.$page_home.$page_list.$page_last.$page_next.'';
	return $tmp;
}?>
 
 