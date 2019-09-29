<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <form action="test.php">
    <input type="Submit" name="Logout">
  </form>
</body>
</html>
<?php
session_start();
// Store Session Data
if($_GET['UserType'] == "supplie")
{
  echo nl2br("supplier \n");
}
else
{
  echo nl2br("client \n");
}
$_SESSION['login_user']= $_GET['username'];  // Initializing Session with value of PHP Variable
echo $_SESSION['login_user'];
?>