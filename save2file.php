<?php
require"utils.php";
require"helper.php";
$url='Location: addUser.php';
$postErrorsOld=validatePostedData($_POST);
$img=$_FILES['image'];
$file_errors=validateOnfile($img,["png","jpg","jpeg"],2000000);
if(!$postErrorsOld["errors"])
{
            $email = $_POST['email'];
            $name = $_POST['name'];
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirmPassword'];
            $room = $_POST['room'];
            $data = "{$name}:{$email}:{$password}:{$confirmPassword}:{$room}\n";
            $emailCheck=validateOnMail($email);
            if($emailCheck==$email)
            {
                if ($password==$confirmPassword)
                {
                
                    write2file('users.txt',$data);


                    if(!$file_errors)
                    {
                        move_uploaded_file($img['tmp_name'], "image/" . $img['name']);
                        header("Location: logIn.php");                  
                    }
                    

                }
                else 
                {

                    $url=$url."?passwd= Password Dosn't Match";
                    header($url);

                }
            }
            else
            {
                $url=$url."?email= please enter right email";
                header($url);

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