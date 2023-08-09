<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        body{height:100vh;
            margin: 0;
            padding: 0;
    font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
        }

        table{background-color: white;
            width: 1400px;
            margin-top:50px;
            margin-left:70px;
            border:solid black 1px;
     
        }

        tr{
            
            text-align: center;
            height:40px;
          
                 
        }

        th{
           
            width: 15%;
            background-color: rgb(46, 136, 253);
            border:1px solid black;
       
        }

        td{
            height: 40px;
           border:1px solid black;
        }

        a{
            text-decoration: none;
            text-transform: uppercase;
        }

        .alter{
            border: none
        }
        .ins{
            width: 180px;
            height: 28px;
            position:absolute;
            padding-top:10px;
        }

    </style>

</head>
<body>
    




<?php 
/*
 * Melhor prática usando Prepared Statements
 * 
 */
  require_once('../conexao.php');
   
  $retorno = $conexao->prepare('SELECT * FROM professor');
  $retorno->execute();

?>       
        <table> 
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOME</th>
                    <th>IDADE</th>
                    <th>DATA DE NASCIMENTO</th>
                    <th>ENDEREÇO</th>
                    <th>STATUS</th>
                    <th class="ins">AÇÕES</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <?php foreach($retorno->fetchall() as $value) { ?>
                        <tr>
                            <td> <?php echo $value['id'] ?>   </td> 
                            <td> <?php echo $value['nome']?>  </td> 
                            <td> <?php echo $value['idade']?> </td> 
                            <td> <?php echo $value['datanascimento']?> </td> 
                            <td> <?php echo $value['endereco']?> </td> 
                            <td> <?php echo $value['estatus']?> </td> 

                            <td class="alter">
                               <form method="POST" action="altprof.php">
                                        <input name="id" type="hidden" value="<?php echo $value['id'];?>"/>
                                        <button name="alterar" style=' border-radius: 10px;width:80px; box-shadow: 0px 4px 4px 0px rgb(25, 25, 25);;height:30px;margin-right:5px;margin-left:5px;cursor:pointer;
                                                                         
                                                                         font-size:15px;
                                                                   background-color: yellow;' type="submit">Alterar</button>
                                </form>

                             </td> 

                             <td class="alter">
                               <form method="GET" action="crudprof.php">
                                        <input name="id" type="hidden" value="<?php echo $value['id'];?>"/>
                                        <button name="excluir" style='border-radius: 10px; box-shadow: 0px 4px 4px 0px rgb(25, 25, 25);;width:80px;height:30px;background-color:red ;margin-right:5px; cursor:pointer;font-size:15px;' type="submit">Excluir</button>
                                </form>

                             </td> 


                       
                      </tr>
                    <?php  }  ?> 
                 </tr>
            </tbody>
        </table>
<?php         
   echo "<button style='width: 100px; cursor: pointer;
   border-radius: 20px;
   height: 30px;
   font-size:15px;
   background: white;
   margin-left:750px;
   margin-top:30px;
   box-shadow: 0px 4px 4px 0px rgb(25, 25, 25);' class='button button3'><a href='../index.php'>voltar</a></button>";
?>

</body>
</html>