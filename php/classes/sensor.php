<?php
include_once("dbhinc.php");
include_once("classes/device.php");
include_once("classes/datapoint.php");
class Sensor implements JsonSerializable {
  var $id;
  var $serial;
  var $location;
  var $type;
  var $device;
  var $lower_boundary;
  var $upper_boundary;

  public static $instances = array();
  public static function Instance($id){
    if(array_key_exists($id,Sensor::$instances)){
      return Sensor::$instances[$id];
    }else{
      $obj = new Sensor($id);
      Sensor::$instances[$id] = $obj;
      return $obj;
    }
  }

  function __construct($id){
    $this->id = $id;
    $this->get_sensor_data();
  }
  function get_sensor_data(){
    global $conn;
    $sql = "SELECT * FROM snsr WHERE snsr_id = $this->id";
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($result)){
      $this->serial = $row[1];
      $this->location = $row[2];
      $this->device = Device::Instance($row[3]);
      $this->type = $row[4];
      $this->lower_boundary = $row[5];
      $this->upper_boundary = $row[6];

    }
  }
  public function jsonSerialize(){
    global $conn;
    $datapoint_objects = array();
    $sql = "SELECT snrd_id FROM snrd WHERE snsr_id = $this->id";
    $results = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($results)){
      $datapoint_objects[] = DataPoint::Instance($row[0]);
    }
    $datapoint_json = [];
    for($i = 0; $i < count($datapoint_objects); $i++){
      $point = $datapoint_objects[$i];
      $datapoint_json[] = $point->jsonSerialize();
    }
    return [
        'id' => $this->id,
        'serialnr' => $this->serial,
        'location' => $this->location,
        'type' => $this->type,
        'device' => $this->device->jsonSerialize(),
        'datapoints' => $datapoint_json,
    ];
  }
  public function jsonSerializeAlarm() {
            return [
                'id' => $this->id,
                'serialnr' => $this->serial,
                'location' => $this->location,
                'type' => $this->type,
                'device' => $this->device->jsonSerialize(),
            ];
        }




}
 ?>
