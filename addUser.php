<?php
require "utils.php";

if (isset($_GET['errors'])) {
    $errors = json_decode($_GET['errors'],true);
}
if (isset($_GET['old'])) {
    $old = json_decode($_GET['old'],true);
}

if (isset($_GET['passwd'])) {
    $passwd = $_GET['passwd'];
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
    <title>Add User</title>
    <style>
    * {
        margin-top: 10px;
    }
    </style>
</head>


<body>
    <h2 class="text-danger">Add User</h2>
    <form action="save2file.php" method="post" enctype="multipart/form-data">
        <label for="name">Name:</label>
        <input class="form-control" value="<?php echo $old['name'] ?? '' ?>" type="name" name="name">
        <p class="text-danger"> <?php echo $errors['name'] ?? '' ?> </p>

        <label for="email">Email:</label>
        <input class="form-control" value="<?php echo $old['email'] ?? '' ?>" type="text" name="email">
        <p class="text-danger"> <?php echo $errors['email'] ?? '' ?> </p>
        <p class="text-danger"> <?php echo $email ?? '' ?> </p>

        <label for="password">Password:</label>
        <input class="form-control" value="<?php echo $old['password'] ?? '' ?>" type="password" name="password">
        <p class="text-danger"> <?php echo $errors['password'] ?? '' ?> </p>

        <label for="confirm_password">Confirm Password:</label>
        <input class="form-control" value="<?php echo $old['confirmPassword'] ?? '' ?>" type="password"
            name="confirmPassword">
        <p class="text-danger"> <?php echo $errors['confirmPassword'] ?? '' ?> </p>
        <p class="text-danger"> <?php echo $passwd ?? '' ?> </p>


        <label for="room">Room Number:</label>
        <select class="" name="room">
            <option value="Application1">Application1</option>
            <option value="Application2">Application2</option>
            <option value="Cloud">Cloud</option>
        </select><br><br>

        <label for="profile_picture">Profile Picture:</label>
        <input class="form-control" type="file" name="image" accept="image/*">
        <br>
        <br>
        <button type="submit" value="Submit" class="btn btn-danger">Submit</button>
        <button type="reset" value="reset" class="btn btn-danger">Reset</button>

    </form>
</body>

</html>