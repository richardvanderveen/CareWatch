<html lang="en">
<html>

<head>
  <title>Care watch</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
   <meta name="viewport" content="width=device-width, initial-scale=1"> -->
  <link href='https://weloveiconfonts.com/api/?family=fontawesome' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald:400,300" type="text/css">
  <link rel="stylesheet" type="text/css" href="../css/alarm.css">
</head>

<body>
  <?php
    include_once("classes/alarm.php");
    $geta = Alarm::Instance($_GET['id']);
    echo $geta->;
    if ($geta->state == 1 ) {
      $geta->state = 2;
      $geta->update_db();
    }
   ?>

  <div id="wrapper">
    <header>
      <img src="img/logo.jpg" alt="logo" style="width: 15%; float: left; margin-top: -2%; position: relative; margin-left: -11%;" ;>
      <nav class="headernav">
        <ul class="main-nav">
          <li><a href="alarmlandingpage.html">Alarm List</a></li>
          <li><a href="#">Alarm Details</a>
          </li>
        </ul>
      </nav>
      <a href="index.html">
        <center><input type="submit" name="logout_submit" value="Loguot" /></center>
    </header>

    <!--**********************  Hier begint Search - Knopje - GO. ********************************** -->

    <div id="heading">
      <!-- <h1><center>Operator Page</center></h1> -->
    </div>
    <aside>
      <nav>



      </nav>

      <a>Client Location</a>
      <p> <a href="https://media.giphy.com/media/3o7TKV5ar6tbpkWoRW/giphy.gif"><img src="img/map.jpg" width="230" height="180" alt="Client Lokatie"></a></p>

      <h3>Client Photo</h3>
      <b><img src="img/oma2.jpg" width="230" height="180" alt="Client Photo"></b>

      <h4>Client information</h4>
      <g><big>Name:Mrs. A.Brown</br>
        Address: 5th Avenue, 5645</br>
        WSA 4565 New York</br>
        Tel. 054-34 66 890</br>
        Date of birth: 05/04/1944</br></br>
        Category: living alone</br></br>
        Heart patient, diabetes,</br>
        wheelchair</big></g>

      <h5>Hartslag van Client</h5>
      <s><img src="http://www.toolfarm.com/images/uploads/product_descr/ecg-monitor-animation.gif" width="230" height="180" alt="foto of hartslag"></s>

    </aside>

  </div>


  <div id="container">
    17:22 alarm button</br>
    17:24 button: talk to client (20seconds)</br>
    17:24 button: listen to client (35seconds)</br>
    17:25 button: client messages</br>
    17:26 phone to contact: neighbour
  </div>

  <div id="box">
    17:22 alarm button</br>
    17:24 button: talk to client (20seconds)</br>
    17:24 button: listen to client (35seconds)</br>
    17:25 button: client messages</br>
    17:26 phone to contact: neighbour
  </div>





  <div class="alert">
    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
    <strong><center>Alarm signal</center></strong>
  </div>

  <center><button class="btn success">Talk to client</center></button>


    <footer></footer>







</body>

</html>
