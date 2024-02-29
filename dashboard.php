<html>
    <head>
        <?php
            require 'back\verifylogin.php';
        ?>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        

        
        
        <style>
            body{
                background-color: #333333;
            }
            #viewFrame{
                margin:auto%;
                height:100%;
                background-color: #aaaaaa;
            }
            #content{
            }
            #header{
                padding: 10px;
                padding-left: 5%;
                background-color: #6666aa;
                font-weight: bold;
                font-family: 'Verdana';
            }
            #files{
                background-color: #cccccc;
                min-height: 90vh;
                margin:auto;
            }
        </style>
    </head>
    <body>
        <div class="container-xl" id="viewFrame">
            <div class="row justify-content-md-center" id="content">
                <div id="content-col" class="col">
                    <div class="row" id="header">
                        <h1>LPCS</h1>
                    </div>
                    <div class="container" id="files">
                        <?php
                            require ('back/files.php');
                        ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>