<html>
  <head>
    <title>Raj Logistics Website</title>
  <link rel="stylesheet" type="text/css" href="myteststyle.css">
</head>
<!-- Navbar -->
<section id = "nav-bar">
  <nav class="navbar navbar-expand-lg navbar-light" id="navbar-example2">
    <a class="navbar-brand" href="#"><img src = 'img/logo.JPG'> Stark Logistics</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="#home">HOME</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#service">SERVICES</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#our-team">OUR TEAM</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#testimonials">TESIMONIALS</a>
        </li>
        <li class="nav-item">
          <button type="button" id="sbtn" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">SIGN IN / SIGN UP
          </button>
          <div class="modal fade" id="myModal" role="dialog" data-backdrop="false">
            <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                  <div class="container" id="scontainer">
                    <div class="form-container sign-up-container">
                    <form action="#">
                        <h1 id="head1">Create Account</h1>
                        <input type="text" placeholder="Name" name = 'cname' required />
                        <input type="email" placeholder="Email" name = 'cemail' required />
                        <input type="password" placeholder="Password" name = 'cpass' required />
                        <select name="UserType">
                          <option value="supplier">Supplier</option>
                          <option value="client">Client</option>
                        </select>                  
                        <input type="text" placeholder="GSTIN" name = 'cgstin'/>
                        <button id = "sbutton">Sign Up</button>
                      </form>
                      <?php
                        $db = pg_connect('host=localhost dbname=LSP user=postgres password=1234 port = 5432');
                        if (isset($_GET['cemail']))
                        {
                          $val = $_GET['UserType'];
                          $result1 = pg_query("SELECT * FROM supplier WHERE smail = '" .$_GET['cemail']. "'");
                          $result2 = pg_query("SELECT * FROM receiver WHERE rmail = '" .$_GET['cemail']. "'");
                          $count1  = pg_num_rows($result1);
                          $count2  = pg_num_rows($result2);
                          $count = $count1 + $count2;
                          if($count==1) {
                            echo '<script type="text/JavaScript"> alert("Email is already Registered!"); </script>'; 
                          }
                          elseif($count==0 && $_GET['cemail']!="")
                          {
                            echo '<script type="text/JavaScript"> alert("You are successfully registered, please wait tille we verify your email!"); </script>';
                            if ($val == "supplier")
                              {
                                $res = pg_query("SELECT max(sid) from supplier");
                                $res1 = pg_fetch_result($res, 0, 0);
                                $var2 = '+1';
                                $c = $res1+$var2;
                                $query = "INSERT INTO supplier VALUES ($c,'$_GET[cname]','$_GET[cgstin]','$_GET[cpass]','$_GET[cemail]',0)";
                                $res = pg_query($query);
                              }
                              elseif ($val == "client")
                              {
                              $res = pg_query("SELECT max(rid) from receiver");
                                $res1 = pg_fetch_result($res, 0, 0);
                                $var2 = '+1';
                                $c = $res1+$var2;
                                $query = "INSERT INTO receiver VALUES ($c,'$_GET[cname]','$_GET[cgstin]','$_GET[cpass]','$_GET[cemail]',0)";
                                $res = pg_query($query);
                              }
                          }
                      }
                      ?>
                    </div>
                    <div class="form-container sign-in-container">
                      <form action="signinaction.php">
                        <h1 id="head1">Sign in</h1>
                        <input type="email" name="fmail" placeholder="Email" required />
                        <input type="password" name="fpass" placeholder="Password" required />
                        <button id = "sbutton">Sign In</button>
                      </form>
                    </div>
                    <div class="overlay-container">
                      <div class="overlay">
                        <div class="overlay-panel overlay-left">
                          <h1 id="head1">Hello, Friend!</h1>
                          <p id="para">If you already have an account, please sign in!</p>                      
                          <button class="ghost" id="signIn">Sign In</button>
                        </div>
                        <div class="overlay-panel overlay-right">
                          <h1 id="head1">Welcome Back!</h1>
                          <p id="para">If you do not have an account, register now!</p>
                          <button class="ghost" id="signUp">Sign Up</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>  
            </div>
          </div>
        </li>
      </ul>
    </div>
  </nav>
</section>
<script type="text/javascript">
const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('scontainer');


signUpButton.addEventListener('click', () => {
  container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
  container.classList.remove("right-panel-active");
});
</script>
</html>
