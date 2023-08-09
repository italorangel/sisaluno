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
        $nomedisciplina = $_GET["nomedisciplina"];
        $ch = $_GET["ch"];
        $semestre = $_GET["semestre"];
        $idprofessor = $_GET["idprofessor"];

        ##codigo SQL
        $sql = "INSERT INTO disciplina(nomedisciplina,ch,semestre,idprofessor) 
                VALUES('$nomedisciplina','$ch','$semestre','$idprofessor')";


        ##junta o codigo sql a conexao do banco
        $sqlcombanco = $conexao->prepare($sql);

        ##executa o sql no banco de dados
        if ($sqlcombanco->execute()) {
            echo "<div class='message'>
                    <strong>OK!</strong> O professor $nomedisciplina foi incluído com sucesso!!!
                    <button><a href='../index.php'>Voltar</a></button>
                  </div>";
        }
    }

    ##alterar
    if (isset($_POST['update'])) {
        ##dados recebidos pelo metodo POST
        $nomedisciplina = $_POST["nomedisciplina"];
        $ch = $_POST["ch"];
        $id = $_POST["id"];
        $semestre = $_POST["semestre"];
        $idprofessor = $_POST["idprofessor"];
          ##codigo sql
        $sql = "UPDATE  disciplina SET nomedisciplina= :nomedisciplina, ch= :ch, semestre= :semestre, idprofessor= :idprofessor WHERE id= :id ";
       
        ##junta o codigo sql a conexao do banco
        $stmt = $conexao->prepare($sql);

        ##diz o paramentro e o tipo  do paramentros
        $stmt->bindParam(':id',$id, PDO::PARAM_INT);
        $stmt->bindParam(':nomedisciplina',$nomedisciplina, PDO::PARAM_STR);
        $stmt->bindParam(':ch',$ch, PDO::PARAM_INT);
        $stmt->bindParam(':semestre', $semestre, PDO::PARAM_STR);
        $stmt->bindParam(':idprofessor',$idprofessor, PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->execute()) {
            echo "<div class='message'>
                    <strong>OK!</strong> A Disciplina $nome foi alterado com sucesso!!!
                    <button><a href='../index.php'>Voltar</a></button>
                  </div>";
        }
    }

    ##Excluir
    if (isset($_GET['excluir'])) {
        $id = $_GET['id'];
        $sql = "DELETE FROM `disciplina` WHERE id={$id}";
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
        $stmt = $conexao->prepare($sql);
        $stmt->execute();

        if ($stmt->execute()) {
            echo "<div class='message'>
                    <strong>OK!</strong>A Disciplina com ID $id foi excluído!!!
                    <button><a href='listadis.php'>Voltar</a></button>
                  </div>";
        }
    }
?>
</body>
</html>
