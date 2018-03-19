<?php

function parse_to_dict($input_data)
{
    $lines_array = explode(PHP_EOL, $input_data);
    $lines_words_array = [];
    foreach ($lines_array as $line) {
        array_push($lines_words_array, explode(' ', $line));
    }
    $weight_sum = 0;
    foreach ($lines_words_array as $line) {
        $weight_sum += $line[count($line) - 1];
    }
    $data_array = [];
    foreach ($lines_words_array as $line) {
        $now_string = [];
        $now_string['weight'] = $line[count($line) - 1];
        $now_string['probability'] = (1 / $weight_sum) * $line[count($line) - 1];
        $text = '';
        for ($i = 0; $i < count($line) - 1; $i++) {
            $text .= $line[$i] . ' ';
        }
        $now_string['text'] = $text;
        array_push($data_array, $now_string);
    }
    $final_dict = [];
    $final_dict['sum'] = $weight_sum;
    $final_dict['data'] = $data_array;
    return $final_dict;
}


function echo_json_from_dict($dict)
{
    echo json_encode($dict);
}


if (isset($_REQUEST['data'])) {
    $kar = parse_to_dict($_REQUEST['data']);
    echo_json_from_dict($kar);
} else {
    include 'form.html';
}
