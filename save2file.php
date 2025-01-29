<?php
require"utils.php";
require"helper.php";
$url='Location: addUser.php';
$postErrorsOld=validatePostedData($_POST);
print_r($postErrorsOld);
if(!$postErrorsOld["errors"])
{
            $email = $_POST['email'];
            $name = $_POST['name'];
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirmPassword'];
            $room = $_POST['room'];
            $data = "{$name}:{$email}:{$password}:{$confirmPassword}:{$room}\n";

            if ($password!=$confirmPassword)
            {
                

                $url=$url."?passwd= Password Dosn't Match";
                header($url);

            }
            else 
            {
                write2file('users.txt',$data);
                header("Location: logIn.php");

            }

}
else
{
    $url=$url.'?errors='.json_encode( $postErrorsOld['errors']);
    if ($postErrorsOld['old'])
    {
        $url=$url.'&old='.json_encode( $postErrorsOld['old']);
    }
    header($url);

}

?>