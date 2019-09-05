<?php
$ewmurl = $_GET['ewmurl'];
if(is_null($_GET['ewmurl']) or empty($_GET['ewmurl'])){
header("location:index.php");
}
?>
<img src="/ewmimages/<?php echo $ewmurl;?>">