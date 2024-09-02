<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE</title>
</head>
<body>
    
<form method="POST" action="update.php">
    <label for="name">Nome: </label>
        <input type="text" name="name" require>
    <br>
    <label for="upd_name">Novo Nome: </label>
        <input type="text" name="upd_name" require>
</form>
    
<a href="create.php"><button>Voltar.</button></a>
</body>
</html>

<?php
include "bd.php";

$conn -> close();

?>