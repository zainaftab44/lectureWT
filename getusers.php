<?php
include "./dbconn.php";
error_reporting(~E_ALL);
$msg="Failed to execute query";
$status =500;
$rs=array();
if(isset($_POST["sid"])){
    $query="Select id, name, email from student where id=?;";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i",$_POST["sid"]);
    if($stmt->execute()){
        $stmt->bind_result($id,$nam,$em);
        while($stmt->fetch()){
            $item=array(id=>$id,name=>$nam,email=>$em);
            array_push($rs,$item);
        }
        $msg="Records retrieved successfully";
        $status=200;
    }
}else{
    $msg="Please provide a student id";
    $status=403;
}

echo json_encode(array("status"=>$status,message=>$msg,"data"=>$rs));
?>