<?php
ini_set('max_execution_time', 900);
function show_ping($url)
{
    $command = 'ping ' . $url;
    $output = [];
    exec($command, $output);
    echo '<b>' . explode(']', explode('[', $output[1])[1])[0] . '</b></br>';
    echo (100 - explode('%', explode('(', $output[8])[1])[0]) . '% packets send successful</br></br>';
}

function show_tracert($url)
{
    $command = 'tracert ' . $url;
    $output = [];
    exec($command, $output);
    echo '<b>' . explode(']', explode('[', $output[1])[1])[0] . '</b></br>';
    for ($i = 4; $i < count($output); $i++) {
        if (strlen($output[$i]) > 0 and $output[$i][strlen($output[$i]) - 1] == ']') {
            echo explode(']', explode('[', $output[$i])[1])[0] . ' ';
        } else if (strlen($output[$i]) > 0 and  is_numeric($output[$i][strlen($output[$i]) - 1])) {
            $line_array = explode(' ', $output[$i]);
            echo $line_array[count($line_array) - 1].' ';
        }
    }
}


if (isset($_REQUEST['url'])) {
    $straight_char_regex = '#^[-_./a-zA-Z0-9]+$#';
    if (preg_match($straight_char_regex, $_REQUEST['url'])) {
        if (isset($_REQUEST['ping'])) {
            show_ping($_REQUEST['url']);
        }
        if (isset($_REQUEST['tracert'])) {
            show_tracert($_REQUEST['url']);
        }
    } else {
        echo "Stop hacking my script, phpdor";
    }
} else {
    include 'form.html';
}


//        ░░░▄▄▄▄▄▄▄░░░░▄▄███▀░░░░░░░░░░░░░░░░░
//        ░░░░▀████░░░░█▀▀██▀░░░░░░░░░░░░░░░░░░
//        ░░░░░█████░░▀░░░░█░░░░░░░▄▄▄▄▄▄▄░░░░░
//        ░░░░░░████▄█░░░░░░░░░░▄███▀░░░▀███▄░░
//        ░░░░░░▀████░░░░░░░░░░▄████░░░░░▀███▄░
//        ░░░░░░░▀████░░░░░░░░░█████░░░░░░████░
//        ░░░░░░░░████▄░░░░░░░░█████░▄░░░░███▀░
//        ░░░░░░░█▀████░░░░░░░░█████░░▀▄▄███▀░░
//        ░░░░░░█░░▀████░░░░░░░█████▄░░░▀▀▀░░░░
//        ░░░▄███░░░████▄░░░░░░█████░▀▄▄░░░░░░░
//        ░░█████░░░░████░░░░░░█████░░░░█▄▄▄▄░░
//        ░░░▀█▀▀░░░░▀████░░░░░█████░░░░████▀░░
//        ░░░██░░░░░░░████▄░░░░█████░░░░████░░░
//        ░▄███▄░░░░░░▀████░░░░█████░░░░████░░░
//        ▀▀▀▀▀▀▀░░░░░░▀▀▀▀▀▀░░█████░░░░████░░░
//        ░░░░░░░░░░░░░░░░░░░░░█████░░░░████░░░
//        ░░░░░░░░░░░░░░░░░░░▄▄█████▄▄▄▄█████▄▄