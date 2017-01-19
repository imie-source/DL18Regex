<?php

$regex = "/ab/";

$goodSujects = ['abstrait', 'abcd', 'baba'];
$badSubjects = ['ba', 'azertyu', 'baaaaaaub'];

function printResult($regex, $subjects){
    foreach($subjects as $subject){
        $result = preg_match($regex, $subject);
        echo "<tr>";
        echo "<td>$subject</td>";
        echo "<td class=\"" . ($result ? "good" : "bad") . "\">";
        echo $result ? "OK" : "KO";
        echo "</td>";
        echo "</tr>";
    }
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
    <h3>Bons cas :</h3>
    <table>
        <tr>
            <th>Chaîne de caractère</th>
            <th>Résultat</th>
        </tr>
        <?php printResult($regex, $goodSujects) ?>
    </table>

    <h3>Mauvais cas :</h3>
    <table>
        <tr>
            <th>Chaîne de caractère</th>
            <th>Résultat</th>
        </tr>
        <?php printResult($regex, $badSubjects) ?>
    </table>
    
</h1>
</body>
</html>