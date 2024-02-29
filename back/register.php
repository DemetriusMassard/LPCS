<?php
    $config = require "config.php";
    $userUsername = strtoupper(htmlspecialchars($_POST["user"],FILTER_FLAG_ENCODE_AMP));
    $userPass = htmlspecialchars($_POST["pass"],FILTER_FLAG_ENCODE_AMP);
    $userPass2 = htmlspecialchars($_POST["pass2"],FILTER_FLAG_ENCODE_AMP);

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
            if($conn->query($sql)){

                $sql = "INSERT INTO PATHS (prevID, name) VALUES(1, '" . $userUsername . "')  ";
            
                if($conn->query($sql)){
                    echo '<script language="javascript">';
                    echo 'alert("Registrado com sucesso!")';
                    echo '</script>';
                }
            }
            $conn->close();
        }catch(mysqli_sql_exception $e){
            echo "Error code: ". $e->getCode() . "<br>";
            echo "Error message: ". $e->getMessage();
            
        }
    }