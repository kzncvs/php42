## Перекодировка файла
Программа считывает с диска текстовый файл и выводит пользователю его содержимое по
строкам, совершая в процессе заданные преобразования. Преобразования могут быть 3 типов:
1. Перевод строки в ВЕРХНИЙ РЕГИСТР или нижний регистр
2. Увеличение или уменьшение всех встречющихся в строке цифр на 1 (9 превращается в 0 или
наоборот, соответственно)
3. Удаление из строки всех указанных символов  

Каждая строка начинается с определённого символа, строка, не начинающаяся ни с одного из
указанных символов не должна быть преобразована, но должна быть выведена всё равно. Все
параметры операций считываются из ini-файла, имя которого совпадает с именем скрипта
(index.php->index.ini) и находится рядом.  

Формат ini-файла прилагается. По первому правилу допустимые значения - любые, приводимые
однозначно к true/false; по второму - только + или -; по третьему - 1 любой символ. В случае
ошибки, выводить понятное описание.

```
[main]
filename="имя входного файла"
[first_rule]
;Начинающиеся с этой последовательности строки преобразуются по правилу 1
symbol="1st"
;В верхний или нижний регистр переводим
upper="true/false"
[second_rule]
;Начинающиеся с этой последовательности строки преобразуются по правилу 2
symbol="2nd"
;Увеличение или уменьшение (+/-)
direction="+"
[third_rule]
;Начинающиеся с этой последовательности строки преобразуются по правилу 2
symbol="3rd"
;Удаляемый символ
delete=" "
