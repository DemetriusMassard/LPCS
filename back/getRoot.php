<?php
    $sql = "select * from paths where prevID = 1 AND name = '" . $_SESSION["user"] . "'";

    try{    
        $conn = new mysqli($server, $user, $pass, $db);
        $result = $conn->query($sql);
        if($result->num_rows == 1){
            while ($row = $result->fetch_assoc()){
                $_SESSION['rootFolder'] = $row['ID'];
                $_SESSION['folder'] = $row['ID'];
                echo '<script language="javascript">';
                echo 'alert("'.$_SESSION['folder'].'")';
                echo '</script>';
            }
        }
        $conn->close();
    }catch(mysqli_sql_exception $e){
        echo "Error code: ". $e->getCode() . "<br>";
        echo "Error message: ". $e->getMessage();
        
    }