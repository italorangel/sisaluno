<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_cadaluno.css">
    <title>Document</title>
</head>
<body>
  
<div class="caixacadalu">

   <form method="GET" onsubmit="return validateForm()" action="crudaluno.php">

     <div class="umm">

       <label for="">nome aluno</label>
     <input type="text" class="inp"required id="texto" oninput="handleInput(event)" name="nome">

     <label for="">idade</label>
     <input type="text" id="idade"  class="inp"required name="idade"> 

     <label for="">data de nascimento</label>
     <input type="date" id="texto" class="inp"required name="datanascimento">

  </div>

  <div class="doiss">

  
    <label for="">endereço</label>
     <input type="text" class="inp" id="texto" required name="endereco">

     <label for="">O Aluno está?</label>

     <label class="boll" for="">Aprovado</label>
     <input type="radio"class="inp"id="sim"value="AP" required name="estatus">

     <label class="boll2" for="">Reprovado</label>
     <input type="radio"class="inp" id="sim" value="RP" required name="estatus"> </div>


     <input type="submit" name="cadastrar" id="cada" class="btn" value="CADASTRAR">

    
     <button id="bt" class="btn"><a href="http://localhost/atividade_17_07/index.php">voltar</a></button>
  </div>


     </form>
    
   

</div>
   
<script>
function validateForm() {
    var ageInput = document.getElementById("idade");
    var age = parseInt(ageInput.value);
  
    // Check if the age is non-negative and less than or equal to 120
    if (age < 17 || age > 120) {
        alert("Erro: Digite uma idade válida (entre 18 e 120 anos).");
        return false; // Prevent form submission
    }
  
    // The rest of your form validation code (if any) can go here
  
    return true; // Allow form submission
}

$("#texto").on("input", function(){
    $(this).val($(this).val().toUpperCase());
});
</script>

</body>
</html>