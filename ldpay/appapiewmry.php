<?php

//decode by http://www.yunlu99.com/
error_reporting(0);
if ($trade_no != '' && $cny != '' && $type != '' && $key != '' && $mobile != '') {
	$dosql->Execute("SELECT * FROM `#@__zhanghaozu` WHERE appid='{$key}' ORDER BY zhanghao+0 asc");
	while ($rowzhanghao = $dosql->GetArray()) {
		$zhanghao = $rowzhanghao['zhanghao'];
		$zhanghaoonok = $dosql->GetOne("select * from `#@__zhanghaoon` WHERE `zhanghao`='{$zhanghao}' and `appid`='{$key}' and `type`='{$type}'");
		if ($zhanghaoonok['onoff'] == 1) {
		} else {
			$resultduo = $dosql->GetOne("SELECT count(`id`) as allnumber FROM `#@__ewmszb` WHERE appid='{$key}' and name='{$cny}'  and zhanghao='{$zhanghao}' and pay='{$type}'");
			$allnumberduo = $resultduo['allnumber'];
			if ($allnumberduo > 0) {
			} else {
				$nameuser = number_format($cny, 2, '.', '');
				$fenzuid = 99999;
				$timm = time() - 1000;
				$resultzh = $dosql->GetOne("select * from `#@__zhanghaozu` where appid='{$key}' and zhanghao='{$zhanghao}'");
				if ($type == '1') {
					$zhanghaopayname = 'tyali' . $zhanghao . '.jpg';
					$reewmurl = $resultzh['zfbewmurl'];
				}
				if ($type == '2') {
					$zhanghaopayname = 'tyten' . $zhanghao . '.jpg';
					$reewmurl = $resultzh['qqewmurl'];
				}
				if ($type == '3') {
					$zhanghaopayname = 'tywx' . $zhanghao . '.jpg';
					$reewmurl = $resultzh['wxewmurl'];
				}
				if ($reewmurl != '') {
					$dosql->ExecNoneQuery("INSERT INTO `#@__ewmszb` (pay,name,zhanghao,cny,appid,picurl,ewmurl,fenzuid,timm) VALUES('{$type}','{$nameuser}','{$zhanghao}','{$cny}','{$key}','{$zhanghaopayname}','{$reewmurl}','{$fenzuid}','{$timm}')");
				}
			}
		}
	}
	$resultduooff = $dosql->GetOne("SELECT count(`id`) as allnumberoff FROM `#@__zhanghaoon` WHERE appid='{$key}' and onoff=0 and type='{$type}'");
	$allnumberduooff = $resultduooff['allnumberoff'];
	if ($allnumberduooff > 1) {
		$ewmmremove = $dosql->GetOne("select * from `#@__ewmddh` where appid='{$key}' ORDER BY timm desc");
		$id = $ewmmremove['id'];
		if ($id != '') {
			$removezhname = $ewmmremove['zhanghao'];
			$removezhanghao = " and zhanghao !='{$removezhname}'";
		} else {
			$removezhanghao = '';
		}
	} else {
		$removezhanghao = '';
	}
     
	$tim = time();
	$ewmm = $dosql->GetOne("select * from `#@__ewmszb` where timm<'{$tim}' and appid='{$key}' and cny='{$cny}' and pay='{$type}' and onoff=0 " . $removezhanghao . ' ORDER BY name,timm asc');
	$id = $ewmm['id'];
	if ($id != '') {
		$timm = $tim + $cfg_ddtimeout;
		$timmt = $tim;
		$ewm = $ewmm['picurl'];
		$fenzuid = $ewmm['fenzuid'];
		$zhanghao = $ewmm['zhanghao'];
		//$nameuser = $ewmm['name'];
      	$nameuser = $cny;
		$beizhu = $ewmm['name'];
		$ewmurl = $ewmm['ewmurl'];
		$mobileok = 1;
		$dosql->ExecNoneQuery("Update `#@__ewmszb` set timm='{$timm}' where id=" . $id);
		$dosql->ExecNoneQuery("INSERT INTO `#@__ewmddh` (pay,name,zhanghao,cny,uid,appid,timm,timmt,text1,text2,text3,text4,text5) VALUES('{$type}','{$nameuser}','{$zhanghao}','{$cny}','{$trade_no}','{$key}','{$timm}','{$timmt}','{$text1}','{$text2}','{$text3}','{$text4}','{$text5}')");
	} else {
		$rowGetLastID = $dosql->GetOne("select * from `#@__ewmszb` where appid='{$key}' and cny='{$cny}' and pay='{$type}' ORDER BY name desc limit 1");
		$rowGetLastempty = $rowGetLastID['id'];
		if (empty($rowGetLastempty)) {
			$mobileok = 0;
			$dosql->Execute("SELECT * FROM `#@__zhanghaozu` WHERE appid='{$key}' ORDER BY zhanghao+0 asc");
			while ($rowzhanghao = $dosql->GetArray()) {
				$zhanghao = $rowzhanghao['zhanghao'];
				$zhanghaoonok = $dosql->GetOne("select * from `#@__zhanghaoon` WHERE `zhanghao`='{$zhanghao}' and `appid`='{$key}' and `type`='{$type}'");
				if ($zhanghaoonok['onoff'] == 1) {
				} else {
					//$nameuser = $cny + 0.01;
                  	$nameuser = $cny;
                  
					$nameuser = number_format($nameuser, 2, '.', '');
					while (true) {
						$rowGetLastID2019 = $dosql->GetOne("select * from `#@__ewmszb` where appid='{$key}' and name='{$nameuser}' and pay='{$type}' and zhanghao='{$zhanghao}' ORDER BY name desc limit 1");
						$allnumberduo2019 = $rowGetLastID2019['id'];
						if ($allnumberduo2019 > 0) {
							//$nameuser = $rowGetLastID2019['name'] + 0.01;
                          $nameuser = $cny;
							$nameuser = number_format($nameuser, 2, '.', '');
                          break;
						} else {
							break;
						}
					}
					$resultduo = $dosql->GetOne("SELECT count(`id`) as allnumber FROM `#@__ewmszb` WHERE appid='{$key}' and cny='{$cny}' and name='{$nameuser}' and zhanghao='{$zhanghao}' and pay='{$type}'");
					$allnumberduo = $resultduo['allnumber'];
					if ($allnumberduo > 0) {
					} else {
						$nameuser = number_format($nameuser, 2, '.', '');
						$fenzuid = 99999;
						$timm = time() - 1000;
						$resultzh = $dosql->GetOne("select * from `#@__zhanghaozu` where appid='{$key}' and zhanghao='{$zhanghao}'");
						if ($type == '1') {
							$zhanghaopayname = 'tyali' . $zhanghao . '.jpg';
							$reewmurl = $resultzh['zfbewmurl'];
						}
						if ($type == '2') {
							$zhanghaopayname = 'tyten' . $zhanghao . '.jpg';
							$reewmurl = $resultzh['qqewmurl'];
						}
						if ($type == '3') {
							$zhanghaopayname = 'tywx' . $zhanghao . '.jpg';
							$reewmurl = $resultzh['wxewmurl'];
						}
						if ($reewmurl != '') {
							$dosql->ExecNoneQuery("INSERT INTO `#@__ewmszb` (pay,name,zhanghao,cny,appid,picurl,ewmurl,fenzuid,timm) VALUES('{$type}','{$nameuser}','{$zhanghao}','{$cny}','{$key}','{$zhanghaopayname}','{$reewmurl}','{$fenzuid}','{$timm}')");
						}
					}
				}
			}
			$tim = time();
			$ewmm = $dosql->GetOne("select * from `#@__ewmszb` where timm<'{$tim}' and appid='{$key}' and cny='{$cny}' and pay='{$type}' and onoff=0 " . $removezhanghao . ' ORDER BY name,timm asc');
			$id = $ewmm['id'];
			if ($id != '') {
				$timm = $tim + $cfg_ddtimeout;
				$timmt = $tim;
				$ewm = $ewmm['picurl'];
				$fenzuid = $ewmm['fenzuid'];
				$zhanghao = $ewmm['zhanghao'];
				$nameuser = $ewmm['name'];
				$beizhu = $ewmm['name'];
				$ewmurl = $ewmm['ewmurl'];
				$mobileok = 1;
				$dosql->ExecNoneQuery("Update `#@__ewmszb` set timm='{$timm}' where id=" . $id);
				$dosql->ExecNoneQuery("INSERT INTO `#@__ewmddh` (pay,name,zhanghao,cny,uid,appid,timm,timmt,text1,text2,text3,text4,text5) VALUES('{$type}','{$nameuser}','{$zhanghao}','{$cny}','{$trade_no}','{$key}','{$timm}','{$timmt}','{$text1}','{$text2}','{$text3}','{$text4}','{$text5}')");
			} else {
				$mobileok = 0;
			}
		} else {
			if ($ewmmaxn == $ewmmaxname) {
			} else {
				$dosql->Execute("SELECT * FROM `#@__zhanghaozu` WHERE appid='{$key}' ORDER BY zhanghao+0 asc");
				while ($rowzhanghao = $dosql->GetArray()) {
					$zhanghao = $rowzhanghao['zhanghao'];
					$zhanghaoonok = $dosql->GetOne("select * from `#@__zhanghaoon` WHERE `zhanghao`='{$zhanghao}' and `appid`='{$key}' and `type`='{$type}'");
					if ($zhanghaoonok['onoff'] == 1) {
					} else {
						//$nameuser = $cny + 0.01;
                      $nameuser = $cny;
						$nameuser = number_format($nameuser, 2, '.', '');
						while (true) {
							$rowGetLastID2019 = $dosql->GetOne("select * from `#@__ewmszb` where appid='{$key}' and name='{$nameuser}' and pay='{$type}' and zhanghao='{$zhanghao}' ORDER BY name desc limit 1");
							$allnumberduo2019 = $rowGetLastID2019['id'];
							if ($allnumberduo2019 > 0) {
								//$nameuser = $rowGetLastID2019['name'] + 0.01;
                               $nameuser = $cny;
								$nameuser = number_format($nameuser, 2, '.', '');
                              break;
							} else {
								break;
							}
						}
						$resultduo = $dosql->GetOne("SELECT count(`id`) as allnumber FROM `#@__ewmszb` WHERE appid='{$key}' and cny='{$cny}' and name='{$nameuser}' and zhanghao='{$zhanghao}' and pay='{$type}'");
						$allnumberduo = $resultduo['allnumber'];
						if ($allnumberduo > 0) {
						} else {
							$nameuser = number_format($nameuser, 2, '.', '');
							$fenzuid = 99999;
							$timm = time() - 1000;
							$resultzh = $dosql->GetOne("select * from `#@__zhanghaozu` where appid='{$key}' and zhanghao='{$zhanghao}'");
							if ($type == '1') {
								$zhanghaopayname = 'tyali' . $zhanghao . '.jpg';
								$reewmurl = $resultzh['zfbewmurl'];
							}
							if ($type == '2') {
								$zhanghaopayname = 'tyten' . $zhanghao . '.jpg';
								$reewmurl = $resultzh['qqewmurl'];
							}
							if ($type == '3') {
								$zhanghaopayname = 'tywx' . $zhanghao . '.jpg';
								$reewmurl = $resultzh['wxewmurl'];
							}
							if ($reewmurl != '') {
								$dosql->ExecNoneQuery("INSERT INTO `#@__ewmszb` (pay,name,zhanghao,cny,appid,picurl,ewmurl,fenzuid,timm) VALUES('{$type}','{$nameuser}','{$zhanghao}','{$cny}','{$key}','{$zhanghaopayname}','{$reewmurl}','{$fenzuid}','{$timm}')");
							}
						}
					}
				}
            
				$tim = time();
				$ewmm = $dosql->GetOne("select * from `#@__ewmszb` where  appid='{$key}' and cny='{$cny}' and pay='{$type}' and onoff=0 " . $removezhanghao . ' ORDER BY name,timm asc');
				$id = $ewmm['id'];
              //var_dump($id);die;
				if ($id != '') {
					$timm = $tim + $cfg_ddtimeout;
					$timmt = $tim;
					$ewm = $ewmm['picurl'];
					$fenzuid = $ewmm['fenzuid'];
					$zhanghao = $ewmm['zhanghao'];
					$nameuser = $ewmm['name'];
					$beizhu = $ewmm['name'];
					$ewmurl = $ewmm['ewmurl'];
					$mobileok = 1;
					$dosql->ExecNoneQuery("Update `#@__ewmszb` set timm='{$timm}' where id=" . $id);
					$dosql->ExecNoneQuery("INSERT INTO `#@__ewmddh` (pay,name,zhanghao,cny,uid,appid,timm,timmt,text1,text2,text3,text4,text5) VALUES('{$type}','{$nameuser}','{$zhanghao}','{$cny}','{$trade_no}','{$key}','{$timm}','{$timmt}','{$text1}','{$text2}','{$text3}','{$text4}','{$text5}')");
				} else {
					$mobileok = 0;
				}
			}
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
	if ($ewm == '') {
		echo 'Error:没有可用二维码,请开启或上传二维码!';
		die;
	}
	$result = $dosql->GetOne('select * from `#@__ewmddh` where name=\'' . $beizhu . "' and appid='{$key}' and uid='{$trade_no}' and zhanghao='{$zhanghao}' and dingdanok=0 and pay='{$type}' and timm>'{$tim}' ORDER BY id DESC");
	$id2 = $result['id'];
	if ($id2 > 0) {
	} else {
		$ewmm = $dosql->GetOne("select * from `#@__ewmszb` where timm<'{$tim}' and appid='{$key}' and cny='{$cny}' and pay='{$type}' and onoff=0 ORDER BY name,timm asc");
		$id = $ewmm['id'];
		if ($id != '') {
			$timm = $tim + $cfg_ddtimeout;
			$timmt = $tim;
			$ewm = $ewmm['picurl'];
			$zhanghao = $ewmm['zhanghao'];
			$fenzuid = $ewmm['fenzuid'];
			//$nameuser = $ewmm['name'];
          $nameuser = $cny;
			$beizhu = $ewmm['name'];
			$ewmurl = $ewmm['ewmurl'];
			$mobileok = 1;
			$dosql->ExecNoneQuery("Update `#@__ewmszb` set timm='{$timm}' where id=" . $id);
			$dosql->ExecNoneQuery("INSERT INTO `#@__ewmddh` (pay,name,zhanghao,cny,uid,appid,timm,timmt,text1,text2,text3,text4,text5) VALUES('{$type}','{$nameuser}','{$zhanghao}','{$cny}','{$trade_no}','{$key}','{$timm}','{$timmt}','{$text1}','{$text2}','{$text3}','{$text4}','{$text5}')");
		} else {
			$mobileok = 0;
			echo '&#20108;&#27425;&#26597;&#35810;&#27809;&#26377;&#21487;&#29992;&#20108;&#32500;&#30721;';
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
	if ($id2 < 0) {
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
	echo '3:&#25509;&#21475;&#21442;&#25968;&#38169;&#35823;&#65281;&#26159;&#21542;&#32570;&#23569;&#21442;&#25968;&#20256;&#36882;&#12290;';
	die;
}
