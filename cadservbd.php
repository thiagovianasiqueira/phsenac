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
        include_once '../controller/conexaobd.php';
        
               
        //recebendo dos dados preenchidos no front
        
        $nome = $_POST["nome"];
        $cpf = $_POST ["cpf"];
        $especialidade = $_POST ["especialidade"];
        $medico = $_POST ["medico"];
      
        
              
        // SQL para criar tabelas
        
        $sql = "INSERT INTO servicos (nome, cpf, especialidade, medico)
        VALUE ('$nome', '$cpf', '$especialidade', '$medico');";
        
        if ($conn->query($sql) === TRUE) {
            echo "Marcação de CONSULTA realizada com sucesso";
        } else {
            echo "Erro:" . $sql . "<br>" . $conn->error;
        }
        echo "<br>";
        $conn->close();
        ?>
    </body>
</html>
