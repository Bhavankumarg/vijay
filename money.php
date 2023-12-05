     <?php
                        $host = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "sbi";
                        session_start();

                        $conn = mysqli_connect($host,$username,$password,$dbname);

                        $statement = "SELECT * from user";
                        $result = $conn->query($statement);


                    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link rel="shortcut icon" href="img/transfer.png" type="image/x-icon">
        <title>Money Transfer</title>
    </head>
    <body>
        <?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "sbi";


$conn = mysqli_connect($host, $username, $password, $dbname);

$statement = "SELECT * from user";
$result = $conn->query($statement);

if (isset($_POST['submit'])) {
    $senderName = $_SESSION['name'];
    $receiver = $_POST['receiver'];
    $recipient = $_POST['recipient'];
    $acnumber = $_POST['acnumber'];
    $amount = $_POST['amount'];

   
    $senderName = $_SESSION['name'];
    $getSenderIDQuery = "SELECT user_id FROM user WHERE name = '$senderName'";
    $senderResult = $conn->query($getSenderIDQuery);

    if ($senderResult && $senderResult->num_rows > 0) {
        $row = $senderResult->fetch_assoc();
        $senderID = $row['user_id'];

        
        $getSenderBalanceQuery = "SELECT balance FROM user WHERE user_id = $senderID";
        $senderBalanceResult = $conn->query($getSenderBalanceQuery);

        if ($senderBalanceResult && $senderBalanceResult->num_rows > 0) {
            $row = $senderBalanceResult->fetch_assoc();
            $senderBalance = $row['balance'];

           
            if ($amount > $senderBalance) {
                echo "Insufficient balance.";
            } else {
               
                $newSenderBalance = $senderBalance - $amount;

                
                $updateSenderBalanceQuery = "UPDATE user SET balance = $newSenderBalance WHERE user_id = $senderID";
                $resultSenderUpdate = $conn->query($updateSenderBalanceQuery);

                
                $getReceiverBalanceQuery = "SELECT balance FROM user WHERE ac_number = '$acnumber'";
                $receiverBalanceResult = $conn->query($getReceiverBalanceQuery);

                if ($receiverBalanceResult && $receiverBalanceResult->num_rows > 0) {
                    $row = $receiverBalanceResult->fetch_assoc();
                    $receiverBalance = $row['balance'];

                    
                    $newReceiverBalance = $receiverBalance + $amount;

                    
                    $updateReceiverBalanceQuery = "UPDATE user SET balance = $newReceiverBalance WHERE ac_number = '$acnumber'";
                    $resultReceiverUpdate = $conn->query($updateReceiverBalanceQuery);

                    if ($resultSenderUpdate && $resultReceiverUpdate) {
                       
                        header("Location: transfer_result.php?success=1");
                        exit;
                    } else {
                        echo "Error updating balances.";
                    }
                } else {
                    echo "Receiver not found.";
                }
            }
        } else {
            echo "Error getting sender's balance.";
        }
    } else {
        echo "Sender not found.";
    }
}
?>
<!-- Rest of your HTML code -->




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
                            <a class="nav-link  text-white  mb-3" href="uesr_dash.php">
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
               
                <div style="border-radius:20px" class="card shadow bg-secondary border-light">
                    <div class="card-body shadow ">

                        <h3 style="font-family: serif;"><i class="fa fa-hourglass-half text-success" aria-hidden="true"></i> &nbsp; Money Transfer</h3>
                        
                </div>
                <div class="container text-white">
            
            <form action="" method="post">
                <div class="form-group">
                    <label for="sender">Sender:</label>
                    <input type="text" class="form-control" id="sender" value="<?php echo $_SESSION['name'];?>" name="sender" required>
                </div>
                 <div class="form-group">
                    <label for="receiver">Select a User:</label>
                    <select class="form-control"id="receiver" name="receiver">
                                    <?php while ($row = $result->fetch_assoc()) {

                                ?>
                                  <option><?php echo $row['name'];?> <?php echo $row['ac_number'];?></option>
                                   <?php
                                }       

                                ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="recipient">Recipient:</label>
                    <input type="text" class="form-control" id="recipient" name="recipient" required>
                </div>
                <div class="form-group">
                    <label for="recipient">Account Number:</label>
                    <input type="text" class="form-control" id="acnumber" name="acnumber" required>
                </div>
                <div class="form-group">
                    <label for="amount">Amount:</label>
                    <input type="number" class="form-control" id="amount" name="amount" required>
                </div>
                <button type="submit" name="submit" class="btn btn-outline-success mb-3">Transfer</button>
            </form>
        </div>

                
            </div>
        </div>
            </div>
        </div>
    </div>
        
    </body>
    </html>
