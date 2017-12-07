<?php

include_once("dbhinc.php");
class NAW implements JsonSerializable{

  //Database Variables
  var $id;
  var $first_name;
  var $middle_name;
  var $last_name;
  var $gender;
  var $date_of_birth;
  var $bsn_number;
  var $address;
  var $postcode;
  var $hometown;
  var $country;
  var $email;
  var $username;
  var $sec_level;


  var $devices;

  public static $instances = array();

  public static function Instance($id){
    if(array_key_exists($id,NAW::$instances)){
      return NAW::$instances[$id];
    }else{
      $obj = new NAW($id);
      NAW::$instances[$id] = $obj;
      return $obj;
    }
  }
  public static function Create($post){
    global $conn;
    $first_name = (isset($post["first_name"])) ? $post["first_name"] : "" ;
    $middle_name = (isset($post["preposition"])) ? $post["preposition"] : "" ;
    $last_name = (isset($post["last_name"])) ? $post["last_name"] : "" ;
    $gender = (isset($post["gender"])) ? $post["gender"] : "" ;
    $date_of_birth = (isset($post["day_of_birth"])) ? $post["day_of_birth"] : "" ;
    $bsn_number = (isset($post["SSN"])) ? $post["SSN"] : "" ;
    $address = (isset($post["Adress"])) ? $post["Adress"] : "" ;
    $postcode = (isset($post["Zipcode"])) ? $post["Zipcode"] : "" ;
    $hometown = (isset($post["City"])) ? $post["City"] : "" ;
    $country = (isset($post["Country"])) ? $post["Country"] : "" ;
    $email = (isset($post["email"])) ? $post["email"] : "" ;
    $username = (isset($post["user_name"])) ? $post["user_name"] : "" ;
    $password = (isset($post["user_password"])) ? $post["user_password"] : "" ;
    $sec_level = (isset($post["securitylevel"])) ? $post["securitylevel"] : "" ;

    $password = password_hash($password, PASSWORD_DEFAULT);

    $exists = mysqli_num_rows(mysqli_query($conn,"SELECT naw_email FROM naw WHERE naw_email='$email'")) > 0;
    if($exists){
      echo "Gotten Result!";
      return true;
    }
    $sql = "INSERT INTO naw (naw_voornaam,naw_tussenvoegsel,naw_achternaam,naw_geslacht,
                        naw_geboortedatum,naw_bsn_nr,naw_adres, naw_postcode,
                        naw_woonplaats,naw_land,naw_email,naw_username,naw_wachtwoord,
                        naw_securitylevel)
                        VALUES ('$first_name','$middle_name','$last_name',
                              '$gender','$date_of_birth','$bsn_number',
                              '$address','$postcode','$hometown','$country',
                              '$email','$username','$password','$sec_level');";

    if (mysqli_query($conn, $sql)) {
      echo "Record Updated";
      $naw = NAW::Instance($conn->insert_id);
      return $naw;
    }else {
    echo "Error updating record: " . mysqli_error($conn);
}

    echo "Failed!";
    return false;

  }
  function __construct($id){
    $this->id = $id;
    $this->create_owner_with_id();
  }
  function create_owner_with_id(){
    global $conn;
    $sql = "SELECT * FROM naw WHERE naw_id = $this->id;";
    $result = mysqli_query($conn,$sql);

    while($row = mysqli_fetch_array($result)){
      $this->first_name = $row[2];
      $this->middle_name = $row[3];
      $this->last_name = $row[4];
      $this->gender = $row[5];
      $this->date_of_birth = $row[6];
      $this->bsn_number = $row[7];
      $this->address = $row[8];
      $this->postcode = $row[9];
      $this->hometown = $row[10];
      $this->country = $row[11];
      $this->email = $row[12];
      $this->username = $row[13];
      $this->sec_level = $row[15];
    }
  }
  function update_db(){
    global $conn;
    $sql = "UPDATE naw (naw_voornaam,naw_tussenvoegsel,naw_achternaam,naw_geslacht,
                        naw_geboortedatum,naw_bsn_nr,naw_adres, naw_postcode,
                        naw_woonplaats,naw_land,naw_email,naw_username,naw_securitylevel)
                        VALUES ($this->first_name,$this->middle_name,$this->last_name,
                              $this->gender,$this->date_of_birth,$this->bsn_number,
                              $this->address,$this->postcode,$this->hometown,$this->country,
                              $this->email,$this->username,$this->sec_level) WHERE naw_id == $this->id;";

    if (mysqli_query($conn, $sql)) {
      echo "Record Updated";
    }

  }
  function get_full_name(){
    return $this->first_name." ".$this->middle_name." ".$this->last_name;
  }

  function get_devices_for_user(){
    global $conn;
    $sql = "SELECT d.id FROM devices d JOIN permission_link pl ON pl.device_id = d.id JOIN naw n ON pl.naw_id = n.naw_id WHERE n.naw_id = $this->id;";
    $result = mysqli_query($conn,$sql);
    $this->devices = array();
    while($row = mysqli_fetch_array($result)){
      $this->devices[] = Device::Instance($row[0]);
    }
  }
  function jsonSerialize(){
    return [
      "first_name" => $this->first_name,
      "middle_name" => $this->middle_name,
      "last_name" => $this->last_name,
      "gender" => $this->gender,
      "date_of_birth" => $this->date_of_birth,
      "bsn_number" => $this->bsn_number,
      "address" => $this->address,
      "postcode" => $this->postcode,
      "city" => $this->hometown,
      "email" => $this->email,
      "username" => $this->username,
      "sec_level" => $this->sec_level,
    ];
  }
} ?>
