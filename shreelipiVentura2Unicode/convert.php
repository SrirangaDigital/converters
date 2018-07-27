<?php

require_once 'converter.php';

$converter = new Converter();

$ansiText = file_get_contents('/home/sriranga/Documents/others/converters/shreelipiVentura2Unicode/test.txt');

// $ansiText = $converter->utf82ansi($text);
$unicodeText = $converter->shreelipi2Unicode($ansiText);

// file_put_contents('/home/sriranga/Documents/others/converters/shreelipiVentura2Unicode/outputAnsi.txt', $ansiText);
file_put_contents('/home/sriranga/Documents/others/converters/shreelipiVentura2Unicode/outputUnicode.txt', $unicodeText);

?>
