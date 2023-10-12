<?php

 header('content-type: application/json');
 header('Access-control-Allow-origin:*');
 header('Access-control-Allow-methods: POST');
 header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

 $data = json_decode(file_get_contents("php://input"), true);

 $name =  $data['name'];
 $lname =  $data['lname'];
 $address =  $data['address'];
 $query =  $data['query'];
 $email =  $data['email'];
 $mobile =  $data['mobile'];
 $message =  $data['message'];

 include '../login/database/_dbconnect.php';
 
 $sql = "INSERT into `service_provider` (`name`, `lname`, `address`, `query`, `email`, `mobile`, `message`) VALUES 
         ('$name','$lname','$address','$query','$email','$mobile','$message')";

 $result = mysqli_query($conn, $sql) or die("sql query failed");

 if($result){
    // $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode(array('message' => 'Record Inserted Successfully.', 'status' => True));
 }else{
    echo json_encode(array('message' => 'Record  Not Inserted.', 'status' => false));
 }
 
 ?>