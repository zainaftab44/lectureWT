<?php
include "./dbconn.php";
error_reporting(~E_ALL);
$msg="Failed to execute query";
$status =500;
$rs=array();
if(isset($_POST["name"])&& isset($_POST["email"])&& isset($_POST["pass"])){
    $query="Insert into student (name,email,password) values(?,?,?);";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sss",$_POST["name"],$_POST["email"],$_POST["pass"]);
    if($stmt->execute()){
        $msg="Record inserted successfully";
        $status=200;
    }
}else{
    $msg="Please provide a name, email,pass to register";
    $status=400;
}

echo json_encode(array("status"=>$status,message=>$msg,"data"=>$rs));
?>