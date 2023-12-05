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

       $store = "SELECT *  FROM admin WHERE name ='$username' AND password='$password'";
       $output = $conn->query($store);
       $rows = mysqli_num_rows($output);

       if ($rows == 1) 
       {
         $row = $output->fetch_assoc();
         $_SESSION['name'] = $row['name'];
         $_SESSION['email'] = $row['email'];
         $_SESSION['user_id'] = $row['user_id'];
         $_SESSION['password'] = $row['password'];
        

         header('Location:admin.php');
         die();
       }
       else
       {
        echo "<div class='form text-center'><h3>Incorrect username/password</h3>
        <p class='link'>Click here to <a href='login.php'>Login</a></p>
        </div>";
        
       }
    }

?>