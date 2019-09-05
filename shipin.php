<? include('system/inc.php'); 
  include('checkpc.php');
include('jssdk.php');
 if ($_GET['pay']=='')
 {$url='pay';}
 else
 {$url='zf';} 
 
 if ($_GET['ly']==1)
 {$url='pays';}

 if ( check_order($_GET['id'],xiaoyewl_ip()) == '0') 

 { 
  alert_url('/'.$url.'.php?id='.$_GET['id'].'');
 
 }
	 $jssdk = new Jssdk();
	  $info = $jssdk->getInfo();
   mysql_query('update '.flag.'usershipin set pv=pv+1 where ID = '.$_GET['id'].'');
 ?>
 <!DOCTYPE html>
<html>
<head>
<title>-</title>
	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0">
	<link href="/static/index/css/style.css?v=0.1" rel="stylesheet">
	<link href="/static/index/weui.min.css" rel="stylesheet">
	<link href="/static/admin/css/style.min.css?v=0.1" rel="stylesheet">



 
<style type="text/css">
  	.laypage_main a,.laypage_main input,.laypage_main span{height:26px;line-height:26px}.laypage_main button,.laypage_main input,.laypageskin_default a{border:1px solid #ccc;background-color:#fff}.laypage_main{font-size:0;clear:both;color:#666}.laypage_main *{display:inline-block;vertical-align:top;font-size:12px}.laypage_main a{text-decoration:none;color:#666}.laypage_main a,.laypage_main span{margin:0 3px 6px;padding:0 10px}.laypage_main input{width:40px;margin:0 5px;padding:0 5px}.laypage_main button{height:28px;line-height:28px;margin-left:5px;padding:0 10px;color:#666}.laypageskin_default span{height:28px;line-height:28px;color:#999}.laypageskin_default .laypage_curr{font-weight:700;color:#666}.laypageskin_molv a,.laypageskin_molv span{padding:0 12px;border-radius:2px}.laypageskin_molv a{background-color:#f1eff0}.laypageskin_molv .laypage_curr{background-color:#00AA91;color:#fff}.laypageskin_molv input{height:24px;line-height:24px}.laypageskin_molv button{height:26px;line-height:26px}.laypageskin_yahei{color:#333}.laypageskin_yahei a,.laypageskin_yahei span{padding:0 13px;border-radius:2px;color:#333}.laypageskin_yahei .laypage_curr{background-color:#333;color:#fff}.laypageskin_flow{text-align:center}.laypageskin_flow .page_nomore{color:#999}
	
  .btn1{ margin:12px 0 0 0; width:100%; height:42px; text-align:center; font-size:16px; font-style:normal; border-radius:5px; float:left; display:inline; overflow:hidden; }
  .btn1 a{ width:100%; line-height:42px; color:#fff; background: #009933; display:block; }
  .btn1 a:hover{ color:#fff; display:block; }
 
		#navsecond{position: absolute;bottom:0;display: none;}
  .video-content
  {
  	font-size:0;
    margin-top:50px;
  }
  .video-item 
  {
    display:inline-block;
    width:50%;
    vertical-align:top;
    
  	border:1px solid #f8f8f8;
    box-sizing:border-box;
  }
  .video-item .img
  {
  	width:100%;
    height:100px;
 
  }
  .video-item .img img
  {
  	height:100%;
    width:100%;
  }
  .video-item .title
  {
  	height:50px;
    line-height:50px;
    white-space:nowrap;
        text-overflow: ellipsis;
    overflow:hidden;
  }
	</style>
	</head>
	<body style="max-width:460px; margin:0 auto;">
	 <div style="height: 42px; width: 100%; background-color: #000;float: left;display: block;opacity: 0.8; line-height: 42px;font-size: 22px;text-align: center;color: #FFF;margin-bottom: 8px; display:none">视频播放</div>
	<div style="padding: 0px 8px 8px; ">
	 <div class="rich_media_content"  id="video" style="width: 100%; height: 250px;border: solid 1px #323136;padding-left:1px;"></div>

  
  
	
	<div id="">
	<div style="padding-top:10px;font-size:16px;">


</h2></div>

<div align="center">
   <i class="btn1"><a   href="/user.php?uid=<?=get_usershipin('uid',$_GET['id'])?>">查看更多视频</a></i>
               
				</div>
				
 <div  style="height:7PX"></div>

     <div  style="height:7PX"></div>
    <hr>
      <?php if($site_ad_open == 0)
                        { ?>
      <section>
        <h3>推荐视频</h3>
        <div class="video-content">
          <!--在这里开始遍历-->
          <?php  
  $id = $_GET['id'];
          		$result = mysql_query('select * from '.flag.'usershipin  where  uid  ='.get_usershipin('uid',$_GET['id']).' and isdel = 0   order by rand() limit 4');
                     
          		while($row= mysql_fetch_array($result)){
          ?>
          <div class="video-item" onclick='location.href = "/pay.php?id=<?php echo $row['ID'] ?>"'>
            <div class="img">
            	<img src="<?php echo  $row['image'] ?>">
            </div>
            <div class="title"><?php echo  $row['name'] ?></div>
          </div>
          <?php } ?>
          <!--在这里开始遍历 end-->
        </div>
      </section>  
      <?php } ?>
	<section id="container">
	<div class="h_playlist_box" id="article_list"> 
	  
	
	
	   <?php                                                                                
                   		if($site_ad_open == 1)
                        {
                        	$result = mysql_query('select * from '.flag.'ad  order by ID asc');
                          while($row = mysql_fetch_array($result)){
						?>
                           <div style="height:10PX"></div>
                         <a href="<?=$row['a_url']?>"    title="<?=$row['a_name']?>" target="_blank"> <img src="<?=$row['a_pic']?>"     width="100%" >  </a>  
                         <?   } 
                        }
      
      ?>
      
   
 
 
 	 
	 	   </div>
	 </section>
	 
	 
 
	
	</div>
	
	
	 <style>
	
	#container{overflow:inherit;}
	
	.h_playlist_box{margin: 0;width: 103%;}
	
	.h_playlist_box dl{padding: 6px 6px;width: 44%;float:left;height:11rem;margin-right: 1%;}
	
	.h_playlist_box dl dd{width: 100%;margin: 0;padding:0 1%;float: left;}
	
	.h_playlist_box dl dt{margin:0;position: relative;}
	
	.h_playlist_box dl dd span{font-size:13px;
	
			overflow: hidden;

	
			text-overflow: ellipsis;
	
			display: -webkit-box;
	
			-webkit-line-clamp: 3;
	
			-webkit-box-orient: vertical;
	
			margin-top:5px;
	
			}
	</style>
      
      <script src="http://res.wx.qq.com/open/js/jweixin-1.4.0.js"> </script>
<script type="text/javascript" src="../ckplayer/ckplayer.js" charset="UTF-8"></script>
<script type="text/javascript" src="../list/jquery.js"></script>
    
 <script type="text/javascript">
  
  
   wx.config({
        debug: false, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
        appId: '<?php echo $info["appId"];?>',
        timestamp: <?php echo $info["timestamp"];?>,
    	nonceStr: '<?php echo $info["nonceStr"];?>',
        signature: '<?php echo $info["signature"];?>',
        jsApiList: [
        'hideOptionMenu',////界面操作接口4
    ] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
    });

    wx.ready(function(){
        wx.hideOptionMenu();
    })
var videoObject = {
container: '#video',
variable: 'player', 
//html5m3u8:true,
loop: true,
autoplay: true, 
poster: '', 
video:'<?=get_usershipin('url',$_GET['id'])?>'
};
var player = new ckplayer(videoObject);
</script>
<script type="text/javascript">
function run () {
var index = Math.floor(Math.random()*10);
pmd(index);
};
var times = document.getElementsByClassName('fuckyou').length;
setInterval('run()',times*200);
function pmd (id) {
var colors = new Array('#FF5151','#ffaad5','#ffa6ff','#d3a4ff','#2828FF','#00FFFF','#1AFD9C','#FF8000','#81C0C0','#B766AD');
var color = colors[id];
var tmp = document.getElementsByClassName('fuckyou');
for (var i = 0; i < tmp.length; i++) {
var id = tmp[i];
var moren = id.style.color;
setTimeout(function(id){
id.style.color = color;
},i*200,id);
setTimeout(function(id,moren){
id.style.color = moren;
},i*200+180,id,moren);
};
}
</script>

	</div>
	</div>
	</div>
	</body></html>
