<?php
    $db = pg_connect('host=localhost dbname=LSP user=postgres password=1234 port = 5432');
    $flag = "0";
    if (isset($_GET['fmail']))
    {
    	if($_GET['fmail'] == 'admin@lsp')
    	{
    		if($_GET['fpass'] == 'admin123')
    		{
    			session_start();
    			$flag = "2";
    			$_SESSION['name']='Admin';
    			$_SESSION['mail']=$_GET['fmail'];
    		}
    		else
    		{	
    			$flag = "1";
    			echo '<script type="text/JavaScript"> alert("Wrong credentials! Please try again"); </script>';
    			header("location: http://localhost/LSP1/index.php");
    		}
    	}
    	else
    	{                 
			$result1 = pg_query("SELECT * FROM supplier WHERE smail = '" .$_GET['fmail']. "'");
			$result2 = pg_query("SELECT * FROM receiver WHERE rmail = '" .$_GET['fmail']. "'");
			$count1  = pg_num_rows($result1);
			$count2  = pg_num_rows($result2);
			if($count1==1) 
			{
				$res = pg_query("SELECT spass from supplier WHERE smail = '" .$_GET['fmail']. "'");
				$res1 = pg_fetch_result($res, 0, 0);
				if($res1 == $_GET['fpass'])
				{
					session_start();
					$flag = "3";
					$res2 = pg_query("SELECT sname from supplier WHERE smail = '" .$_GET['fmail']. "'");
					$res3 = pg_fetch_result($res2, 0, 0);
					$_SESSION['name']=$res3;
    				$_SESSION['mail']=$_GET['fmail'];
				}
				elseif($res1 != $_GET['fpass'])
				{
					session_start();
	    			session_destroy();
	    			$flag = "1";
	    			echo '<script type="text/JavaScript"> alert("Wrong credentials! Please try again"); </script>';
	    			header("location: http://localhost/LSP1/index.php");
				} 
			}
			elseif($count2==1)
			{
				$res = pg_query("SELECT rpass from receiver WHERE rmail = '" .$_GET['fmail']. "'");
				$res1 = pg_fetch_result($res, 0, 0);
				if($res1 == $_GET['fpass'])
				{
					session_start();
					$flag = "4";
					$res2 = pg_query("SELECT rname from receiver WHERE rmail = '" .$_GET['fmail']. "'");
					$res3 = pg_fetch_result($res2, 0, 0);
					$_SESSION['name']=$res3;
    				$_SESSION['mail']=$_GET['fmail'];
				}
				elseif($res1 != $_GET['fpass'])
				{
					session_start();
	    			session_destroy();
	    			$flag = "1";
	    			echo '<script type="text/JavaScript"> alert("Wrong credentials! Please try again"); </script>';
	    			header("location: http://localhost/LSP1/index.php");
				}
			}
			elseif($count1==0 && $count2==0)
			{
				session_start();
    			session_destroy();
    			$flag = "1";
    			echo '<script type="text/JavaScript"> alert("Wrong credentials! Please try again"); </script>';
    			header("location: http://localhost/LSP1/index.php");
			}
		}
  	}
  	if ($flag == "2") 
  	{
  		 header("location: http://localhost/LSP1/adminindex.php");
  	}
  	elseif ($flag == "3") 
  	{
  		 header("location: http://localhost/LSP1/custindex.php");
  	}
  	elseif ($flag == "4") 
  	{
  		 header("location: http://localhost/LSP1/custindex.php");
  	}
?>