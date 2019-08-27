<?php
/*
 * Ignore the top section,
 * it is just formatting to make output clearer.
 */

$format = '(%1$2d = %1$04b) = (%2$2d = %2$04b)'
        . ' %3$s (%4$2d = %4$04b)' . "\n";

echo <<<EOH
 ---------     ---------  -- ---------
 result        value      op test
 ---------     ---------  -- ---------
EOH;


/*
 * Here are the examples.
 */

$values = array(0, 1, 2, 4, 8);
$test = 1 + 4;

echo "\n Bitwise AND \n";
foreach ($values as $value) {
    $result = $value & $test;
    printf($format, $result, $value, '&', $test);
}

echo "\n Bitwise Inclusive OR \n";
foreach ($values as $value) {
    $result = $value | $test;
    printf($format, $result, $value, '|', $test);
}

echo "\n Bitwise Exclusive OR (XOR) \n";
foreach ($values as $value) {
    $result = $value ^ $test;
    printf($format, $result, $value, '^', $test);
}

echo '<br>';

echo 12 ^ 9; // Outputs '5'

echo "12" ^ "9"; // Outputs the Backspace character (ascii 8)
                 // ('1' (ascii 49)) ^ ('9' (ascii 57)) = #8

echo "hallo" ^ "hello"; // Outputs the ascii values #0 #4 #0 #0 #0
                        // 'a' ^ 'e' = #4

echo 2 ^ "3"; // Outputs 1
              // 2 ^ ((int)"3") == 1

echo "2" ^ 3; // Outputs 1
              // ((int)"2") ^ 3 == 1








?>