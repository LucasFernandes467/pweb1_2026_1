<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        echo "Olá mundo PHP<br>";

        $nome = "Lucas Fernandes";
        $idade = 17;

        echo "Nome: $nome - Idade: $idade";

        echo "<br>";
        if ($idade >= 18) {
            echo "Maior de idade";
        } else{
            echo "Menor de idade";
        }

        $notas = [5, 7, 10, 9];

        //print_r($notas);
        echo "<br>";
        for ($i = 0; $i < count($notas); $i++){
            echo $notas[$i]. "<br>";
        }
        echo "<br>";
        foreach ($notas as $item) {
            echo $item. "<br>";
        }

        $nomes = ["Lucas", "Caroline", "Kamilla"];

        echo "<br>";
        for ($i = 0; $i < count($nomes); $i++){
            echo $nomes[$i]. "<br>";
        }
        echo "<br>";
        foreach ($nomes as $item) {
            echo $item. "<br>";
        }

        echo "<br>";
        $carro = ['modelo' => "Mustang", 'cor' => "Branco", "Ano" => 2026];

        echo  $carro['modelo']. " - ". $carro['cor'];


    ?>

    <p> Meu Site  <?= $carro['modelo']. " - ". $carro['Ano'];  ?></p>

    <?php
    include "./aula02.php";
    ?>

</body>
</html>