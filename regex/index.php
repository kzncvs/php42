<?php
function password_check($line)
{
    $reg_length = '/^.{10,}$/';
    if (!preg_match($reg_length, $line)) {
        echo 'Length less than 10</br>';
    }
    $reg_two_numbers = "/^(.*?[0-9]){2,}.*$/";
    if (!preg_match($reg_two_numbers, $line)) {
        echo 'Line isnt contain at least 2 numbers</br>';
    }
    $reg_two_lowercase = "/^(.*?[a-z]){2,}.*$/";
    if (!preg_match($reg_two_lowercase, $line)) {
        echo 'Line isnt contain at least 2 lowercase letters</br>';
    }
    $reg_two_uppercase = "/^(.*?[A-Z]){2,}.*$/";
    if (!preg_match($reg_two_uppercase, $line)) {
        echo 'Line isnt contain at least 2 uppercase letters</br>';
    }
    $reg_two_spec = "/^(.*?[%$#_*]){2,}.*$/";
    if (!preg_match($reg_two_spec, $line)) {
        echo 'Line isnt contain at least 2 %$#_*</br>';
    }
    for ($i = 0; $i < strlen($line) - 2; $i++) {
        $substring = substr($line, $i, 3);
        $reg_three_numbers = "/^[0-9]*$/m";
        $reg_three_lowercase = "/^[a-z]*$/m";
        $reg_three_uppercase = "/^[A-Z]*$/m";
        $reg_three_spec = "/^[%$#_*]*$/m";
        if (preg_match($reg_three_numbers, $substring)) {
            echo "Three numbers in a row: " . $substring . "</br>";
        } else if (preg_match($reg_three_lowercase, $substring)) {
            echo "Three lowercase letters in a row: " . $substring . "</br>";
        } else if (preg_match($reg_three_uppercase, $substring)) {
            echo "Three uppercase letters in a row: " . $substring . "</br>";
        } else if (preg_match($reg_three_spec, $substring)) {
            echo "Three %$#_* in a row: " . $substring . "</br>";
        }
    }
}


if (isset($_REQUEST['password'])) {
    password_check($_REQUEST['password']);
} else {
    include 'form.html';
}


//                        ,--._
//                        `.   `.                      ,-.
//                          `.`. `.                  ,'   )
//                            \`:  \               ,'    /
//                             \`:  ),.         ,-' ,   /
//                             ( :  |:::.    ,-' ,'   ,'
//                             `.;: |::::  ,' ,:'  ,-'
//                             ,^-. `,--.-/ ,'  _,'
//                            (__        ^ ( _,'
//                          __((o\   __   ,-'
//                        ,',-.     ((o)  /
//                      ,','   `.    `-- (
//                      |'      ,`        \
//                      |     ,:' `        |
//                     (  `--      :-.     |
//                     `,.__       ,-,'   ;
//                     (_/  `,__,-' /   ,'
//                    |\`--|_/,' ,' _,'
//                     \_^--^,',-' -'(
//                     (_`--','       `-.
//                      ;;;;'       ::::.`------.
//                        ,::       `::::  `:.   `.
//                       ,:::`       :::::   `::.  \
//                      ;:::::       `::::     `::  \
//                      |:::::        `::'      `:   ;
//                      |:::::.        ;'        ;   | 
//                      |:::::;                   )  |
//                      |::::::        ,   `::'   |  \
//                      |::::::.       ;.   :'    ;   ::.
//                      |::::,::        :.  :   ,;:   |::
//                      ;:::;`"::     ,:::  |,-' `:   |::,
//                      /;::|    `--;""';'  |     :. (`";'
//                      \   ;           ;   |     ::  `,
//                       ;  |           |  ,:;     |  :
//                       |  ;           |  |:;     |  |
//                       |  |           |  |:      |  |
//                       |  |           |  ;:      |  |
//                      /___|          /____|     ,:__|
//                     /    /         /    |     /    )
//                     `---'          '----'      `---'
