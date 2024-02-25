<?php
    $config = require "config.php";
    $userUsername = $_POST["user"];
    $userPass = $_POST["pass"];
    $userPass2 = $_POST["pass2"];

    /*foreach($config as &$parameter){
            echo $parameter . "<br>";
    }*/
    if($userPass = $userPass2){
    
                
        $server = "127.0.0.1";
        $user = "LPCS";
        $pass = "M.[t_C5y8h8F(_Yv";
        $db = "LPCS";
        $sql = "select user from users";
            
        $conn = new mysqli($server, $user, $pass, $db);
        echo "1";
        if($conn->connect_errno){
            echo "Failed". $conn->connect_error;

            echo "2";
        }elseif($result = $conn->query($sql)){
            foreach($result as $row){
                echo $row;
            }
        }
        $conn->close();
    }