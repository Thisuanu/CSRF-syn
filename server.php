<?php

session_start();
if(empty($_SESSION['key']))
{
    $_SESSION['key']=bin2hex(random_bytes(32));
    
}
$token = hash_hmac('sha256',"This is token:index.php",$_SESSION['key']);
$_SESSION['CSRF'] = $token;
ob_start();

echo $token;

if(isset($_POST['sbmt']))
{
    ob_end_clean();

    loginvalidate($_POST['CSR'],$_COOKIE['session_id'],$_POST['user_name'],$_POST['user_pswd']);

}
function loginvalidate($user_CSRF,$user_sessionID, $username, $password)
{
    if($username=="admin" && $password=="123" && $user_CSRF==$_SESSION['CSRF'] && $user_sessionID==session_id())
    {
        echo "<script> alert('Login Sucess') </script>";
        echo "<h3>Welcome Admin<h3>"."<br/>"; 
        echo "Visit ".'<a href="http://thisuanu.blogspot.com", target="_blank" >'. "Thisura" ."</a>"." For Tutorial";
        apc_delete('CSRF_token');
    }
    else
    {
        echo "<script> alert('Login Failed') </script>";
        echo "Login Failed ! "."<br/>"."Authorization Failed!! Please reset!";
        
    }
}


?>