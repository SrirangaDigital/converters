<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Basic Page Needs
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <meta charset="utf-8">
    <title>Converters</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Mobile Specific Metas
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Javascript calls
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    
    <!-- CSS
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="css/navbar.css?v=1.0">
    <link rel="stylesheet" href="css/homepage.css?v=1.0">
</head>
<body>
    <!-- Navigation
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <nav id="mainNavBar" class="navbar navbar-light navbar-expand-lg fixed-top">
        <div class="container-fluid clear-paddings">
            <a class="navbar-brand" href="#"><img src="images/logo_sriranga.png" alt="Logo" class="Sriranga logo"></a>
            <p class="navbar-text" id="navbarText">Sriranga Digital Software Technologies<br /><small>Private Limited</small></p>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
<?php

	require "menu.php"

?>
        </div>
    </nav>
    <!-- End Navigation
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->    

<?php

    if(isset($_POST['inputtext'])){

        $inpuApsText = $_POST['inputtext'];
        $outputText = APS2UnicodeNew($inpuApsText);
    }

    function ConvertToAPS($text){

        $tmpTXTFile = "tmp.txt";
        $tmpHTMLFile = "tmp.html";

        if(file_put_contents($tmpTXTFile, $text . "\n"))
        {
            exec("perl to_uni.pl " .  $tmpTXTFile . "  " . $tmpHTMLFile, $out, $err);

            if($err){
                echo "Failure " . $err;
                // print_r( $out );
            }

            $outputString = rtrim(file_get_contents($tmpHTMLFile),"\n");
            $outputString = str_replace('﻿', '', $outputString);
        }
        else{
                $outputString = "ERROR";   
        }
        return $outputString;

    }

	function APS2UnicodeNew($contents) {

		$middleJoiner = "&|=|B|d|g|Q|s|t|w|W|x|X|z|Z|¸|Ç|ê|Ë|ï|Ï|Ò|Ò|ü|b|@";
		$rightJoiner = "r";

		// Cleanup
		$contents = preg_replace("/($middleJoiner)\\1/u", "$1", $contents);
		$contents = preg_replace("/($rightJoiner)\\1/u", "$1", $contents);
		$contents = preg_replace("/($middleJoiner)Ç/u", "Ç$1", $contents);
		$contents = preg_replace("/B($middleJoiner)/u", "$1B", $contents);
		$contents = preg_replace("/b($middleJoiner)/u", "$1b", $contents);

		//~ Danda is inherent and need not be specifically present in the following cases
		$contents = str_replace('eA', 'A', $contents);
		$contents = str_replace('eE', 'E', $contents);
		$contents = str_replace('eR', 'R', $contents);
		$contents = str_replace('e\\', '\\', $contents);
		$contents = str_replace('ea', 'a', $contents);
		$contents = str_replace('ef', 'f', $contents);
		$contents = str_replace('eq', 'q', $contents);
		$contents = str_replace('er', 'r', $contents);
		$contents = str_replace('e|', '|', $contents);
		$contents = str_replace('eé', 'é', $contents);

		//~ ka, va, pa, pha, kta, kra, kna, kva, kka case

		$contents = str_replace('keä', 'क्', $contents);
		$contents = str_replace('Jeä', 'क्', $contents);
		$contents = str_replace('›eä', 'क्र्', $contents);
		$contents = str_replace('$eä', 'क्र्', $contents);
		$contents = str_replace('Äeä', 'क्न्', $contents);
		$contents = str_replace('×eä', 'क्व्', $contents);
		$contents = str_replace('òeä', 'क्त्', $contents);
		$contents = str_replace('Heä', 'फ्', $contents);
		$contents = str_replace('heä', 'फ्', $contents);
		$contents = str_replace('øeä', 'फ्र्', $contents);

		$contents = preg_replace("/(k|›|\\$|Ä|×|ò|J|H|h|ø)e(($middleJoiner)($middleJoiner)|($middleJoiner))â/", "$1eâ$2", $contents);

		$contents = str_replace('keâ', 'क', $contents);
		$contents = str_replace('Jeâ', 'क', $contents);
		$contents = str_replace('›eâ', 'क्र', $contents);
		$contents = str_replace('$eâ', 'क्र', $contents);
		$contents = str_replace('Äeâ', 'क्न', $contents);
		$contents = str_replace('×eâ', 'क्व', $contents);
		$contents = str_replace('òeâ', 'क्त', $contents);
		$contents = str_replace('Heâ', 'फ', $contents);
		$contents = str_replace('heâ', 'फ', $contents);
		$contents = str_replace('øeâ', 'फ्र', $contents);

		$contents = str_replace('×e¹', 'क्क', $contents);
		$contents = str_replace('F&', 'ई', $contents);
		$contents = str_replace('FË', 'ईं', $contents);
		$contents = str_replace('Gâ', 'T', $contents);

		 
		//~ ऋ case
		$contents = str_replace('$e+', 'ऋ', $contents);
		$contents = str_replace('$e&+', 'र्ऋ', $contents);
		$contents = str_replace('$eb+', 'ऋं', $contents);


		//Lookup
		$contents = str_replace('!', '!', $contents);
		$contents = str_replace('"', 'ठ', $contents);
		$contents = str_replace('#', 'क्ष्', $contents);
		$contents = str_replace('$', 'त्र्', $contents);
		$contents = str_replace('%', 'ज्ञ्', $contents);
		$contents = str_replace('&', '&', $contents);
		$contents = str_replace("'", "'", $contents);
		$contents = str_replace('(', '(', $contents);
		$contents = str_replace(')', ')', $contents);
		$contents = str_replace('*', 'ङ', $contents);
		//~ $contents = str_replace('+', '', $contents);
		$contents = str_replace(',', ',', $contents);
		//~ $contents = str_replace('-', '-', $contents);
		$contents = str_replace('.', '.', $contents);
		$contents = str_replace('/', '/', $contents);
		$contents = str_replace('0', '०', $contents);
		$contents = str_replace('1', '१', $contents);
		$contents = str_replace('2', '२', $contents);
		$contents = str_replace('3', '३', $contents);
		$contents = str_replace('4', '४', $contents);
		$contents = str_replace('5', '५', $contents);
		$contents = str_replace('6', '६', $contents);
		$contents = str_replace('7', '७', $contents);
		$contents = str_replace('8', '८', $contents);
		$contents = str_replace('9', '९', $contents);
		$contents = str_replace(':', 'ः', $contents);
		$contents = str_replace(';', ';', $contents);
		$contents = str_replace('<', 'ष्', $contents);
		$contents = str_replace('=', 'ृ', $contents);
		$contents = str_replace('>', '्न', $contents);
		$contents = str_replace('?', '?', $contents);
		$contents = str_replace('@', 'ॅ', $contents);
		$contents = str_replace('A', '&ीं', $contents);
		$contents = str_replace('B', 'ँ', $contents);
		$contents = str_replace('C', 'ण्', $contents);
		$contents = str_replace('D', 'अ्', $contents);
		//~ $contents = str_replace('E', 'E', $contents);//fं
		$contents = str_replace('F', 'इ', $contents);
		$contents = str_replace('G', 'उ', $contents);
		$contents = str_replace('H', 'प्', $contents); // Defaulted to pa
		$contents = str_replace('I', 'घ्', $contents);
		$contents = str_replace('J', 'व्', $contents); // Defaulted to va
		$contents = str_replace('K', 'ख्', $contents);
		$contents = str_replace('L', 'थ्', $contents);
		$contents = str_replace('M', 'श्', $contents);
		$contents = str_replace('N', 'ऱ्', $contents);
		$contents = str_replace('O', 'ध्', $contents);
		$contents = str_replace('P', 'झ्', $contents);
		$contents = str_replace('Q', 'ैं', $contents);
		$contents = str_replace('R', 'ीं', $contents);
		$contents = str_replace('S', 'ए', $contents);
		$contents = str_replace('T', 'ऊ', $contents);
		$contents = str_replace('U', 'ळ', $contents);
		$contents = str_replace('V', 'न्न्', $contents);
		$contents = str_replace('W', 'ें', $contents);
		$contents = str_replace('X', '&ें', $contents);
		$contents = str_replace('Y', 'भ्', $contents);
		$contents = str_replace('Z', '&ैः', $contents);
		$contents = str_replace('[', 'ड', $contents);
		//~ $contents = str_replace("\\", '\\', $contents);//र्fं
		$contents = str_replace(']', ']', $contents); //Handled in post processing
		$contents = str_replace('^', '्र', $contents);
		$contents = str_replace('_', 'ञ्', $contents);
		//~ $contents = str_replace('`', '`', $contents);
		$contents = str_replace('a', '&ी', $contents);
		$contents = str_replace('b', 'ं', $contents);
		$contents = str_replace('c', 'म्', $contents);
		$contents = str_replace('d', '्', $contents);
		$contents = str_replace('e', 'e', $contents); //???? Handled in post processing
		//~ $contents = str_replace('f', 'f', $contents); //f Handled in post processing
		$contents = str_replace('g', 'ु', $contents);
		$contents = str_replace('h', 'प्', $contents); // Defaulted to pa; pha handled above
		$contents = str_replace('i', 'ग्', $contents);
		$contents = str_replace('j', 'र', $contents);
		$contents = str_replace('k', 'व्', $contents);  //ka handled in pre processing;  // Defaulted to va
		$contents = str_replace('l', 'त्', $contents);
		$contents = str_replace('m', 'स्', $contents);
		$contents = str_replace('n', 'ह', $contents);
		$contents = str_replace('o', 'द', $contents);
		$contents = str_replace('p', 'ज्', $contents);
		$contents = str_replace('q', 'f', $contents);// consider this as f (ikara)
		$contents = str_replace('r', 'ी', $contents);
		$contents = str_replace('s', 'े', $contents);
		$contents = str_replace('t', 'ू', $contents);
		$contents = str_replace('u', 'ल्', $contents);
		$contents = str_replace('v', 'न्', $contents);
		$contents = str_replace('w', 'ै', $contents);
		$contents = str_replace('x', '&े', $contents);
		$contents = str_replace('y', 'ब्', $contents);
		$contents = str_replace('z', '&ै', $contents);
		$contents = str_replace('{', 'ढ', $contents);
		//~ $contents = str_replace('|', '|' , $contents);//fर्
		$contents = str_replace('}', 'ल', $contents);
		$contents = str_replace('~', '।', $contents);
		$contents = str_replace('¡', 'ख्र्', $contents);
		$contents = str_replace('¢', 'ह्य्', $contents);
		$contents = str_replace('£', 'ह्व', $contents);
		$contents = str_replace('¤', 'रू', $contents);
		$contents = str_replace('¥', 'ह्ल', $contents);
		$contents = str_replace('¦', '¦', $contents); //Left as it is as no use case found
		$contents = str_replace('§', 'श्च्', $contents);
		$contents = str_replace('©', 'द्म्', $contents);
		$contents = str_replace('ª', 'ट्ठ', $contents);
		$contents = str_replace('«', 'ग्र्', $contents);
		$contents = str_replace('®', 'रु', $contents);
		$contents = str_replace('°', 'ष्ट', $contents);
		$contents = str_replace('¶', '¶', $contents); //Left as it is as no use case found
		$contents = str_replace('¸', 'ॄ', $contents);
		$contents = str_replace('¹', '¹', $contents); //Handled in post processing kka case
		$contents = str_replace('º', 'ड्ढ', $contents);
		$contents = str_replace('»', 'ज्र्', $contents);
		$contents = str_replace('¼', 'ल्ल', $contents);
		$contents = str_replace('½', 'छ्व', $contents);
		$contents = str_replace('¿', 'ङ्क', $contents);
		$contents = str_replace('À', 'ञ्ज्', $contents);
		$contents = str_replace('Á', 'ङ्ग', $contents);
		$contents = str_replace('Â', 'दृ', $contents);
		$contents = str_replace('Ã', 'ञ्च्', $contents);
		$contents = str_replace('Ä', 'व्न्', $contents); //Handled in pre processing
		$contents = str_replace('Å', 'द्य्', $contents);
		$contents = str_replace('Æ', 'द्भ', $contents);
		$contents = str_replace('Ç', '्र', $contents);
		$contents = str_replace('È', 'ङ्ख', $contents);
		$contents = str_replace('É', 'द्व', $contents);
		$contents = str_replace('Ê', 'Ê', $contents); //May be a notation for shortform; left as it is
		$contents = str_replace('Ë', '&ं', $contents);
		$contents = str_replace('Ì', ']', $contents); //Dot below case handled at the bottom
		$contents = str_replace('Í', '्रू', $contents);
		$contents = str_replace('Î', '्रु', $contents);
		$contents = str_replace('Ï', 'ु', $contents);
		$contents = str_replace('Ñ', 'ढ्ढ', $contents);
		$contents = str_replace('Ò', 'ू', $contents);
		$contents = str_replace('Ó', 'ऽ', $contents);
		$contents = str_replace('Ô', 'ॐ', $contents);
		$contents = str_replace('Õ', 'श्व्', $contents);
		$contents = str_replace('Ö', 'ह्न', $contents);
		$contents = str_replace('×', '×', $contents); //Handled in post processing kka case
		$contents = str_replace('Ø', 'प्र्', $contents);
		$contents = str_replace('Ù', 'य्', $contents);
		$contents = str_replace('Ú', 'छ', $contents);
		$contents = str_replace('Û', 'च्', $contents);
		$contents = str_replace('Ü', 'ह्र', $contents);
		$contents = str_replace('Ý', 'ङ्क्त', $contents);
		$contents = str_replace('Þ', 'द्द्र', $contents);
		$contents = str_replace('ß', 'श्र्', $contents);
		$contents = str_replace('à', 'ळ्', $contents);
		$contents = str_replace('á', 'e', $contents); // Considered as danda
		$contents = str_replace('â', 'â', $contents); // क and फ case 
		$contents = str_replace('ã', 'झ्र्', $contents); //???? verify
		$contents = str_replace('ä', 'ä', $contents); // right side glyph of ka in case of conjuncts
		$contents = str_replace('å', 'ह्', $contents);
		$contents = str_replace('æ', 'द्ध', $contents);
		$contents = str_replace('ç', 'श्', $contents);
		$contents = str_replace('è', 'लृ', $contents);
		//~ $contents = str_replace('é', 'é', $contents); //fं
		$contents = str_replace('ê', '्ल', $contents);
		$contents = str_replace('ë', 'श्', $contents);
		$contents = str_replace('ì', 'e', $contents); // Considered as danda
		$contents = str_replace('í', 'e', $contents); // Considered as danda
		$contents = str_replace('î', 'î', $contents);
		$contents = str_replace('ï', 'ï', $contents); //mostly LR, left as it is
		$contents = str_replace('ð', 'ष्ट्व', $contents);
		$contents = str_replace('ñ', 'ड्ड', $contents);
		$contents = str_replace('ò', 'त्त्', $contents);
		$contents = str_replace('ó', 'ट्ट', $contents);
		$contents = str_replace('ô', 'द्ब', $contents);
		$contents = str_replace('õ', 'द्र', $contents);
		$contents = str_replace('ö', 'द्द', $contents);
		$contents = str_replace('÷', 'ङ्क्ष', $contents);
		$contents = str_replace('ø', 'प्र्', $contents);
		$contents = str_replace('ù', 'हृ', $contents);
		$contents = str_replace('ú', 'ठ्ठ', $contents);
		$contents = str_replace('û', 'द्ग', $contents);
		$contents = str_replace('ü', '्र', $contents);
		$contents = str_replace('ý', 'ॠ', $contents);
		$contents = str_replace('þ', 'ह्ण', $contents);
		$contents = str_replace('ÿ', 'ह्म्', $contents);
		$contents = str_replace('Œ', 'स्त्र्', $contents);
		$contents = str_replace('œ', 'स्र्', $contents);
		$contents = str_replace('Š', 'ः', $contents);
		$contents = str_replace('š', 'ट', $contents);
		$contents = str_replace('Ÿ', '्य्', $contents);
		$contents = str_replace('ƒ', 'e', $contents); // Considered as danda
		//~ $contents = str_replace('–', '–', $contents);
		//~ $contents = str_replace('—', '—', $contents);
		$contents = str_replace('‘', '‘', $contents);
		$contents = str_replace('’', '’', $contents);
		$contents = str_replace('“', 'ङ्ख', $contents);
		$contents = str_replace('”', 'ङ्ग', $contents);
		$contents = str_replace('„', 'ष्ट', $contents);
		$contents = str_replace('†', 'e', $contents); // Considered as danda
		$contents = str_replace('‡', 'e', $contents); // Considered as danda
		$contents = str_replace('…', 'ष्ठ', $contents);
		$contents = str_replace('‰', 'ष्ठ', $contents);
		$contents = str_replace('‹', 'ङ्घ', $contents);
		$contents = str_replace('›', 'व्र्', $contents); //ka and va case
		$contents = str_replace('™', 'रू', $contents);


		$contents = str_replace('्ee', 'ा', $contents);
		$contents = str_replace('्e', '', $contents);
		$contents = str_replace('e', 'ा', $contents);
		$contents = str_replace('ाै', 'ौ', $contents);
		$contents = str_replace('ाे', 'ो', $contents);
		$contents = str_replace('्ंा' , 'ं', $contents);
		$contents = str_replace('अा', 'आ', $contents);
		$contents = str_replace('अो', 'ओ', $contents);
		$contents = str_replace('अौ', 'औ', $contents);
		$contents = str_replace('आॅ', 'ऑ', $contents);
		$contents = str_replace('अॅ', 'ॲ', $contents);
		$contents = str_replace('एे', 'ऐ', $contents);
		$contents = str_replace('एॅ', 'ऍ', $contents);
		$contents = str_replace('ाॅ', 'ॉ', $contents);

		//~ Post processing
		$contents = str_replace(']न', 'ऩ', $contents);
		$contents = str_replace(']र', 'ऱ', $contents);
		$contents = str_replace(']ळ', 'ऴ', $contents);
		$contents = str_replace(']क', 'क़', $contents);
		$contents = str_replace(']ख', 'ख़', $contents);
		$contents = str_replace(']ग', 'ग़', $contents);
		$contents = str_replace(']ज', 'ज़', $contents);
		$contents = str_replace(']ड', 'ड़', $contents);
		$contents = str_replace(']ढ', 'ढ़', $contents);
		$contents = str_replace(']फ', 'फ़', $contents);
		$contents = str_replace(']य', 'य़', $contents);

		$contents = str_replace('±', '+', $contents);
		$contents = str_replace('²', '×', $contents);
		$contents = str_replace('³', '%', $contents);
		$contents = str_replace('´', '÷', $contents);
		$contents = str_replace('μ', '*', $contents);
		$contents = str_replace('•', '=', $contents);
		$contents = str_replace(']', '.', $contents);
		$contents = str_replace('`', '‘', $contents);
		$contents = str_replace('‘‘', '“', $contents);
		$contents = str_replace('\'', '’', $contents);
		$contents = str_replace('’’', '”', $contents);
		$contents = str_replace('।।', '॥', $contents);

		$contents = str_replace(' ञ् ', ' — ', $contents);

		$contents = invertIkara($contents);
		$contents = invertRepha($contents);

		$contents = str_replace('ेा', 'ाे', $contents);
		$contents = str_replace('ाै', 'ौ', $contents);
		$contents = str_replace('ाे', 'ो', $contents);
		$contents = str_replace('्ंा' , 'ं', $contents);
		$contents = str_replace('्ी' , 'ी', $contents);
		$contents = str_replace(' ः' , ' :', $contents);

		return $contents;
	}

	function invertRepha($text) {

		$vyanjana = "क|ख|ग|घ|ङ|च|छ|ज|झ|ञ|ट|ठ|ड|ढ|ण|त|थ|द|ध|न|ऩ|प|फ|ब|भ|म|य|र|ऱ|ल|ळ|ऴ|व|श|ष|स|ह|क़|ख़|ग़|ज़|ड़|ढ़|फ़|य़";
		$swara = "अ|आ|इ|ई|उ|ऊ|ऋ|ऌ|ऍ|ऎ|ए|ऐ|ऑ|ऒ|ओ|औ";
		$swaraJoin = "ा|ि|ी|ु|ू|ृ|ॄ|ॅ|ॆ|े|ै|ॉ|ॊ|ो|ौ|्|ं|ः|ऽ" ; 

		$syllable = "($vyanjana)($swaraJoin)($swaraJoin)($swaraJoin)|($vyanjana)($swaraJoin)($swaraJoin)|($vyanjana)($swaraJoin)|($vyanjana)|($swara)";
		
		$text = 'zzz' . preg_replace("/($syllable|\s|[[:punct:]])/u", "$1zzz", $text);
		$text = preg_replace("/्zzz/u", "्", $text);
		
		$text = str_replace("zzz&", "&zzz", $text);
		$text = preg_replace("/z([^z]*?)&z/u", "z&$1z", $text);
		$text = str_replace("&", "र्", $text);
		$text = str_replace("zzz", "", $text);

		return($text);
	}

	function invertIkara($text) {

		$vyanjana = "क|ख|ग|घ|ङ|च|छ|ज|झ|ञ|ट|ठ|ड|ढ|ण|त|थ|द|ध|न|ऩ|प|फ|ब|भ|म|य|र|ऱ|ल|ळ|ऴ|व|श|ष|स|ह|क़|ख़|ग़|ज़|ड़|ढ़|फ़|य़";
		$swara = "अ|आ|इ|ई|उ|ऊ|ऋ|ऌ|ऍ|ऎ|ए|ऐ|ऑ|ऒ|ओ|औ";
		$swaraJoin = "ा|ि|ी|ु|ू|ृ|ॄ|ॅ|ॆ|े|ै|ॉ|ॊ|ो|ौ" ; 

		$compoundConjunct = "($vyanjana)्($vyanjana)्($vyanjana)्($vyanjana)्($vyanjana)|($vyanjana)्($vyanjana)्($vyanjana)्($vyanjana)|($vyanjana)्($vyanjana)्($vyanjana)|($vyanjana)्($vyanjana)";
		$swaraConjunct = "($compoundConjunct)($swaraJoin)|($vyanjana)($swaraJoin)|($compoundConjunct)";

		$syllable = "($swaraConjunct)|($vyanjana)|($swara)";
		
		$text = preg_replace("/($syllable)/u", "$1zzz", $text);
		$text = preg_replace("/्zzz/u", "्", $text);

		$text = preg_replace("/([E\\\\f|é])([^z]*?)zzz/u", "$2" . "$1zzz", $text);

		$text = str_replace("zzz", "", $text);
		
		$text = str_replace('E', 'िं', $text);
		$text = str_replace('\\', '&िं', $text);
		$text = str_replace('f', 'ि', $text);
		$text = str_replace('|', 'ि&', $text);
		$text = str_replace('é', 'िं', $text);
		
		return($text);
	}



?>


    <div class="container footer">
        <div class="row converter-box">
            <div class="col-md-12">
                <h1>APS to Unicode converter</h1>
            </div>
            <div class="col-md-12">
                <form action="index.php" method="POST">
                    <div class="form-group">
                        <label for="inputtext">Input Text (APS)</label>
                        <textarea class="form-control" id="inputtext" name="inputtext" rows="8"><?php if(isset($_POST['inputtext'])){ echo $_POST['inputtext'];} ?></textarea>
                    </div>
                    <div class="text-center"> 
                        <button type="submit" class="btn btn-primary">Convert APS to Unicode</button>&nbsp;
                        <button type="reset" id="clear" class="btn btn-primary">clear</button>
                    </div>
                    <div class="form-group">
                        <label for="inputtext">Output Text (Unicode)</label>
                        <textarea class="form-control" id="outputtext" name="outputtext" rows="8"><?php  if(isset($outputText)){ echo $outputText; }?></textarea>
                    </div>
                </form>
            </div>
        </div>
    </div>    


    <div class="container footer"><!-- container -->
        <div class="row justify-content-center"><!-- row -->
            <div class="col-md-12 text-center">
                <p><small>© 2018 Sriranga Digital Software Technologies Private Limited</small></p>
            </div>
        </div>
    </div>

    <script>

$(document).ready(function(){
    $("button#clear").click(function(){
        $("#inputtext").html("");
        $("#outputtext").html("");
    });
});

    </script>    
</body>
</html>
