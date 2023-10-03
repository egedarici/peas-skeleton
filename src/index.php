<?php

function displayPea($args) {
    $argsString = json_encode($args);
    echo "Passed arguments: $argsString\n";

    // TODO display "visible" values
}

function generatePea($args) {
    // TODO
}

switch ($argv[1]) {
    case "display":
        displayPea(array_slice($argv, 2));
        break;
    case "generate":
        generatePea(array_slice($argv, 2));
        break;
    default:
        echo "Please use `php index.php display` or `php index.php generate`\n";
        return;
}
