<?php

require_once 'converter.php';

$converter = new Converter();

$ansiText = file_get_contents('/home/sriranga/Documents/others/converters/shreeSan2Unicode/input.txt');

// $ansiText = $converter->utf82ansi($text);
$unicodeText = $converter->shreeSan2Unicode($ansiText);

file_put_contents('/home/sriranga/Documents/others/converters/shreeSan2Unicode/output.txt', $unicodeText);

?>
