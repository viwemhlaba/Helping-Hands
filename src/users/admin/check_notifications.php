<?php
// Include your database connection here
include('../../database/db.php');
// Query for new user (unread)
$sql = "SELECT * FROM user WHERE read_status = 0 && user_type = 'P' ORDER BY created_at DESC";
$result = mysqli_query($conn, $sql);

$notifications = [];

while ($row = mysqli_fetch_assoc($result)) {
    $notifications[] = $row;
}

// Mark retrieved notifications as read
$updateSql = "UPDATE user SET read_status = 1 WHERE read_status = 0 && user_type = 'P'";
mysqli_query($conn, $updateSql);

// Return JSON response
header('Content-Type: application/json');
echo json_encode($notifications);
?>
