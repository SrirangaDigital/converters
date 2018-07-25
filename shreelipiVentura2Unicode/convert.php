<?php

require_once 'converter.php';

$converter = new Converter();

$text = file_get_contents('/home/sriranga/Documents/others/converters/shreelipiVentura2Unicode/test.txt');

$text = $converter->shreelipi2Unicode($text);
// $html = $converter->formHTML($text);

// file_put_contents('/home/sriranga/Desktop/converter/tempHtml.xhtml', $html);
// $text = $converter->convert($html);

file_put_contents('/home/sriranga/Documents/others/converters/shreelipiVentura2Unicode/output.txt', $text);

?>
