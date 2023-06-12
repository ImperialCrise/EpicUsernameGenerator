
# EpicUsernameGenerator

EpicUsernameGenerator is a PHP library for generating unique and captivating usernames. This solution is ideal for creating attractive, memorable usernames for various applications, games or online platforms.

## Features

- Generation of unique pseudonyms based on configurable dictionaries.
- Ability to specify the length of the generated pseudonym.
- Support for different case styles (lowercase, uppercase, capital).
- Addition of random digits for further customization.
- Flexibility to customize configuration as required.

## Installation

1. Clone the repository from GitHub :

```
git clone git@github.com:ImperialCrise/EpicUsernameGenerator.git
```

2. Include the `nouns.php` and `adjectives.php` files in your PHP script.

```php
include 'nouns.php';
include 'adjectives.php';
```

3. Use the `epicUsernameGenerator()` function, passing the desired configuration.

```php
$username = epicUsernameGenerator($config);
```

## Exemple d'utilisation

```php
<?php
include 'nouns.php';
include 'adjectives.php';

// Configuration
$config = [
    'dictionaries' => [
        $nouns,
        $adjectives
    ],
    'randomDigits' => 6,
    'length' => 8,
    'style' => 'lowerCase'
];

// Génération de 30 pseudonymes uniques
for ($a = 0; $a < 30; $a++) {
    $username = epicUsernameGenerator($config);
    echo $username . "<br>";
}
?>
```

## Configuration

Pseudonym generator configuration is defined in the `$config` associative array. Here is a description of the available parameters:

- `'dictionaries'`: An array containing the word dictionaries used to generate pseudonyms. You can include your own dictionaries by adding the corresponding files and including them in your script. The dictionaries supplied (`nouns.php` and `adjectives.php`) are used in the example.
- `'randomDigits'` : The number of random digits to add to the end of the pseudonym.
- `'length'` (optional): The maximum length of the generated pseudonym. If this parameter is omitted, the default value is 15 characters.
- `'style'` (optional): The case style of the generated nickname. Available options are `'lowerCase'` (lowercase), `'capital'` (first letter in uppercase) and `'upperCase'` (all uppercase). If this parameter is omitted, case will be converted to lowercase by default.

Don't hesitate to adjust the configuration to suit your needs, and create your own unique pseudonyms.

## Contributions

Contributions are welcome! If you'd like to improve EpicUsernameGenerator or add new features, feel free to submit a pull request on GitHub.

## License

EpicUsernameGenerator is distributed under the MIT license. Please consult the  `LICENSE` file for more information.

---

*This project is inspired by and based on the original PHP script provided by the user [ImperialCrise](https://github.com/ImperialCrise/).*
