<?php

 header('content-type: application/json');
 header('Access-control-Allow-origin:*');
 header('Access-control-Allow-methods: PUT');
 header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

 $data = json_decode(file_get_contents("php://input"), true);

 $id =  $data['id'];
 $name =  $data['fname'];
 $lname =  $data['lname'];
 $address =  $data['address'];
 $query =  $data['query'];
 $email =  $data['email'];
 $mobile =  $data['mobile'];
 $message =  $data['message'];

 include '../login/database/_dbconnect.php';
 
 $sql = "UPDATE `service_provider` SET `name`='{$name}',`lname`='{$lname}',`address`='{$address}',`query`='{$query}',`email`='{$email}',`mobile`='{$mobile}',`message`='{$message}' 
 WHERE `id` = {$id}";

 $result = mysqli_query($conn, $sql) or die("sql query failed");

 if($result){
    // $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode(array('message' => 'Record Update Successfully.', 'status' => True));
 }else{
    echo json_encode(array('message' => 'Rcord not Updated.', 'status' => false));
 }
 
 ?>