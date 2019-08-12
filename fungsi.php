<?php 
define("ROOT", __DIR__);

class allFunction{

    function randomString($length = 7) {
        $str = "";
        $characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
        $max = count($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $rand = mt_rand(0, $max);
            $str .= $characters[$rand];
        }
        return $str;
    }

    function generateRandomString($length = 10) {

        return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);

    }

    function uploadImage($files,$fileName){

        $currentDir = ROOT;

        $uploadDirectory = "\our_images\\";

        $errors = []; // Store all foreseen and unforseen errors here

        $fileExtensions = ['jpeg','jpg','png','gif']; // Get all the file extensions
        
        $fileSize = $files['size'];
        $fileTmpName  = $files['tmp_name'];
        $fileType = $files['type'];
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        $uploadPath = $currentDir . $uploadDirectory . basename($fileName); 
        
        if (! in_array($fileExtension,$fileExtensions)) {
            $errors[] = "This file extension is not allowed. Please upload a JPEG or PNG file";
        }

        if (($fileSize !=0) && ($fileSize > 2000000)) {
            $errors[] = "This file is more than 2MB. Sorry, it has to be less than or equal to 2MB";
        }

        if (empty($errors)) {
            $didUpload = move_uploaded_file($fileTmpName, $uploadPath);
            
            if ($didUpload) {
                echo "SUCCESS ! \n " . basename($fileName) . " has been uploaded";
            } else {
                echo "An error occurred somewhere. Try again or contact the admin";
            }
        } else {
            foreach ($errors as $error) {
                echo $error . "These are the errors" . "\n";
            }
        }
    }

    function deleteImage($fileName){
        $d = ROOT.'\our_images\\'.$fileName;
        @unlink ("$d");
    }


}


?>