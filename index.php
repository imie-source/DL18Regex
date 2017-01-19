<?php

$exercises = [
    [
        "regex" => "/ab/",
        "goods" => ['abstrait', 'abcd', 'baba'],
        "bads" => ['ba', 'azertyu', 'baaaaaaub'],
        "statement" => ''
    ],
    [
        "regex" => "/^ab/",
        "goods" => ['abstrait', 'abcd', 'ab'],
        "bads" => ['baba', 'skdjfkdjshfab', 'baaaa', 'aaaaaaaaaab'],
        "statement" => ''
    ],
    [
        "regex" => "/^ab$/",
        "goods" => ['ab'],
        "bads" => ['abc', 'ac', 'aaaaabbbbbcccc', 'cba'],
        "statement" => ''
    ],
    [
        "regex" => "/t.t./",
        "goods" => ['', 'taratata', 'titi', 'toto', 'tata', 'tututututu', 'trtr', 'tttt'],
        "bads" => ['toutou', 'azerty', 'tt', 'tit'],
        "statement" => ''
    ],
    [
        "regex" => "/t[aeiou]t[aeiou]/",
        "goods" => ['tatie', 'tutu', 'tetu', 'toto', 'tatatata', 'tatitato'],
        "bads" => ['tonton', 'toutou', 'tztz', 'ta'],
        "statement" => ''
    ],
    [
        "regex" => "/ch(at|ien)/",
        "goods" => ['chat', 'chien', 'chaton', 'Oh quel beau chaton'],
        "bads" => ['chou', 'cheval'],
        "statement" => ''
    ],
    [
        "regex" => "/t[aeiouy]{2}/",
        "goods" => ['toujours', 'toutou', 'toit', 'batou', 'azertyu'],
        "bads" => ['toto', 'tartine'],
        "statement" => ''
    ],
    [
        "regex" => "/(t[aeiouy]){2}/",
        "goods" => ['toto', 'taratata'],
        "bads" => ['toutou', 'toit', 'batou', 'azertyu', 'tartine', 'toujours'],
        "statement" => ''
    ],
    [
        "regex" => "/^[1-5]{2,4}$/",
        "goods" => ['11', '1234', '5555'],
        "bads" => ['110', '91', '11111', '007', '5'],
        "statement" => ''
    ],
    [
        "regex" => "/^(tou?){2}$/",
        "goods" => ['toto', 'totou', 'toutou', 'touto'],
        "bads" => ['tutu', 'toutoutou', 'totu'],
        "statement" => ''
    ],
    [
        "regex" => "/^1[0-7]+0$/",
        "goods" => ['100', '112345670', '160', '11111111111110'],
        "bads" => ['10', '191', '211110'],
        "statement" => ''
    ],
    [
        "regex" => "/^1[0-7]*0$/",
        "goods" => ['100','10', '112345670', '160', '11111111111110'],
        "bads" => ['191', '211110'],
        "statement" => ''
    ],
    [
        "regex" => "/^1[0-7]?0$/",
        "goods" => ['100','10', '160'],
        "bads" => ['191', '211110', '11111111111110', '112345670'],
        "statement" => ''
    ],
    [
        "regex" => "/^\.od[stp]$/",
        "goods" => ['.ods', '.odt', '.odp'],
        "bads" => ['.odst', 'ods ', 'odt', '.exe', '', 'aodt'],
        "statement" => 'Vérifier qu\'une extension est une extension LibreOffice (.odt, .odp, .ods).'
    ],
    [
        "regex" => "//",
        "goods" => ['toto', '@', '123456', ' '],
        "bads" => ['', 'azertyuiop'],
        "statement" => 'Une chaîne non vide de moins de 10 caractères.'
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