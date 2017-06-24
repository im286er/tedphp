<?php
// header("Access-Control-Allow-Origin:");
$get = file_get_contents("php://input");


$data['err'] = 0;
$data['msg'] = "ChongwuGongmu";
$data['req'] = $get;


echo json_encode($data);

