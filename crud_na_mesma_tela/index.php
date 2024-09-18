<?php

    $servername = "localhost"; // nome do servidor
    $name = "root"; // nome do usuário
    $password = "root"; // senha do usuário
    $dbname = "sistema_pedidos_johann"; // nome do banco de dados
    $conn = new mysqli($servername, $name, $password, $dbname); // variável de conexão 
    // conectando com o banco de dados
    if ($conn -> connect_error){ // Se a conexão der falha, mostrará erro com o tipo do erro.
    die("Conexão Falhou: " . $conn -> connect_error);
    };


if (isset($_POST["create"])){
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome_cliente = $_POST['nome_cliente'];
    $nome_produto = $_POST['nome_produto'];
    $quantidade = $_POST['quantidade'];
    $data_pedido = $_POST['data_pedido'];
    if($nome_cliente == null || $nome_produto == null || $quantidade == null || $data_pedido == null){
        echo 'Valor(es) inválido';
    } else {
        $sql = "INSERT INTO pedidos (nome_cliente,nome_produto, quantidade, data_pedido) VALUE ('$nome_cliente', '$nome_produto', '$quantidade', '$data_pedido')";
        if ($conn -> query($sql) === TRUE){
            echo "Novo resgistro criado com sucesso!";
        }else{
            echo "Erro" . $sql . "<br>" . $conn -> error;
        }
    }
    }
}

if (isset($_POST["delete"])){
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome_cliente = $_POST['nome_cliente'];
    $sql = "DELETE FROM pedidos WHERE nome_cliente = '$nome_cliente'";

    if ($conn -> query($sql) === true){
        echo "Resgistro deletado com sucesso!";
    }else{
        echo "Erro" . $sql . "<br>" . $conn -> error;
    }
    }
};
if (isset($_POST["read"])){
    $sql = "SELECT * FROM pedidos";
    $result = $conn -> query($sql);
    if ($result -> num_rows > 0) {
    echo "<table border = '1'>
        <tr>
            <th>ID: </th>
            <th>Nome: </th>
            <th>nome_produto: </th>
            <th>quantidade: </th>
            <th>data_pedido: </th>
            <th>Ações: </th>
        </tr>
    ";
    while($row = $result -> fetch_assoc()) {
        echo "  <tr>
                    <td>{$row['id']}</td>
                    <td>{$row['nome_cliente']}</td>
                    <td>{$row['nome_produto']}</td>
                    <td>{$row['quantidade']}</td>
                    <td>{$row['data_pedido']}</td>
                </tr>
        ";
    }
    echo "</table>";
    } else {
    echo "Nenhum registro encontrado";
    }
};

if (isset($_POST["update"])){
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome_cliente = $_POST['nome_cliente'];
    $updnome_cliente = $_POST['upd_nome_cliente'];
    $updnome_produto = $_POST['upd_nome_produto'];
    $updquantidade = $_POST['upd_quantidade'];
    $upddata_pedido = $_POST['upd_data_pedido'];
    $sql = "UPDATE pedidos SET nome_cliente = '$updnome_cliente', nome_produto = '$updnome_produto', quantidade = '$updquantidade', data_pedido = '$upddata_pedido' WHERE nome_cliente = '$nome_cliente'";

    if ($conn -> query($sql) === true){
        echo "Registro alterado com sucesso!";
    }else{
        echo "Erro" . $sql . "<br>" . $conn -> error;
    }
    }
}
?>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tudo na mesma tela</title>
</head>
<body>
    <h3>Criando (Create)</h3>
    <form method="POST" action="">
            <label for="nome_cliente">Nome do cliente: </label>
            <input type="text" name="nome_cliente" require>
            <br>
            <label for="nome_produto">Nome do produto: </label>
            <input type="text" name="nome_produto" require>
            <br>
            <label for="quantidade">Quantidade: </label>
            <input type="number" name="quantidade" require>
            <br>
            <label for="data_pedido">Data do Pedido: </label>
            <input type="date" name="data_pedido" require>
            <br>
            <input type="submit" name="create" value="Adicionar">
        </form>

    <h3>Deletar (Delete)</h3>
    <form method="POST" action="">
        <label for="nome_cliente">Nome do cliente: </label>
        <input type="text" name="nome_cliente" require>
        <input type="submit" name="delete" value="Deletar">
    </form>

    <h3>Lendo (Read)</h3>
    <form method="POST" action="">
        <input type="submit" name="read">
    </form>

    <h3>Alterar (Update)</h3>
    <form method="POST" action="">
        <label for="nome_cliente">Nome do cliente: </label>
        <input type="text" name="nome_cliente" require>
        <label for="upd_nome_cliente">Novo Nome: </label>
        <input type="text" name="upd_nome_cliente" require>
        <label for="quantidade">Nome do cliente: </label>
        <input type="text" name="quantidade" require>
        <br>
        <label for="upd_quantidade">Novo Nome: </label>
        <input type="text" name="upd_quantidade" require>
        <label for="data_pedido">Nome_produto: </label>
        <input type="text" name="data_pedido" require>
        <label for="upd_data_pedudo">Novo nome_produto: </label>
        <input type="text" name="upd_data_pedudo" require>
        <br>
        <input type="submit" name="update" value="Alterar">
    </form>
</body>
</html>