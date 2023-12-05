<?php
session_start();
if (!isset($_SESSION['name'])) {
header('Location: login.php');
}
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sbi";


    $conn = mysqli_connect($host, $username, $password, $dbname);
    $id = $_GET['id'];
/*    echo $id;
    exit();*/
    $statement = "SELECT * from user WHERE user_id='$id'";
    $output = $conn->query($statement);
    $row = $output->fetch_assoc();


    if (isset($_POST['submit']))
     {
        $name = $_POST['username'];
        $email = $_POST['email'];

        $update_query = "update user set name='$name', email='$email' where user_id='$id'";
        $output = $conn->query($update_query);
        if($output)
        {
            header('Location: trans.php');
        }
        else
        {
            echo "not update. please try again later.";
        }
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Updation</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Grand Hotel" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link rel="shortcut icon" href="img/update.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
   

    

<div class="container mt-5 text-center">
    <h1>Profile Update</h1>
    <div class="row justify-content-center">
    <form class="justify-content-center" method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="" id="name" name="username" value="<?php echo $row['name'] ?>" placeholder="Enter New name">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="" id="email" name="email" value="<?php echo $row['email'] ?>" placeholder="Enter New email">
        </div>
       <!--  <div class="mb-3">
            <label for="mobilenumber" class="form-label">Mobile Number</label>
            <input type="mobilenumber" class="" id="mobilenumber" name="mobilenumber" value="<?php echo $row['mobile'] ?>" placeholder="Enter New Mobile Number">
        </div> -->
        <button type="submit" name="submit" class="btn btn-primary">update</button>
    </form>
    </div>
</div>


</body>
</html>


        
            