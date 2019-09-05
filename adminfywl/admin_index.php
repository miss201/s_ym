<?


include('../system/inc.php');
include('./admin_config.php');
include('./check.php');
$nav='home';
function get_shipin()
{
    $result = mysql_query('select count(*) as sl1 from '.flag.'shipin  ');
    if (!!($row = mysql_fetch_array($result))) {
        return $row['sl1'];
    } else {
        return '0';
    }
}


function get_daili()
{
    $result = mysql_query('select count(*) as sl1 from '.flag.'user  ');
    if (!!($row = mysql_fetch_array($result))) {
        return $row['sl1'];
    } else {
        return '0';
    }
}


function get_guanliyuan()
{
    $result = mysql_query('select count(*) as sl1 from '.flag.'gaunliyuan  ');
    if (!!($row = mysql_fetch_array($result))) {
        return $row['sl1'];
    } else {
        return '0';
    }
}


function get_ordersls()
{
    $result = mysql_query('select count(*) as sl1 from '.flag.'order where zt =1  ');
    if (!!($row = mysql_fetch_array($result))) {
        return $row['sl1'];
    } else {
        return '0';
    }
}



$squrl=squrl;
$query=file_get_contents('http://'.$squrl.'/ajax.php?ip='.sqip.'&act=alert');
$query = json_decode($query, true);
if ($query['status']=='0')
{$alert=$query['msg'];}
else
{$alert='';}

$result = mysql_query('select   * from '.flag.'log  order by id desc');
if ($row = mysql_fetch_array($result)){

    $dlsj=$row['l_date'];
    $dlip=$row['l_ip'];

}
?>
<!DOCTYPE html>
<!-- saved from url=(0067) -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Required meta tags -->

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>赏吧</title>
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
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->

    <!-- partial -->

    <!-- partial:partials/_sidebar.html -->

    <!-- partial -->
    <div class="content-wrapper" style="margin-left:0;width:100%;">
        <div class="row">
            <div class="col-md-3 stretch-card grid-margin">
                <div class="card bg-gradient-warning text-white">
                    <div class="card-body">
                        <h4 class="font-weight-normal mb-3">订单总数</h4>
                        <h2 class="font-weight-normal"><?=get_ordersls()?></h2>
                    </div>
                </div>
            </div>
            <div class="col-md-3 stretch-card grid-margin">
                <div class="card bg-gradient-info text-white">
                    <div class="card-body">
                        <h4 class="font-weight-normal mb-3">管理员总数</h4>
                        <h2 class="font-weight-normal"><?=get_guanliyuan()?></h1></h2>

                    </div>
                </div>
            </div>
            <div class="col-md-3 stretch-card grid-margin">
                <div class="card bg-gradient-success text-white">
                    <div class="card-body">
                        <h4 class="font-weight-normal mb-3">代理总数</h4>
                        <h2 class="font-weight-normal"><?=get_daili()?></h2>

                    </div>
                </div>
            </div>

            <div class="col-md-3 stretch-card grid-margin">
                <div class="card bg-gradient-warning text-white">
                    <div class="card-body">
                        <h4 class="font-weight-normal mb-3">视频总数</h4>
                        <h2 class="font-weight-normal"><?=get_shipin()?></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><?php echo PRO_TITLE ?>声明</h4>
                        <div class="table-responsive ps ps--theme_default" data-ps-id="c9be2338-56d1-5114-e7f3-8da48816b9ef">
                            程序本身不带任何违法信息，所发布的内容一律与开发者无关，由发布者自己承担！程序使用范围涵盖：「搞笑视频，学习教程，自媒体短视频，广场舞教学等内容发布！」请尊重开发者劳动成果，勿将本程序发布到网上或倒卖，感谢您的支持！如有违规内容发布，请自行删除！
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body"><iframe class="chartjs-hidden-iframe" tabindex="-1" style="display: block; overflow: hidden; border: 0px; margin: 0px; top: 0px; left: 0px; bottom: 0px; right: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;"></iframe>
                        <h4 class="card-title">动态数据</h4>
                        <canvas id="sales-chart" width="780" height="390" style="display: block; height: 195px; width: 390px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->

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
<script>

    (function($) {
        'use strict';
        $(function() {
            if ($("#sales-chart").length) {
                var ctx = document.getElementById('sales-chart').getContext("2d");

                var gradientStroke1 = ctx.createLinearGradient(0, 0, 0, 300);
                gradientStroke1.addColorStop(0, 'rgba(83, 227 ,218, 0.9)');
                gradientStroke1.addColorStop(1, 'rgba(45, 180 ,235, 0.9)');

                var gradientStroke2 = ctx.createLinearGradient(0, 0, 0, 300);
                gradientStroke2.addColorStop(0, 'rgba(132, 179 ,247, 0.9)');
                gradientStroke2.addColorStop(1, 'rgba(164, 90 ,249, 0.9)');


                var gradientStroke3 = ctx.createLinearGradient(0, 0, 0, 300);
                gradientStroke3.addColorStop(0, 'rgba(232, 0, 90, 0.9)');
                gradientStroke3.addColorStop(1, 'rgba(224, 122, 162, 0.9)');

                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: [<?php echo $shijianday?>],
                        datasets: [
                            {
                                label: "打赏量",
                                borderColor: gradientStroke2,
                                backgroundColor: gradientStroke2,
                                pointRadius: 0,
                                fill: false,
                                borderWidth: 1,
                                fill: 'origin',
                                data: [<?php echo $dashan?>]
                            },
                            {
                                label: "上传量",
                                borderColor: gradientStroke3,
                                borderColor: gradientStroke3,
                                backgroundColor: gradientStroke3,
                                pointRadius: 0,
                                fill: false,
                                borderWidth: 1,
                                fill: 'origin',
                                data: [<?php echo $shipinday?>]
                            },
                            {
                                label: "注册量",
                                borderColor: gradientStroke1,
                                borderColor: gradientStroke1,
                                backgroundColor: gradientStroke1,
                                pointRadius: 0,
                                fill: false,
                                borderWidth: 1,
                                fill: 'origin',
                                data: [<?php echo $userday?>]
                            }
                        ]
                    },
                    options: {
                        legend: {
                            position: "top"
                        },
                        scales: {
                            xAxes: [{
                                ticks: {
                                    display: true,
                                    beginAtZero:true,
                                    fontColor: 'rgba(0, 0, 0, 1)'
                                },
                                gridLines: {
                                    display:false,
                                    drawBorder: false,
                                    color: 'transparent',
                                    zeroLineColor: '#eeeeee'
                                }
                            }],
                            yAxes: [{
                                gridLines: {
                                    drawBorder: false,
                                    display:true,
                                    color: '#eeeeee',
                                },
                                categoryPercentage: 0.5,
                                ticks: {
                                    display: true,
                                    beginAtZero: true,
                                    stepSize: 20,
                                    max: 100,
                                    fontColor: 'rgba(0, 0, 0, 1)'
                                }
                            }]
                        },
                    },
                    elements: {
                        point: {
                            radius: 0
                        }
                    }
                })
            }
            if ($("#satisfaction-chart").length) {
                var ctx = document.getElementById('satisfaction-chart').getContext("2d");

                var gradientStrokeBluePurple = ctx.createLinearGradient(0, 0, 0, 250);
                gradientStrokeBluePurple.addColorStop(0, '#5607fb');
                gradientStrokeBluePurple.addColorStop(1, '#9425eb');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: [11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26],
                        datasets: [
                            {
                                label: "Audi",
                                borderColor: gradientStrokeBluePurple,
                                backgroundColor: gradientStrokeBluePurple,
                                hoverBackgroundColor: gradientStrokeBluePurple,
                                pointRadius: 0,
                                fill: false,
                                borderWidth: 1,
                                fill: 'origin',
                                data: [50, 45, 25, 35, 40, 25, 15, 40, 20, 15, 30, 50, 26, 45, 37, 26]
                            }
                        ]
                    },
                    options: {
                        legend: {
                            display: false
                        },
                        scales: {
                            yAxes: [{
                                ticks: {
                                    display: false,
                                    min: 0,
                                    stepSize: 10
                                },
                                gridLines: {
                                    drawBorder: false,
                                    display: true
                                }
                            }],
                            xAxes: [{
                                gridLines: {
                                    display:false,
                                    drawBorder: false,
                                    color: 'rgba(0,0,0,1)',
                                    zeroLineColor: '#eeeeee'
                                },
                                ticks: {
                                    padding: 20,
                                    fontColor: "rgba(0,0,0,1)",
                                    autoSkip: true,
                                    maxTicksLimit: 6
                                },
                                barPercentage: 0.7
                            }]
                        }
                    },
                    elements: {
                        point: {
                            radius: 0
                        }
                    }
                })
            }jQuery
        });
    })(jQuery);

</script>
<!-- End custom js for this page-->



<script charset="utf-8" async="true" src="./index/jquery.min2.js"></script></body></html>
