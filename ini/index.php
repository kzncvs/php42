<?php
define("INI_FILE_NAME", 'index.ini');

$ini_array = parse_ini_file(INI_FILE_NAME, true);
print_r($ini_array);

$file_for_edit = $ini_array['main']['filename'];

$first_rule_seq = $ini_array['first_rule']['symbol'];
$first_rule_upper = $ini_array['first_rule']['upper'];

$second_rule_seq = $ini_array['second_rule']['symbol'];
$second_rule_direction = $ini_array['second_rule']['direction'];

$third_rule_seq = $ini_array['second_rule']['symbol'];
$second_rule_direction = $ini_array['second_rule']['delete'];




