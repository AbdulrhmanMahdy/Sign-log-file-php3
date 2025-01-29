<?php
function validatePostedData($postValues) {
    $errors = [];
    $old = [];

    foreach ($postValues as $key => $value) {
        if (! $value) {
            $errors[$key] = "Please Enter {$key} It's Mandatory";
        } else {
            $old[$key] = $value;
        }
    }

    return [
            "errors" => $errors ,
            "old" => $old
            ];

   
}
function validateOnfile($file,$fileExtainsion,$size){
$fileSize=(int)$file['size'];
$fileExt = explode(".", $file['name']); // Split filename by "."
$fileExt=strtolower(end($fileExt));

$errors=[];
    if ($fileSize > $size)
    {        
        $errors["size"]=" Size = $size is to big ";
    }
    if (!in_array($fileExt,$fileExtainsion))
    {
        $errors["fileExt"]=" Extantion  is not Allowed ";
    }
    return $errors;
}
function write2file($file,$data) {
    $fileHandle=fopen($file,'a');
    if ($fileHandle) {
        fwrite($fileHandle, $data);
        fclose($fileHandle);
    }
        
}

function validateOnMail($mail)
{

    return filter_var($mail,FILTER_VALIDATE_EMAIL);


}

?>