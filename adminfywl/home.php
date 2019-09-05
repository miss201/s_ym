<?


include('../system/inc.php');
include('./admin_config.php');
include('./check.php');
?>
<!DOCTYPE html>
<!-- saved from url=(0067) -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Required meta tags -->

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>微赏-后台管理</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="./index/materialdesignicons.min.css">
  <link rel="stylesheet" href="./index/perfect-scrollbar.min.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="./index/css-stars.css">
  <link rel="stylesheet" href="./index/bootstrap-datepicker.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="./index/style.css">
  <!-- endinject -->
  <style>
    html,body
    {
      height:100%;
      width:100%;
    }
    .container-scroller
    {
      height:100%;
      width:100%;
    }
    .page-body-wrapper
    {
      position:absolute;
      width:100%;
      height:100% !important;
      top:0;
      padding-top:60px;
    }
    .row-offcanvas
    {
      height:100%;
      position:relative;

    }
    #sidebar
    {
      height:100%;
      overflow-x:hidden;
      overflow-y:auto;
    }
    .content-wrapper
    {
      height:100%;
      overflow:auto;
      position:absolute;
      min-height:100%;
      padding:0;
      overflow:hidden;
    }
    .content-wrapper iframe
    {
      border:none;
    }
  </style>
</head>
<body>
<div class="container-scroller" style="padding-top:60px;">
  <!-- partial:partials/_navbar.html -->
  <nav class="navbar col-lg-12 col-12 p-0 d-flex fixed-top flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
      <a class="navbar-brand brand-logo" href="" style="text-align: center;display:inline-block;">后台管理系统</a>
      <a class="navbar-brand brand-logo-mini" href=""><img src="./index/logo-mini.svg" alt="logo"></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-stretch">
      <div class="search-field ml-4 d-none d-md-block">

      </div>
      <ul class="navbar-nav navbar-nav-right">

        <li class="nav-item">
          <a class="nav-link count-indicator" title="访问官网" target="main" href="admin_index.php" >
            <i class="mdi mdi-home-outline"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link count-indicator" title="修改密码" target="main"  href="admin.php">
            <i class="mdi mdi-settings-box"></i>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle nav-profile" id="profileDropdown" href="" data-toggle="dropdown" aria-expanded="false">
            <img src="./index/face1.jpg" alt="image">
            <span class="d-none d-lg-inline">User</span>
          </a>
          <div class="dropdown-menu navbar-dropdown w-100" aria-labelledby="profileDropdown">

            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="admin.php" target="main">
              <i class="mdi mdi-key-change mr-2 text-primary"></i>
              修改密码
            </a>
            <a class="dropdown-item" href="logout.php">
              <i class="mdi mdi-logout mr-2 text-primary"></i>
              退出登陆
            </a>
          </div>
        </li>
        <li class="nav-item nav-logout d-none d-lg-block">
          <a class="nav-link" href="logout.php">
            <i class="mdi mdi-power"></i>
          </a>
        </li>
      </ul>
      <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="mdi mdi-menu"></span>
      </button>
    </div>
  </nav>
  <div class="tlinks">Collect from </div>
  <!-- partial -->
  <div class="container-fluid page-body-wrapper">
    <div class="row row-offcanvas row-offcanvas-right">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link"  href="admin_index.php" target="main">
              <span class="menu-title">管理首页</span>
              <i class="mdi mdi-home-outline menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="sys.php" target="main">
              <span class="menu-title">系统设置</span>
              <i class="mdi mdi-settings menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#one" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-title">域名配置</span>
              <i class="menu-arrow"></i>
              <i class="mdi mdi-clipboard-text menu-icon"></i>
            </a>
            <div class="collapse" id="one">
              <ul class="nav flex-column sub-menu">

                <li class="nav-item"> <a class="nav-link" href="domainku.php" target="main">域名库</a></li>
                <li class="nav-item"> <a class="nav-link" href="zhu.php" target="main">主接配置</a></li>
                <li class="nav-item"> <a class="nav-link" href="tzdomain.php" target="main">中转配置</a></li>
                <li class="nav-item"> <a class="nav-link" href="domain.php" target="main">落地配置</a></li>
                <li class="nav-item"> <a class="nav-link" href="api.php" target="main">检测接口</a></li>

              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#two" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-title">代理列表</span>
              <i class="menu-arrow"></i>
              <i class="mdi mdi-odnoklassniki menu-icon"></i>
            </a>
            <div class="collapse" id="two">
              <ul class="nav flex-column sub-menu"> 
               <li class="nav-item"> <a class="nav-link" href="daili.php" target="main">代理列表</a></li>
               <li class="nav-item"> <a class="nav-link" href="yqm.php" target="main">生成邀请码</a></li>   

              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#three" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-title">视频列表</span>
              <i class="menu-arrow"></i>
              <i class="mdi mdi-play menu-icon"></i>
            </a>
            <div class="collapse" id="three">
              <ul class="nav flex-column sub-menu">

                <li class="nav-item"> <a class="nav-link" href="detail.php" target="main">视频列表</a></li>
                <li class="nav-item"> <a class="nav-link" href="channel.php" target="main">视频分类</a></li>

              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#four" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-title">订单列表</span>
              <i class="menu-arrow"></i>
              <i class="mdi mdi-clipboard-text menu-icon"></i>
            </a>
            <div class="collapse" id="four">
              <ul class="nav flex-column sub-menu">

                <li class="nav-item"> <a class="nav-link" href="order.php" target="main">订单记录</a></li>
                <li class="nav-item"> <a class="nav-link" href="rmbjl.php" target="main">余额记录</a></li>
                <li class="nav-item"> <a class="nav-link" href="txjl.php" target="main">提现记录</a></li>

              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#five" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-title">查看设置</span>
              <i class="menu-arrow"></i>
              <i class="mdi mdi-laptop menu-icon"></i>
            </a>
            <div class="collapse" id="five">
              <ul class="nav flex-column sub-menu">

                <li class="nav-item"> <a class="nav-link" href="ad.php" target="main">广告管理</a></li>
                <li class="nav-item"> <a class="nav-link" href="image.php" target="main">图片库</a></li>
                <li class="nav-item"> <a class="nav-link" href="tousu.php" target="main">投诉记录</a></li>
                <li class="nav-item"> <a class="nav-link" href="fankui.php" target="main">反馈记录</a></li>
                <li class="nav-item"> <a class="nav-link" href="guanliyuan.php" target="main">管理员</a></li>

              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="fangke.php" target="main">
              <span class="menu-title">IP统计</span>
              <i class="mdi mdi-settings menu-icon"></i>
            </a>
          </li>
           <li class="nav-item">
            <a class="nav-link"  href="fencheng.php" target="main">
              <span class="menu-title">代理默认分成</span>
              <i class="mdi mdi-settings menu-icon"></i>
            </a>
          </li>
        </ul>

      </nav>
      <!-- partial -->
      <div class="content-wrapper">
        <iframe src="admin_index.php" id="main" name="main" width="100%" height="100%"></iframe>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- row-offcanvas ends -->
  </div>
  <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<!-- plugins:js -->
<script src="./index/jquery.min.js"></script>
<script src="./index/popper.min.js"></script>
<script src="./index/bootstrap.min.js"></script>
<script src="./index/perfect-scrollbar.jquery.min.js"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<script src="./index/Chart.min.js"></script>
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="./index/off-canvas.js"></script>
<script src="./index/misc.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="./index/dashboard.js"></script>
<!-- End custom js for this page-->



<script charset="utf-8" async="true" src="./index/jquery.min2.js"></script></body></html>
