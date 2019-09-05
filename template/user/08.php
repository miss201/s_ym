<?php


$result = mysql_query(' select count(*) as sl from '.flag.'usershipin where uid = '.$_REQUEST['uid'].' and isdel=0  ');
while($row = mysql_fetch_array($result)){
    if ($row['sl']!='')
    {$totalpage=$row['sl']/20;}
    else
    {$totalpage=1;}
}
?>
<!DOCTYPE html>
<!-- saved from url=(0060)http://gvyzbt73866.cn/url/group/?u=128&openid=112.96.170.135 -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="format-detection" content="telephone=no">
<title>她的视频.</title>
     <link href="/template/user/02/public/video_css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="/template/user/02/public/video_css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
        <link href="/template/user/02/public/video_css/bootstrap-admin-theme.css" rel="stylesheet" media="screen">
<style>
body{ padding:0; margin:0; font-family: "微软雅黑", "宋体";background:white;}
ul,li,input,span{ padding:0; margin:0; list-style-type:none;}
.clear{ clear:both;}
input[type=button], input[type=submit], input[type=file], button { cursor: pointer; -webkit-appearance: none;}

.header{ height:70px; position:relative;width:100%;}
.head{ height:70px; background:#f4f4f4; border-bottom:1px solid #eeeeee; position:fixed; width:100%;}
.logo{ padding-left:20px; padding-top:15px;}
.h30{ height:30px;}
.h30a{ height:30px;}
.h10{ height:10px;}
.h10a{ height:10px;}
.mass{ width:100%; margin:0 auto; }

.h_h50{ height:50px;}
.h_h20{ height:20px;}

.login_h1{ line-height:30px; height:30px; font-weight:bold; text-align:center; font-family:"微软雅黑", "宋体";color:#333;}
.login_h1 font{ font-size:12px; color:#FFF;}
 .login_txt{line-height:20px;color:red; font-size:12px; background:#FC6; border-bottom:1px dashed #CCC;font-family:"微软雅黑", "宋体"; padding-left:5px;padding-top:5px; padding-bottom:5px;}

.login_coty{ margin:0 auto; width:96%; text-align:left; line-height:20px; font-size:12px; color:#999; margin-top:30px; }
.login_coty li{ float:left; width:100%; }

.img_a{ float:left; width:150px; height:100px; overflow:hidden; margin-bottom:20px;}
.img_b{ margin-left:90px;  margin-bottom:20px; display: -webkit-flex; display: flex; flex-direction: column; justify-content: space-between; -webkit-justify-content: space-between; height:100px; }
.img_b_a{ line-height:10px; font-size:12px; overflow: hidden;}
.z1 {color:#666;}
.z1 a{ color: #ffa500; text-decoration:none;line-height:15px;}
.z1 a:hover{ color:#F00; text-decoration:underline;}
.z2 {color:#F0F;}
.z2 a{ color:#F0F; text-decoration:none;line-height:30px;}
.z2 a:hover{ color:#F00; text-decoration:underline;}
.z3 {color:#3F0;}
.z3 a{ color:#3F0; text-decoration:none;line-height:30px;}
.z3 a:hover{ color:#F00; text-decoration:underline;}
.z4 {color:#0FF;}
.z4 a{ color:#0FF; text-decoration:none;line-height:30px;}
.z4 a:hover{ color:#F00; text-decoration:underline;}
.img_b_b{ padding-top:5px; font-size:12px; display: flex; display: -webkit-flex; -webkit-justify-content: space-between; justify-content: space-between; align-items:flex-end; }
.img_b_b a{ color:#FF0; text-decoration:none;}
.img_b_b a:hover{ color:#F00; text-decoration:underline;}


.hc{ margin:0 auto; width:120px; height:120px; border-radius:60px 60px; text-align:center; color:#FFF; background:#f96160; font-size:50px; line-height:120px; font-family: Georgia, Times, serif;}
.hc{ margin:0 auto; width:120px; height:120px; border-radius:60px 60px; text-align:center; color:#FFF; background:#f96160; font-size:50px; line-height:120px; font-family: Georgia, Times, serif;}
.foot{ background:#302f34; height:40px; line-height:38px; text-align: center; width:100%; position: absolute; bottom:0px;color:#CCC;}
.foot img{ position:relative;top:3px; padding-right:5px;}
.foot a{color:#CCC; text-decoration:none;}
.foot a:hover{color:#CCC; text-decoration:none;}

.index_pages{ line-height:40px; text-align:center; }
.index_pages a{ color:#FFF; text-decoration:none; background:#999;border-radius:4px; font-size:12px; padding:5px 5px; margin:5px 5px;}
.index_pages a:hover{ color:#FFF; text-decoration:none;}


@media screen and (max-width:900px) {
.login_coty{ width:96%;}
.mass{ width:96%;}
.reg{ display:none;}
.login{ float: none; width:96%;}
.login_account{ display:block;}
.login_bd2{display:block;}
.h_navn_l{ display: none;}
.h_navn_r{ margin-left:0px;}
.h30a{ display:none;}
.h_menu_nav{ display:block;}
.foot{width:100%;}
}
a {
  text-decoration:none;
}
  .weui-btn
  {
  	margin:10px;
    background-color:green;
    color:white;
    padding:15px auto;
    text-align:center;
    border-radius:5px;
    height:40px;
    line-height:40px;
  }
</style>
</head>
<body>
<div class="mass">
     <script type="text/javascript" src="/template/user/05/jquery.min.js"></script>
     
     <div id="float_div_parent" style="display: flex; flex-direction: column; position: absolute; left: 0; right:0; top: 0; width: 100%; margin: auto;">

     <div id="float_div" style="background-color:black;width: 100%; text-align: center; height: 30px; position: relative; color: rgb(255, 255, 255); font-size: 16px; padding: 5px 10px; transition: all 0.5s ease 0s; top: 0px;"> 
       <span style="float:right;color:yellow;"><a href="/tousu.php?userid=10&sid=1639" style="color:yellow;">投诉</a></span>
       </div>
  </div>
     <script>
     var float_div = document.getElementById("float_div");
     </script>
     <div class="login_h1">
     <br>

     </div>
  <?
          $where = '';
          if(isset($_GET['cid']) && $_GET['cid'])
          {
              $where .= ' and cid = '.$_GET['cid'];
          }

          $sql = 'select * from '.flag.'usershipin where uid = '.$_REQUEST['uid'].'    and isdel=0 '.$where.' order by rand() ';

          $pager = page_handle('page',20,mysql_num_rows(mysql_query($sql)));
          $result = mysql_query($sql.' limit '.$pager[0].','.$pager[1].'');
  		 $index=0;
          while($row= mysql_fetch_array($result)){
            
            
              $url='http://'.$site_domains.'/';

              if ($row['fengmian']!='')
              {$image=$row['fengmian'];}
              else
              {$image=$row['image'];}

              ?>
              <? if ($site_suiji==1) {$dashangsls=rand(1000,9999);} else {$dashangsls=get_ordersl($row['ID']);} ?>
			 	
  			 <? if($index==0){ ?>
              <div id="a1" style="margin: auto; background-color: rgb(0, 0, 0); width: 307px; height: 200px; cursor: pointer;">
                 <video controls="controls" src="<?=$image?>" id="ckplayer_a1" width="100%" height="200" loop="loop" poster="<?=$image?>" webkit-playsinline=""></video>
              </div>
  			 <div class="weui-btn weui-btn_primary" onclick="location.href='http://<?=$site_luodiurl?>/shipin.php?id=<?=$row['ID']?>'">微信支付看完整视频</div>
			 <? } ?>
         	<?php $index=$index+1;?>

          <? }?>
     
 
     
<div class="login_coty">
      <ul style="width: 100%; display: -webkit-flex; -webkit-flex-wrap: wrap; display: flex; flex-wrap: wrap;">


          <?
          $where = '';
          if(isset($_GET['cid']) && $_GET['cid'])
          {
              $where .= ' and cid = '.$_GET['cid'];
          }

          $sql = 'select * from '.flag.'usershipin where uid = '.$_REQUEST['uid'].'    and isdel=0 '.$where.' order by rand() ';

          $pager = page_handle('page',20,mysql_num_rows(mysql_query($sql)));
          $result = mysql_query($sql.' limit '.$pager[0].','.$pager[1].'');
          while($row= mysql_fetch_array($result)){
              $url='http://'.$site_domains.'/';

              if ($row['fengmian']!='')
              {$image=$row['fengmian'];}
              else
              {$image=$row['image'];}

              ?>
              <? if ($site_suiji==1) {$dashangsls=rand(1000,9999);} else {$dashangsls=get_ordersl($row['ID']);} ?>


              <li style="display: -webkit-flex; display:flex; -webkit-flex-direction: column; flex-direction: column; width: 50%; margin-bottom: 10px; height: 120px;overflow:hidden;">
                
                      <div class="video_img" style="padding-right: 10px;">
                          <a href="http://<?=$site_luodiurl?>/shipin.php?id=<?=$row['ID']?>">
                              <div style="position: relative; width: 100%; height: 100%;">
                                  <img style="position: absolute; width: 25%; top: 30%; left: 37%;" src="/template/user/05/播放.png">
                                <div style="display:inline-block;padding:0 5px;color:white;background-color:purple;position:absolute;right:5px;top:5px;font-size:12px;">高清</div>
                                  <img src="<?=$image?>" width="100%" height="100" >
                              </div>
                          </a>
                      </div>
                      <div class="video_title" style="width: 90%; text-align: center; font-size: 16px;">
                          <a style="display: inline-block; color: #ffa500; font-size: 12px;" href="http://<?=$site_luodiurl?>/shipin.php?id=<?=$row['ID']?>"><?=$row['name']?></a>
                      </div>
                  
              </li>

          <? }?>

  </ul>
 <div class="clear"></div>



    </div>
    <p id="ppp" style="color: red;"></p>
    <div class="bootstrap-table">
        <div class="fixed-table-pagination">
            <div class="pull-center pagination" style="text-align: center;width: 100%;">


                <div class="dataTables_paginate paging_simple_numbers">
                    <ul class="pagination">

                        <?php echo xiaoyewl_pape($pager[2],$pager[3],$pager[4],2);?>


                    </ul>
                </div>



            </div>
        </div>
    </div>
    <?

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
            $page_home = '<li><a href="'.$page_link.$page_parameter.'=1" title="首页">1...</a></li>';
        }
        if ($page_current == 1) {
            $page_back = '<li class="disabled"><a  title="上一页">上一页</a></li>';
        } else {
            $page_back = '<li><a href="'.$page_link.$page_parameter.'='.($page_current - 1).'" title="上一页">上一页</a></li>';
        }
        for ($i = $page_start; $i <= $page_end; $i++) {
            if ($i == $page_current) {
                $page_list = $page_list.'<li class="active"><span>'.$i.'</span></li>';
            } else {
                $page_list = $page_list.'<li><a href="'.$page_link.$page_parameter.'='.$i.'" title="第'.$i.'页">'.$i.'</a></LI>';
            }
        }
        if ($page_current < $page_sum - $page_len) {
            $page_last = '<li><a href="'.$page_link.$page_parameter.'='.$page_sum.'" title="尾页">...'.$page_sum.'</a></li>';
        }
        if ($page_current == $page_sum) {
            $page_next = '<li  class="disabled"><a   title="下一页">下一页</a></li>';
        } else {
            $page_next = '<li><a href="'.$page_link.$page_parameter.'='.($page_current + 1).'" title="下一页">下一页</a></li>';
        }
        $tmp = $tmp.$page_back.$page_home.$page_list.$page_last.$page_next.'';
        return $tmp;
    }


    ?>

</div>

</body></html>
