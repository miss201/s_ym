<? include('../system/inc.php');include('check.php');

/* $squrl=squrl;
$query=file_get_contents('http://'.$squrl.'/ajax.php?ip='.sqip.'&act=alert');
$query = json_decode($query, true);
if ($query['status']=='0')
{$alert=$query['msg'];}
else
{$alert='';} */
if (iswap()==1)
{alert_url('/m/');}
?>
<!DOCTYPE html>
<html class="chrome">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title><?php echo $site_name?> - <?php echo $site_sname?></title>
    <!-- Favicon-->
    <link rel="icon" href="" type="image/x-icon">

    <!-- Google Fonts -->
    <!-- <link href="./static/index/css/google.css" rel="stylesheet" type="text/css">
     <link href="./static/index/css/icon.css" rel="stylesheet" type="text/css">-->

    <!-- Bootstrap Core Css -->
    <link href="../agent/index/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../agent/index/css/waves.css" rel="stylesheet">

    <!-- Animation Css -->
    <link href="../agent/index/css/animate.css" rel="stylesheet">

    <!-- Morris Chart Css-->
    <link href="../agent/index/css/morris.css" rel="stylesheet">

    <!-- Custom Css -->
    <link href="../agent/index/css/style.css" rel="stylesheet">


    <link href="../agent/index/css/all-themes.css" rel="stylesheet">

    <link rel="stylesheet" href="layui/css/layui.css">
    <style type="text/css">
        .jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0) transparent;background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;box-sizing: content-box;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}
        #leftsidebar-content
        {
            position:absolute;
            height:100%;
            top:0;
            width:300px;
        }
        #leftsidebar
        {
            height:100% !important;
            position:absolute;
            top:0;
            overflow:hidden;
            padding-top:70px;
        }

        #menu
        {
            position:absolute;
            top:0;
            height:100%;
            width:320px;
            padding-top:205px;
        }
        #user-info
        {
            position:relative;
            z-index: 2;
        }

        #leftsidebar .layui-icon
        {
            line-height: 34px;
        }

        #iframe-content
        {
            position:absolute;
            width:100%;
            height:100%;
            top:0;
            left:0;
            padding-top:70px;
            padding-left:300px;
            margin:0;
            overflow:hidden;
        }
        #iframe-content iframe
        {
            width:100%;
            height:100%;
            border:none;
        }

        .navbar .navbar-toggle:before
        {
            content:"\e61a";
            font-size:14px;
            font-family: layui-icon;
        }
        .navbar .navbar-toggle
        {
            margin-top:5px;
        }

        .navbar .bars
        {
            content:"\e66b";
            font-size:14px;
            font-family: layui-icon;
        }
      
      	.list .active
      {
      	border-right:2px solid #f44336;
        background-color:rgba(233, 233, 233, 0.42) !important;
      }
    </style>
</head>

<body class="theme-red">
<!-- Page Loader -->
<div class="page-loader-wrapper" style="display: none;">
    <div class="loader">
        <div class="preloader">
            <div class="spinner-layer pl-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
        <p>Please wait...</p>
    </div>
</div>
<!-- #END# Page Loader -->
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->
<!-- Search Bar -->
<div class="search-bar">
    <div class="search-icon">
        <i class="material-icons"></i>
    </div>
    <input type="text" placeholder="START TYPING...">
    <div class="close-search">
        <i class="material-icons"></i>
    </div>
</div>
<!-- #END# Search Bar -->
<!-- Top Bar -->
<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars" style="display: none;"></a>
            <a class="navbar-brand" ><?php echo $site_name?></a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <!-- Notifications -->
             
                <li class="dropdown">
                    <a  href='logout.php'  title="退出后台">
                        <i class="layui-icon layui-icon-return" style="top: 2px;"></i>
                    </a>
                </li>

                <!-- #END# Notifications -->

                <!-- #END# Tasks -->
                <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons"></i></a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- #Top Bar -->
<section id="leftsidebar-content">
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info" id="user-info" style="height:107px">
           
            <div class="info-container open">
              <?php echo $member_nickname?>
               
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu" id="menu" style="overflow-y: auto;overflow-x:hidden;">
            <div class="slimScrollDiv" style="position: relative; width:300px;">
                <ul class="list" style="overflow: hidden; width: auto;">
                    <li class="active">
                        <a href="dashang.php" target="iframe" class="waves-effect waves-block">
                            <i class="layui-icon layui-icon-home" style="top: 3px;" ></i>
                            <span>首页</span>
                        </a>
                    </li>

                    <li>
                        <a href="shipin.php" target="iframe" class="waves-effect waves-block">
                            <i class="layui-icon" style="top: 3px;" >&#xe6ed;</i>
                            <span>我的视频</span>
                        </a>
                    </li>

                    <li>
                        <a href="shipins.php" target="iframe" class="waves-effect waves-block">
                            <i class="layui-icon" style="top: 3px;" >&#xe68e;</i>
                            <span>公共视频</span>
                        </a>
                    </li>
					 <li>
                        <a href="dashangye.php" target="iframe" class="waves-effect waves-block">
                            <i class="layui-icon" style="top: 3px;" >&#xe6ed;</i>
                            <span>打赏页模版</span>
                        </a>
                    </li>
                    <? if ($site_hezi==1) {?>

                    <li>
                        <a href="hezi.php" target="iframe" class="waves-effect waves-block">
                            <i class="layui-icon" style="top: 3px;" >&#xe62e;</i>
                            <span>盒子管理</span>
                        </a>
                    </li>


                    <li>
                        <a href="hezitg.php" target="iframe" class="waves-effect waves-block">
                            <i class="layui-icon" style="top: 3px;" >&#xe61e;</i>
                            <span>盒子推广</span>
                        </a>
                    </li>

                    <? }?>

                    <li>
                        <a href="dashang.php" target="iframe" class="waves-effect waves-block">
                            <i class="layui-icon" style="top: 3px;" >&#xe60a;</i>
                            <span>打赏统计</span>
                        </a>
                    </li>

                    <li>
                        <a href="tx.php" target="iframe" class="waves-effect waves-block">
                            <i class="layui-icon" style="top: 3px;" >&#xe65e;</i>
                            <span>余额提现</span>
                        </a>
                    </li>

                    <li>
                        <a href="rmbjl.php" target="iframe" class="waves-effect waves-block">
                            <i class="layui-icon" style="top: 3px;" >&#xe65e;</i>
                            <span>余额记录</span>
                        </a>
                    </li>

                    <li>
                        <a href="txjl.php" target="iframe" class="waves-effect waves-block">
                            <i class="layui-icon" style="top: 3px;" >&#xe65e;</i>
                            <span>提现记录</span>
                        </a>
                    </li>
					
                  
                    <li>
                        <a href="upload.php" target="iframe" class="waves-effect waves-block">
                            <i class="layui-icon" style="top: 3px;" >&#xe681;</i>
                            <span>上传视频</span>
                        </a>
                    </li>
				
                    <li>
                        <a href="yqm.php" target="iframe" class="waves-effect waves-block">
                            <i class="layui-icon" style="top: 3px;" >&#xe672;</i>
                            <span>我的下级</span>
                        </a>
                    </li>

                    <li>
                        <a href="fankui.php" target="iframe" class="waves-effect waves-block">
                            <i class="layui-icon" style="top: 3px;" >&#xe674;</i>
                            <span>在线反馈</span>
                        </a>
                    </li>
                  
                    <li>
                        <a href="editpwd.php" target="iframe" class="waves-effect waves-block">
                            <i class="layui-icon" style="top: 3px;" >&#xe674;</i>
                            <span>密码修改</span>
                        </a>
                    </li>
                   <li>
                        <a href="fangke.php" target="iframe" class="waves-effect waves-block">
                            <i class="layui-icon" style="top: 3px;" >&#xe674;</i>
                            <span>访客统计</span>
                        </a>
                    </li>


                </ul><div class="slimScrollBar" style="background: rgba(0, 0, 0, 0.5); width: 4px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 0px; z-index: 99; right: 1px; height: 143.253px;"></div><div class="slimScrollRail" style="width: 4px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 0px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
        </div>
        <!-- #Menu -->
    </aside>
    <!-- #END# Left Sidebar -->
    <!-- Right Sidebar -->
    <aside id="rightsidebar" class="right-sidebar">
        <ul class="nav nav-tabs tab-nav-right" role="tablist">
            <li role="presentation" class="active"><a href="http://demo.cssmoban.com/cssthemes4/tpez_7_xt/index.html#skins" data-toggle="tab">SKINS</a></li>
            <li role="presentation"><a href="http://demo.cssmoban.com/cssthemes4/tpez_7_xt/index.html#settings" data-toggle="tab">SETTINGS</a></li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 533px;"><ul class="demo-choose-skin" style="overflow: hidden; width: auto; height: 533px;">
                        <li data-theme="red" class="active">
                            <div class="red"></div>
                            <span>Red</span>
                        </li>
                        <li data-theme="pink">
                            <div class="pink"></div>
                            <span>Pink</span>
                        </li>
                        <li data-theme="purple">
                            <div class="purple"></div>
                            <span>Purple</span>
                        </li>
                        <li data-theme="deep-purple">
                            <div class="deep-purple"></div>
                            <span>Deep Purple</span>
                        </li>
                        <li data-theme="indigo">
                            <div class="indigo"></div>
                            <span>Indigo</span>
                        </li>
                        <li data-theme="blue">
                            <div class="blue"></div>
                            <span>Blue</span>
                        </li>
                        <li data-theme="light-blue">
                            <div class="light-blue"></div>
                            <span>Light Blue</span>
                        </li>
                        <li data-theme="cyan">
                            <div class="cyan"></div>
                            <span>Cyan</span>
                        </li>
                        <li data-theme="teal">
                            <div class="teal"></div>
                            <span>Teal</span>
                        </li>
                        <li data-theme="green">
                            <div class="green"></div>
                            <span>Green</span>
                        </li>
                        <li data-theme="light-green">
                            <div class="light-green"></div>
                            <span>Light Green</span>
                        </li>
                        <li data-theme="lime">
                            <div class="lime"></div>
                            <span>Lime</span>
                        </li>
                        <li data-theme="yellow">
                            <div class="yellow"></div>
                            <span>Yellow</span>
                        </li>
                        <li data-theme="amber">
                            <div class="amber"></div>
                            <span>Amber</span>
                        </li>
                        <li data-theme="orange">
                            <div class="orange"></div>
                            <span>Orange</span>
                        </li>
                        <li data-theme="deep-orange">
                            <div class="deep-orange"></div>
                            <span>Deep Orange</span>
                        </li>
                        <li data-theme="brown">
                            <div class="brown"></div>
                            <span>Brown</span>
                        </li>
                        <li data-theme="grey">
                            <div class="grey"></div>
                            <span>Grey</span>
                        </li>
                        <li data-theme="blue-grey">
                            <div class="blue-grey"></div>
                            <span>Blue Grey</span>
                        </li>
                        <li data-theme="black">
                            <div class="black"></div>
                            <span>Black</span>
                        </li>
                    </ul><div class="slimScrollBar" style="background: rgba(0, 0, 0, 0.5); width: 6px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 0px; z-index: 99; right: 1px; height: 322.828px;"></div><div class="slimScrollRail" style="width: 6px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 0px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="settings">
                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 533px;"><div class="demo-settings" style="overflow: hidden; width: auto; height: 533px;">
                        <p>GENERAL SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Report Panel Usage</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked=""><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Email Redirect</span>
                                <div class="switch">
                                    <label><input type="checkbox"><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                        <p>SYSTEM SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Notifications</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked=""><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Auto Updates</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked=""><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                        <p>ACCOUNT SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Offline</span>
                                <div class="switch">
                                    <label><input type="checkbox"><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Location Permission</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked=""><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                    </div><div class="slimScrollBar" style="background: rgba(0, 0, 0, 0.5); width: 6px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 0px; z-index: 99; right: 1px;"></div><div class="slimScrollRail" style="width: 6px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 0px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
            </div>
        </div>
    </aside>
    <!-- #END# Right Sidebar -->
</section>

<section class="content" id="iframe-content">
    <iframe id="iframe" src="dashang.php" name="iframe" width="100%" height="100%"></iframe>
</section>

<!-- Jquery Core Js -->
<script async="" src="../agent/index/js/analytics.js"></script><script src="../agent/index/js/jquery.min.js"></script>

<!-- Bootstrap Core Js -->
<script src="../agent/index/js/bootstrap.js"></script>

<!-- Select Plugin Js -->
<script src="../agent/index/js/bootstrap-select.js"></script>

<!-- Slimscroll Plugin Js -->
<script src="../agent/index/js/jquery.slimscroll.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="../agent/index/js/waves.js"></script>

<!-- Jquery CountTo Plugin Js -->
<script src="../agent/index/js/jquery.countTo.js"></script>

<!-- Morris Plugin Js -->
<script src="../agent/index/js/raphael.min.js"></script>
<script src="../agent/index/js/morris.js"></script>

<!-- ChartJs -->
<script src="../agent/index/js/Chart.bundle.js"></script>

<!-- Flot Charts Plugin Js -->
<script src="../agent/index/js/jquery.flot.js"></script>
<script src="../agent/index/js/jquery.flot.resize.js"></script>
<script src="../agent/index/js/jquery.flot.pie.js"></script>
<script src="../agent/index/js/jquery.flot.categories.js"></script>
<script src="../agent/index/js/jquery.flot.time.js"></script>

<!-- Sparkline Chart Plugin Js -->
<script src="../agent/index/js/jquery.sparkline.js"></script>
<script>

    $(".list li").on("click",function()
    {
		$(".list li").removeClass("active");
      	$(this).addClass("active");
      

    })
</script>
<!-- Custom Js -->
<script src="../agent/index/js/admin.js"></script>
<script src="../agent/index/js/index.js"></script>

<!-- Demo Js -->
<script src="../agent/index/js/demo.js"></script>

</body></html>

