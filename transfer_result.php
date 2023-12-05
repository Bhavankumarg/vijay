<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Money Transfer Result</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <?php
                if (isset($_GET['success']) && $_GET['success'] == 1) {
                    echo "<h2>Transfer successful!</h2>";
                } else {
                    echo "<div><h2>Transfer failed.</h2><?div>";
                }
                ?>
                <a href="money.php" class="btn btn-outline-success">Go back</a>
            </div>
        </div>
    </div>
</body>
</html>
