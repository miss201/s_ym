<?php
/**
 * ��ȫģ��
 * Email:zhangyuan@tieyou.com
 * ��Ҫ���xss��վ������sqlע��������ַ������й���
 * @author hkshadow
 */
class safeMode{
     
    /**
     * ִ�й���
     * @param 1 linux/2 http/3 Db/ $group
     * @param ����·���Լ��ļ���/�ļ���/null $projectName
     */
    public function xss($group = 1,$projectName = NULL){
        //��������
        $referer = empty ( $_SERVER ['HTTP_REFERER'] ) ? array () : array ($_SERVER ['HTTP_REFERER'] );
        $getfilter = "'|<[^>]*?>|^\\+\/v(8|9)|\\b(and|or)\\b.+?(>|<|=|\\bin\\b|\\blike\\b)|\\/\\*.+?\\*\\/|<\\s*script\\b|\\bEXEC\\b|UNION.+?SELECT|UPDATE.+?SET|INSERT\\s+INTO.+?VALUES|(SELECT|DELETE).+?FROM|(CREATE|ALTER|DROP|TRUNCATE)\\s+(TABLE|DATABASE)";
        $postfilter = "^\\+\/v(8|9)|\\b(and|or)\\b.{1,6}?(=|>|<|\\bin\\b|\\blike\\b)|\\/\\*.+?\\*\\/|<\\s*script\\b|<\\s*img\\b|\\bEXEC\\b|UNION.+?SELECT|UPDATE.+?SET|INSERT\\s+INTO.+?VALUES|(SELECT|DELETE).+?FROM|(CREATE|ALTER|DROP|TRUNCATE)\\s+(TABLE|DATABASE)";
        $cookiefilter = "\\b(and|or)\\b.{1,6}?(=|>|<|\\bin\\b|\\blike\\b)|\\/\\*.+?\\*\\/|<\\s*script\\b|\\bEXEC\\b|UNION.+?SELECT|UPDATE.+?SET|INSERT\\s+INTO.+?VALUES|(SELECT|DELETE).+?FROM|(CREATE|ALTER|DROP|TRUNCATE)\\s+(TABLE|DATABASE)";
 
        // $ArrPGC=array_merge($_GET,$_POST,$_COOKIE);
 
        //��������
        foreach ( $_GET as $key => $value ) {
            $this->stopAttack ( $key, $value, $getfilter ,$group , $projectName);
        }
        //��������
        foreach ( $_POST as $key => $value ) {
            $this->stopAttack ( $key, $value, $postfilter ,$group , $projectName);
        }
        //��������
        foreach ( $_COOKIE as $key => $value ) {
            $this->stopAttack ( $key, $value, $cookiefilter ,$group , $projectName);
        }
        //��������
        foreach ( $referer as $key => $value ) {
            $this->stopAttack ( $key, $value, $getfilter ,$group , $projectName);
        }
    }
     
    /**
     * ƥ�������ַ�����������
     * @param ����key $strFiltKey
     * @param ����value $strFiltValue
     * @param �������� $arrFiltReq
     * @param ��Ŀ�� $joinName
     * @param 1 linux/2 http/3 Db/ $group
     * @param ��Ŀ��/�ļ���/null $projectName
     */
    public function stopAttack($strFiltKey, $strFiltValue, $arrFiltReq,$group = 1,$projectName = NULL) {
         
            $strFiltValue = $this->arr_foreach ( $strFiltValue );
            //ƥ�����ֵ�Ƿ�Ϸ�
            if (preg_match ( "/" . $arrFiltReq . "/is", $strFiltValue ) == 1) {
                //��¼ip
                $ip = "����IP: ".$_SERVER["REMOTE_ADDR"];
                //��¼����ʱ��
                $time = " ����ʱ��: ".strftime("%Y-%m-%d %H:%M:%S");
                //��¼��ϸҳ�������
                $thePage = " ����ҳ��: ".$this->request_uri();
                //��¼�ύ��ʽ
                $type = " �ύ��ʽ: ".$_SERVER["REQUEST_METHOD"];
                //��¼�ύ����
                $key = " �ύ����: ".$strFiltKey;
                //��¼����
                $value = " �ύ����: ".htmlspecialchars($strFiltValue);
                //д����־
                $strWord = $ip.$time.$thePage.$type.$key.$value;
                //����Ϊlinux����
                if($group == 1){
                    $this->log_result_common($strWord,$projectName);
                }
                //����Ϊ��web���
                if($group == 2){
                    $strWord .= "<br>";
                    $this->slog($strWord,$projectName);
                }
                //���������ݿ�
                if($group == 3){
                    $this->sDb($strWord);   
                }
                //���˲���
                $_REQUEST[$strFiltKey] = '';
                //���ﲻ���˳�����
                //exit;
            }
             
            //ƥ������Ƿ�Ϸ�
            if (preg_match ( "/" . $arrFiltReq . "/is", $strFiltKey ) == 1) {
                //��¼ip
                $ip = "����IP: ".$_SERVER["REMOTE_ADDR"];
                //��¼����ʱ��
                $time = " ����ʱ��: ".strftime("%Y-%m-%d %H:%M:%S");
                //��¼��ϸҳ�������
                $thePage = " ����ҳ��: ".$this->request_uri();
                //��¼�ύ��ʽ
                $type = " �ύ��ʽ: ".$_SERVER["REQUEST_METHOD"];
                //��¼�ύ����
                $key = " �ύ����: ".$strFiltKey;
                //��¼����
                $value = " �ύ����: ".htmlspecialchars($strFiltValue);
                //д����־
                $strWord = $ip.$time.$thePage.$type.$key.$value;
                //����Ϊlinux����
                if($group == 1){
                    $this->log_result_common($strWord,$projectName);
                }
                //����Ϊ��web���
                if($group == 2){
                    $strWord .= "<br>";
                    $this->slog($strWord,$projectName);
                }
                //���������ݿ�
                if($group == 3){
                    $this->sDb($strWord);   
                }
                //���˲���
                $_REQUEST[$strFiltKey] = '';
                //���ﲻ���˳�����
                //exit;
            }
        }
     
    /**
     * ��ȡ��ǰurl���������
     * @return string
     */
    public function request_uri() {
        if (isset ( $_SERVER ['REQUEST_URI'] )) {
            $uri = $_SERVER ['REQUEST_URI'];
        } else {
            if (isset ( $_SERVER ['argv'] )) {
                $uri = $_SERVER ['PHP_SELF'] . '?' . $_SERVER ['argv'] [0];
            } else {
                $uri = $_SERVER ['PHP_SELF'] . '?' . $_SERVER ['QUERY_STRING'];
            }
        }
        return $uri;
    }
     
 
    /**
     * ��־��¼(linuxģʽ)
     * @param �������� $strWord
     * @param �����ļ���$strPathName
     */
    public function log_result_common($strWord, $strPathName = NULL) {
        if($strPathName == NULL){
            $strPath = "/var/tmp/";
            $strDay = date('Y-m-d');
            $strPathName = $strPath."common_log_".$strDay.'.log';
        }
     
        $fp = fopen($strPathName,"a");
        flock($fp, LOCK_EX) ;
        fwrite($fp,$strWord." date ".date('Y-m-d H:i:s',time())."\t\n");
        flock($fp, LOCK_UN);
        fclose($fp);
    }  
     
    /**
     * д����־(֧��http�鿴)
     * @param ��־���� $strWord
     * @param webҳ���ļ��� $fileName
     */
    public function slog($strWord,$fileName = NULL) {
        if($fileName == NULL){
            $toppath = $_SERVER ["DOCUMENT_ROOT"] . "/log.htm";
        }else{
            $toppath = $_SERVER ["DOCUMENT_ROOT"] .'/'. $fileName;
        }
        $Ts = fopen ( $toppath, "a+" );
        fputs ( $Ts, $strWord . "\r\n" );
        fclose ( $Ts );
    }
     
    /**
     * д����־(���ݿ�)
     * @param ��־���� $strWord
     */
    public function sDb($strWord){
        //....
    }
     
    /**
     * �ݹ�����
     * @param array $arr
     * @return unknown|string
     */
    public function arr_foreach($arr) {
        static $str = '';
        if (! is_array ( $arr )) {
            return $arr;
        }
        foreach ( $arr as $key => $val ) {
            if (is_array ( $val )) {
                $this->arr_foreach ( $val );
            } else {
                $str [] = $val;
            }
        }
        return implode ( $str );
    }
}

//ʵ�����
//$safeMode = new safeMode();
//����Ĳ���ָ�ĵ�ʱ ���ͣ�������ļ����������뿴��ע�ӡ�
//$safeMode->xss(2,'test.html');

//echo "1";
?>