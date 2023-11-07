<?php
include('vendor/inc/config.php');

// Query to fetch location names from your database
$query = "SELECT DISTINCT v_location FROM tms_vehicle";
$result = $mysqli->query($query);

$locations = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $locations[] = $row['v_location'];
    }
}

// Send location names as JSON response
echo json_encode($locations);

$mysqli->close();
?>
