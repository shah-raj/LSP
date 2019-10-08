<html>
	<head>
		<title>PENDING SUPPLIER REQUESTS</title>
		<?php include 'head.php'?>
		<link rel="stylesheet" type="text/css" href="adminstyle1.css">
	</head>
	<body>
		<?php include 'adminnavbar.php'?>
		<section>
			<div class="tbl-content">
			    <table cellpadding="0" cellspacing="0" border="0">
			    	<tbody>
				        <tr span style="font-weight: 900;">
				          <td span style="color: black; font-weight: 800; font-size: 18px;">NAME</td>
				          <td span style="color: black; font-weight: 800; font-size: 18px;">EMAIL</td>
				          <td span style="color: black; font-weight: 800; font-size: 18px;">GSTIN</td>
				          <td></td>
				        </tr>
						<?php
							error_reporting(0);
						  	$db = pg_connect('host=localhost dbname=LSP user=postgres password=1234 port =5432');
							$query = "SELECT sid,sname,smail,sgstin from supplier where sstatus = 0";
							$result = pg_query($query);
							$i = 'Supplier';
							while($myrow = pg_fetch_assoc($result)) 
							{
								echo '<form method="post">';
								$value4 = $myrow['sid'];
								$value3 = $myrow['sgstin'];
								$value = $myrow['sname'];
								$value2 = $myrow['smail'];
								echo "<tr>";
								echo "<td>".$value."</td>";
								echo "<td>".$value2."</td>";
								echo "<td>".$value3."</td>";
								echo '<td><button name="acc" value="'.$value4.'" type="submit" class="btn btn-success">Accept</button><button name="rej" value="'.$value4.'" type="button" class="btn btn-danger">Reject</button></td>';
								echo '</form>';
							}
							if(isset($_POST["acc"]))
						    {
						        $selectedID = $_POST["acc"];
						        $query = "UPDATE supplier SET sstatus = 1 WHERE sid=".$selectedID;
								$result = pg_query($query);	
								header("refresh:0");							
						    }
						    if(isset($_POST["rej"]))
						    {
						        $selectedID = $_POST["acc"];
						        $query = "UPDATE supplier SET sstatus = -1 WHERE sid=".$selectedID;
								$result = pg_query($query);
								header("refresh:0");
						    }
						?>
					</tbody>
				</table>
			</div>
		</section>
		<?php include 'footer.php'?>
	</body>
</html>