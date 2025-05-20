<?php
// require_once '../classess/.php';
require_once '../classess/database.php';
 
$con = new database();
 
if (isset($_POST['email'])) {
    $email = $_POST['email'];
   
    if ($con->isEmailExists($email)) {
        echo json_encode(['exists' => true]);
    } else {
        echo json_encode(['exists' => false]);
    }
 
 
} else {
    echo json_encode(['error' => 'Invalid request']);
}
 
?>