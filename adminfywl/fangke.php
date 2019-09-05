<? include('../system/inc.php');
include('./admin_config.php');
include('./check.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>访客</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">
    
    <link rel="stylesheet" href="../member/layui/css/layui.css">
    <link rel="stylesheet" href="../member/css/pc.css">
    
</head>
<body>

<div class="layui-fluid child-body">
    <div class="layui-btn-group">
        <button class="layui-btn layui-btn-sm" > 访客统计</button>
    </div>
  	<div class="layui-inline"> <!-- 注意：这一层元素并不是必须的 -->
    	<input type="text" class="layui-input" id="test1" placeholder='请选择时间'>
  	</div>
  	<div class="layui-inline"> <!-- 注意：这一层元素并不是必须的 -->
    	至
  	</div>
  	<div class="layui-inline"> <!-- 注意：这一层元素并不是必须的 -->
    	<input type="text" class="layui-input" id="test2" placeholder='请选择时间'>
  	</div>
  <div class="layui-btn-group">
        <button class="layui-btn layui-btn-sm layui-btn-success" type='button' id='search_btn' > 搜索</button>
    </div>
</div>
<table id="video" lay-filter="list"></table>
<!-- <table class="layui-table" lay-data="{ url:'./index.php?i=5&c=entry&view=public_video&do=pc&m=czt_tushang_v4', page:true, id:'video',limit:20,method:'post',loading:false,limits:[10,20,30],height: 'full-60'}" lay-filter="list">
    <thead>
        <tr>
            <th lay-data="{type:'checkbox'}"></th>
            <th lay-data="{field:'id', width:80, }">ID</th>
            <th lay-data="{field:'title'}">标题</th>
            <th lay-data="{fixed: 'right', width:240, align:'center', toolbar: '#operate'}">操作</th>
        </tr>
    </thead>
</table> -->
 

<script src="../member/layui/layui.all.js"></script>
<script src="../member/js/pc.min.js"></script>

<script>
  
  layui.use('laydate', function(){
  var laydate = layui.laydate;
  
  //执行一个laydate实例
  laydate.render({
    elem: '#test1' //指定元素
  });
    laydate.render({
    elem: '#test2' //指定元素
  });
});
  
function dataTable(where)
{
  table.render({
    elem: '#video', //指定原始表格元素选择器（推荐id选择器）
    cols: [
        [ //标题栏
             { field: 'id', title: 'id', width: 50 },
            { field: 'ip', title: 'IP' },
            { field: 'time_res', title: '访问时间' },
         ]
    ],
    url: 'ajax.php?act=fangke',
    id: 'video',
    where:where
})
}
  
dataTable({});

 $('#search_btn').click(function(){
 	var time1 = $('#test1').val(),
        time2 = $('#test2').val(),
        where = {time1:time1,time2:time2};
   
   dataTable(where);
   
 });

</script>

<script>;</script> </body>
</html>