<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
         $servername = "127.0.0.1:3307";
        $username = "root";
        $password = "";
        $dbname = "clinicasaudevida";
        
        //passo 1 concectar ao servidor de banco de dados
        
        $conn = new mysqli ($servername, $username, $password, $dbname);
        
        //passo 2 - verificar conexão com banco de dados
        
        if ($conn ->connect_error) {
            die ("conexão falhou:" . $conn->connect_error);
        }
        
        ?>
    </body>
</html>
