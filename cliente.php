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
        <div> cadastro de clientes</div>

        Nome: <?php echo $_POST["nome"];
        
        ?><br>

        DDD: <?php echo $_POST["ddd"];
        
        ?><br>

        Telefone: <?php echo $_POST["tel"];
        
        ?><br>

        CPF: <?php echo $_POST["cpf"];
        
        ?><br>
        
        Email: <?php echo $_POST["email"];
        
        ?><br>
        
         Endereço: <?php echo $_POST["end"];
       
        ?>
    </body>
</html>
