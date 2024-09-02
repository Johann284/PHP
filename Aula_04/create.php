<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
</head>
<body>
    
    <form method="POST" action="create.php">
    <label for="name">Nome: </label>
    <input type="text" name="name" require>
    <label for="email">Email: </label>
    <input type="text" name="email" require>
    <input type="submit" value="Adicionar">
    </form>
    

    <a href="update.php"><button>Alterar Login.</button></a>

</body>
</html>

<?php
include "bd.php";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = $_POST['name'];
        $email = $POST['email'];
        $sql = "INSERT INTO user (name,email) Value ('$name', '$email')";

        if ($conn -> query($sql) === true){
            echo "Novo resgistro criado com sucesso!";
        }else{
            echo "Erro" . $sql . "<br>" . $conn -> error;
        }
    }
$conn -> close();

?>
