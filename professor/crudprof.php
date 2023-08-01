<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
            margin: 0;
            padding: 0;
        }

        .message {
            max-width: 400px;
            margin: 30px auto;
            padding: 20px;
            border: 1px solid #ccc;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
           
        }

        a{
            text-decoration:none;color: white;
        }
        .message strong {
            display: block;
            font-size: 18px;
            margin-bottom: 10px;
        }

        .message button {
            display: inline-block;
            padding: 8px 16px;
            background-color: #007BFF;
            margin-left:10px;
            margin-top:5px;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .message button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<?php
    ##permite acesso as variaves dentro do arquivo conexao
    require_once('../conexao.php');

    ##cadastrar
    if (isset($_GET['cadastrar'])) {
        ##dados recebidos pelo metodo GET
        $nome = $_GET["nome"];
        $idade = $_GET["idade"];
        $datanascimento = $_GET["datanascimento"];
        $endereco = $_GET["endereco"];
        $estatus = $_GET["estatus"];

        ##codigo SQL
        $sql = "INSERT INTO professor(nome, idade, datanascimento, endereco, estatus) 
                VALUES('$nome', '$idade', '$datanascimento', '$endereco', '$estatus')";

        ##junta o codigo sql a conexao do banco
        $sqlcombanco = $conexao->prepare($sql);

        ##executa o sql no banco de dados
        if ($sqlcombanco->execute()) {
            echo "<div class='message'>
                    <strong>OK!</strong> O professor $nome foi incluído com sucesso!!!
                    <button><a href='http://localhost/atividade_17_07/index.php'>Voltar</a></button>
                  </div>";
        }
    }

    ##alterar
    if (isset($_POST['update'])) {
        ##dados recebidos pelo metodo POST
        $nome = $_POST["nome"];
        $idade = $_POST["idade"];
        $datanascimento = $_POST["datanascimento"];
        $endereco = $_POST["endereco"];
        $estatus = $_POST["estatus"];
        $id = $_POST["id"];

        ##codigo SQL
        $sql = "UPDATE professor SET nome= :nome, idade= :idade, datanascimento= :datanascimento, endereco= :endereco, estatus= :estatus  WHERE id= :id ";

        ##junta o codigo sql a conexao do banco
        $stmt = $conexao->prepare($sql);

        ##diz o paramentro e o tipo  do paramentros
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
        $stmt->bindParam(':idade', $idade, PDO::PARAM_INT);
        $stmt->bindParam(':datanascimento', $datanascimento, PDO::PARAM_STR);
        $stmt->bindParam(':endereco', $endereco, PDO::PARAM_STR);
        $stmt->bindParam(':estatus', $estatus, PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->execute()) {
            echo "<div class='message'>
                    <strong>OK!</strong> O professor $nome foi alterado com sucesso!!!
                    <button><a href='http://localhost/atividade_17_07/index.php'>Voltar</a></button>
                  </div>";
        }
    }

    ##Excluir
    if (isset($_GET['excluir'])) {
        $id = $_GET['id'];
        $sql = "DELETE FROM `professor` WHERE id={$id}";
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
        $stmt = $conexao->prepare($sql);
        $stmt->execute();

        if ($stmt->execute()) {
            echo "<div class='message'>
                    <strong>OK!</strong> O professor com ID $id foi excluído!!!
                    <button><a href='listaprof.php'>Voltar</a></button>
                  </div>";
        }
    }
?>
</body>
</html>
