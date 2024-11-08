<?php
include "conexao.php";
include "notasDAO.php";

$msg = "";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculador de notas necessarias</title>
    <style>
        /* Centraliza a tabela na página */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f2f2f2;
        }

        /* Estilos para a tabela */
        table {
            width: 450px;
            border-collapse: collapse;
            font-family: Arial, sans-serif;
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        /* Estilo do cabeçalho da tabela */
        table th, table td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
        }

        table tr:first-child {
            background-color: #4CAF50;
            color: white;
            font-weight: bold;
        }

        /* Alternância de cores para as linhas */
        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        /* Responsividade */
        @media (max-width: 768px) {
            table {
                width: 90%;
            }
        }

    </style>
</head>
<body>
<table id="tbl" border="1" width="450" cellspacing="1" cellpadding="1" class='linhasAlternadas'>
    <tr bgcolor="bluesmall">
        <td>Código</td>
        <td>Matéria</td>
        <td>N1</td>
        <td>N2</td>
        <td>N3</td>
        <td>N4</td>
        <td>Restante</td>
    </tr>
    <?php
    
    $objeto2 = new notasDAO();
    
    $retorno = $objeto2->exibir();
    
    if ($retorno != null) { 
        foreach ($retorno as $valor) {
            $restante = (24 - ($valor['notab1'] + $valor['notab2'] + $valor['notab3'] + $valor['notab4']));
            echo ('<tr>');
            echo("<td>" . $valor['codigo'] . "</td>");
            echo("<td>" . $valor['materia'] . "</td>");
            echo("<td>" . $valor['notab1'] . "</td>");
            echo("<td>" . $valor['notab2'] . "</td>");
            echo("<td>" . $valor['notab3']. "</td>");
            echo("<td>" . $valor['notab4']. "</td>");

            if($restante > 0){
                echo("<td>" . $restante . "</td>");
            } else {
                echo("<td style='color: green;'>" . "Aprovado!" . "</td>");
            }
            echo ('</tr>');
        }
    }
    ?>
</table>
<?PHP echo $msg; ?>   
</body>
</html>