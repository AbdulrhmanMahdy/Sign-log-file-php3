<?php
require"inc/utils.php";
require"inc/helper.php";
$url='Location: addUser.php';
$postErrorsOld=validatePostedData($_POST);
$img=$_FILES['image'];
$file_errors=validateOnfile($img,["png"],2000000);
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
                


                    if(!$file_errors)
                    { 
                        global   $fileExt;
                           $fileExt = explode(".", $img['name']);
                       $fileExt=strtolower(end($fileExt));
                        move_uploaded_file($img['tmp_name'], "image/" . $email.'.'.$fileExt);
                        write2file('users.txt',$data);
                        header("Location: logIn.php");                  
                    }
                    else
                    {
                        header("Location: addUser.php");                  

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