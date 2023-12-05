<?php
session_start();

if (!isset($_SESSION['name'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['user_id'];
    $credit = isset($_POST['credit']) ? floatval($_POST['credit']) : 0;
    $debit = isset($_POST['debit']) ? floatval($_POST['debit']) : 0;

    // Connect to the database
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sbi";

    $conn = mysqli_connect($host, $username, $password, $dbname);

    // Update credit and debit for the user
    $updateQuery = "UPDATE user SET credit = credit + ?, debit = debit + ? WHERE user_id = ?";
    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param("ddi", $credit, $debit, $user_id);

    if ($stmt->execute()) {
        // Update balance
        $updateBalanceQuery = "UPDATE user SET balance = credit - debit WHERE user_id = ?";
        $stmt = $conn->prepare($updateBalanceQuery);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();

        header('Location: trans.php'); // Redirect to the transactions page after updating.
    } else {
        echo "Error updating transaction.";
    }
}

?>
