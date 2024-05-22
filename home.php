<?php
$id = $_GET['id'];
?>
<!DOCTYPE html>
<html>
<title>cems</title>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>cems</title>
        <?php require 'utils/styles.php';?>  
    </head>
    <body>
    <?php
        if($id==1){
            require 'utils/userHeader.php';
        }
        else{
            require 'utils/header.php';
        }
    ?>
        <!--header content. file found in utils folder-->
        <?php require 'content.php'; ?>
  
        <?php require 'utils/footer.php'; ?><!--footer content. file found in utils folder-->
    </body>
</html>