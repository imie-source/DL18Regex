<?php

$exercises = [
    [
        "regex" => "/ab/",
        "goods" => ['abstrait', 'abcd', 'baba'],
        "bads" => ['ba', 'azertyu', 'baaaaaaub'],
        "statement" => 'Exemple'
    ],
    [
        "regex" => "/^ab/",
        "goods" => ['abstrait', 'abcd', 'ab'],
        "bads" => ['baba', 'skdjfkdjshfab', 'baaaa', 'aaaaaaaaaab'],
        "statement" => 'Exemple'
    ],
    [
        "regex" => "/^ab$/",
        "goods" => ['ab'],
        "bads" => ['abc', 'ac', 'aaaaabbbbbcccc', 'cba'],
        "statement" => 'Exemple'
    ],
    [
        "regex" => "/t.t./",
        "goods" => ['', 'taratata', 'titi', 'toto', 'tata', 'tututututu', 'trtr', 'tttt'],
        "bads" => ['toutou', 'azerty', 'tt', 'tit'],
        "statement" => 'Exemple'
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
        "statement" => 'Exemple'
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
        "statement" => 'Exemple'
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
        "statement" => 'Exemple'
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
        "statement" => 'Exemple'
    ],
    [
        "regex" => "/^1[0-7]?0$/",
        "goods" => ['100','10', '160'],
        "bads" => ['191', '211110', '11111111111110', '112345670'],
        "statement" => 'Exemple'
    ],
    [
        "regex" => "/^\.od[stp]$/",
        "goods" => ['.ods', '.odt', '.odp'],
        "bads" => ['.odst', 'ods ', 'odt', '.exe', '', 'aodt'],
        "statement" => 'Vérifier qu\'une extension est une extension LibreOffice (.odt, .odp, .ods).'
    ],
    [
        "regex" => "/^.{1,9}$/",
        "goods" => ['toto', '@', '123456', ' '],
        "bads" => ['', 'azertyuiop'],
        "statement" => 'Une chaîne non vide de moins de 10 caractères.'
    ],
    [
        "regex" => "/^\d{4,8}$/",
        "goods" => ['0000', '1234', '123456'],
        "bads" => ['123', 'password', 'abcd'],
        "statement" => 'Un code PIN de téléphone portable (entre 4 et 8 chiffres).'
    ],
    [
        "regex" => "/^J(im|oe)$/",
        "goods" => ['Jim', 'Joe'],
        "bads" => ['Jimy', 'BarJoe', 'Joi', 'Jom'],
        "statement" => 'Jim ou Joe.'
    ],
    [
        "regex" => "/^[A-Z][a-zçéèêëüÿö]+(-[A-Z][a-zçéèêëüÿö]+)*$/",
        // À creuser : // "regex" => "/^[[:upper:]][[:lower:]]+(-[[:upper:]][[:lower:]]+)*$/",
        "goods" => ['Gabriel', 'Gülistan', 'Jean-François-Richard', 'Yi'],
        "bads" => ['Jojo56', '123456', 'mIchel', 'michel', 'Jean-'],
        "statement" => 'Un prénom.'
    ],
    [
        "regex" => "/^[aeiouy]([a-z]*[aeiouy])?$/i",
        "goods" => ['i', 'arbre', 'OO'],
        "bads" => ['yes', 'is', 'top', ],
        "statement" => 'Un mot qui commence et fini par une voyelle..'
    ]
];

function printExercises($exercises){
    foreach($exercises as $id => $exercise){
        printExercise($exercise["regex"], $exercise["goods"], $exercise["bads"], $exercise["statement"], $id + 1);
    }
}

function printExercise($regex, $goods, $bads, $statement, $nb = 0){
    echo "<h1>Exercice $nb :</h1>";
    echo "<p>$statement</p>";
    echo "<p class=\"alert alert-info\">REGEX : $regex</p>";
    echo "<p>Taille : " . strlen($regex) . " caractères</p>";
    printResult($regex, $goods);
    printResult($regex, $bads, false);
}

function printResult($regex, $subjects, $flag = 1){
    echo "<h4>" . ($flag ? "Bons" : "Mauvais") . " cas :</h4>";
    echo "<table class=\"table\">";
    echo "<tr>";
    echo "<th>Chaîne de caractère</th>";
    echo "<th>Résultat</th>";
    echo "</tr>";
    foreach($subjects as $subject){
        $result = preg_match($regex, $subject);
        echo "<tr>";
        echo "<td>$subject</td>";
        echo "<td class=\"alert " . ($result ? "alert-success" : "alert-danger") . "\">";
        echo $result ? "OK" : "KO";
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "<hr/>";
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>REGEX</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
    <main class="container">
        <?php printExercises($exercises) ?>
    </main>
</h1>
</body>
</html>