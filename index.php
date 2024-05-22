<!DOCTYPE html>
<html>
<title>cems</title>
<style>
.bgImage {
    background-image: url(images/event.jpg);
    background-size: cover;
    background-position: center center;
    height: 650px;
    margin-bottom: 25px;
}
</style>
<header class="bgImage" > 
    <nav class="navbar" >
        <div class="container"> 
                <a class = "navbar-brand">
                   <h1>EVE PLANNER</h1>
                </a>
       
            <ul class="nav navbar-nav navbar-right"><!--navigation-->
                    <li><a href = "home.php?id=0"><strong>Home</strong></a></li>
                    <li><a href = "register.php?id=0"><strong>Register</strong></a></li>
                    <li><a href = "contact.php?id=0"><strong>Contact Us</strong></a></li>
                    <li><a href = "aboutus.php?id=0"><strong>About us</strong></a></li>
                    <li class="btnlogout"><a class = "btn btn-default navbar-btn" href = "login_form.php">Login<span class = "glyphicon glyphicon-log-in"></span></a></li>
            </ul>
        </div><!--container div-->
    </nav>
    <div class = "col-md-12">
        <div class = "container">
            <div class = "jumbotron"><!--jumbotron-->
                <h1><strong>Explore<br></strong> Your Favorite Event</h1><!--jumbotron heading-->
                <br><div class="browse d-md-flex col-md-14" >
                <div class="row">
                  
            </div>
        </div>
    </div>
</header>
    <body>
        <?php require 'content.php'?>
    </body>
</html>