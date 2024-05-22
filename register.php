
<?php
$id = $_GET['id'];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>cems</title>
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
    ?>
    <div class ="content"><!--body content holder-->
            <div class = "container">
                <div class ="col-md-6 col-md-offset-3">
    <form method="POST">

   
        <label>Student Roll number:</label><br>
        <input type="text" name="usn" class="form-control" required><br><br>

        <label>Student Name:</label><br>
        <input type="text" name="name" class="form-control" required><br><br>

        <label>Password:</label><br>
        <input type="text" name="pword" class="form-control" required><br><br>

        <label>Branch:</label><br>
        <input type="text" name="branch" class="form-control" required><br><br>

        <label>Semester:</label><br>
        <input type="text" name="sem" class="form-control" required><br><br>

        <label>Email:</label><br>
        <input type="text" name="email"  class="form-control" required ><br><br>

        <label>Phone:</label><br>
        <input type="text" name="phone"  class="form-control" required><br><br>

        <label>College:</label><br>
        <input type="text" name="college"  class="form-control" required><br><br>

        <button type="submit" name="update" required>Submit</button><br><br>
        <a href="usn.php?id=0" ><u>Already registered ?</u></a>

    </div>
    </div>
    </div>
    </form>
    

    <?php require 'utils/footer.php'; ?>
    </body>
</html>

<?php

    if (isset($_POST["update"]))
    {
        $usn=$_POST["usn"];
        $name=$_POST["name"];
        $pword=$_POST["pword"];
        $branch=$_POST["branch"];
        $sem=$_POST["sem"];
        $email=$_POST["email"];
        $phone=$_POST["phone"];
        $college=$_POST["college"];
        $errors = [];

    // Roll number validation
    if (!preg_match("/^[0-9][a-zA-Z0-9]*$/", $usn)) {
        $errors[] = "Roll number should start with a number and can include characters except at the starting.";
    }

    // Name validation
    if (!preg_match("/^[a-zA-Z][a-zA-Z\s]*$/", $name)) {
        $errors[] = "Name should start with alphabets and can contain alphabets and spaces only.";
    }

    // Semester validation
    if (!preg_match("/^[0-9]+$/", $sem)) {
        $errors[] = "Semester should contain digits only.";
    }

    // Phone validation
    if (!preg_match("/^[0-9]{10}$/", $phone)) {
        $errors[] = "Phone should contain only 10 digits with no alphabets.";
    }

    // College validation
    if (!preg_match("/^[a-zA-Z\s]*$/", $college)) {
        $errors[] = "College should contain alphabets only.";
    }

    // Branch validation
    if (!preg_match("/^[a-zA-Z]*$/", $branch)) {
        $errors[] = "Branch should contain alphabets only.";
    }
    if(!preg_match("/^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/" ,$email)){
        $errors[] = "Enter valid email. For example: helloworld@gmail.com";
    }


    // If there are errors, display them
    if (!empty($errors)) {
        echo "<script>alert('Validation Error:\\n" . implode("\\n", $errors) . "');</script>";
        exit();
    }

        if( !empty($usn) || !empty($name) || !empty($pword) || !empty($branch) || !empty($sem) || !empty($email) || !empty($phone) || !empty($college) )
        {
        
            include 'classes/db1.php';     
                $INSERT="INSERT INTO participent (usn,name,password,branch,sem,email,phone,college) VALUES('$usn','$name','$pword','$branch',$sem,'$email','$phone','$college')";

          
                if($conn->query($INSERT)===True){
                    echo "<script>
                    alert('Registered Successfully!');
                    window.location.href='usn.php?id=0';
                    </script>";
                }
                else
                {
                    echo"<script>
                    alert(' Already registered this Roll number');
                    window.location.href='usn.php?id=0';
                    </script>";
                }
               
                $conn->close();
            
        }
        else
        {
            echo"<script>
            alert('All fields are required');
            window.location.href='register.php';
                    </script>";
        }
    }
    
?>