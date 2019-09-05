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
<!-- saved from url=(0062)http://ryhdkq.ltd/melppaenim.php?from=singlemessage&code=10034 -->
<html lang="zh-cmn-Hans"><head><meta http-equiv="Content-Type" content="text/html; charset=GBK">

<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
  <script type="text/javascript">
content = new Array(110);
content[0] = '生活是不公平的，你要去适应它。';
content[1] = '送人玫瑰，手流余香。';
content[2] = '我们有不同的籍贯、不同的年龄、不同的习惯、不同的经历，但有一点我们是相同的，那就是都有一颗：爱心。';
content[3] = '锦上添花固然好,雪中送炭更可贵。';
content[4] = '伸出您的友爱之手,让更多的孩子重返校园。';
content[5] = '如果你陷入困境，那不是你父母的过错，不要将你理应承担的责任转嫁给他人，而要学着从中吸取教训。';
content[6] = '爱心一片,真情永远。';
content[7] = '聆听心声,实现愿望。';
content[8] = '走出学校后的生活不像在学校一样有学期之分，也没有暑假之说。没有几位老板乐于帮你发现自我，你必须依靠自己去完成。';
content[9] = '电视中的许多场景决不是真实的生活。在现实生活中，人们必须埋头做自己的工作，而非像电视里演的那样天天泡在咖啡馆里。';
content[10] = '善待你所厌恶的人，因为说不定哪一天你就会为这样的一个人工作。';
content[11] = '人生应该如蜡烛一样，从顶燃到底，一直都是光明的。 ―― 萧楚女';
content[12] = '人生的价值，即以其人对于当代所做的工作为尺度。 ―― 徐玮';
content[13] = '路是脚踏出来的，历史是人写出来的。人的每一步行动都在书写自己的历史。 ―― 吉鸿昌';
content[14] = '春蚕到死丝方尽，人至期颐亦不休。一息尚存须努力，留作青年好范畴。 ―― 吴玉章';
content[15] = '但愿每次回忆，对生活都不感到负疚 ―― 郭小川';
content[16] = '人的一生可能燃烧也可能腐朽，我不能腐朽，我愿意燃烧起来！ ―― 奥斯特洛夫斯基';
content[17] = '你若要喜爱你自己的价值，你就得给世界创造价值。 ―― 歌德';
content[18] = '社会犹如一条船，每个人都要有掌舵的准备。 ―― 易卜生';
content[19] = '人生不是一种享乐，而是一桩十分沉重的工作。 ―― 列夫・托尔斯泰';
content[20] = '人生的价值，并不是用时间，而是用深度去衡量的。 ―― 列夫・托尔斯泰';
content[21] = '生活只有在平淡无味的人看来才是空虚而平淡无味的。 ―― 车尔尼雪夫斯基';
content[22] = '一个人的价值，应该看他贡献什么，而不应当看他取得什么。 ―― 爱因斯坦';
content[23] = '人只有献身于社会，才能找出那短暂而有风险的生命的意义。 ―― 爱因斯坦';
content[24] = '芸芸众生，孰不爱生？爱生之极，进而爱群。 ―― 秋瑾';
content[25] = '生活真象这杯浓酒，不经三番五次的提炼呵，就不会这样可口！ ―― 郭小川';
content[26] = '充满着欢乐与斗争精神的人们，永远带着欢乐，欢迎雷霆与阳光。 ―― 赫胥黎';
content[27] = '春风吹柳,雨润大地。';
content[28] = '为了生活中努力发挥自己的作用，热爱人生吧。 ―― 罗丹';
content[29] = '希望是附丽于存在的，有存在，便有希望，有希望，便是光明。 ―― 鲁迅';
content[30] = '沉沉的黑夜都是白天的前奏。 ―― 郭小川';
content[31] = '当一个人用工作去迎接光明，光明很快就会来照耀着他。 ―― 冯学峰';
content[32] = '东天已经到来，春天还会远吗？ ―― 雪莱';
content[33] = '过去属于死神，未来属于你自己。 ―― 雪莱';
content[34] = '世间的活动，缺点虽多，但仍是美好的。 ―― 罗丹';
content[35] = '辛勤的蜜蜂永没有时间悲哀。 ―― 布莱克';
content[36] = '希望是厄运的忠实的姐妹。 ―― 普希金';
content[37] = '当你的希望一个个落空，你也要坚定，要沉着！ ―― 朗费罗';
content[38] = '先相信你自己，然后别人才会相信你。 ―― 屠格涅夫';
content[39] = '不要慨叹生活底痛苦！---慨叹是弱者...... ―― 高尔基';
content[40] = '宿命论是那些缺乏意志力的弱者的借口。 ―― 罗曼・罗兰';
content[41] = '春回人间,真情奉献。';
content[42] = '私心胜者，可以灭公。 ―― 林逋';
content[43] = '人人好公，则天下太平；人人营私，则天下大乱。 ―― 刘鹗';
content[44] = '自私自利之心，是立人达人之障。 ―― 吕坤';
content[45] = '如烟往事俱忘却，心底无私天地宽。 ―― 陶铸';
content[46] = '常求有利别人，不求有利自己。 ―― 谢觉哉';
content[47] = '一切利己的生活，都是非理性的，动物的生活。 ―― 列夫・托尔斯泰';
content[48] = '人的理性粉碎了迷信，而人的感情也将摧毁利己主义。 ―― 海涅';
content[49] = '无私是稀有的道德，因为从它身上是无利可图的。 ―― 布莱希特';
content[50] = '君子喻于义，小人喻于利。 ―― 孔丘';
content[51] = '不戚戚于贫贱，不汲汲于富贵。 ―― 陶渊明';
content[52] = '富贵不淫贫贱乐，男儿到此是豪雄。 ―― 程颢';
content[53] = '清贫，洁白朴素的生活，正是我们革命者能够战胜许多困难的地方！ ―― 方志敏';
content[54] = '三军可夺帅也,匹夫不可夺志也。 ―― 孔丘';
content[55] = '志不强者智不达。 ―― 墨翟';
content[56] = '燕雀安知鸿鹄之志哉！ ―― 陈涉';
content[57] = '志当存高远。 ―― 诸葛亮';
content[58] = '老骥伏枥，志在千里；烈士暮年，壮心不已。 ―― 曹操';
content[59] = '燕雀戏藩柴，安识鸿鹄游。 ―― 曹植';
content[60] = '穷且益坚，不坠青云之志。 ―― 王勃';
content[61] = '大鹏一日同风起，扶摇直上九万里。 ―― 李白';
content[62] = '古之立大事者，不惟有超世之才，亦必有坚忍不拔之志。 ―― 苏轼';
content[63] = '生当作人杰，死亦为鬼雄，至今思项羽，不肯过江东。 ―― 李清照';
content[64] = '壮心未与年俱老，死去犹能作鬼雄。 ―― 陆游';
content[65] = '故立志者，为学之心也；为学者，立志之事也。 ―― 王阳明';
content[66] = '贫不足羞，可羞是贫而无志。 ―― 吕坤';
content[67] = '我们以人们的目的来判断人的活动。目的伟大，活动才可以说是伟大的。 ―― 契诃夫';
content[68] = '毫无理想而又优柔寡断是一种可悲的心理。 ―― 培根';
content[69] = '生活的理想，就是为了理想的生活。 ―― 张闻天';
content[70] = '人，只要有一种信念，有所追求，什么艰苦都能忍受，什么环境也都能适应。 ―― 丁玲';
content[71] = '理想的人物不仅要在物质需要的满足上，还要在精神旨趣的满足上得到表现。 ―― 黑格尔';
content[72] = '一个能思想的人，才真是一个力量无边的人。 ―― 巴尔扎克';
content[73] = '一个没有受到献身的热情所鼓舞的人，永远不会做出什么伟大的事情来。 ―― 车尔尼雪夫斯基';
content[74] = '共同的事业，共同的斗争，可以使人们产生忍受一切的力量。 ―― 奥斯特洛夫斯基';
content[75] = '我从来不把安逸和快乐看作是生活目的本身---这种伦理基础，我叫它猪栏的理想。 ―― 爱因斯坦';
content[76] = '在一个人民的国家中还要有一种推动的枢纽，这就是美德。 ―― 孟德斯鸠';
content[77] = '人不能象走兽那样活着，应该追求知识和美德。 ―― 但丁';
content[78] = '勿以恶小而为之，勿以善小而不为。惟贤惟德，能服于人。 ―― 刘备';
content[79] = '不患位之不尊，而患德之不崇；不耻禄之不伙，而耻智之不博。 ―― 张衡';
content[80] = '土扶可城墙，积德为厚地。 ―― 李白';
content[81] = '行一件好事，心中泰然；行一件歹事，衾影抱愧。 ―― 神涵光';
content[82] = '入于污泥而不染、不受资产阶级糖衣炮弹的侵蚀，是最难能可贵的革命品质。―― 周恩来';
content[83] = '一个人最伤心的事情无过于良心的死灭。 ―― 郭沫若';
content[84] = '害羞是畏惧或害怕羞辱的情绪，这种情绪可以阻止人不去犯某些卑鄙的行为。 ―― 斯宾诺莎';
content[85] = '应该热心地致力于照道德行事，而不要空谈道德。 ―― 德谟克利特';
content[86] = '感情有着极大的鼓舞力量，因此，它是一切道德行为的重要前提。 ―― 凯洛夫';
content[87] = '没有伟大的品格，就没有伟大的人，甚至也没有伟大的艺术家，伟大的行动者。 ―― 罗曼・罗兰';
content[88] = '理智要比心灵为高，思想要比感情可靠。 ―― 高尔基';
content[89] = '顶级培训网 让我们携手一起成长 ';
content[90] = '人类被赋予了一种工作，那就是精神的成长。 ―― 列夫・托尔斯泰';
content[91] = '人在智慧上应当是明豁的，道德上应该是清白的，身体上应该是清洁的。 ―― 契诃夫';
content[92] = '良心是由人的知识和全部生活方式来决定的。 ―― 马克思';
content[93] = '不念居安思危，戒奢以俭；斯以伐根而求木茂，塞源而欲流长也。 ―― 魏徵';
content[94] = '历览前贤国与家，成由勤俭破由奢。 ―― 李商隐';
content[95] = '把“德性”教给你们的孩子：使人幸福的是德性而非金钱。这是我的经验之谈。在患难中支持我的是道德，使我不曾自杀的，除了艺术以外也是道德。 ―― 贝多芬';
content[96] = '如果道德败坏了，趣味也必然会堕落。――狄德罗';
content[97] = '我愿证明，凡是行为善良与高尚的人，定能因之而担当患难。 ―― 贝多芬';
content[98] = '装饰对于德行也同样是格格不入的，因为德行是灵魂的力量和生气。 ―― 卢梭';
content[99] = '我深信只有有道德的公民才能向自己的祖国致以可被接受的敬礼。 ―― 卢梭';
content[100] = '学会偷懒，并懒出境界是提高工作效率最有效的方法！';
content[101] = '对于事实问题的健全的判断是一切德行的真正基础。 ―― 夸美纽斯';
content[102] = '德行的实现是由行为，不是由文字。 ―― 夸美纽斯';
content[103] = '霸祖孤身取二江，子孙多以百城降。豪华尽出成功后，逸乐安知与祸双？ ―― 王安石';
content[104] = '阴谋陷害别人的人，自己会首先遭到不幸。 ―― 伊索';
content[105] = '奢则妄取苟取，志气卑辱；一从俭约，则于人无求，于己无愧，是可以养气也。 ―― 罗大经';
content[106] = '侈则多欲。君子多欲则念慕富贵，枉道速祸。 ―― 司马光';
content[107] = '顶级培训网 让我们携手一起成长 ';
content[108] = '知耻近乎勇。 ―― 孔丘';
content[109] = '辱，莫大于不知耻。 ―― 王通';
content[110] = '君子忧道不忧贫。 ―― 孔丘';
index = Math.floor(Math.random() * content.length);
window.document.title += content[index];
</script><title>人生的价值，并不是用时间，而是用深度去衡量的。 ―― 列夫・托尔斯泰</title>
  <link rel="stylesheet" href="/template/user/07/weui.min.css">
<link rel="stylesheet" href="/template/user/07/example.css">
<link rel="stylesheet" href="/template/user/07/font_747899_0rc8h5bc37z.css">
<script type="text/javascript" src="/template/user/07/jquery.min.js"></script>
<script type="text/javascript">
var i = 1; //设置当前页数，全局变量
$(function () {
//根据页数读取数据
function getData() {
var page=$("#curpage").val();
i++;
$.ajax({
type: "post",
url: "ajax.php",
data: {page: i,userid:'10034',preview:'',pagesize:'7',imgsize:'160',offset:'100'},
dataType: "json",
success: function (data) {
$(".loaddiv").hide();
if (data.data.length > 0) {
var jsonObj =data.data;
insertDiv(jsonObj);
}else{
$(".div_null").show();
$("#btn_Page").hide();
$(".alink").hide();
}
if (data.data.length > 9) {
	$("#curpage").val(parseInt(page)+1);
}else{
	$("#curpage").val(0);
}
},
beforeSend: function () {
$(".loaddiv").show();
},
error: function () {
$(".loaddiv").hide();
}
});
}

function insertDiv(json) {
var $mainDiv = $("#list");
var html = '';
for (var i = 0; i < json.length; i++) {
html += "<a href='"+json[i].zl+"' class='weui_media_box weui_media_appmsg' style='padding-top:10px;padding-bottom:10px;'>";

if(json[i].logo){
	html += '<div class="weui_media_hd"><img style="width:110px;" class="weui_media_appmsg_thumb" src="'+(json[i].logo)+'"></div>';
}else{
	html += '<div class="weui_media_hd"><img style="border-bottom: 1px solid #D9D9D9;border-right: 1px solid #D9D9D9;" class="weui_media_appmsg_thumb" src="http://pics.gongjianjiagong.com/'+(json[i].id%72)+'.jpg?imageMogr2/thumbnail/80x"></div>';
}
	html += '<div class="weui_media_bd" style="padding-left:43px;"><p class="weui_media_desc" style="font-size:14px;color:black;-webkit-line-clamp:3;">'+json[i].name+'</p><div class="my_bot" style="padding-top:5px"><span class="vi_btn">点击播放</span></div></div></a>';

}
$mainDiv.html(html);
}
var scrollHandler = function () {
var scrollTop = $(document).scrollTop(); //滚动条滚动高度
var documentH = $(document).height();  //滚动条高度
var windowH = $(window).height(); //窗口高度
if (scrollTop  >= documentH - windowH) {
if (i % 10 === 0) {
//getData(i);
$(window).unbind('scroll');
$("#btn_Page").show();
$(".alink").show();
}else{
//getData(i);
$("#btn_Page").hide();
$(".alink").hide();
}
}
}
//定义鼠标滚动事件
$(window).scroll(scrollHandler);
//继续加载按钮事件
$("#btn_Page").click(function () {
//getData(i);
$(window).scroll(scrollHandler);
});

$("#change1").click(function(){
	var l=document.getElementById("mo");
  if(i<l.innerHTML)
  {
	getData();

      var v=document.getElementById("xiye");
	v.innerHTML=i;
  }
});

$("#last").click(function(){
  var v=document.getElementById("xiye");
	var l=document.getElementById("mo");
	v.innerHTML=l.innerHTML;
  i=l.innerHTML-1;
	getData();
});

$("#first").click(function(){
  i=0;
	getData();
  var v=document.getElementById("xiye");
	v.innerHTML=1;
});
$("#change0").click(function(){
	if(i>1){
  i=i-2;
	getData();
      var v=document.getElementById("xiye");
	v.innerHTML=i;
	}
});

$("#payed").click(function(){
location.href='melppaenim.php?type=payed'
});

});


</script>
<style type="text/css">
.loaddiv{position: absolute;margin: auto;top: 0;bottom: 0;left:50%;top:50%;display:none;}
.div_null{display:none;}

.alink{display:none;}
html,body{max-width:750px;margin:0 auto;}
.my_video{display:block;position:relative;min-height:90px;}
.my_video  h4{margin-bottom:10px;}
.my_video .img{width:120px;height:80px; overflow:hidden;margin-right:10px;position:relative;background:#f5f5f5;}
.my_video .img img{width:100%;}
.my_video .img video{height:80px;width:100%;}
.my_video .img_bg{position:absolute;width:100%;height:100%;display:flex;align-items: center; justify-content:center;z-index:3; background-position:center; background-size:auto 100%; background-repeat:no-repeat;}
.img_bg .iconfont{font-size:35px;color:rgba(0,0,0,.25);}
.my_bot{display:flex;justify-content:space-between;}
.vi_btn{background: #d66b6b;width:62px;height:24px;line-height:24px;border-radius:3px;color:#fff;font-size:12px;text-align:center;}
.change{line-height: 35px; letter-spacing: 3px;font-size: 15px; color: #555;height:auto;background: #eee;border-top: #ccc ; bottom:0;text-align:center;   position: fixed;left:0;right:0;z-index:200;}
</style>
</head>
<body ontouchstart="" style="overflow: hidden;">
<div class="container" id="container">
<div class="weui_tab">
<div class="weui_tab_bd">
<!--div class="hd">
<h1 class="page_title">Ta的视频</h1>
</div-->




<div class="bd" style="padding-bottom:50px;">
<div class="weui_panel weui_panel_access">
<div class="weui_panel_bd" id="list">


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

    <a href="http://<?=$site_luodiurl?>/shipin.php?id=<?=$row['ID']?>" class="weui_media_box weui_media_appmsg" style="padding-top:10px;padding-bottom:10px;">
        <div class="weui_media_hd">
            <img style="width:110px;" class="weui_media_appmsg_thumb" src="<?=$image?>"></div>
        <div class="weui_media_bd" style="padding-left:43px;">
            <p class="weui_media_desc" style="font-size:14px;color:black;-webkit-line-clamp:3;"><?=$row['name']?></p>
            <p class="weui_media_desc"></p>
            <div class="my_bot" style="padding-top:5px">
                <span class="vi_btn">点击播放</span>
            </div>
        </div>
    </a>

    <? }?>




</div>

<a class="weui_panel_ft view_more div_null" style="display:none;">没有更多的数据了</a>
</div>
</div>
</div>
</div>
</div>

<div class="loaddiv"><img src="/template/user/07/loading.gif" style="width: 24px;"></div>
<!--显示换一批使用-->

<style>
*{margin:0px; padding:0px;}
body{margin:0 auto; font-size:12px; color:#666; font-family:"微软雅黑", Simsun;}
li{list-style:none;}
img{border:none;}
a, a:visited{text-decoration:none;}

.wrap{ width:auto; max-width:320px; margin:0 auto;}
.center{ width:103%; margin:0 auto;}

/***************分页******************/
.fenye{ float:left;padding-top:3px;}
.fenye ul{ float:left; margin-left:20px; }
.fenye ul li{ float:left; margin-left:5px;padding: 4px 6px; border:1px solid #ccc;  font-weight:bold; cursor:pointer; color:#999;padding-top:0;padding-bottom:0;}
.fenye ul li a{ color:#999;}
.fenye ul li.xifenye{ width:60px; text-align:center; float:left; position:relative;cursor: pointer;}
.fenye ul li .xab{ float:left; position:absolute; width:39px; border:1px solid #ccc; height:123px; overflow-y: auto;overflow-x: hidden;top:-125px; background-color: #fff; display:inline;left:-1px; width:50px;}
.fenye ul li .xab ul{ margin-left:0; padding-bottom:0;}
.fenye ul li .xab ul li{ border:0; padding:4px 0px; color:#999; width:34px; margin-left:0px; text-align:center;}
</style>


  <div class="wrap"> </div>

<div class="change" style="color:blue">
  <!--span id="change0">上一页</span>&nbsp;&nbsp;第<input type="" value="1" id="curpage" style="width:30px">页&nbsp;&nbsp;<span id="change1">下一页</span-->


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
    $page_back = '<li><a class="disabled" title="上一页">上一页</a></li>';
    } else {
    $page_back = '<li><a href="'.$page_link.$page_parameter.'='.($page_current - 1).'" title="上一页">上一页</a></li>';
    }
    for ($i = $page_start; $i <= $page_end; $i++) {
    if ($i == $page_current) {
    $page_list = $page_list.'<li class="active"><a>'.$i.'</a></li>';
    } else {
    $page_list = $page_list.'<li><a href="'.$page_link.$page_parameter.'='.$i.'" title="第'.$i.'页">'.$i.'</a></li>';
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
<div class="fenye">
    	<ul>
            <?php echo xiaoyewl_pape($pager[2],$pager[3],$pager[4],2);?>
        </ul>
  <ul style=" padding-top:5px;  margin-left:98px;">
            
    </ul>

    </div>

</div>

<!--改为投诉使用-->
<!--div class="change"><a href="ts.php">投诉</a></div-->


</body></html>
