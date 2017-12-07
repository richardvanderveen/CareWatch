
  <?php
    include_once("classes/alarm.php");
    $geta = Alarm::Instance($_GET['id']);
    $getj = json_encode($geta);
    $gstate = $geta->state;
    $galarmid = $geta->alarmid;
    echo $getj;
    echo "<br>";
    echo "state = ";
    var_dump($gstate);
    echo "<br>";
    echo "a id = ";
    var_dump($galarmid);
    echo "<br>";
    echo "state no q =";
    var_dump($gstate === 1);
    echo "<br>";
    echo "state q = ";
    var_dump($gstate === '1');
    echo "<br>";
    if ($gstate === '1') {
      // $geta->state = 2;
      $geta->state = '2';
      $geta->update_db();
    }
   ?>
