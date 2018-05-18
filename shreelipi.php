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

        $inputShreelipiText = $_POST['inputtext'];
        $outputText = shreelipi2Unicode($inputShreelipiText);
    }

	function shreelipi2Unicode($contents) {

		$middleJoiner = "C|…|N";
		// $rightJoiner = "r";

		// // Cleanup
		// $contents = preg_replace("/($middleJoiner)\\1/u", "$1", $contents);
		// $contents = preg_replace("/($rightJoiner)\\1/u", "$1", $contents);
		// $contents = preg_replace("/($middleJoiner)Ç/u", "Ç$1", $contents);
		// $contents = preg_replace("/B($middleJoiner)/u", "$1B", $contents);
		// $contents = preg_replace("/b($middleJoiner)/u", "$1b", $contents);

		// //~ Danda is inherent and need not be specifically present in the following cases
		// $contents = str_replace('eA', 'A', $contents);
		// $contents = str_replace('eE', 'E', $contents);
		// $contents = str_replace('eR', 'R', $contents);
		// $contents = str_replace('e\\', '\\', $contents);
		// $contents = str_replace('ea', 'a', $contents);
		// $contents = str_replace('ef', 'f', $contents);
		// $contents = str_replace('eq', 'q', $contents);
		// $contents = str_replace('er', 'r', $contents);
		// $contents = str_replace('e|', '|', $contents);
		// $contents = str_replace('eé', 'é', $contents);

		//~ ka, va, pa, pha, kta, kra, kna, kva, kka case

		$contents = str_replace('fl', 'ﬂ', $contents);
		$contents = str_replace('˘CT', 'ड़े', $contents);

		$contents = str_replace(' ́', 'ह', $contents);
		$contents = str_replace(' ∂', 'ई', $contents);
		$contents = str_replace(' ', ' इ', $contents);
		$contents = str_replace('>>', '>', $contents);
		$contents = str_replace('*T', 'T*', $contents);
		$contents = str_replace('CT', 'TC', $contents);
		$contents = str_replace('…T', 'T…', $contents);
		$contents = str_replace('ØT', 'TØ', $contents);
		$contents = str_replace('NT', 'TN', $contents);
		$contents = str_replace('MT', 'TM', $contents);
		$contents = str_replace('ºT', 'Tº', $contents);
		$contents = str_replace('∂T', 'T∂', $contents);
		$contents = str_replace('}T', 'T}', $contents);
		$contents = str_replace('NT', 'TN', $contents);
		$contents = str_replace('N>', '>N', $contents);
		$contents = str_replace('Ø>', '>Ø', $contents);
		
		$contents = str_replace('•T', 'क', $contents);
		$contents = str_replace('πT', 'क्व', $contents);
		$contents = str_replace('VT', 'फ', $contents);
		$contents = str_replace('IT', 'क्त', $contents);
		$contents = str_replace('•–T', 'क्र', $contents);
		$contents = str_replace('G•–', 'क्रि', $contents);
		$contents = str_replace('‹T', 'ऋ', $contents);
		$contents = str_replace('q>', 'ठ', $contents);
		$contents = str_replace('n>', 'छ', $contents);
		$contents = str_replace('^>', 'ट', $contents);
		$contents = str_replace('u>', 'ट्ट', $contents);

//		$contents = str_replace('¨>', 'ट्र', $contents);
	//	$contents = str_replace('>¨', 'ट्र', $contents);

		$contents = str_replace('‘>', 'ड', $contents);
		$contents = str_replace('˙>', 'ढ', $contents);
		$contents = str_replace('iT', 'रू', $contents);
		// $contents = str_replace('JeT', 'क्', $contents);
		// $contents = str_replace('›eT', 'क्र्', $contents);
		// $contents = str_replace('$eT', 'क्र्', $contents);
		// $contents = str_replace('ÄeT', 'क्न्', $contents);
		// $contents = str_replace('×eT', 'क्व्', $contents);
		// $contents = str_replace('òeT', 'क्त्', $contents);
		// $contents = str_replace('HeT', 'फ्', $contents);
		// $contents = str_replace('heT', 'फ्', $contents);
		// $contents = str_replace('øeT', 'फ्र्', $contents);

		//~ $contents = preg_replace("/(k|›|\\$|Ä|×|ò|J|H|h|ø)e(($middleJoiner)($middleJoiner)|($middleJoiner))â/", "$1eâ$2", $contents);

		// $contents = str_replace('keâ', 'क', $contents);
		// $contents = str_replace('Jeâ', 'क', $contents);
		// $contents = str_replace('›eâ', 'क्र', $contents);
		// $contents = str_replace('$eâ', 'क्र', $contents);
		// $contents = str_replace('Äeâ', 'क्न', $contents);
		// $contents = str_replace('×eâ', 'क्व', $contents);
		// $contents = str_replace('òeâ', 'क्त', $contents);
		// $contents = str_replace('Heâ', 'फ', $contents);
		// $contents = str_replace('heâ', 'फ', $contents);
		// $contents = str_replace('øeâ', 'फ्र', $contents);

		// $contents = str_replace('×e¹', 'क्क', $contents);
		// $contents = str_replace('F&', 'ई', $contents);
		// $contents = str_replace('FË', 'ईं', $contents);
		// $contents = str_replace('Gâ', 'T', $contents);

		 
		// //~ ऋ case
		// $contents = str_replace('$e+', 'ऋ', $contents);
		// $contents = str_replace('$e&+', 'र्ऋ', $contents);
		// $contents = str_replace('$eb+', 'ऋं', $contents);


		//Lookup
		// $contents = str_replace('!', '!', $contents);
		$contents = str_replace('"', '‘', $contents);
		$contents = str_replace('#', 'ः', $contents);
		$contents = str_replace('$', '।', $contents);
		// $contents = str_replace('%', 'ज्ञ्', $contents);
		// $contents = str_replace('&', '&', $contents);
		$contents = str_replace("'", "’", $contents);
		// $contents = str_replace('(', '(', $contents);
		// $contents = str_replace(')', ')', $contents);
		$contents = str_replace('*', 'ं', $contents);
		// //~ $contents = str_replace('+', '', $contents);
		// $contents = str_replace(',', ',', $contents);
		// //~ $contents = str_replace('-', '-', $contents);
		// $contents = str_replace('.', '.', $contents);
		// $contents = str_replace('/', '/', $contents);
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
		// $contents = str_replace(':', 'ः', $contents);
		// $contents = str_replace(';', ';', $contents);
		$contents = str_replace('<', '<', $contents);
		// $contents = str_replace('=', 'ृ', $contents);
		$contents = str_replace('>', 'ठ', $contents);
		// $contents = str_replace('?', '?', $contents);
		// $contents = str_replace('@', 'ॅ', $contents);
		$contents = str_replace('A', 'श्', $contents);
		$contents = str_replace('B', 'भ', $contents);
		$contents = str_replace('C', 'े', $contents);
		$contents = str_replace('D', 'न', $contents);
		$contents = str_replace('E', 'न्', $contents);//fं
		// $contents = str_replace('F', 'इ', $contents);
		$contents = str_replace('G', '<', $contents);
		$contents = str_replace('H', 'ँ', $contents);
		// $contents = str_replace('I', 'घ्', $contents);
		$contents = str_replace('J', 'ल', $contents);
		// $contents = str_replace('K', 'ख्', $contents);
		$contents = str_replace('L', 'ण', $contents);
		$contents = str_replace('M', 'ॅ', $contents);
		$contents = str_replace('N', 'ु', $contents);
		// $contents = str_replace('O', 'ध्', $contents);
		$contents = str_replace('P', 'स', $contents);
		// $contents = str_replace('Q', 'ैं', $contents);
		$contents = str_replace('R', 'ू', $contents);
		$contents = str_replace('S', 'ग्न', $contents);
		$contents = str_replace('T', 'क', $contents);
		$contents = str_replace('U', 'ल', $contents);
		// $contents = str_replace('V', 'न्न्', $contents);
		// $contents = str_replace('W', 'ें', $contents);
		$contents = str_replace('X', 'द्ध', $contents);
		$contents = str_replace('Y', '∂', $contents);
		// $contents = str_replace('Z', '&ैः', $contents);
		$contents = str_replace('[', 'क्ष', $contents);
		// //~ $contents = str_replace("\\", '\\', $contents);//र्fं
		// $contents = str_replace(']', ']', $contents); //Handled in post processing
		// $contents = str_replace('^', 'ट', $contents);
		$contents = str_replace('_', 'त्र', $contents);
		// //~ $contents = str_replace('`', '`', $contents);
		$contents = str_replace('a', 'ी', $contents);
		$contents = str_replace('b', 'ा', $contents);
		$contents = str_replace('c', 'त्त', $contents);
		// $contents = str_replace('d', '्', $contents);
		$contents = str_replace('e', 'ल्', $contents);
		// //~ $contents = str_replace('f', 'f', $contents); //f Handled in post processing
		$contents = str_replace('g', 'श्र', $contents);
		$contents = str_replace('h', 'स्', $contents);
		// $contents = str_replace('i', 'ग्', $contents);
		// $contents = str_replace('j', 'र', $contents);
		$contents = str_replace('k', 'ब', $contents);
		// $contents = str_replace('l', 'त्', $contents);
		$contents = str_replace('m', 'ब्', $contents);
		// $contents = str_replace('n', 'ह', $contents);
		$contents = str_replace('o', 'ै', $contents);
		// $contents = str_replace('p', 'ज्', $contents);
		// $contents = str_replace('q', 'f', $contents);// consider this as f (ikara)
		// $contents = str_replace('r', 'ी', $contents);
		$contents = str_replace('s', 'क्', $contents);
		// $contents = str_replace('t', 'ू', $contents);
		// $contents = str_replace('u', 'ल्', $contents);
		$contents = str_replace('v', 'ख्', $contents);
		// $contents = str_replace('w', 'ै', $contents);
		// $contents = str_replace('x', '&े', $contents);
		$contents = str_replace('y', 'ए', $contents);
		// $contents = str_replace('z', '&ै', $contents);
		$contents = str_replace('{', 'त्त्', $contents);
		$contents = str_replace('|', 'म्' , $contents);//fर्
		$contents = str_replace('}', 'ं', $contents);
		$contents = str_replace('~', 'श', $contents);
		// $contents = str_replace('¡', 'ख्र्', $contents);
		$contents = str_replace('¢', 'ज्', $contents);
		$contents = str_replace('£', 'द', $contents);
		$contents = str_replace('¤', 'न्न', $contents);
		$contents = str_replace('¥', 'हृ', $contents);
		// $contents = str_replace('¦', '¦', $contents); //Left as it is as no use case found
		// $contents = str_replace('§', 'श्च्', $contents);
		// $contents = str_replace('©', 'द्म्', $contents);
		$contents = str_replace('ª', 'थ्', $contents);
		$contents = str_replace('«', 'ध्', $contents);
		$contents = str_replace('®', 'भ्', $contents);
		// $contents = str_replace('°', 'ष्ट', $contents);
		$contents = str_replace('¶', 'उ', $contents);
		// $contents = str_replace('¸', 'ॄ', $contents);
		// $contents = str_replace('¹', '¹', $contents); //Handled in post processing kka case
		$contents = str_replace('º', 'ै', $contents);
		$contents = str_replace('»', 'त', $contents);
		// $contents = str_replace('¼', 'ल्ल', $contents);
		// $contents = str_replace('½', 'छ्व', $contents);
		$contents = str_replace('¿', 'अ', $contents);
		$contents = str_replace('À', 'द्य', $contents);
		// $contents = str_replace('Á', 'ङ्ग', $contents);
		// $contents = str_replace('Â', 'दृ', $contents);
		$contents = str_replace('Ã', 'ह्म', $contents);
		// $contents = str_replace('Ä', 'व्न्', $contents); //Handled in pre processing
		// $contents = str_replace('Å', 'द्य्', $contents);
		$contents = str_replace('Æ', 'ज', $contents);
		$contents = str_replace('Ç', 'च्च', $contents);
		$contents = str_replace('È', 'ु', $contents);
		$contents = str_replace('É', 'ज्ज', $contents);
		// $contents = str_replace('Ê', '॰', $contents); //May be a notation for shortform; left as it is
		$contents = str_replace('Ë', '्', $contents);
		$contents = str_replace('Ì', 'प्', $contents);
		// $contents = str_replace('Í', '्रू', $contents);
		$contents = str_replace('Î', 'व', $contents);
		$contents = str_replace('Ï', 'घ्', $contents);
		$contents = str_replace('Ñ', 'ल्ल', $contents);
		$contents = str_replace('Ò', 'थ', $contents);
		$contents = str_replace('Ó', 'म', $contents);
		$contents = str_replace('Ô', 'क्ष्', $contents);
		$contents = str_replace('Õ', 'स्त्र', $contents);
		$contents = str_replace('Ö', 'ह्न', $contents);
		// $contents = str_replace('×', '×', $contents); //Handled in post processing kka case
		$contents = str_replace('Ø', 'ू', $contents);
		$contents = str_replace('Ù', 'द्व', $contents);
		$contents = str_replace('Ú', 'ी', $contents);
		// $contents = str_replace('Û', 'च्', $contents);
		// $contents = str_replace('Ü', 'ह्र', $contents);
		// $contents = str_replace('Ý', 'ङ्क्त', $contents);
		// $contents = str_replace('Þ', 'द्द्र', $contents);
		$contents = str_replace('ß', 'ज्ञ', $contents);
		$contents = str_replace('à', 'ह्व', $contents);
		// $contents = str_replace('á', 'e', $contents); // Considered as danda
		// $contents = str_replace('â', 'â', $contents); // क and फ case 
		// $contents = str_replace('ã', 'झ्र्', $contents); //???? verify
		// $contents = str_replace('ä', 'ä', $contents); // right side glyph of ka in case of conjuncts
		// $contents = str_replace('å', 'ह्', $contents);
		$contents = str_replace('æ', 'द्र', $contents);
		// $contents = str_replace('ç', 'श्', $contents);
		// $contents = str_replace('è', 'लृ', $contents);
		// //~ $contents = str_replace('é', 'é', $contents); //fं
		// $contents = str_replace('ê', '्ल', $contents);
		// $contents = str_replace('ë', 'श्', $contents);
		// $contents = str_replace('ì', 'e', $contents); // Considered as danda
		// $contents = str_replace('í', 'e', $contents); // Considered as danda
		// $contents = str_replace('î', 'î', $contents);
		// $contents = str_replace('ï', 'ï', $contents); //mostly LR, left as it is
		// $contents = str_replace('ð', 'ष्ट्व', $contents);
		// $contents = str_replace('ñ', 'ड्ड', $contents);
		// $contents = str_replace('ò', 'त्त्', $contents);
		// $contents = str_replace('ó', 'ट्ट', $contents);
		// $contents = str_replace('ô', 'द्ब', $contents);
		// $contents = str_replace('õ', 'द्र', $contents);
		// $contents = str_replace('ö', 'द्द', $contents);
		$contents = str_replace('÷', 'श्च', $contents);
		// $contents = str_replace('ø', 'प्र्', $contents);
		// $contents = str_replace('ù', 'हृ', $contents);
		// $contents = str_replace('ú', 'ठ्ठ', $contents);
		// $contents = str_replace('û', 'द्ग', $contents);
		// $contents = str_replace('ü', '्र', $contents);
		// $contents = str_replace('ý', 'ॠ', $contents);
		// $contents = str_replace('þ', 'ह्ण', $contents);
		$contents = str_replace('ÿ', 'च्', $contents);
		// $contents = str_replace('Œ', 'स्त्र्', $contents);
		$contents = str_replace('œ', 'त्', $contents);
		// $contents = str_replace('Š', 'ः', $contents);
		// $contents = str_replace('š', 'ट', $contents);
		$contents = str_replace('Ÿ', 'र', $contents);
		$contents = str_replace('ƒ', 'प्त', $contents); // Considered as danda
		$contents = str_replace('–', '्र', $contents);
		$contents = str_replace('—', 'व्', $contents);
		// $contents = str_replace('‘', '‘', $contents);
		// $contents = str_replace('’', '’', $contents);
		$contents = str_replace('“', 'दृ', $contents);
		$contents = str_replace('”', 'द्द', $contents);
		$contents = str_replace('„', '<', $contents);
		$contents = str_replace('†', '', $contents); // Considered as danda
		$contents = str_replace('‡', 'य', $contents);
		$contents = str_replace('…', 'ृ', $contents);
		$contents = str_replace('‰', 'ठ्य', $contents);
		// $contents = str_replace('‹', 'ङ्घ', $contents);
		$contents = str_replace('›', 'ढ़', $contents); //ka and va case
		$contents = str_replace('™', 'च', $contents);
		$contents = str_replace('˜', 'ष्', $contents);
		$contents = str_replace('⁄', 'ख', $contents);
		$contents = str_replace('∂', '∂', $contents);
		$contents = str_replace('ﬂ', 'घ', $contents);
		$contents = str_replace('˘', 'ड़', $contents);
		$contents = str_replace('≥', 'ग', $contents);
		$contents = str_replace('·', 'ष', $contents);
		$contents = str_replace(' ́', 'ह', $contents);
		$contents = str_replace('˛', 'ष्', $contents);
		$contents = str_replace('˝', 'ष्', $contents);
		$contents = str_replace('¬', 'ग्', $contents);
		$contents = str_replace('ı', 'रु', $contents);
		$contents = str_replace('', 'ऊ', $contents);
		$contents = str_replace('∑', 'ण्', $contents);
		$contents = str_replace('Ω', 'झ', $contents);
		$contents = str_replace('¨', '्र', $contents);
		$contents = str_replace('•े', 'के', $contents);
		$contents = preg_replace("/•\h*(ा|ु|ू|ृ|े|ै|ो|ौ|ं)/", 'क' . "$1", $contents);


		// $contents = str_replace('्ee', 'ा', $contents);
		// $contents = str_replace('्e', '', $contents);
		// $contents = str_replace('e', 'ा', $contents);
		$contents = str_replace('ाै', 'ौ', $contents);
		$contents = str_replace('ाे', 'ो', $contents);
		$contents = str_replace('्ंा' , 'ं', $contents);
		$contents = str_replace('ंे' , 'ें', $contents);
		$contents = str_replace('ँू' , 'ूँ', $contents);
		$contents = str_replace('अा', 'आ', $contents);
		$contents = str_replace('अो', 'ओ', $contents);
		$contents = str_replace('अौ', 'औ', $contents);
		$contents = str_replace('आॅ', 'ऑ', $contents);
		$contents = str_replace('अॅ', 'ॲ', $contents);
		$contents = str_replace('एे', 'ऐ', $contents);
		$contents = str_replace('एॅ', 'ऍ', $contents);
		$contents = str_replace('ाॅ', 'ॉ', $contents);

		// //~ Post processing
		// $contents = str_replace(']न', 'ऩ', $contents);
		// $contents = str_replace(']र', 'ऱ', $contents);
		// $contents = str_replace(']ळ', 'ऴ', $contents);
		// $contents = str_replace(']क', 'क़', $contents);
		// $contents = str_replace(']ख', 'ख़', $contents);
		// $contents = str_replace(']ग', 'ग़', $contents);
		// $contents = str_replace(']ज', 'ज़', $contents);
		// $contents = str_replace(']ड', 'ड़', $contents);
		// $contents = str_replace(']ढ', 'ढ़', $contents);
		// $contents = str_replace(']फ', 'फ़', $contents);
		// $contents = str_replace(']य', 'य़', $contents);

		$contents = str_replace('±', 'प', $contents);
		// $contents = str_replace('²', '×', $contents);
		// $contents = str_replace('³', '%', $contents);
		$contents = str_replace('´', 'ह', $contents);
		$contents = str_replace('μ', 'ध', $contents);
		//~ $contents = str_replace('•', 'क', $contents);
		// $contents = str_replace(']', '.', $contents);
		// $contents = str_replace('`', '‘', $contents);
		// $contents = str_replace('‘‘', '“', $contents);
		// $contents = str_replace('\'', '’', $contents);
		// $contents = str_replace('’’', '”', $contents);
		$contents = str_replace('।।', '॥', $contents);

		// $contents = str_replace(' ञ् ', ' — ', $contents);

		$contents = invertIkaraShreeLipi($contents);
		$contents = invertRephaShreeLipi($contents);

		// $contents = str_replace('ेा', 'ाे', $contents);
		// $contents = str_replace('ाै', 'ौ', $contents);
		// $contents = str_replace('ाे', 'ो', $contents);
		// $contents = str_replace('्ंा' , 'ं', $contents);
		// $contents = str_replace('्ी' , 'ी', $contents);
		// $contents = str_replace(' ः' , ' :', $contents);

		return $contents;
	}
	
	function invertIkaraShreeLipi($text) {

		$vyanjana = "क|ख|ग|घ|ङ|च|छ|ज|झ|ञ|ट|ठ|ड|ढ|ण|त|थ|द|ध|न|ऩ|प|फ|ब|भ|म|य|र|ऱ|ल|ळ|ऴ|व|श|ष|स|ह|क़|ख़|ग़|ज़|ड़|ढ़|फ़|य़";
		$swara = "अ|आ|इ|ई|उ|ऊ|ऋ|ऌ|ऍ|ऎ|ए|ऐ|ऑ|ऒ|ओ|औ";
		$swaraJoin = "ा|ि|ी|ु|ू|ृ|ॄ|ॅ|ॆ|े|ै|ॉ|ॊ|ो|ौ" ; 

		$compoundConjunct = "($vyanjana)्($vyanjana)्($vyanjana)्($vyanjana)्($vyanjana)|($vyanjana)्($vyanjana)्($vyanjana)्($vyanjana)|($vyanjana)्($vyanjana)्($vyanjana)|($vyanjana)्($vyanjana)";
		$swaraConjunct = "($compoundConjunct)($swaraJoin)|($vyanjana)($swaraJoin)|($compoundConjunct)";

		$syllable = "($swaraConjunct)|($vyanjana)|($swara)";
		
		$text = preg_replace("/($syllable)/u", "$1zzz", $text);
		$text = preg_replace("/्zzz/u", "्", $text);

		$text = preg_replace("/(<)([^z]*?)zzz/u", "$2" . "$1zzz", $text);

		$text = str_replace("zzz", "", $text);
		$text = str_replace("<", "ि", $text);
				
		return($text);
	}
	
	function invertRephaShreeLipi($text) {

		$vyanjana = "क|ख|ग|घ|ङ|च|छ|ज|झ|ञ|ट|ठ|ड|ढ|ण|त|थ|द|ध|न|ऩ|प|फ|ब|भ|म|य|र|ऱ|ल|ळ|ऴ|व|श|ष|स|ह|क़|ख़|ग़|ज़|ड़|ढ़|फ़|य़";
		$swara = "अ|आ|इ|ई|उ|ऊ|ऋ|ऌ|ऍ|ऎ|ए|ऐ|ऑ|ऒ|ओ|औ";
		$swaraJoin = "ा|ि|ी|ु|ू|ृ|ॄ|ॅ|ॆ|े|ै|ॉ|ॊ|ो|ौ|्|ं|ः|ऽ" ; 

		$syllable = "($vyanjana)($swaraJoin)($swaraJoin)($swaraJoin)|($vyanjana)($swaraJoin)($swaraJoin)|($vyanjana)($swaraJoin)|($vyanjana)|($swara)";
		
		$text = 'zzz' . preg_replace("/($syllable|\s|[[:punct:]])/u", "$1zzz", $text);
		$text = preg_replace("/्zzz/u", "्", $text);
		
		$text = str_replace("zzz∂", "∂zzz", $text);
		$text = preg_replace("/z([^z]*?)∂z/u", "z∂$1z", $text);
		$text = str_replace("∂", "र्", $text);
		$text = str_replace("zzz", "", $text);

		return($text);
	}



?>


    <div class="container footer">
        <div class="row converter-box">
            <div class="col-md-12">
                <h1>Shreelipi to Unicode converter</h1>
            </div>
            <div class="col-md-12">
                <form action="shreelipi.php" method="POST">
                    <div class="form-group">
                        <label for="inputtext">Input Text (Shreelipi)</label>
                        <textarea class="form-control" id="inputtext" name="inputtext" rows="8"><?php if(isset($_POST['inputtext'])){ echo $_POST['inputtext'];} ?></textarea>
                    </div>
                    <div class="text-center"> 
                        <button type="submit" class="btn btn-primary">Convert Shreelipi to Unicode</button>&nbsp;
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
