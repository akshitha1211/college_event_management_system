<?php
$id = $_GET['id'];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>cems</title>
        <title></title>
        <?php require 'utils/styles.php'; ?><!--css links. file found in utils folder-->
        
    </head>
    <body>
    <?php
        if($id==1){
            require 'utils/userHeader.php';
        }
        else{
            require 'utils/header.php';
        }
    ?><!--header content. file found in utils folder-->

        <div class ="content"><!--body content holder-->
            <div class = "container">
                <div class ="col-md-6 col-md-offset-3">
                    <form action="RegisteredEvents.php?id=1" class ="form-group" method="POST">

                        
                        <div class="form-group">
                            <label for="usn"> Student Roll Number: </label>
                            <input type="text"
                                   id="usn"
                                   name="usn"
                                   class="form-control">
                            
                        </div>
                        <button type="submit" class = "btn btn-default">View Dashboard</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
