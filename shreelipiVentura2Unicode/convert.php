<?php

require_once 'converter.php';

$converter = new Converter();

$text = file_get_contents('/home/sriranga/Desktop/converter/src/LALITA3.VEN');

$text = $converter->ventura2Text($text);
$html = $converter->formHTML($text);

file_put_contents('/home/sriranga/Desktop/converter/tempHtml.xhtml', $html);
$text = $converter->convert($html);

file_put_contents('/home/sriranga/Desktop/converter/temp.xhtml', $text);


?>
