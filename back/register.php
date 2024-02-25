<?php
    $config = require "config.php";
    $userUsername = $_POST["user"];
    $userPass = $_POST["pass"];
    $userPass2 = $_POST["pass2"];

    if($userPass = $userPass2){
    
        $server = $config['server'];
        $user = $config['user'];
        $pass = $config['pass'];
        $db = $config['db'];
        
        $pepper = $config['pepper'];
        $userPassPeppered = hash_hmac("sha256", $userPass,$pepper);
        $userPassHashed = password_hash($userPassPeppered,PASSWORD_ARGON2ID);


        $sql = "INSERT INTO USERS (USER, PASS) VALUES('" . $userUsername . "', '" . $userPassHashed. "')  ";
        try{    
            $conn = new mysqli($server, $user, $pass, $db);
            if($conn->connect_errno){
                echo "Failed". $conn->connect_error;
            }else{
                if($conn->query($sql)){
                    echo '<script language="javascript">';
                    echo 'alert("Registrado com sucesso!")';
                    echo '</script>';
                }
            }
            
            $conn->close();
        }catch(mysqli_sql_exception $e){
            echo "". $e->getMessage();
        }
    }