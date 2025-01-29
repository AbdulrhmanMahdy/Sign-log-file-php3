<?php
require "inc/utils.php";
require "inc/helper.php";
$errorMailAndPasswd=validatePostedData($_POST);
$usersPasswdAndEmail=[];
foreach(readData('users.txt') as $index => $user){
$usersPasswdAndEmail[$index]=[$user[1],$user[2]];
}

if($errorMailAndPasswd["errors"]){
$url="Location: logIn.php";
$url=$url."?errors=".json_encode($errorMailAndPasswd["errors"])."&old=".json_encode($errorMailAndPasswd["old"]["email"]);
header($url);
}else{
    $validMail=validateOnMail($_POST['email']);
    // var_dump($validMail);
    // var_dump($_POST['email']);
        if ($validMail==$_POST['email']){
        foreach($usersPasswdAndEmail as $index => $userPasswdAndEmail ){
            $userEmail=$userPasswdAndEmail[0];
            $userPassword=$userPasswdAndEmail[1];
                  if ( ($_POST["email"]==$userEmail) and ($_POST["password"]==$userPassword)){
                $url="Location: welcome.php?email=";
                $url=$url.$userEmail;
                break;
            }
            else{
                $url="Location: logIn.php";
                $url=$url."?email=Logging Data Is Not Correct";
            }
        }
        header($url);
    }else{
        $url="Location: logIn.php";
        $url=$url."?email= please enter right email";
        header($url);
        }}
?>