<?php
$id = $_GET['id'];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>cems</title>
        <?php require 'utils/styles.php'; ?><!--css links. file found in utils folder-->
        <head>
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
        <div class = "content"><!--body content holder-->
            <div class = "container">
                <div class = "col-md-12"><!--body content title holder with 12 grid columns-->
                    <h1 style="color:#003300 ; font-size:38px ;"><strong>Contact Us</strong></h1><!--body content title-->
                </div>
            </div>
			
            <div class="container">
            <div class="col-md-12">
            <hr>
            </div>
            </div>
            
            <div class="container">
                <div class="col-md-6 contacts">
                    <h1 style="color:#000080 ; font-size:42px ; font-style:bold "><span class="glyphicon glyphicon-user"></span> College</h1>
                    <p>
                        <span class="glyphicon glyphicon-envelope"></span> Email: abc@gmail.com<br>
    
                        <span class="glyphicon glyphicon-phone"></span> Mobile: 9999999999
                    </p>
                </div>
                <div class="col-md-6 contacts">
                    <h1 style="color:#000080 ; font-size:42px ; font-style:bold "><span class="glyphicon glyphicon-user"></span> EvePlanner</h1>
                    <p>
                        <span class="glyphicon glyphicon-envelope"></span> Email: def@gmail.com<br>
    
                        <span class="glyphicon glyphicon-phone"></span> Mobile: 8888888888
                    </p>
                </div>
            </div>
			
            
        </div><!--body content div-->
        <?php require 'utils/footer.php'; ?><!--footer content. file found in utils folder-->
    </body>
</html>
