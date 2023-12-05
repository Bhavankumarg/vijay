
<?php
if (isset($_POST['submit'])) 
{
   
    if ($amount > $senderBalance) 
    {
        echo "Insufficient balance.";
    } 
    else 
    {
        $newSenderBalance = $senderBalance - $amount;
        
        
        $updateSenderBalanceQuery = "UPDATE user SET balance = $newSenderBalance WHERE name = '$sender'";
        $resultSenderUpdate = $conn->query($updateSenderBalanceQuery);
        
       
        $receiverBalance = 0; 
        
        
        $newReceiverBalance = $receiverBalance + $amount;
        
       
        $updateReceiverBalanceQuery = "UPDATE user SET balance = $newReceiverBalance WHERE ac_number = '$acnumber'";
        $resultReceiverUpdate = $conn->query($updateReceiverBalanceQuery);
        
        if ($resultSenderUpdate && $resultReceiverUpdate) 
        {
            echo "Transfer successful!";
        } 

        else 
        {
            echo "Error updating balances.";
        }
    }
}
?>
