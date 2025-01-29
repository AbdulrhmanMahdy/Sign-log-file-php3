<?php
// Start session (optional, if you plan to use sessions)
require "inc/utils.php";
// Get email from POST request
$email = isset($_GET['old']) ? json_decode($_GET['old'], true):'';


if (isset($_GET['email'])) {
    $email = $_GET['email'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>

<body class="d-flex align-items-center justify-content-center vh-100 bg-light">
    <div class="text-center">
        <h1 class="text-black-50 display-3 fw-bold">Welcome!</h1>

        <img src='../php_lab3/image/<?php echo $email.".png" ?>' width='100'>

        <h2 class="text-dark fw-semibold">Hello, <?php echo $email; ?></h2>
        <a href="logIn.php" class="btn btn-danger mt-3">Log Out</a>
    </div>
</body>

</html>