<!doctype html>
<?php 
session_start();
$conn= mysqli_connect("localhost","root","","mydb");

//error_reporting(~E_ALL);
?>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css"/>

    <title><?php echo isset($title)?$title:"title from session: ".$_SESSION["title"] ?></title>
</head>

<body>