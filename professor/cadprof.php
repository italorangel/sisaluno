<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles-prof.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>

    
<div class="caixaprof">

<div class="um">

 <form method="GET" onsubmit="return validateForm()" action="crudprof.php">


<label for="">nome professor</label>
 <input type="text"  class="inp" name="nome" id="texto" oninput="handleInput(event)" required >

 <label for="">idade</label>
 <input type="text"id="idade"class="inp"required id="texto" name="idade"> 

 <label for="">data de nascimento</label>
 <input type="date"class="inp"required id="texto" name="datanascimento">


 </div>



  <div class="dois">

  <label for="">endereço</label>
     <input type="text"class="inp"required id="texto" name="endereco">

     <label for="">O professor está ativo?</label>

     <label class="boll" for="">sim</label>
     <input type="radio"class="inp"id="sim"value="AT" required name="estatus">

     <label class="boll2" for="">não</label>
     <input type="radio"class="inp"  value="DT"  required name="estatus"> </div>

     <input type="submit" name="cadastrar" class="bnt" id="cada" value="cadastrar">
     </form>
 

     <button class="bnt"><a href="../index.php">voltar</a></button>



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