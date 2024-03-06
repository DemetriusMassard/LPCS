<?php
    
        require('verifylogin.php');
    
        if(isset($_POST["folder"])){
            $_SESSION['prevID'] = $_SESSION['currentFolder'];
            $_SESSION['currentFolder'] = $_POST['folder'];
        }

        $config = require "config.php";
        $server = $config['server'];
        $user = $config['user'];
        $pass = $config['pass'];
        $db = $config['db'];

        $sql = "select * from paths where prevID = (select id from paths where ID = " . $_SESSION['folders'][$_SESSION['currentFolder']]['ID'] . ")";
        
        //Adicionar Botão de Voltar
        /**if(!$_SESSION['folder'] == $_SESSION['rootFolder']){
            echo "Volter: .. <button class='btn btn-primary' value= ". $row['prevID'] . " type='button'>O</button><br>";
        }*/
        $teste = getenv('db');
        echo $teste . "AA";
        $i = 0;
        try{    
            $conn = new mysqli($server, $user, $pass, $db);
            $result = $conn->query($sql);
            if($result->num_rows >0){
                while ($row = $result->fetch_assoc()){
                    echo 'Pasta: '. $row['ID'] .', '. $row['name'] . "<button class='btn btn-primary' value= ". $i . " type='button'>O</button><br>";
                    $_SESSION['folders'][$i] = $row;
                    $i++;
                }
            }
            $conn->close();
        }catch(mysqli_sql_exception $e){
            echo "Error code: ". $e->getCode() . "<br>";
            echo "Error message: ". $e->getMessage();
            
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