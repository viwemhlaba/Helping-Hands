<?php
header("Content-Type: application/json");

// Check if suburb_ID is set
if (!isset($_POST['suburb_ID'])) {
    echo json_encode(array("error" => "suburb_ID is not set in POST data"));
    exit;
}

$suburb_ID = $_POST['suburb_ID'];

@include '../database/db.php';
include("../includes/header.php");
include("../includes/sidebar.php");

// Fetch nurse data based on suburb_ID and populate $nurseData array
$nurseData = array();
$query = "SELECT np.nurse_ID, np.first_name AS nurse_first_name, np.last_name AS nurse_last_name, np.nurse_code, np.gender, np.dob, u.email_address, u.contact_no
          FROM nurse_profile np
          JOIN user u ON np.user_ID = u.user_ID
          WHERE np.suburb_ID = $suburb_ID
          ORDER BY np.last_name ASC";
$result = mysqli_query($conn, $query);

if ($result) {
    while ($data = mysqli_fetch_assoc($result)) {
        $nurseData[] = $data;
    }
} else {
    // Handle error
    $nurseData = array("error" => "Error fetching nurse data");
}

// Send JSON response
echo json_encode($nurseData);
?>
