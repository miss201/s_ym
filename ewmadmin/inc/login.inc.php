<?php	header("Content-Type:text/html;charset=utf-8");
require_once(dirname(__FILE__).'/safemode.php');

define('PHPMYWIND_INC', preg_replace("/[\/\\\\]{1,}/", '/', dirname(__FILE__)));//获取当前的文件路径 例如D:/phpStudy/WWW
define('PHPMYWIND_ROOT', preg_replace("/[\/\\\\]{1,}/", '/', substr(PHPMYWIND_INC, 0, -4))); // PHPMY 这个字符串
define('PHPMYWIND_DATA', PHPMYWIND_ROOT.'/data');
define('IN_UOZHIFU', TRUE);

//检查外部传递的值并转义
function _RunMagicQuotes(&$svar)
{
	//PHP5.4已经将此函数移除
    if(@!get_magic_quotes_gpc())
    {
        if(is_array($svar))
        {
            foreach($svar as $_k => $_v) $svar[$_k] = _RunMagicQuotes($_v);
        }
        else
        {
            if(strlen($svar)>0 &&
			   preg_match('#^(cfg_|GLOBALS|_GET|_POST|_SESSION|_COOKIE)#',$svar))
            {
				exit('不允许请求的变量值!');
            }

            $svar = addslashes($svar);
        }
    }
    return $svar;
}

//直接应用变量名称替代
foreach(array('_GET','_POST') as $_request)
{
	foreach($$_request as $_k => $_v)
	{
		if(strlen($_k)>0 &&
		   preg_match('#^(GLOBALS|_GET|_POST|_SESSION|_COOKIE)#',$_k))
		{
			exit('不允许请求的变量名!');
		}

		${$_k} = _RunMagicQuotes($_v);
	}
}

require_once(PHPMYWIND_INC.'/config.cache.php'); //全局配置文件
require_once(PHPMYWIND_INC.'/common.func.php');  //全局常用函数
require_once(PHPMYWIND_INC.'/config.php');     //引入数据库类

//引入数据库类
if($cfg_mysql_type == 'mysqli' &&
   function_exists('mysqli_init'))
   require_once(PHPMYWIND_INC.'/mysqli.class.php');
else
   require_once(PHPMYWIND_INC.'/mysql.class.php');

//Session保存路径
$sess_savepath = PHPMYWIND_DATA.'/sessions/';
if(is_writable($sess_savepath) &&
   is_readable($sess_savepath))
   session_save_path($sess_savepath);


//系统版本号
$cfg_vernum  = '5.4 Beta';
$cfg_vertime = '20170405213541';


//设置默认时区
if(PHP_VERSION > '5.1')
{
	$time51 = $cfg_timezone * -1;
    @date_default_timezone_set('Etc/GMT'.$time51);
}

//判断是否开启错误提示
if($cfg_diserror == 'Y')
	error_reporting(E_ALL);
else
	error_reporting(0);


?>
