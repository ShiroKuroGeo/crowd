<?php
    session_start();
    require("../Backend/User.php");

    $method = $_POST['METHOD'];
    if(function_exists($method)){
        call_user_func($method);
    }else{
        echo "Function not Exist";
    }

    function login(){
        $back = new User();
        echo $back->doLogin($_POST['Username'], $_POST['Password']);
    }

    function register(){
        $back = new User();

        $location = $_SERVER['DOCUMENT_ROOT'] . "/Crowd/Assets/Img/";
        $gcashCode = '';
        if(isset($_FILES['gcashqrcode']['name'])){
            
            $finalfile = $location . $_FILES["gcashqrcode"]['name'];
            if(move_uploaded_file($_FILES['gcashqrcode']['tmp_name'],$finalfile))
            {
                $gcashCode = $_FILES["gcashqrcode"]['name'];
            }
    
        }

        echo $back->doRegister($gcashCode, $_POST['name'],$_POST['email'],$_POST['password'],$_POST['confirm'],$_POST['country']);
    }

?>