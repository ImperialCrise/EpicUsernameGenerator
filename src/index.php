<?php

include 'nouns.php';
include 'adjectives.php';

function randomNumber($maxNumber)
{
    if ($maxNumber < 1 || $maxNumber > 6) {
        return '';
    }

    $min = pow(10, $maxNumber - 1);
    $max = pow(10, $maxNumber) - 1;

    return rand($min, $max);
}

function uniqueUsernameGenerator($config)
{
    if (!isset($config['dictionaries'])) {
        throw new Exception("Cannot find any dictionary. Please provide at least one, or leave the 'dictionary' field empty in the config object");
    } else {
        $dictionariesLength = count($config['dictionaries']);
        $name = '';
        for ($i = 0; $i < $dictionariesLength; $i++) {
            if ($name && isset($config['separator']) ) {
                $randomIndex = rand(0, (count($config['dictionaries'][$i])-1));
                $name .= ($config['separator'] ? $config['separator'] : '') . $config['dictionaries'][$i][$randomIndex];
            } else {
                $randomIndex = rand(0, (count($config['dictionaries'][$i])-1));
                $randomName = $config['dictionaries'][$i][$randomIndex];
                $nameLength = rand(4, strlen($randomName)/2);
                $name .= substr($randomName, 0, $nameLength);
            }
        }

        $username = $name . randomNumber($config['randomDigits']);

        $username = strtolower($username);

        if (isset($config['style'])) {
            $style = $config['style'];
            if ($style === 'lowerCase') {
                $username = strtolower($username);
            } else if ($style === 'capital') {
                $username = ucfirst($username);
            } else if ($style === 'upperCase') {
                $username = strtoupper($username);
            }
        }

        if (isset($config['length'])) {
            $username = substr($username, 0, $config['length']);
        } else {
            $username = substr($username, 0, 15);
        }

        return $username;
    }
}

// Example
$config = [
    'dictionaries' => [
        $nouns,
        $adjectives
    ],
    'randomDigits' => 6,
    'length' => 8,
    'style' => 'capital'
];

for ($a=0; $a < 30; $a++) { 
$username = uniqueUsernameGenerator($config);
echo $username . "<br>";
}


?>
