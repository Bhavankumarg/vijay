
<?php
    session_start();
    if (!isset($_SESSION['name'])) 
    {
        header('Location: login.php');
    }
?><!DOCTYPE html>
<html>
<head>
    <title>Admin Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js"></script>
    <link rel="shortcut icon" href="img/dashboard.png" type="image/x-icon">
    <style>
        <style>
    .legend 
    {
      font-size: 14px;
      color: blue; 
    }
    
    .circleli 
    {
      display: inline-block;
      width: 10px; 
      height: 11px; 
      background-color: darkred; 
      border-radius: 50%; 
      margin-right: 5px; 
    }
    .circleleo 
    {
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
          <nav style="height:600px" id="sidebar" class="col-md-3 col-sm-3 bg-light rounded-pill mx-5  col-lg-2 d-md-block shadow sidebar">
                <div class="position-sticky   mt-5">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link  mb-3  text-dark" href="#">
                                <i style="color: #eeff00" class="fa fa-tachometer shadow" aria-hidden="true"></i> &nbsp;&nbsp;&nbsp; Dashboard 
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-secondary mb-3" href="trans.php">
                                <i class="fa fa-exchange text-warning" aria-hidden="true"></i> &nbsp;&nbsp;&nbsp; Transactions 
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-secondary mb-3" href="#">
                                <i class="fa fa-cog text-danger" aria-hidden="true"></i> &nbsp;&nbsp;&nbsp; Settings
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-secondary mb-3" href="#">
                                <i style="color: #8f0d41" class="fa fa-tasks" aria-hidden="true"></i> &nbsp;&nbsp;&nbsp; User Profile
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-secondary mb-3" href="#">
                                <i style="color:#e04216;" class="fa fa-map-marker" aria-hidden="true"></i> &nbsp;&nbsp;&nbsp;&nbsp;   Maps
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-secondary mb-3" href="#">
                                    <i style="color:#a34854" class="fa fa-address-card" aria-hidden="true"></i> &nbsp;&nbsp;&nbsp; Authentication
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-secondary mb-3" href="login.php">
                                <i style="color:#ff0000" class="fa fa-sign-out" aria-hidden="true"></i> &nbsp;&nbsp;&nbsp; Logout
                            </a>
                        </li>
                        
                    </ul>
                </div>
            </nav>
            
            <!-- Main content -->
            <main style="border-radius: 50px;" class="col-md-4 mx-1 ms-sm-auto col-sm-9 col-lg-9 bg-light  mt-4  px-md-4 shadow">
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
                    <h3>Dashboard</h3>
                </div>
                <div class="row">
                    <div style="border-radius:10px;width: 400px;" class="col-md-3 border bg-white border-white shadow mx-3">
                        <p><span class="legend"><div class="circleli"></div>OFFLINE TRANSACTIONS</span></p>
                        <h4 class="mx-3">₹2,00,000</h4>
                        <p class="text-secondary mx-2">No Additional Income</p>
                        <span><i style="margin-top: -115px; color: #07e3d8;" class="fa fa-retweet h3 float-end"></i></span>
                    </div>
                    <div style="border-radius:10px; width: 400px;" class="col-md-3 border bg-white border-white shadow mx-3">
                        <p class="text-secondary"><span class="legend"><div class="circleleo"></div>ONLILNE TRANSACTIONS</span></p>
                        <h4 class="mx-3">₹5,00,000</h4>
                        <p class="text-secondary mx-2">+ ₹65,000 bank charges fee</p>
                        <span><i style="margin-top: -115px; color: #07e3d8;" class="fa fa-credit-card-alt h3 float-end" ></i></span>
                    </div>
                    <div class="row">
                        <div style="border-radius:10px; width: 400px;" class="col-md-3 mt-4 border bg-white border-white shadow mx-3">
                        <p class="text-secondary"><span class="legend"><div class="circle"></div><i style="color:#a3ad15" class="fa fa-list-ul" aria-hidden="true"></i> TOTAL</span></p>
                        <h4 class="mx-3">₹7,00,000</h4>
                        <p class="text-secondary mx-2">This month transactions</p>
                        <span><i style="margin-top: -115px; color: #07e3d8;" class="fa fa-check h3 float-end" ></i></span>
                    </div>
                    <div style="border-radius:10px; width: 400px;" class="col-md-3 mt-4 border bg-white border-white shadow mx-3">
                        <p class="text-secondary"><span class="legend"><div class="circle"></div><i style="color:#0f7a65" class="fa fa-thumb-tack" aria-hidden="true"></i> MONTHLY TARGET</span></p>
                        <h4 class="mx-3 text-success">Average ₹3,00,000</h4>
                        <p class="text-danger mx-2">- ₹75,000 in this month</p>
                        <span><i style="margin-top: -115px; color: #f21b07;" class="fa fa-sort-amount-desc h3 float-end" ></i></span>
                    </div>
                    </div>
                </div>
                
            </main>
        </div>
    </div>


    
   
</body>
</html>
