<?php
    session_start();
    if (!isset($_SESSION['name'])) 
    {
        header('Location: user_login.php');
    }
 
    $state = "SELECT * from user WHERE user_id ";
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank Customer Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="shortcut icon" href="img/dsb.png" type="image/x-icon">
</head>
<body>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-3 mt-3 shadow">
            <!-- Sidebar -->
            <div style="border-radius: 20px;" class=" shadow bg-dark p-3 mt-4 border-white">
                <h4 class="text-white text-center"><a class="text-decoration-none text-white" href="index.php">SBI</a></h4>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active text-white" href="#">Account Summary</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  text-white  mb-3" href="money.php">
                                <i class="fa fa-hourglass-half text-success shadow" aria-hidden="true"></i> &nbsp;&nbsp;&nbsp; Money Transfer
                            </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  text-white  mb-3" href="#">
                                <i class="fa fa-random text-warning shadow" aria-hidden="true"></i> &nbsp;&nbsp;&nbsp; Transaction History
                            </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white mb-3" href="user_login.php">
                                <i style="color:#ff0000" class="fa fa-sign-out " aria-hidden="true"></i> &nbsp;&nbsp;&nbsp; Logout
                            </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-9">
           
            <div class="card shadow b border-white">
                <div class="card-body shadow">

                    <h3 style="font-family: serif;">Account Summary</h3>
                     
                    <h6 class="" style="font-family: serif;" class=""><b class="text-success">AC Holder's Name:</b> <span class="h5 "><?php echo $_SESSION['name'];?></span>
                    </h6>
                    <h6 class="" style="font-family: serif;" class=""><b class="text-success">E-mail :</b> <span class="h5"><?php echo $_SESSION['email'];?></span>
                    </h6>
               
                    <h6 class="" style="font-family: serif;" class=""><b class="text-success">Account Number :</b>&nbsp;<span class="h5"><?php echo $_SESSION['accountnumber'];?></span></h6>
                    
                    
            </div>

            <div class="card mt-4 border-white">
                <div class="card-body">
                    <h3 style="font-family:fantasy;" class="text-info"><u>Transaction History</u></h3>

                        <?php
                    $host = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "sbi";

                    $conn = mysqli_connect($host,$username,$password,$dbname);

                    $statement = "SELECT * from transactions";
                    $result = $conn->query($statement);


                ?>
                   
                    <table class="table table-striped table-hover ">
                        <thead>
                            <tr>
                                 
                                <th>Date</th>
                                <th>Type</th>
                                <th>Amount</th>
                                <th>Balance</th>
                                <th>Status</th>
                            </tr>
                            <tr>
                                <?php while ($row = $result->fetch_assoc()) {

                    ?>
                                <td><?php echo $row['Date'];?></td>
                                <td><?php echo $row['Description']?></td>
                                <td><?php echo $row['Amount']?></td>
                                <td><?php echo $row['balance'];?></td>
                                <td><?php echo $row['status'];?></td>
                            </tr>
                        </thead>
                        <?php
                }       

                ?>
                        <tbody id="transaction-history">
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


</body>
</html>
