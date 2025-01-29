<?php
require "inc/utils.php";
require "inc/helper.php";




if (isset($_GET['errors'])) {
    $errors = json_decode($_GET['errors'],true);
}
if (isset($_GET['old'])) {
    $old = json_decode($_GET['old'],true);
}

if (isset($_GET['email'])) {
    $email = $_GET['email'];
}




?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log-In</title>
    <style>
    * {
        margin-top: 15px;
    }
    </style>
</head>

<body>
    <h1 class="text-center text-black-50 fw-bold display-2">Cafeteria</h1>

    <h2 class="fs-4 text-danger  fw-semibold">Log-In</h2>

    <form action="loggingProcess.php" method="post">
        <label class="fs-5   fst-italic" for="email">Email:</label>
        <input class="form-control" value="<?php echo $old ?? '' ?>" type="text" name="email">
        <p class="text-danger"> <?php echo $errors['email'] ?? '' ?> </p>
        <p class="text-danger"> <?php echo $email ?? '' ?> </p>

        <label class="fs-5  fst-italic" for="password">Password:</label>
        <input class="form-control" type="password" name="password">
        <p class="text-danger"> <?php echo $errors['password'] ?? '' ?> </p>

        <br>
        <br>
        <input class="fs-5  fst-italic btn btn-danger" type="submit"">
    </form>
</body>
</html>