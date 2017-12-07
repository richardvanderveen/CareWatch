<?php
	session_start();
?>

<html lang="en">

<head>
  <meta charset="utf-8">
  <title>CareWatch-Inlogscherm</title>
  <link rel="stylesheet" type="text/css" href="/css/inlog.css">
  <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

</head>

<body>

  <nav class="navbar navbar-expand navbar-light ">
    <a class="navbar-brand" href="#">
<img src="/img/logo.jpg" width="140" height="50" alt="">
</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class=>
          <a class="nav-link" href="#">
            <p>Welkom by CareWatch Sign In/Up</p><span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <p></p>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <p></p>
          </a>
        </li>
      </ul>
    </div>
  </nav>

  <div id="login-box">
    <div class="left">
      <h1><center>Sign In</center></h1>

      <!-- ********************************************************************** -->

        <?php
          if (isset ($_SESSION['u_id']))
        	 {
             echo '<form action="/php/logout.inc.php" method="POST">
        					 <button type="submit" name="submit">Logout</button></form>';
        	 }
        	else
        	 {
        		 echo '<form action="/php/login_user.php" method="POST">
        					 <input type="text" name="email" placeholder="E-Mail">
        					 <input type="password" name="user_password" placeholder="Password">
        					 <center><button type="submit" name="submit">Login</button></center></form>';
        		}
        ?>
        <a href="/php/registration_user.php"><center><input type="submit" name="signup_submit" value="Sign me up"/></center></a>
    </div>
    <div class="right">
    </div>

    <div class="or">OR</div>
    <div><a href="/php/alarm_login_screen.php"><button class="social-signin facebook">Log in My Alarm Panel</button></a></div>
  </div>


  <br>
  <br>

  <!-- Hier begint footer **********************************************************-->
  <footer>
    <i><em>Copyright&copy; CareWatch 2017</em></i>
    <div id="copyright" style="top: 40px; margin-left: -50px; position: relative; text-align:center;"></div>
    <div id="logoap"><a href="team.html"><img src="/img/logoap.jpg" alt="logo" style="width: 15%; top:-30; margin-left: 550px;  position: relative"><div>

</footer>
</body>
</html>
