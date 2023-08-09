<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
       

        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
            margin: 0;
            padding: 0;
        }


        form {
          
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            box-shadow: 3px 3px 10px 3px grey;
            margin-top: 100px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="date"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: rgb(46, 136, 253);
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>


</head>
<body>

<?php
    require_once('../conexao.php');

   $id = $_POST['id'];

   ##sql para selecionar apens um aluno
   $sql = "SELECT * FROM aluno where id= :id";
   
   # junta o sql a conexao do banco
   $retorno = $conexao->prepare($sql);

   ##diz o paramentro e o tipo  do paramentros
   $retorno->bindParam(':id',$id, PDO::PARAM_INT);

   #executa a estrutura no banco
   $retorno->execute();

  #transforma o retorno em array
   $array_retorno=$retorno->fetch();
   
   ##armazena retorno em variaveis
   $nome = $array_retorno['nome'];
   $idade = $array_retorno['idade'];
   $datanascimento = $array_retorno['datanascimento'];
   $endereco = $array_retorno['endereco'];
   $estatus = $array_retorno['estatus'];


?>


  <form method="POST"onsubmit="return validateForm()" action="crudaluno.php">
  <label for="">Nome:</label>
        <input type="text" name="nome" id="" value=<?php echo $nome?> >
        <label for="">Idade:</label>                               
        <input type="text" name="idade" id="idade" value=<?php echo $idade ?> >
        <label for="">Data nascimento:</label>
        <input type="date" name="datanascimento" id="" value=<?php echo $datanascimento ?> >
        <label for="">Endereco:</label>
        <input type="text" name="endereco" id="" value=<?php echo $endereco ?> >
        <label for="">Estatus:</label>
        <input type="text" name="estatus" id="" value=<?php echo $estatus ?> >
      
        <input type="hidden" name="id" id="" value=<?php echo $id ?> >
        
        <input type="submit" name="update" value="Alterar">
  </form>

  <script>
    function validateForm() {
        var ageInput = document.getElementById("idade");
        var age = parseInt(ageInput.value);

        // Check if the age is non-negative and less than or equal to 120
        if (age < 18 || age > 120) {
            alert("Erro: Digite uma idade válida (entre 18 e 120 anos).");
            return false; // Prevent form submission
        }

        // The rest of your form validation code (if any) can go here

        return true; // Allow form submission
    }

    $(document).ready(function() {
        // Convert the input text to uppercase
        $("#nome").on("input", function(){
            $(this).val($(this).val().toUpperCase());
        });
    });
</script>
</script>
</body>
</html>