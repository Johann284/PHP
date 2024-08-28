<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name= "viewport" content="width=device-width, initial-scale= 1.0">
    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px; 

        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 
        3px;
        }

        button[type="submit"] {
            background-color: green;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
        }

        button[type="submit"]:hover {
            background-color: yellowgreen;
            transition: 2s;
        }
    </style>
    <title>Informa Primo</title> 
</head>
<body>
    <form method="POST" action="">
        <label for="valor_base">Digite a base do triângulo retângulo</label>
        <input type="number" id="valor_base" name="valor_base" required>
        <label for="valor_altura">Digite a altura do triângulo retângulo</label>
        <input type="number" id="valor_altura" name="valor_altura" required>
        <button type="submit" name="calcular_area">Verificar</button>
    </form>

    <?php 
         if ($_SERVER['REQUEST_METHOD'] == 'POST'){// quando houver um método sendo requisitado no server for igual a POST, executa. Quando tiver a requisição que isso acontece. $_SERVER é uma variável interna.
            if (isset($_POST['calcular_area'])){//isset é is set, verifica se está vazio (false [vazia] ou true)
                $base = $_POST['valor_base'];
                $altura = $_POST['valor_altura'];
                $area = ($base * $altura)/2;
                echo "A área de um triângulo de base $base e altura de valor $altura é $area";
            }
        }
    ?>

</body>
</html>
