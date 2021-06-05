<?php
include('config.php');
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

// Gets data from URL parameters.

$pid = $_POST['pid'];
$name = $_POST['name'];
$add = $_POST['add'];
$lat = $_POST['lat'];
$lng = $_POST['lng'];
$aid = $_POST['aid'];

// Inserts new row with place data.
$query = "INSERT INTO patients (patients_id,name,lat,lng,a_id,patients_add)
VALUES ($pid,'$name',$lat,$lng,$aid,'$add')";


if (mysqli_query($db, $query)) {
    echo "New patient record created successfully";
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($db);
}

/*
$result = mysqli_query($db,$query);

if (!$result) {

  die('Invalid query: ' . mysqli_error());
}
 */

?>
