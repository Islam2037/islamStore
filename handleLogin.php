<?php
session_start();
if(isset($_POST['login']))
{
$email=$_POST['email'];
$password=$_POST['password'];
$flag=0;

if($email=="admin@gmail.com" && $password=="admin")
  {
    $flag=1;
    setcookie('emailinfo',"admin@gmail.com",time()+60*7*24*69);
    header("Location:admin/view/layout.php");
  }
 

  foreach($_SESSION['userinfo'] as $user)
  {
    if($user['email']==$email&& $user['password']==$password)
  {
    $flag=1;
    setcookie('emailinfo',$user['email'],time()+60*60*24*7);
    header("location:index.php");
    break;
  }

  }
  if($flag==0)
  {
    $_SESSION['loginError']=["email or password is inCorrect"];
    header("location:login.php");

   
  }

}
else
{
  header("location:login.php");

}
