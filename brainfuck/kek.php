<?php
// Parsing data from request
$code = '';
$data = '';
try {
    if (!isset($_REQUEST['code']) or !isset($_REQUEST['data'])) {
        throw new Exception("Invalid entry form");
    }
     elseif ($_REQUEST['code'] == '') {
        throw new Exception("Code string is empty");
    }
    $code = $_REQUEST['code'];
    $data = $_REQUEST['data'];
} catch (Exception $e) {
    echo $e->getMessage();
    exit;
}

// Initialising "infinity" array and pointer for it
$brainfuck_array = [];
$brainfuck_array[0] = 0;
$array_pointer = 0;

$output_string = "";

// Pointer for $data
$data_pointer = 0;

// Handling brainfuck commands from string character by character
for ($i = 0; $i < strlen($code); $i++) {
    switch ($code[$i]) {
        case '>':
            $array_pointer++;
            // Checking for empty array value, filling with 0 if necessary
            if (!isset($brainfuck_array[$array_pointer])) {
                $brainfuck_array[$array_pointer] = 0;
            }
            break;
        case '<':
            $array_pointer--;
            // Checking for empty array value, filling witn 0 if necessary
            if (!isset($brainfuck_array[$array_pointer])) {
                $brainfuck_array[$array_pointer] = 0;
            }
            break;
        case '+':
            $brainfuck_array[$array_pointer]++;
            // Emulating increment loop
            if ($brainfuck_array[$array_pointer] == 256) {
                $brainfuck_array[$array_pointer] = 0;
            }
            break;
        case '-':
            $brainfuck_array[$array_pointer]--;
            // Emulating decrement loop
            if ($brainfuck_array[$array_pointer] == -1) {
                $brainfuck_array[$array_pointer] = 255;
            }
            break;
        case '.':
            $output_string .= chr($brainfuck_array[$array_pointer]);
            break;
        case ',':
            $brainfuck_array[$array_pointer] = ord($data[$data_pointer]);
            $data_pointer++;
            break;
        case '[':
            if ($brainfuck_array[$array_pointer] == 0) {
                // Searching for paired brackets in the code string
                $brackets_counter = 0;
                while (true) {
                    if ($code[$i] == '[') {
                        $brackets_counter++;
                    } elseif ($code[$i] == ']') {
                        $brackets_counter--;
                    }
                    $i++;
                    if ($brackets_counter == 0) {
                        break;
                    }
                }
            }
            break;
        case ']':
            if ($brainfuck_array[$array_pointer] != 0) {
                // Searching for paired brackets in the code string
                $brackets_counter = 0;
                while (true) {
                    if ($code[$i] == ']') {
                        $brackets_counter++;
                    } elseif ($code[$i] == '[') {
                        $brackets_counter--;
                    }
                    $i--;
                    if ($brackets_counter == 0) {
                        break;
                    }
                }
            }
            break;
    }
}
echo $output_string;


//    44      44      2222222222
//    44      44              22
//    44      44              22
//    4444444444      2222222222
//            44      22
//            44      22
//            44      2222222222
