<?php

$examples = [
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
        "goods" => ['taratata', 'titi', 'toto', 'tata', 'tututututu', 'trtr', 'tttt'],
        "bads" => ['toutou', 'azerty', 'tt', 'tit', ''],
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
];
$exercises = [
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
        "statement" => 'Un mot qui commence et fini par une voyelle.'
    ],
    [
        "regex" => "/^([01]\d|2[0-3]):[0-5]\d$/",
        "goods" => ['00:00', '12:12', '13:59', '01:12', '15:23'],
        "bads" => ['24:00', '23:60', '23:61', '23:123', '1:12', '30:12', '12:', '12:30am'],
        "statement" => 'Une heure au format 24h (Ex : 19:30).'
    ],
    [
        "regex" => "/^(0[1-9]|1[0-2]):[0-5]\d[ap]m$/",
        "goods" => ['12:00am', '10:30pm', '12:10am'],
        "bads" => ['00:00am', '13:30pm', '01:60am', '02:30', '02:30bm'],
        "statement" => 'Une heure au format anglais (Ex : 11:30am).'
    ],
    [
        "regex" => "/^[12]\d\d(0[1-9]|1[0-2])([1-9]\d|0[1-9])\d{6}([1-8]\d|0[1-9]|9[0-7])$/",
        "goods" => ['100010100000001', '200010100000001', '199120100000001', '100070100000001'],
        "bads" => ['300010100000001', '100000100000001', '100130100000001', '100010000000001', '100010100000000', '100010100000098', '100010100000099'],
        "statement" => 'Un numéro de sécurité social.'
    ],
    [
        "regex" => "/^[A-HJ-NP-TV-Z]{2}-(\d\d[1-9]|\d[1-9]0|[1-9]00)-[A-HJ-NP-TV-Z]{2}$/",
        // "regex" => "/^[A-HJ-NP-TV-Z]{2}-([1-9]\d\d|0\d[1-9]|0[1-9]0)-[A-HJ-NP-TV-Z]{2}$/",
        "goods" => ['AA-123-AA', 'AA-100-AA'],
        "bads" => ['AI-123-AI', 'AA-000-AA', '11-000-11'],
        "statement" => 'Une plaque d\'imatriculation.'
    ],
    [
        "regex" => "/^[1-9]\d*$/",
        "goods" => ['1', '23'],
        "bads" => ['0', '3.14', '3,14'],
        "statement" => 'Un entier naturel supérieur à 0.'
    ],
    [
        "regex" => "/^([1-9]\d*|0)$/",
        "goods" => ['1', '23', '0'],
        "bads" => ['3.14', '3,14', '00001'],
        "statement" => 'Un entier naturel supérieur ou égal à 0.'
    ],
    [
        "regex" => "/^([+-]?(([1-9]\d*|0)[.,]\d?\d?[1-9]|[1-9]\d*)|0)$/",
        "goods" => ['+0,383', '1', '34', '-10', '3.14', '0.04', '-0.2'],
        "bads" => ['+0.380', '34.', '34,', '-010', '+0', '-0', '3.0'],
        "statement" => 'Un nombre potentiellement signé et pouvant avoir 1 à 3 chiffres après la virgule à condition que le dernier chiffre ne soit pas un zéro.'
    ]
];

function printExercises($exercises){
    foreach($exercises as $id => $exercise){
        printExercise($exercise["regex"], $exercise["goods"], $exercise["bads"], $exercise["statement"], $id + 1);
    }
}

function printExercise($regex, $goods, $bads, $statement, $nb = 0){
    echo "<h2 class=\"number\">$nb</h2>";
    echo "<p>$statement</p>";
    echo "<p class=\"alert alert-info\">REGEX : $regex</p>";
    echo "<p>Taille : " . strlen($regex) . " caractères</p>";
    printResult($regex, $goods);
    printResult($regex, $bads, false);
    echo "<hr/>";
}

function printResult($regex, $subjects, $flag = 1){
    echo "<div class=\"card\">";
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
    echo "</div>";
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>REGEX</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
    .card {
        background: #fff;
        border-radius: 2px;
        margin: 1rem;
        padding: 1em;
    }
    body{
        background-color: #f9f9f9;
    }
    .number{
        font-size: 1.8em;
        border: 1px solid grey;
        display: inline-block;
        width: 1.2em;
        height: 1.2em;
        text-align: center;
        border-radius: 1.2em;
        background-color: white;
    }
    .number, .card{
        box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
    }
    </style>
</head>
<body>
    <main class="container">
        <h2>Exemples :</h2>
        <?php printExercises($examples) ?>
        <h2>Exercices :</h2>
        <?php printExercises($exercises) ?>
    </main>
</h1>
</body>
</html>