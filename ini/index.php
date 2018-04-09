<?php
define("INI_FILE_NAME", 'index.ini');


$ini_array = parse_ini_file(INI_FILE_NAME, true);


$first_rule_seq = $ini_array['first_rule']['symbol'];
$first_rule_upper = $ini_array['first_rule']['upper'];

$second_rule_seq = $ini_array['second_rule']['symbol'];
$second_rule_direction = $ini_array['second_rule']['direction'];

$third_rule_seq = $ini_array['third_rule']['symbol'];
$third_rule_delete = $ini_array['third_rule']['delete'];

$file_link = $ini_array['main']['filename'];
$file_lines = file($file_link);


foreach ($file_lines as $line) {
    if (strpos($line, $first_rule_seq) === 0) {
        if ($first_rule_upper) {
            echo strtoupper($line) . '<br>';
        } else {
            echo strtolower($line) . '<br>';
        }
    } else if (strpos($line, $second_rule_seq) === 0) {
        for ($i = 0; $i < strlen($line); $i++) {
            $char = $line[$i];
            if (is_numeric($char)) {
                if ($second_rule_direction == '+') {
                    if ($char >= 0 and $char < 9) {
                        echo $char + 1;
                    } else {
                        echo '0';
                    }
                } else if ($second_rule_direction == '-') {
                    if ($char <= 9 and $char > 0) {
                        echo $char - 1;
                    } else {
                        echo '9';
                    }
                }
            } else {
                echo $char;
            }
        }
        echo '<br>';
    } else if (strpos($line, $third_rule_seq) === 0) {
        for ($i = 0; $i < strlen($line); $i++) {
            $char = $line[$i];
            if ($char != $third_rule_delete) {
                echo $char;
            }
        }
        echo '<br>';
    } else {
        echo $line . '<br>';
    }
}


//                   /\
//                  /  \
//                 / /\ \
//        ________/ /__\_\________
//        \  ____/ /___________  /
//         \ \  / /      \ \  / /
//          \ \/ /        \ \/ /
//           \ \/          \ \/
//           /\ \          /\ \
//          / /\ \        / /\ \
//         / /__\_\______/ /__\ \
//        /_____________/ /______\
//                \ \  / /
//                 \ \/ /
//                  \  /
//                   \/
