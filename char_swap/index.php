<?php

function characters_replacement(string $line, int &$counter)
{
    for ($i = 0; $i < strlen($line); $i++) {
        switch ($line[$i]) {
            case 'h':
                $counter++;
                yield '4';
                break;
            case 'l':
                $counter++;
                yield '1';
                break;
            case 'e':
                $counter++;
                yield '3';
                break;
            case 'o':
                $counter++;
                yield '0';
                break;
            default:
                yield $line[$i];
        }
    }
}


function line_handler(string $input_line)
{
    $replacement_counter = 0;
    $final_line = '';
    foreach (characters_replacement($input_line, $replacement_counter) as $character) {
        $final_line .= $character;
    }
    return ['line' => $final_line, 'replacements' => $replacement_counter];
}

if (isset($_REQUEST['string'])) {
    $kek = line_handler($_REQUEST['string']);
    $result = $kek['line'] . '<br/>Replacements: ' . $kek['replacements'];
    echo $result;
} else {
    include 'form.html';
}



//    Сергей Казанцев, [27.02.18 16:03]
//    можно переменные на русском писать
//
//    Сергей Казанцев, [27.02.18 16:03]
//    С ЭМОДЗИ
//
//    Илья "Ilk" Кошарский, [27.02.18 16:04]
//    технически наверное можно, но я тебе леща дам, если ты мне такой код принесёшь
//
//    .∧✡️∧
//    ( ･ω･｡)つ🐟🐟*。
//    ⊂. ノ ...・゜+.
//    しーＪ...°。+ *´¨)
//    ..........· ´¸.·*´¨) ¸.·*¨)
//    ..........(¸.·´ (¸.·'* ☆ БДЫЩ, И ТЫ КОДИШЬ БЕЗ ЭМОДЗИ ☆
