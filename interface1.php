<?php

  session_start();
?>



<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
    <style>
#jjj
{
    margin-top: 50px;
    height: 100%;
    background-color: #00e5ff
}
#head1
{
    padding-top: 50px;
}
#nav-bar
{
	position: fixed;
	width: 100%;
	top: 0;
    z-index: 50;
    /* background-color: #000 */
}
.navbar
{
	background: #0000;
}
.navbar-toggler
{
	border: none;
}
.navbar-brand
{
	font-family: "Avengeance Heroic Avenger"
}
.nav-link
{
	color: #555;
	font-weight: 600;
	font-size: 16px;
}
.navbar-brand img
{
	height: 40px;
	padding-left: 20px;
}
#a1234
{
    padding-top: 75px;
}

</style>
    <section id = "nav-bar">
    <nav class="navbar navbar-expand-lg navbar-light" id="navbar-example2">
        <a class="navbar-brand" href="#"><img src = 'img/logo.JPG'> Stark Logistics</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
</nav>
</section>

<div id="a1234">

    <?php
        echo "Welcome!".$_SESSION['fname'];
    ?>
</div>
<form method="POST" action="#">
                  <h1 id="head1">Sign in</h1>
                  <input type="text" name="supp" placeholder="Enter Supplier Name" />
                  <button id = "sbutton">Sign In</button>
                </form>

<table width="600" border="1" cellspacing="5" cellpadding="5">
  <tr style="background:#CCC">
    <th>Sr No</th>
    <th>S Name</th>
    <th>SID</th>
    <th>Supplier GSTIN</th>
  </tr>
  <?php
  $db = pg_connect('host=localhost dbname=LSP user=postgres password=1234 port = 5432');

                              /*/$newname = $_GET['cname']
                              $newemail = $_GET['cemail']
                              $newpass = $_GET['cpass']*/
        $supname = $_POST['supp'];
      $query = "SELECT sname,sid,sgstin from supplier where sname='$supname'";
      
      /*

      $query = "INSERT INTO supplier VALUES ('58123687','$_POST[cname]','485727229','$_POST[cpass]','$_POST[cemail]')";*/
      $result = pg_query($query);
                                    /*if (!$result) {
                                        echo "Problem with query " . $query . "<br/>";
                                        echo pg_last_error();*/
      echo "<br>";
      $i=1;
      while($myrow = pg_fetch_assoc($result)) 
        {

            $value3 = $myrow['sname'];
           $value = $myrow['sgstin'];
           $value2 = $myrow['sid'];
          //echo "$value, $value2"."<br>";
          echo "<tr>"
;          echo "<td>".$i."</td>";
          echo "<td>".$value3."</td>";
          echo "<td>".$value."</td>";
          echo "<td>".$value2."</td>";
          $i = $i +1;

        }
      ?>

</table>
</body>
</html>