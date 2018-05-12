<?php
    session_start();

    $sessionID = session_id(); 

    setcookie("session_id",$sessionID,time()+3600,"/","localhost",false,true); 
    

?>


<!DOCTYPE html>
<html>
<head>
<title> SSS CSRF </title>
<meta charset="utf-8"/>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" id="bootstrap-css" />
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"> </script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href='http://fonts.googleapis.com/css?family=Raleway:500' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="config.js"> </script>


</head>
<body>

<div class="middlePage">
<div class="page-header">
    <h1 class="logo" align="center">Assignment 1 </h1>
</div> 

<div class="container">

    <div class ="container">
        <div class="row justify-content-center">


            <div class="col-md-6 col-md-offset-3" align="center" style="background: lightblue">
                <form class="form-horizontal" method="POST" action="server.php" >
                    <label>Email</label><br>
                    <input name="user_name" type="text" placeholder="Enter User Name" class="form-control input-md">
                    <br>
                    <label>Password</label>
                    <input name="user_pswd" type="password" placeholder="Enter your password" class="form-control input-md">
                    <div class="spacing"><input type="hidden" id="csToken" name="CSR"/></div>
                    <br>
                    <input type="submit" name="sbmt" value="Log In" class="btn btn-primary">
                </form>
            </div>

        </div>
    </div>

</div>

    <?php 
        
       if(isset($_COOKIE['session_id']))
            { 
                echo '<script> var token = loadDOC("POST","server.php","csToken");  </script>'; 
                   
                //echo "cookie set";     
            }
    ?>



</div>
</body>
</html>