<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISTEMA DE CADASTRO</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            display: flex;
            max-width: 1200px;
            margin: 0 auto;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .left-section {
            width: 65%;
            background-color: rgb(46, 136, 253);
            color: white;
            padding: 50px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .right-section {
            width: 35%;
            background-color: white;
            padding: 20px;
        }

        .section-title {
            font-size: 24px;
            font-weight: bold;
            margin-top: 20px;
            margin-bottom: 10px;
        }

        .section-titles {
            font-size: 24px;
            font-weight: bold;
            margin-top: 20px;
            margin-left: 16px;
            margin-bottom: 10px;
        }

        .button-container {
            margin-top: 10px;
        }

        .button {
            display: block;
            width: 100%;
            padding: 10px;
            margin-top:10px;
            margin-right:20px;
            text-align: center;
            background-color: #fff;
            color: #333333;
            border: none;
            border-radius: 20px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s, transform 0.2s;
        }

        .button:hover {
            background-color: #80bfff;
            transform: scale(1.05);
        }

        img {
            max-width: 100%;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="left-section">
            <div class="section-title">SISTEMA DE CADASTRO</div>
            <div class="section-titles">ALUNOS</div>
            <div class="button-container">
                <a class="button" href="./aluno/cadaluno.php">CADASTRAR</a>
                <a class="button" href="./aluno/listaalunos.php">LISTA</a>
            </div>
            <div class="section-titles">PROFESSOR</div>
            <div class="button-container">
                <a class="button" href="./professor/cadprof.php">CADASTRAR</a>
                <a class="button" href="./professor/listaprof.php">LISTA</a>
            </div>
            <div class="section-titles">DISCIPLINAS</div>
            <div class="button-container">
                <a class="button" href="./disciplinas/caddis.php">CADASTRAR</a>
                <a class="button" href="./disciplinas/listadis.php">LISTA</a>
            </div>
        </div>
        <div class="right-section">
            <img src="imagem1.jpg" alt="">
        </div>
    </div>
</body>

</html>
