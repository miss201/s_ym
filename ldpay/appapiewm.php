<?php

//decode by http://www.yunlu99.com/
error_reporting(0);
if ($trade_no != '' && $cny != '' && $type != '' && $key != '' && $mobile != '') {
	$result = $dosql->GetOne("SELECT count(`id`) as allnumber FROM `#@__ewmszb` WHERE appid='{$key}' and cny='{$cny}' and pay='{$type}'");
	$allnumber = $result['allnumber'];
	if ($allnumber > 0) {
		$tim = time();
		$ewmm = $dosql->GetOne("select * from `#@__ewmszb` where timm<'{$tim}' and appid='{$key}' and cny='{$cny}' and pay='{$type}' and onoff=0 ORDER BY name,timm asc");
		$id = $ewmm['id'];
		if ($id != '') {
			$mobileok = 1;
			$timm = $tim + $cfg_ddtimeout;
			$timmt = $tim;
			$ewm = $ewmm['picurl'];
			$zhanghao = $ewmm['zhanghao'];
			$fenzuid = $ewmm['fenzuid'];
			$nameuser = $ewmm['name'];
			$beizhu = $ewmm['name'];
			$ewmurl = $ewmm['ewmurl'];
			$dosql->ExecNoneQuery("Update `#@__ewmszb` set timm='{$timm}' where id=" . $id);
			$dosql->ExecNoneQuery("INSERT INTO `#@__ewmddh` (pay,name,zhanghao,cny,uid,appid,timm,timmt,text1,text2,text3,text4,text5) VALUES('{$type}','{$nameuser}','{$zhanghao}','{$cny}','{$trade_no}','{$key}','{$timm}','{$timmt}','{$text1}','{$text2}','{$text3}','{$text4}','{$text5}')");
		} else {
			$mobileok = 0;
			$error2018 = 1;
			if ($type == '1') {
				$ewm = $payali;
			}
			if ($type == '2') {
				$ewm = $payten;
			}
			if ($type == '3') {
				$ewm = $paywx;
			}
		}
		if ($type == '1') {
			$logo = 'alipay-logo';
			$qr = 'css/ali.png';
			$qrna = '&#25163;&#26426;&#25903;&#20184;&#23453;';
			$uourldown = 'https://mobile.alipay.com/index.htm';
		}
		if ($type == '2') {
			$logo = 'tenpay-logo';
			$qr = 'css/tenpay.png';
			$qrna = '&#36130;&#20184;&#36890;&#38065;&#21253;';
			$uourldown = 'https://mqq.tenpay.com/web/qq_wallet/';
		}
		if ($type == '3') {
			$logo = 'wxpay-logo';
			$qr = 'css/wxpay.png';
			$qrna = '&#24494;&#20449;&#38065;&#21253;';
			$uourldown = 'http://weixin.qq.com/';
		}
		$result = $dosql->GetOne('select * from `#@__ewmddh` where name=\'' . $beizhu . "' and appid='{$key}' and uid='{$trade_no}' and zhanghao='{$zhanghao}' and dingdanok=0 and pay='{$type}' and timm>'{$tim}' ORDER BY id DESC");
		$id2 = $result['id'];
		if ($id2 > 0) {
		} else {
			$ewmm = $dosql->GetOne("select * from `#@__ewmszb` where timm<'{$tim}' and appid='{$key}' and cny='{$cny}' and pay='{$type}' and onoff=0 ORDER BY name,timm asc");
			$id = $ewmm['id'];
			if ($id != '') {
				$mobileok = 1;
				$timm = $tim + $cfg_ddtimeout;
				$timmt = $tim;
				$ewm = $ewmm['picurl'];
				$zhanghao = $ewmm['zhanghao'];
				$fenzuid = $ewmm['fenzuid'];
				$nameuser = $ewmm['name'];
				$beizhu = $ewmm['name'];
				$ewmurl = $ewmm['ewmurl'];
				$dosql->ExecNoneQuery("Update `#@__ewmszb` set timm='{$timm}' where id=" . $id);
				$dosql->ExecNoneQuery("INSERT INTO `#@__ewmddh` (pay,name,zhanghao,cny,uid,appid,timm,timmt,text1,text2,text3,text4,text5) VALUES('{$type}','{$nameuser}','{$zhanghao}','{$cny}','{$trade_no}','{$key}','{$timm}','{$timmt}','{$text1}','{$text2}','{$text3}','{$text4}','{$text5}')");
			} else {
				echo '&#20108;&#27425;&#26597;&#35810;&#27809;&#26377;&#21487;&#29992;&#20108;&#32500;&#30721;';
				$mobileok = 0;
				$error2018 = 1;
				if ($type == '1') {
					$ewm = $payali;
				}
				if ($type == '2') {
					$ewm = $payten;
				}
				if ($type == '3') {
					$ewm = $paywx;
				}
			}
			$result = $dosql->GetOne('select * from `#@__ewmddh` where name=\'' . $beizhu . "' and appid='{$key}' and uid='{$trade_no}' and zhanghao='{$zhanghao}' and dingdanok=0 and pay='{$type}' and timm>'{$tim}' ORDER BY id DESC");
			$id2 = $result['id'];
			if ($id2 > 0) {
			} else {
			}
		}
	} else {
		echo '1:&#25509;&#21475;&#21442;&#25968;&#38169;&#35823;&#65281;&#26159;&#21542;&#32570;&#23569;&#21442;&#25968;&#65292;&#65;&#80;&#80;&#73;&#68;&#26159;&#21542;&#27491;&#30830;&#65292;&#20108;&#32500;&#30721;&#24179;&#21488;&#26159;&#21542;&#35774;&#32622;&#37329;&#39069;&#32452;&#19982;&#23545;&#24212;&#30340;&#20108;&#32500;&#30721;&#12290;';
		die;
	}
	if ($id2 == '') {
		$id2 = 0;
	}
	$urlmzu = $dosql->GetOne("SELECT * FROM `#@__ewmszb` WHERE `appid`='{$key}' and `pay`='{$type}' and `zhanghao`='{$zhanghao}' and `name`='{$beizhu}' order by id asc");
	$cnyend = $urlmzu['cny'];
	if ($cnyend > 0) {
	} else {
		echo '9:&#38169;&#35823;&#65281;&#35831;&#36820;&#22238;&#37325;&#26032;&#25552;&#20132;&#25903;&#20184;&#126;';
		die;
	}
} else {
	echo '&#50;&#58;&#25509;&#21475;&#21442;&#25968;&#38169;&#35823;&#65281;&#26159;&#21542;&#32570;&#23569;&#21442;&#25968;&#20256;&#36882;&#12290;...............';
	die;
}