<?php
ini_set('display_errors','1');
error_reporting(E_ALL);
$servername = "localhost";
$username = "root";
$password = "";
$databasename = "calendar_Demo";


$conn = mysqli_connect($servername, $username, $password, $databasename);

if(!$conn) {
    echo "db connection failed \n" . mysqli_connect_error();
}

if(isset($_POST['submit'])){
    $eventName  = $_POST['eventName'];
    $eventDate  = $_POST['eventDate'];
    $eventTime  = $_POST['appt-time'];
  
    if(isset($eventName) && ($eventName != ""))
    {
        $sql = "INSERT INTO events (event_name, event_date, event_time) VALUES ('$eventName', '$eventDate', '$eventTime')";
    
        if (mysqli_query($conn, $sql)) {
            echo "inserted \n";
        }

        else {
            echo "not inserted";
        }
    }
  
}

// ===================================[fetch data from database querry]====================================
$selectQuerry = "SELECT * from test";
// $selectQuerry  = "SELECT id, event_name, event_date, event_time from events";
$selectResult = mysqli_query($conn, $selectQuerry);

print_r($selectResult);

// while($rows = mysqli_fetch_assoc($selectResult)){
//     print_r($rows.['id']);
    // echo $rows.['event_name'];
    // echo $rows.['event_date'];
    // echo $rows.['event_time'];
// }

// workingarea

  

?> 