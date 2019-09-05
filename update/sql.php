<?
include('../system/inc.php');
$sql='ALTER TABLE `'.flag.'system` ADD `s_tzweiba` LONGTEXT NULL AFTER `s_dingshi`';
//mysql_query($sql);
  
				mysql_query($sql);	
 					



?>