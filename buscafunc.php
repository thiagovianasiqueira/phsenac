<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php

include_once '../controller/conexaobd.php';


//recebendo dos dados preenchidos no front


$nome = $_POST["nome"];
$cpf = $_POST ["cpf"];
$func = $_POST ["func"];




// SQL para criar tabelas



$sql = "SELECT  nome,ddd,tel,cpf,ender,email,func FROM funcionarios WHERE cpf = '$cpf' OR nome = '$nome' OR func = '$func';";

$result = $conn->query($sql);


if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {

 echo "Nome do Funcionário: " . $row["nome"] . " <br> ddd: " . $row["ddd"] . " <br> tel: " . $row["tel"] . " <br> cpf: " . $row["cpf"] . " <br> Endereço: " . $row["ender"] . " <br> E-mail: " . $row["email"] . " <br> Func: " . $row["func"] . " <br> ";
    }
}else {
    echo "0 resultado encontrado";
    
}
$conn->close();
        ?>



