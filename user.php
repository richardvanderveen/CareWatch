<!doctype html>
<html lang="en">

<head>
  <title>Userpage Carewatch</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="widtd=device-widtd, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/user.css">
  <?php
    include 'php/dbhinc.php';
    include_once("classes/naw.php");
    $naw = NAW::Instance('naw_id');
    $naw123 = NAW::Create($_POST);
  ?>
</head>
<!-- ****************************Main ************************************** -->
<body>
  <nav class="navbar navbar-expand-lg navbar-light ">
    <a class="navbar-brand" href="#">
  <img src="img/logo.jpg" width="140" height="50" alt="">
</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class=>

          <a class="nav-link" href="#"><p>Welkom Ms J.Austen</p><span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><p></p></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="medicalreminder.html"><p>Medical</p></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="schedule.html"><p>Reminder</p></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="sensor.html"><p>Sensorpage</p></a>
        </li>

      </ul>
      <form class="form-inline my-2 my-lg-0">
        <button type="reset" onclick="location.href='index.html'" class="btn btn-outline-light my-2 my-sm-0" type="submit">Logout</button>
      </form>
    </div>
  </nav>
  <div class="container">
    <div class="row">
        <div class="col cwcontent">
          <div class="card" style="widtd: 20rem;">
<table style="width:100%">
            <tr>

              <td>Name: </td>
              <td><?php echo $naw->get_full_name();?></td>
            </tr><tr>

              <td>Location:</td>
              <td>Home</td>
            </tr><tr>
              <td>Address:</td>
              <td><?php echo "";?></td>
            </tr>
            <tr>
              <td>Zipcode and Country:</td>
              <td>8900er Cansas</td>
            </tr>
            <tr>
              <td>Phonenumber:</td>
              <td>0612345678</td>
            </tr>

            <tr>
              <td>Doctor:</td>
              <td>Mr Green</td>
            </tr>
            <tr>
              <td>Phonenumber:</td>
              <td>0687654321</td>
            </tr>
          </table>
          </div>
        </div>

      <div class="col cwcontent">
      </div>
    </div>
    <div class="row">
      <div class="col cwcontent">

<div class="card" style="widtd: 20rem;">
<p class="card-text">Example Heartbeat Sensor</p>
  <img class="card-img-top" src="img/bpm.jpeg" alt="Card image cap"style="height:255px;width:400px;">
  <div class="card-body"></div>
</div>
      </div>
      <div class="col cwcontent">
    <p class="card-text">Example Temperature Sensor Graphic</p>
<img src="img/temperatuurcurve.jpg" class="img-fluid" alt="Responsive image"style="height:255px;width:400px;">
      </div>
    </div>

    <div class="row">
      <div class="col cwcontent">
        Medication:
        <br>
        Metformine 3x a day 600mg
        <br>
        Naproxen if needed 500mg
        <br>
        Metropolol
      </div>
      <div class="col cwcontent">
        Specialists
         <br>
         <br>
         Dr. Sanders, Neuroloog
         <br>
         Dr. Hendriks, Oncoloog
      </div>
    </div>
  </div>
<?php
/*$naw = NAW::Instance(9);
echo $naw->get_full_name();*/
 ?>
  <!-- Optional JavaScript -->
  <!-- jQuery first, tden Popper.js, tden Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>

</html>
