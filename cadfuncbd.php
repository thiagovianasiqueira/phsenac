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
        $ddd = $_POST ["ddd"];
        $tel = $_POST ["tel"];
        $cpf = $_POST ["cpf"];
        $ender = $_POST ["ender"];
        $email = $_POST ["email"];
        $func = $_POST ["func"];


        // SQL para criar tabelas

        $sql = "INSERT INTO funcionarios (nome, ddd, tel, cpf, ender, email, func)
        VALUE ('$nome','$ddd','$tel','$cpf','$ender','$email','$func');";

        if ($conn->query($sql) === TRUE) {
            echo "nova inserção de FUNCIONARIOS realizada com sucesso";
        } else {
            echo "Erro:" . $sql . "<br>" . $conn-> error;
        }
        echo "<br>";
        $conn->close();
        ?>
    </body>
</html>
