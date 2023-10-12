<?php

 header('Content-Type: application/json');
 header('Access-Control-Allow-Origin:*');
 header('Access-Control-Allow-Methods: GET');
 header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

 $data = json_decode(file_get_contents("php://input"), true);
 include '../login/database/_dbconnect.php';
 $sql = "SELECT * FROM  service_provider";
 $result = mysqli_query($conn, $sql) or die("sql query failed");

 if(mysqli_num_rows($result) > 0){
    $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($output);
 }else{
    echo json_encode(array('message' => 'no record found.', 'status' => false));
 }
 
 ?>