<?php

function swap(&$x, &$y)
{
    $z = $x;
    $x = $y;
    $y = $z;
}


function lines_to_array(string $lines)
{
    $lines_array = explode(PHP_EOL, $lines);
    $lines_words_array = [];
    foreach ($lines_array as $line) {
        array_push($lines_words_array, explode(' ', $line));
    }
    return $lines_words_array;
}


function add_extra_strings(&$lines_words_array)
{
    $start_array_length = count($lines_words_array);
    for ($i = 0; $i < $start_array_length; $i++) {
        $now_string = $lines_words_array[$i];
        shuffle($now_string);
        array_push($lines_words_array, $now_string);
    }
}


function second_word_sort($lines_words_array)
{
    $lines_array = [];
    for ($i = 0; $i < count($lines_words_array); $i++) {
        swap($lines_words_array[$i][0], $lines_words_array[$i][1]);
        array_push($lines_array, implode(' ', $lines_words_array[$i]));
    }
    asort($lines_array, SORT_STRING);
    $new_lines_words_array = [];
    foreach ($lines_array as $kek) {
        $line_array = explode(' ', $kek);
        swap($line_array[0], $line_array[1]);
        array_push($new_lines_words_array, $line_array);
    }
    return $new_lines_words_array;
}


function array_print($array)
{
    foreach ($array as $kek) {
        foreach ($kek as $kok) {
            echo $kok . ' ';
        }
        echo '</br>';
    }
}


if (isset($_REQUEST['strings'])) {
    $kek = lines_to_array($_REQUEST['strings']);
    add_extra_strings($kek);
    $kok = second_word_sort($kek);
    array_print($kok);
} else {
    include 'form.html';
}



//                                                      ,::::.._
//                                                   ,':::::::::.
//                                               _,-'`:::,::(o)::`-,.._
//                                            _.', ', `:::::::::;'-..__`.
//                                          _.-'' ' ,' ,' ,\:::,'::-`'''
//                                   _.-'' , ' , ,'  ' ,' `:::/
//                             _..-'' , ' , ' ,' , ,' ',' '/::
//                     _...:::'`-..'_, ' , ,'  , ' ,'' , ,'::|
//                  _`.:::::,':::::,'::`-:..'_',_'_,'..-'::,'|
//          _..-:::'::,':::::::,':::,':,'::,':::,'::::::,':::;
//            `':,'::::::,:,':::::::::::::::::':::,'::_:::,'/
//        __..:'::,':::::::--''' `-:,':,':::'::-' ,':::/
//       _.::::::,:::.-''-`-`..'_,'. ,',  , ' , ,'  ', `','
//     ,::SSt:''''`                 \:. . ,' '  ,',' '_,'
//                                   ``::._,'_'_,',.-'
//                                       \\ \\
//                                        \\_\\
//                                         \\`-`.-'_
//                                      .`-.\\__`. ``
//                                         ``-.-._
//                                             `