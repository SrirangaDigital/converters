<?php

require_once 'converter.php';

$converter = new Converter();

$text = file_get_contents('/home/sriranga/Documents/others/converters/shreelipiVentura2Unicode/test.txt');

// $text = iconv("UTF-8", "ISO-8859-1", $text);

//~ mb_internal_encoding("Windows-1252");



// var_dump(htmlentities($text));
// $chars = preg_split('//u', $text, null, PREG_SPLIT_NO_EMPTY);

// $ansi = '';
// foreach ($chars as $char) {
	
// }

// $text = '©Æ‹';
$text = 'Æ';
$ansi = mb_chr(mb_ord($text));

// var_dump($ansi);

// var_dump($text);
// var_dump(mb_convert_encoding($text, 'UTF-8', 'Windows-1252'));

//~ var_dump(mb_check_encoding("©®Ü", "Windows-1252"));
//~ $outText = mb_convert_encoding("©®Ü", "UTF-8", "Windows-1252");

//~ var_dump(mb_internal_encoding());


//~ $outText = iconv("Windows-1252", "UTF-8", "©®Ü");
//~ $outText = iconv("UTF-8", "windows-1255", $text);
//~ $outText = utf8_decode($text);

//~ var_dump($outText);
//~ $text = iconv("Windows-1252", "ISO-8859-1", $text);
// $text = $converter->shreelipi2Unicode($text);



// $html = $converter->formHTML($text);

// file_put_contents('/home/sriranga/Desktop/converter/tempHtml.xhtml', $html);
// $text = $converter->convert($html);

file_put_contents('/home/sriranga/Documents/others/converters/shreelipiVentura2Unicode/output.txt', $ansi);

?>
