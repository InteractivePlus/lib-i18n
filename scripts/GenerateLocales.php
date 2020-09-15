<?php
$text = "";
foreach(ResourceBundle::getLocales('') as $locale){
    $text .= '\'' . $locale . '\', ';
}
$text .= "\r\n\r\n";
foreach(ResourceBundle::getLocales('') as $locale){
    $text .= 'const LOCALE_' . $locale . ' = ' . '\'' . $locale . '\';';
    $text .= "\r\n";
}
file_put_contents("output.txt",$text);