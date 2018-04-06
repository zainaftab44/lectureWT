<!doctype html>
<?php 
session_start();
include "./dbconn.php"
//error_reporting(~E_ALL);
?>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <title><?php echo isset($title)?$title:"title from session: ".$_SESSION["title"] ?></title>
</head>

<body>