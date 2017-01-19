<?php

$regex = "/ab/";

$goodSujects = ['abstrait', 'abcd', 'baba'];
$badSubjects = ['ba', 'azertyu', 'baaaaaaub'];

function printResult($regex, $subjects, $flag = 1){
    echo "<h3>" . ($flag ? "Bons" : "Mauvais") . " cas :</h3>";
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
    <h1>REGEX : <?= $regex ?></h1>
    <h2>Taille : <?= strlen($regex) ?> caractères</h2>
    <?php printResult($regex, $goodSujects) ?>
    <?php printResult($regex, $badSubjects, false) ?>
    
</h1>
</body>
</html>