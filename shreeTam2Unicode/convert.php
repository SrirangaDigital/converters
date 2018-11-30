<?php

require_once 'converter.php';

$converter = new Converter();

$shreelipiText = file_get_contents('/var/www/html/yoga-sutra/xml-sources/tamil-bhashyam/tamil-bhashyam-shreelipi.xml');

$unicodeText = $converter->parseHTML($shreelipiText);

file_put_contents('/var/www/html/yoga-sutra/xml-sources/tamil-bhashyam/tamil-bhashyam.xml', $unicodeText);

?>
