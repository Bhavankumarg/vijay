<?php

   
    $host = "localhost";
    $usernmae = "root";
    $password = "";
    $dbname = "sbi";
    
    $conn = new mysqli($host, $usernmae, $password, $dbname);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $id = $_SESSION['user_id'];
    $statement = "SELECT * from user WHERE user_id ='$id'";
    $output = $conn->query($statement);
    $row = $output->fetch_assoc();

    if(isset($_POST['submit']))
    {
        $name = $_POST['username'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $deposit = $_POST['deposit'];

$sql = "update user set username = '$name',email = '$email',
            mobile = '$mobile'
            where user_id = '$id'";
    
    if ($conn->query($sql) === TRUE) {
        
        $update_query = "update user set 
                balance = balance + $deposit
                WHERE user_id = '$id'";
        
        if ($conn->query($sql) === TRUE) {
            echo "Profile updated successfully. Balance updated.";
        } else {
            echo "Error updating balance: " . $conn->error;
        }
    } else {
        echo "Error updating profile: " . $conn->error;
    }
    
    $conn->close();
}
    
    
?>
