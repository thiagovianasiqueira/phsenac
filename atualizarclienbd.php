
 <?php
        
        include_once '../controller/conexaobd.php';
        
         
        //recebendo dos dados preenchidos no front
        
     
        $nome = $_POST["nome"];
        $ddd = $_POST ["ddd"];
        $tel = $_POST ["tel"];
        $cpf = $_POST ["cpf"];
        $ender = $_POST ["ender"];
        $email = $_POST ["email"];
        
              
        // SQL para criar tabelas
        
        $sql = "UPDATE clientes SET nome = '$nome', ddd = '$ddd', tel = '$tel', cpf = '$cpf', ender = '$ender', email = '$email' WHERE nome = '$nome' OR cpf = '$cpf';";
        
        if ($conn->query($sql) === TRUE) {
            echo "Atualização realizada com sucesso";
        } else {
            echo "Erro:"  . $conn->error;
        }
        
        $conn->close();
        ?>
