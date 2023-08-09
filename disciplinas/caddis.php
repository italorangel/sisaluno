<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <title>Document</title>

    <style>

body{
    margin: 0;
    padding: 0;
    font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
    background-color: #f1f1f1;
}

.caixaprof{

    width: 360px;
    height: 400px;
    background-color:  rgb(46, 136, 253);
    border-radius: 20px;
    box-shadow: 0px 4px 4px 0px rgb(25, 25, 25);
    margin-top: 70px;
    margin-left: 570px;
    padding: 20px;
    text-transform: uppercase;
 
}

.um{
    display: flex;
    flex-direction: column;
    width: 100%;
    height: 100%;
}



.inp{
    width: 350px;
    height: 28px;
    border-radius: 5px;
    margin-bottom: 30px;
  border: solid 1px black;
}
.bnt{
    width: 150px;
    height: 35px;
    border-radius: 5px;
    margin-bottom: 5px;
    margin-left: 110px;
    background-color:rgb(255, 255, 42) ;
    cursor: pointer;
    
}

a{
    text-decoration: none;
    text-transform: uppercase;
    color: black;
    
}
#cada{
    background-color: rgb(0, 255, 0);
    text-transform: uppercase;
}
.boll{
    margin-left: 118px;
    position: absolute;
    margin-top: 107px;
    font-size: 17px;
}
.boll2{
    margin-left: 115px;
    position: absolute;
    margin-top: 170px;

}
#sim{
    margin-top: 10px;
}

#texto{
    text-transform:uppercase;
}
    </style>
</head>
<body>

    
<div class="caixaprof">

<div class="um">

 <form method="GET" onsubmit="return validateForm()" action="cruddis.php">


 <label for="nomedisciplina">Nome da Disciplina:</label>
    <input type="text" class="inp" name=" nomedisciplina" required id=" nomedisciplina">

    <label for="ch">Carga Horaria:</label>                                       
    <input type="number" class="inp" name="ch" id="ch"  required>

  <label for="semestre">Semestre:</label>     
    <input type="text" class="inp" name="semestre" id="semestre" required >


    <label for="idprofessor">ID Professor ministrante:</label>                          
<input type="number" class="inp" name="idprofessor" id="idprofessor" required>


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