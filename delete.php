<?php
    session_start();

if (!isset($_SESSION['name'])) 
{
header('Location: login_val.php');
}

include_once 'db.php';
$id = $_GET['user_id'];

$delete_query = "DELETE FROM user where user_id='$id'";

 $output = $conn->query($delete_query);
 header('Location: trans.php');


    
       
    
?>
