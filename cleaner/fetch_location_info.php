<?php
include('vendor/inc/config.php');

// Check if a location is selected in the POST data
if(isset($_POST['location'])){
    $selectedLocation = $_POST['location'];
    
    // Query to fetch name and phone number based on the selected location
    $query = "SELECT v_pic, v_phonenum FROM tms_vehicle WHERE v_location = ?";
    
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('s', $selectedLocation);
    $stmt->execute();
    $stmt->bind_result($name, $phone);
    
    $data = array();
    
    // Fetch the result
    if ($stmt->fetch()) {
        $data['name'] = $name;
        $data['phone'] = $phone;
    }
    
    // Close the statement
    $stmt->close();
    
    // Send the data as JSON response
    echo json_encode($data);
} else {
    // Return an empty response if no location is selected
    echo json_encode(array());
}

$mysqli->close();
?>
