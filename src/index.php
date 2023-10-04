<?php

class Pea {
    private $color1, $color2, $sweetness1, $sweetness2;

    public function __construct($color1, $color2, $sweetness1, $sweetness2) {
        $this->color1 = $color1;
        $this->color2 = $color2;
        $this->sweetness1 = $sweetness1;
        $this->sweetness2 = $sweetness2;
    }

    public function getColor() {
        if ($this->color1 == 'Y' || $this->color2 == 'Y') {
            return "Yellow";
        } else {
            return "Green";
        }
    }

    public function getSweetness() {
        return ($this->sweetness1 + $this->sweetness2) / 2;
    }

    public static function displayPea(Pea $pea) {
        $color = $pea->getColor();
        $sweetness = $pea->getSweetness();

        echo "Color: $color\n";
        echo "Sweetness: $sweetness\n";
    }

    public static function generatePea(Pea $parent1, Pea $parent2) {
        if ($parent1->color1 === 'Y' || $parent2->color1 === 'Y'){
            $color1 = 'Y';
        } else {
            $color1 = 'g';
        }

        if ($parent1->color2 === 'Y' || $parent2->color2 === 'Y'){
            $color2 = 'Y';
        } else {
            $color2 = 'g';
        }

        $sweetness1 = mt_rand(min($parent1->sweetness1, $parent2->sweetness1), max($parent1->sweetness1, $parent2->sweetness1));
        $sweetness2 = mt_rand(min($parent1->sweetness2, $parent2->sweetness2), max($parent1->sweetness2, $parent2->sweetness2));

        $newPea = new Pea($color1, $color2, $sweetness1, $sweetness2);

        return $newPea;
    }

    public static function isCorrectColorArgument($argument) {
        if (strcmp($argument, 'Y') !== 0 && strcmp($argument, 'g') !== 0) {
            echo "Please only type 'Y' for Yellow and 'g' for Green\n";
        } else {
            return true;
        }
    }

    public static function isCorrectSweetnessArgument($argument) {
        if ($argument > 100 || $argument < 0) {
            echo "Please type a number in the range of 0-100\n";
        } else {
            return True;
        }
    }
}

if (count($argv) < 2) {
    echo "Please use `php index.php display` or `php index.php generate`\n";
    exit(1);
}

$function = $argv[1];

if ($function === 'display') {
    if (count($argv) !== 6) {
        echo "Usage: php index.php display <color1> <color2> <sweetness1> <sweetness2>\n";
        exit(1);
    }

    if (Pea::isCorrectColorArgument($argv[2]) && Pea::isCorrectColorArgument($argv[3]) 
    && Pea::isCorrectSweetnessArgument($argv[4]) && Pea::isCorrectSweetnessArgument($argv[5])){
        $color1 = $argv[2];
        $color2= $argv[3];
        $sweetness1= $argv[4];
        $sweetness2= $argv[5];
        $pea = new Pea($color1, $color2, $sweetness1, $sweetness2);
        Pea::displayPea($pea);
    }
    
} elseif ($function === 'generate') {
    if (count($argv) !== 10) {
        echo "Usage: php index.php generate <color1_P1> <color2_P1> <sweetness1_P1> <sweetness2_P1> <color1_P2> <color2_P2> <sweetness1_P2> <sweetness2_P2>\n";
        exit(1);
    }

    if (Pea::isCorrectColorArgument($argv[2]) && Pea::isCorrectColorArgument($argv[3]) 
    && Pea::isCorrectSweetnessArgument($argv[4]) && Pea::isCorrectSweetnessArgument($argv[5])){
        $color1_P1 = $argv[2];
        $color2_P1 = $argv[3];
        $sweetness1_P1 = (int)$argv[4];
        $sweetness2_P1 = (int)$argv[5];
        $parent1 = new Pea($color1_P1, $color2_P1, $sweetness1_P1, $sweetness2_P1);
    }

    if (Pea::isCorrectColorArgument($argv[6]) && Pea::isCorrectColorArgument($argv[7]) 
    && Pea::isCorrectSweetnessArgument($argv[8]) && Pea::isCorrectSweetnessArgument($argv[9])){
        $color1_P2 = $argv[6];
        $color2_P2 = $argv[7];
        $sweetness1_P2 = (int)$argv[8];
        $sweetness2_P2 = (int)$argv[9];
        $parent2 = new Pea($color1_P2, $color2_P2, $sweetness1_P2, $sweetness2_P2);
    }
    $newPea = Pea::generatePea($parent1, $parent2);
    Pea::displayPea($newPea);
    
} else {
    echo "Please use `php index.php display` or `php index.php generate`\n";
    exit(1);
}