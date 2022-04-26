<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php

include_once '../controller/conexaobd.php';

$nome = $_POST ["nome"];
$cpf = $_POST ["cpf"];


if ($conn->connect_error) {
    die("Conexão falhou:" . $conn->connect_error);
}

// PASSO 3 - SQL PARA BUSCAR EM TABELAS
$sql = "DELETE FROM funcionarios WHERE nome = '$nome' OR cpf = '$cpf';";

if ($conn->query($sql) === TRUE) {
    echo "Exclusão realizada com sucesso";
} else {
    echo "Erro:" . $sql . "<br>" . $conn->error;
}
echo "<br>";
$conn->close();
?>

