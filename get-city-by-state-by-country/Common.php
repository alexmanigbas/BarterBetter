<?php
/**
 * Created by PhpStorm.
 * User: Ankit
 * Date: 11/29/2018
 * Time: 7:50 PM
 */

class Common
{
  public function getCountry($connection)
  {
      $mainQuery = "SELECT * FROM bird_countries";
      $result1 = $connection->query($mainQuery) or die("Error in main Query".$connection->error);
      return $result1;
  }

  public function getStateByCountry($connection,$countryId){
      $query = "SELECT * FROM bird_states WHERE countryId='$countryId'";
      $result = $connection->query($query) or die("Error in  Query".$connection->error);
      return $result;
  }

  public function getCityByState($connection,$stateId){
      $query = "SELECT * FROM bird_cities WHERE state_id='$stateId'";
      $result = $connection->query($query) or die("Error in  Query".$connection->error);
      return $result;
  }
}
script.php

<?php
if (isset($_POST['submit'])) {
    $country = $_POST['country'];
    $state = $_POST['state'];
    $city = $_POST['city'];

    echo 'Country is: '. $country; echo '<br/>';
    echo 'State is  : '. $state; echo '<br/>';
    echo 'City is   : '. $city; echo '<br/>';
}
config.php

<?php
$connection = new mysqli("localhost","root","","codingbirds");
if (! $connection){
    die("Error in connection".$connection->connect_error);
}