<?php
    
    require "config.php";
    require 'verifylogin.php';
    
    if(isset($_POST["folder"])){
        $_SESSION['prevID'] = $_SESSION['currentFolder'];
        $_SESSION['currentFolder'] = $_SESSION['folders'][$_POST['folder']]['id'];

        $server = $_ENV['server'];
        $user = $_ENV['user'];
        $pass = $_ENV['pass'];
        $db = $_ENV['db'];



        $sql = "select * from paths where prevID =  " . $_SESSION['currentFolder'];
        try{    
            $conn = new mysqli($server, $user, $pass, $db);
            $folders = $conn->query($sql);
            $i = 0;
            $_SESSION['folders'] = [];
            while ($row = $folders->fetch_assoc()){
                $_SESSION["folders"][$i] = array(
                    'id' => $row["ID"],
                    'name' => $row['name']);
                $i++;
            }
        }catch(mysqli_sql_exception $e){
            echo "Error code: ". $e->getCode() . "<br>";
            echo "Error message: ". $e->getMessage();
        }
        
        $conn->close();
    }
    //Adicionar Botão de Voltar
    /**if(!$_SESSION['folder'] == $_SESSION['rootFolder']){
        echo "Volter: .. <button class='btn btn-primary' value= ". $row['prevID'] . " type='button'>O</button><br>";
    }
    */
    $i =0;
    while(!empty($_SESSION['folders'][$i])){
        echo 'Pasta: id: ' . $_SESSION['folders'][$i]['id']. ' name: '. $_SESSION['folders'][$i]['name'] . "<button class='btn btn-primary' value= ". $i . " type='button'>O</button><br>";
        $i++;
    }
?>

<script>
    $('.btn').click(function(){
        $.ajax({
            url:'back/files.php',
            type:'POST',
            data: {
                folder: $(this).attr('value')
            },
            success:function (response){
                $('#files').html(response);
            }
        })
    })
</script>