<?php
require "utils.php";
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
    <h2 class="fs-1 text-danger  fw-semibold">Log-In</h2>
    <form action="" method="">
        <label class="fs-5  fst-italic" for="email">Email:</label>
        <input class="form-control" type="email" name="email">

        <label class="fs-5  fst-italic" for="password">Password:</label>
        <input class="form-control" type="password" name="password">
        <br>
        <br>
        <input class="fs-5  fst-italic btn btn-danger" type="submit"">
    </form>
</body>
</html>