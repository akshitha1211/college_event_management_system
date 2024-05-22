

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php require 'utils/styles.php'; ?>
<?php
include_once 'classes/db1.php';
if(isset($_GET)){
    echo "<pre>";
    print_r($_GET);
    echo "</p>";
    $rid = $_GET['rid'];
    $oid = $_GET['oid'];
    echo $oid;
    $query="UPDATE registered SET status = 'failed' , oid='$oid' WHERE rid = $rid";
    $result=mysqli_query($conn,$query);
}
?>
<a class="btn btn-default" href="index.php"><span class="glyphicon glyphicon-circle-arrow-left"></span> Back</a>
    
</body>
</html>