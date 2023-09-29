<?php
@include '../database/db.php';

if (isset($_GET['city_ID'])) {
    $city_ID = $_GET['city_ID'];
    
    $results = mysqli_query($conn, "SELECT `suburb_ID`, `suburb_name` FROM `suburb` WHERE `city_ID` = '$city_ID'");
    
    $suburbs = array();
    while ($kind = mysqli_fetch_array($results)) {
        $suburbs[] = array(
            "suburb_ID" => $kind['suburb_ID'],
            "suburb_name" => $kind['suburb_name']
        );
    }
    
    header('Content-Type: application/json');
    echo json_encode($suburbs);
}
?>
