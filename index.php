<?php

$exercises = [
    [
        "regex" => "/ab/",
        "goods" => ['abstrait', 'abcd', 'baba'],
        "bads" => ['ba', 'azertyu', 'baaaaaaub'],
        "statement" => ''
    ]
];

function printExercises($exercises){
    foreach($exercises as $id => $exercise){
        printExercise($exercise["regex"], $exercise["goods"], $exercise["bads"], $exercise["statement"], $id + 1);
    }
}

function printExercise($regex, $goods, $bads, $statement, $nb = 0){
    echo "<h1>Exercice $nb : $statement</h1>";
    echo "<h2>REGEX : $regex</h2>";
    echo "<h3>Taille : " . strlen($regex) . " caractères</h3>";
    printResult($regex, $goods);
    printResult($regex, $bads, false);
}

function printResult($regex, $subjects, $flag = 1){
    echo "<h4>" . ($flag ? "Bons" : "Mauvais") . " cas :</h4>";
    echo "<table>";
    echo "<tr>";
    echo "<th>Chaîne de caractère</th>";
    echo "<th>Résultat</th>";
    echo "</tr>";
    foreach($subjects as $subject){
        $result = preg_match($regex, $subject);
        echo "<tr>";
        echo "<td>$subject</td>";
        echo "<td class=\"" . ($result ? "good" : "bad") . "\">";
        echo $result ? "OK" : "KO";
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        .good{
            color: green;
        }
        .bad{
            color: red;
        }
    </style>
</head>
<body>
    <?php printExercises($exercises) ?>
</h1>
</body>
</html>