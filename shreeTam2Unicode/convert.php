<?php

require_once 'converter.php';

$converter = new Converter();

$ansiText = file_get_contents('/home/sriranga/Documents/others/converters/shreeTam2Unicode/input.txt');

// $ansiText = $converter->utf82ansi($text);
$unicodeText = $converter->shreeTam2Unicode($ansiText);

file_put_contents('/home/sriranga/Documents/others/converters/shreeTam2Unicode/output.txt', $unicodeText);

?>
