

<?php

include_once '../controller/conexaobd.php';


//recebendo dos dados preenchidos no front


$nome = $_POST["nome"];
$cpf = $_POST ["cpf"];



// SQL para criar tabelas



$sql = "SELECT  nome,ddd,tel,cpf,ender,email FROM clientes WHERE cpf = '$cpf' OR nome = '$nome';";

$result = $conn->query($sql);


if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {

 echo "Nome do cliente: " . $row["nome"] . " <br> CPF: " . $row["cpf"] . " <br> ddd: " . $row["ddd"] . " <br> tel: " . $row["tel"] . " <br> CPF: " . $row["cpf"] . " <br> Endereço: " . $row["ender"] . " <br> E-mail: " . $row["email"] . " <br> ";
    }
}else {
    echo "0 resultado encontrado";
    
}
$conn->close();
        ?>


