<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Cadastro de Aluno</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        .caixacadalu {
            width: 400px;
            height: auto;
            background-color:  rgb(46, 136, 253);
            border-radius: 20px;
            box-shadow: 0px 4px 4px 0px rgb(25, 25, 25);
            padding: 20px;
            text-transform: uppercase;
            padding-left:10px;
        }

        .input-group {
            margin-bottom: 20px;
        }

        .input-group label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        .input-field {
            width: 100%;
            height: 28px;
            border-radius: 5px;
            border: solid 1px black;
            padding: 5px;
        }

        .radio-group {
            display: flex;
            gap: 10px;
            margin-top: 5px;
        }

        .btn-container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
            
            
        }

        .btn {
            flex: 1;
            height: 35px;
           
            border-radius: 5px;
            background-color: yellow;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            color: black;
            font-weight: bold;
            transition: background-color 0.3s, transform 0.2s;
        }

        .btn:hover {
            background-color: #ffd700;
            transform: scale(1.05);
        }

        #cada {
            background-color: rgb(0, 255, 0);
        }

        #bt {
            background-color: #f2f2f2;
            margin-left:10px;
        }

        #bt a {
            text-decoration: none;
            color: black;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="caixacadalu">
            <form method="GET" onsubmit="return validateForm()" action="crudaluno.php">
                <div class="input-group">
                    <label for="nome">Nome Aluno</label>
                    <input type="text" id="nome" class="input-field" required oninput="handleInput(event)" name="nome">
                </div>

                <div class="input-group">
                    <label for="idade">Idade</label>
                    <input type="number" id="idade" class="input-field" required name="idade" min="18" max="120">
                </div>

                <div class="input-group">
                    <label for="datanascimento">Data de Nascimento</label>
                    <input type="date" class="input-field" required name="datanascimento">
                </div>

                <div class="input-group">
                    <label for="endereco">Endereço</label>
                    <input type="text" class="input-field" required oninput="handleInput(event)" name="endereco">
                </div>

                <div class="input-group">
                    <label for="estatus">O Aluno está?</label>
                    <div class="radio-group">
                        <input type="radio" id="aprovado" value="AP" required name="estatus">
                        <label for="aprovado">Aprovado</label>
                        <input type="radio" id="reprovado" value="RP" required name="estatus">
                        <label for="reprovado">Reprovado</label>
                    </div>
                </div>

                <div class="btn-container">
                    <input type="submit" name="cadastrar" id="cada" class="btn" value="CADASTRAR">
                    <button id="bt" class="btn"><a href="../index.php">Voltar</a></button>
                </div>
            </form>
        </div>
    </div>
    <script>
        function validateForm() {
            var ageInput = document.getElementById("idade");
            var age = parseInt(ageInput.value);
          
            // Check if the age is within a valid range
            if (age < 18 || age > 120) {
                alert("Erro: Digite uma idade válida (entre 18 e 120 anos).");
                return false; // Prevent form submission
            }
          
            // The rest of your form validation code (if any) can go here
          
            return true; // Allow form submission
        }

        function handleInput(event) {
            event.target.value = event.target.value.toUpperCase();
        }
    </script>
</body>
</html>
