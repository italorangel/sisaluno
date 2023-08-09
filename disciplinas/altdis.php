<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

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

       #texto{
        text-transform:uppercase;
       }

   </style>

   </head>
   <body>
   <?php
    require_once('../conexao.php');

   $id = $_POST['id'];

   ##sql para selecionar apens um aluno
   $sql = "SELECT * FROM disciplina where id= :id";
   
   # junta o sql a conexao do banco
   $retorno = $conexao->prepare($sql);

   ##diz o paramentro e o tipo  do paramentros
   $retorno->bindParam(':id',$id, PDO::PARAM_INT);

   #executa a estrutura no banco
   $retorno->execute();

  #transforma o retorno em array
   $array_retorno=$retorno->fetch();
   
   ##armazena retorno em variaveis
   $nomedisciplina = $array_retorno['nomedisciplina'];
   $ch = $array_retorno['ch'];
   $semestre = $array_retorno['semestre'];
   $idprofessor = $array_retorno['idprofessor'];
   


?>

<form method="POST" onsubmit="return validateForm()" action="cruddis.php">
    <label for="nomedisciplina">Nome da Disciplina</label>
    <input type="text" name=" nomedisciplina" required id=" nomedisciplina" value="<?php echo $nomedisciplina ?>" >

    <label for="ch">Carga Horaria</label>                                       
    <input type="number" name="ch" id="ch"  required value="<?php echo $ch ?>" >
    
    <input type="hidden" name="id" value="<?php echo $id ?>" >

    <label for="semestre">Semestre</label>     
    <input type="text" name="semestre" id="semestre" required value="<?php echo $semestre ?>" >


    <label for="idprofessor">Professor ministrante</label>                          
    <input type="text" name="idprofessor" id="idprofessor" required value="<?php echo $idprofessor ?>" >

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
</body>
</html>