
<?php
    session_start();
    if (!isset($_SESSION['name'])) 
    {
        header('Location: login.php');
    }
?><!DOCTYPE html>
<html>
<head>
    <title>Transactions</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js"></script>
    <link rel="shortcut icon" href="img/Transaction.png" type="image/x-icon">
    <style>
        <style>
    .legend {
      font-size: 14px;
      color: blue; 
    }
    
    .circleli {
      display: inline-block;
      width: 10px; 
      height: 11px; 
      background-color: darkred; 
      border-radius: 50%; 
      margin-right: 5px; 
    }
    .circleleo {
      display: inline-block;
      width: 10px; 
      height: 11px; 
      background-color: darkgreen; 
      border-radius: 50%; 
      margin-right: 5px; 
    }
  </style>
    </style>
    
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
          <nav style="height: 600px;" id="sidebar" class="col-md-3 col-sm-3 bg-light rounded-pill mx-5  col-lg-2 d-md-block shadow sidebar">
                <div class="position-sticky   mt-5">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link mb-3  text-secondary" href="admin.php">
                                <i style="color: #eeff00" class="fa fa-tachometer" aria-hidden="true"></i> &nbsp;&nbsp;&nbsp; Dashboard 
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  text-dark  mb-3" href="#">
                                <i class="fa fa-exchange text-warning shadow" aria-hidden="true"></i> &nbsp;&nbsp;&nbsp; Transactions 
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-secondary mb-3" href="#">
                                <i class="fa fa-cog text-danger " aria-hidden="true"></i> &nbsp;&nbsp;&nbsp; Settings
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-secondary mb-3" href="#">
                                <i style="color: #8f0d41" class="fa fa-tasks " aria-hidden="true"></i> &nbsp;&nbsp;&nbsp; User Profile
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-secondary mb-3" href="#">
                                <i style="color:#e04216;" class="fa fa-map-marker " aria-hidden="true"></i> &nbsp;&nbsp;&nbsp;&nbsp;   Maps
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-secondary mb-3" href="#">
                                    <i style="color:#a34854" class="fa fa-address-card " aria-hidden="true"></i> &nbsp;&nbsp;&nbsp; Authentication
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-secondary mb-3" href="login.php">
                                <i style="color:#ff0000" class="fa fa-sign-out " aria-hidden="true"></i> &nbsp;&nbsp;&nbsp; Logout
                            </a>
                        </li>
                        
                    </ul>
                </div>
            </nav>
            
            <!-- Main content -->

            <main style="border-radius: 20px; height: 100%;" class="col-md-4 mx-1 ms-sm-auto col-sm-9 col-lg-9 bg-light  mt-4  px-md-4 shadow">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 style="font-family: serif;" class="h2"><img style="width: 100px;" src="img/admin.png"> &nbsp; Admin (MANAGER)</h1>
                </div>
                <div class="row">
                    <div class="col-1">
                    <a href="#"><i class="fa fa-bell bg-white rounded-circle h4 mx-5 text-warning shadow" aria-hidden="true"></i></a>
                </div>
                <div class="col-1">
                        <a href="#"><i class="fa fa-envelope h4 bg-white rounded-circle mx-5 text-warning shadow" aria-hidden="true"></i></a>

                </div>
                <div class="col-1">
                    <a href="#"><i class="fa fa-university bg-white rounded-circle mx-5 shadow h4 text-warning" aria-hidden="true"></i></a>
                </div>
                <div class="col-1">
                    <a href="#"><i class="fa fa-cogs bg-white text-warning h4 mx-5 rounded-circle" aria-hidden="true"></i>
                </div></a>
                <div class="col-1">
                    <a href="#"><i class="fa fa-pie-chart mx-5 bg-white rounded-circle text-warning h4 shadow" aria-hidden="true"></i></a>

                </div>
                <div class="main-search-input-wrap col justify-content-end d-flex">
                <div class="main-search-input fl-wrap ">
                 <div class="main-search-input-item">
                 <input type="text"  class="btn border-warning"  placeholder="Search...">
                 <button class="main-search-button btn btn-outline-warning">Search</button>
                </div>
                </div> 
            </div>

                
                <div class="mt-4">
                    <h3 style="font-family:fantasy;">Transactions</h3>
                </div>
               
               <?php
                    $host = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "sbi";

                    $conn = mysqli_connect($host,$username,$password,$dbname);

                    $statement = "SELECT * from user";
                    $result = $conn->query($statement);


                ?>
 
    <div style="border-radius:15px" class="container shadow border-white table-responsive small text-center">
        <h1 class="mt-4"><img style="width:100px; margin-top: -10px;" src="img/logo.png"></h1>
        <table class="table table-bordered shadow table-striped table-hover">
            <thead class=" table-dark">
                <tr>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Account Number</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Credit</th>
                    <th>Dedit</th>
                    <th>Balance</th>
                    <th class="text-center" colspan="2">Action</th>
                    
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php while ($row = $result->fetch_assoc()) {

                    ?>
                    <td><?php echo $row['user_id'];?></td>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['ac_number'];?></td>
                    <td><?php echo $row['email']?></td>
                    <td><?php echo $row['mobile'];?></td>
                    <td>

                        <form method="POST" action="update_transaction.php">
                            <input type="" name="user_id" value="<?php echo $row['user_id']; ?>">
                            <div class="input-group">
                                <input type="number" name="credit" class="form-control" placeholder="Add Credit">
                                <div class="input-group-append">
                                    <button type="submit" name="add_credit" class="btn btn-outline-success">Add</button>
                                </div>
                            </div>
                        </form>
                    </td>
                    <td>
                        <form method="POST" action="update_transaction.php">
                            <input type="user" name="user_id" value="<?php echo $row['user_id']; ?>">
                            <div class="input-group">
                                <input type="number" name="debit" class="form-control" placeholder="Add Debit">
                                <div class="input-group-append">
                                    <button type="submit" name="add_debit" class="btn btn-outline-danger">W/D</button>
                                </div>
                            </div>
                        </form>
                    </td>
  
                   
                    <td>₹<?php echo $row['balance'];?>.00</td>
                    <td><a class="text-decoration-none btn btn-outline-success" href="update.php?id=<?php echo $row['user_id'];?>">Update</a></td>
                    

                </tr>
                <?php
                }       

                ?>
                
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
      
                
            </main>
        </div>
    </div>

</main>
</div>
</div>
</body>
</html>

   

