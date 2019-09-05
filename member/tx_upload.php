<?php


 if(empty($_FILES['file']))
   {
       echo json_encode(['isSuccess'=>false,'msg'=>'请上传二维码']);exit;
   }

   $file = $_FILES["file"];

   if ($file["error"] > 0)
   {
       echo json_encode(['isSuccess'=>false,'msg'=>'上传图片信息错误']);exit;

   }

   if(strpos($file["type"],'image') == false)
   {
       echo json_encode(['isSuccess'=>false,'msg'=>'请上传图片']);exit;
   }

   $temp = explode(".", $file["name"]);
   $extension = end($temp);


   $new_path = 'upload/'.time().rand(1000,9999).'.'.$extension;

   if(move_uploaded_file($file["tmp_name"], $new_path))
   {
       echo json_encode(['isSuccess'=>true,'msg'=>'上传成功','file'=>$new_path]);
   }
   else
   {
       echo json_encode(['isSuccess'=>false,'msg'=>'上传失败']);exit;
   }