<?php
/**
 * require fakerphp/faker
 */

require_once 'vendor/autoload.php';

$faker = Faker\Factory::create();

$fakePerson['Name: '] = $faker->name();
$fakePerson['E-mail: '] = $faker->email();
$fakePerson['Random text: '] = $faker->text();
$fakePerson['Random digit: '] = $faker->unique()->randomDigit();
$fakePerson['Random word'] = $faker->unique()->word();

show($fakePerson);

/**
 * It displays either a string or an array.
 * If it is an associative array, it display the key in bold
 * 
 * @param $text The string or array to display
 */
function show(string|array $text): void {
    if (gettype($text) === 'string') {
        echo "<p>$text<p>";
    } else {
        foreach ($text as $key => $value) {
            if (is_numeric($key)) {
                show($value);
            } else {
                show("<strong>$key</strong> $value");
            }
        }
    }
}