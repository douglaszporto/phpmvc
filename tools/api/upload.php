<?php

$size = ((int)$_SERVER['CONTENT_LENGTH']);

if($size/1048576 >= ((int)ini_get('post_max_size')))
	die('{"status":0,"message":"Ops, arquivo muito grande"}');

if(empty($_FILES))
	die('{"status":0,"message":"Ops, arquivo inválido"}');


$filename = str_replace(".","",microtime(true));
move_uploaded_file($_FILES["uploader"]["tmp_name"],  dirname(__FILE__) . "/../../statics/images/uploads/" . $filename . "." . pathinfo($_FILES["uploader"]["name"], PATHINFO_EXTENSION));

die('{"status":1,"message":"/statics/images/uploads/'. $filename . '.' . pathinfo($_FILES["uploader"]["name"], PATHINFO_EXTENSION) . '"}');

?>