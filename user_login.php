 <?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sbi";

    $conn = mysqli_connect($host,$username,$password,$dbname);

    session_start();
    if (isset($_POST['username'])) 
    {
       $username = stripslashes($_REQUEST['username']);
       $username = mysqli_real_escape_string($conn, $username);
       $password = stripslashes($_REQUEST['password']);
       $password = mysqli_real_escape_string($conn, $password);

       $store = "SELECT *  FROM user WHERE name ='$username' AND password='$password'";
       $output = $conn->query($store);
       $rows = mysqli_num_rows($output);

       if ($rows == 1) 
       {
         $row = $output->fetch_assoc();
         $_SESSION['name'] = $row['name'];
         $_SESSION['email'] = $row['email'];
         $_SESSION['accountnumber'] = $row['ac_number'];
         $_SESSION['user_id'] = $row['user_id'];
         $_SESSION['password'] = $row['password'];
         echo"test";

         header('Location: uesr_dash.php');
         die();
       }
       else
       {
        echo "<div class='form text-center'><h3>Incorrect username/password</h3>
        <p class='link'>Click here to <a href='user_login.php'>Login</a></p>
        </div>";
        
       }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.19.0/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="shortcut icon" href="img/log.png" type="image/x-icon">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>User Login</title>
</head>
<body>
   
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card mt-5">
                    <div class="card-body shadow">
                        <h3 style="font-family: serif;" class="card-title text-center"><i class="fa fa-user text-primary "></i>&nbsp; User</h3>
                        <form action=""  method="POST">
                            <div class="mb-3 input-group">
                                <span class="input-group-text"><i class="fa fa-user text-success"></i></span>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                            </div>
                            <div class="mb-3 input-group">
                                <span class="input-group-text"><i class="fa fa-lock text-warning"></i></span>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
