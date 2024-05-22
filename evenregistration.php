<?php
include_once 'classes/db1.php';
$id = $_GET['id'];
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>cems</title>
    <?php require 'utils/styles.php'; ?>
</head>
<body>
<?php require 'utils/header.php'; ?>
<div class="content">
    <div class="container">
        <div class="col-md-6 col-md-offset-3">
            <form method="POST">
                <label>Student Roll number:</label><br>
                <input type="text" name="usn" class="form-control" required><br><br>

                <label>Student Name:</label><br>
                <input type="text" name="name" class="form-control" required><br><br>

                <label>Branch:</label><br>
                <input type="text" name="branch" class="form-control" required><br><br>

                <label>Semester:</label><br>
                <input type="text" name="sem" class="form-control" required><br><br>

                <label>Email:</label><br>
                <input type="text" name="email" class="form-control" required><br><br>

                <label>Phone:</label><br>
                <input type="text" name="phone" class="form-control" required><br><br>

                <label>College:</label><br>
                <input type="text" name="college" class="form-control" required><br><br>

                <button type="submit" name="update" required>Pay</button><br><br>
            </form>
        </div>
    </div>
</div>


<?php require 'utils/footer.php'; ?>
</body>
</html>

<?php
if (isset($_POST["update"])) {
    $usn = $_POST["usn"];
    $name = $_POST["name"];
    $branch = $_POST["branch"];
    $sem = $_POST["sem"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $college = $_POST["college"];
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
    if (!preg_match("/^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/", $email)) {
        $errors[] = "Enter valid email. For example: helloworld@gmail.com";
    }

    // If there are errors, display them
    if (!empty($errors)) {
        echo "<script>alert('Validation Error:\\n" . implode("\\n", $errors) . "');</script>";
        exit();
    }

    // Check if USN exists in the participent table
    $query = "SELECT usn FROM participent WHERE usn='$usn'";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        // USN exists, so register the student
        $rid = 0;// Assuming $rid is set elsewhere in your code
        $INSERT = "INSERT INTO registered (rid, usn, event_id) VALUES('$rid','$usn','$id')";
        $regid=$rid;

        if ($conn->query($INSERT) === true) {
            echo "<script>alert('one step further to finish');
            window.location.href='pay.php?usn=$usn&id=$id'</script>";
        } else {
            echo "<script>alert('Registration Failed');window.location.href='evenregistration.php';</script>";
        }
    } else {
        // USN does not exist, prompt to create an account
        echo "<script>alert('Create an account');window.location.href='register.php?id=0';</script>";
    }
    $rid++;
    $conn->close();
}
?>
