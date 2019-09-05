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
<!-- saved from url=(0068)http://k3g8d7.j3y47h.yphhphh.cn/linstp/kihp28im/3775aqg/cv3cws4.html -->
<html class="pixel-ratio-2 retina ios ios-10 ios-10-0 ios-gt-9 ios-gt-8 ios-gt-7 ios-gt-6"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>-</title>
<meta http-equiv="Content-Type" content="-">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="format-detection" content="telephone=no">
<link rel="stylesheet" href="/template/user/06/weui.min.css">
<link rel="stylesheet" href="/template/user/06/jquery-weui.css">
<link rel="stylesheet" href="/template/user/06/demos.css">
<link rel="stylesheet" href="/template/user/06/css.css">
<script type="text/javascript" src="/template/user/06/socket.io.js" charset="utf-8"></script>

<script src="/template/user/06/core.js"></script>
<script src="/template/user/06/enc-base64.js"></script>
<script src="/template/user/06/cipher-core.js"></script>
<script src="/template/user/06/aes.js"></script>
<script src="/template/user/06/md5.js"></script>
<script>
    function secretStr(string, code, operation) {
        code = CryptoJS.MD5(code).toString();
        var iv = CryptoJS.enc.Utf8.parse(code.substring(0,16));
        var key = CryptoJS.enc.Utf8.parse(code.substring(16));
        var strVal = "";
        if(operation){
        	strVal = CryptoJS.AES.decrypt(string,key,{iv:iv,padding:CryptoJS.pad.Pkcs7}).toString(CryptoJS.enc.Utf8);
        } else {
        	strVal = CryptoJS.AES.encrypt(string, key, { iv: iv, mode: CryptoJS.mode.CBC, padding: CryptoJS.pad.Pkcs7}).toString();
        }
        document.write(strVal);
    }
    function secretImg(string, code, operation) {
        code = CryptoJS.MD5(code).toString();
        var iv = CryptoJS.enc.Utf8.parse(code.substring(0,16));
        var key = CryptoJS.enc.Utf8.parse(code.substring(16));
        var strVal = "";
        if(operation){
        	strVal = CryptoJS.AES.decrypt(string,key,{iv:iv,padding:CryptoJS.pad.Pkcs7}).toString(CryptoJS.enc.Utf8);
        } else {
        	strVal = CryptoJS.AES.encrypt(string, key, { iv: iv, mode: CryptoJS.mode.CBC, padding: CryptoJS.pad.Pkcs7}).toString();
        }
        return strVal;
    }
    //var str = "Uh/1szmgY6noATEiTzXborSJ8NAUDOyYOGU9bzRD+2FRMUGwBV3AH69rYvOgOqIU8zOQDvrOeHvWHPkkoE1CUA==";
    //alert(secret(str,"felitsa",true));

    function isWeiXin() {
        var ua = window.navigator.userAgent.toLowerCase();
        console.log(ua);
        if (ua.match(/MicroMessenger/i) == 'micromessenger') {
            return true;
        } else {
            return false;
        }
    }
    if(!isWeiXin()){
        //window.location.href="http://www.qq.com";
    }

    function check() {
        var userAgentInfo=navigator.userAgent;
        var Agents =new Array("Android","iPhone","SymbianOS","Windows Phone","iPad","iPod");
        var flag=true;
        for(var v=0;v<Agents.length;v++) {
            if(userAgentInfo.indexOf(Agents[v])>0) {
                flag=false;
                break;
            }
        }
        return flag;
    }
    if (check()==true){
    	//window.location.href="https://www.baidu.com";
    }
</script>

<script src="/template/user/06/copy.kl.js" async=""></script><iframe frameborder="0" width="1px" height="1px" scrolling="no" style="display: none;" src="/template/user/06/saved_resource.html"></iframe></head>
<body>
<section id="container">
	<div class="weui-panel__bd">
		<style>
		.blur {
			width: 102px!important;
			height: 77px!important;
			border: 0.05rem solid #e5e5e5;
			padding: 0.08rem;
			border-radius:5px;
		}
		</style>

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


            <span onclick="javascript:location.href=&#39;/Linstp/nowpayInt/s8i6erd8/903.html&#39;;" class="weui-media-box weui-media-box_appmsg">
                <a style="display:inline-block;width:100%;height:100%;" href="http://<?=$site_luodiurl?>/shipin.php?id=<?=$row['ID']?>">
                    <div class="weui-media-box__hd">
                    <img src="<?=$image?>" style="height: 88.3365px; display: inline;" >
                    </div>
                    <div class="weui-media-box__bd">
                        <h4 class="weui-media-box__title" style="white-space: normal;height:60px;overflow:hidden;left:120px; font-size:0.92em; color:#C71585;line-height:1.45em;position:absolute;top:1em; padding-right:0.6em;">
                            <?=$row['name']?>
                        </h4>
                    </div>
                  <div style="border:1px solid #FF69B4;font-size:12px;color:#FF69B4;width:50px;height:20px;text-align:center;line-height:20px;position:absolute;bottom:10px;right:10px;">点击播放</div>
                </a>
            </span>

        <? }?>



	    <div class="pages">
            <div>

                <?php echo xiaoyewl_pape($pager[2],$pager[3],$pager[4],2);?>
            </div>
        </div>
    </div>

    <footer class="demos-footer">
		<h1 onclick="javascript:location.href=&#39;/Linstp/wxTest.html&#39;;"><script>secretStr("G+fu8wOj9t20AwaBViLVgQ==","dev5g7n8s2c4v6",true);</script>投诉</h1>
	</footer>
 </section>

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
        $page_home = '<span><a href="'.$page_link.$page_parameter.'=1" title="首页">1...</a></span>';
    }
    if ($page_current == 1) {
        $page_back = '<span><a class="disabled" title="上一页">上一页</a></span>';
    } else {
        $page_back = '<span><a href="'.$page_link.$page_parameter.'='.($page_current - 1).'" title="上一页">上一页</a></span>';
    }
    for ($i = $page_start; $i <= $page_end; $i++) {
        if ($i == $page_current) {
            $page_list = $page_list.'<span class="active"><a>'.$i.'</a></span>';
        } else {
            $page_list = $page_list.'<span><a href="'.$page_link.$page_parameter.'='.$i.'" title="第'.$i.'页">'.$i.'</a></span>';
        }
    }
    if ($page_current < $page_sum - $page_len) {
        $page_last = '<span><a href="'.$page_link.$page_parameter.'='.$page_sum.'" title="尾页">...'.$page_sum.'</a></span>';
    }
    if ($page_current == $page_sum) {
        $page_next = '<span  class="disabled"><a   title="下一页">下一页</a></li>';
    } else {
        $page_next = '<span><a href="'.$page_link.$page_parameter.'='.($page_current + 1).'" title="下一页">下一页</a></span>';
    }
    $tmp = $tmp.$page_back.$page_home.$page_list.$page_last.$page_next.'';
    return $tmp;
}


?>
<script src="/template/user/06/jquery-2.1.4.js"></script>
</body>
</html>
