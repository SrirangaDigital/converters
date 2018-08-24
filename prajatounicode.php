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
        $outputText = praja2Unicode($inputShreelipiText);
    }

	function praja2Unicode ($text) {

		$text = html_entity_decode($text);
		$text = normalizePraja($text);

		// Initial parse

		$text = str_replace('"j', 'j"', $text);

		// ya group
		$text = str_replace('O"', 'ಯ', $text);
		$text = str_replace('O{', 'ಯ', $text);
		$text = str_replace('Ò"', 'ಯೆ', $text);
		$text = str_replace('Òr', 'ಯೊ', $text);
		$text = str_replace('h"', 'ಯಿ', $text);

		// ma group
		$text = str_replace('Aj"', 'ಮ', $text);
		$text = str_replace('Aj{', 'ಮ', $text);
		$text = str_replace('Au"', 'ಮೆ', $text);
		$text = str_replace('Aur', 'ಮೊ', $text);
		$text = str_replace('a"', 'ಮಿ', $text);
		
		// jjha group
		$text = str_replace('Újs"', 'ಝ', $text);
		$text = str_replace('Újst', 'ಝಾ', $text);
		$text = str_replace('Úus"', 'ಝೆ', $text);
		$text = str_replace('Úusr', 'ಝೊ', $text);
		$text = str_replace('Ys"', 'ಝಿ', $text);

		// swara

		// Vyanjana
		$text = str_replace('ül', 'ಛ್', $text);
		$text = str_replace('Vl', 'ಛಿ', $text);

		$text = str_replace('Úm', 'ಠ್', $text);
		$text = str_replace('Ym', 'ಠಿ', $text);

		$text = str_replace('Ûk', 'ಢ್', $text);
		$text = str_replace('Zk', 'ಢಿ', $text);

		$text = str_replace(';nk', 'ಥ್', $text);
		$text = str_replace(']nk', 'ಥಿ', $text);

		$text = str_replace(';k', 'ಧ್', $text);
		$text = str_replace(']k', 'ಧಿ', $text);
		
		$text = str_replace('=k', 'ಫ್', $text);
		$text = str_replace('_k', 'ಫಿ', $text);

		$text = str_replace('æl', 'ಭ್', $text);
		$text = str_replace('vl', 'ಭಿ', $text);
		$text = str_replace('`l', 'ಭಿ', $text);

		$text = str_replace('Š‡', '್ಧ', $text);
		$text = str_replace('†‡', '್ಢ', $text);
		$text = str_replace('’‡', '್ಭ', $text);

		// Lookup ---------------------------------------------
		$text = str_replace('!', 'ಅ', $text);
		$text = str_replace('"', 'ು', $text);
		$text = str_replace('#', 'ಇ', $text);
		$text = str_replace('$', 'ಈ', $text);
		$text = str_replace('%', 'ಉ', $text);
		$text = str_replace('&', 'ಊ', $text);
		$text = str_replace("'", 'ಪ್', $text);
		$text = str_replace('(', 'ಎ', $text);
		$text = str_replace(')', 'ಏ', $text);
		$text = str_replace('*', 'ಐ', $text);
		$text = str_replace('+', 'ಒ', $text);
		// $text = str_replace(',', '್ಛ', $text);
		$text = str_replace('', '್ಛ', $text);
		//~ $text = str_replace('-', '', $text);
		$text = str_replace('', '್ಝ', $text);
		$text = str_replace('/', 'ಃ', $text);
		$text = str_replace('0', 'ಂ', $text);
		$text = str_replace('1', '೧', $text);
		$text = str_replace('2', '೨', $text);
		$text = str_replace('3', '೩', $text);
		$text = str_replace('4', '೪', $text);
		$text = str_replace('5', '೫', $text);
		$text = str_replace('6', '೬', $text);
		$text = str_replace('7', '೭', $text);
		$text = str_replace('8', '೮', $text);
		$text = str_replace('9', '೯', $text);
		$text = str_replace(':', 'ತ್', $text);
		$text = str_replace(';', 'ದ್', $text);
		$text = str_replace('<', 'ನ್', $text);
		$text = str_replace('=', 'ಪ್', $text);
		$text = str_replace('>', 'ì', $text); //?
		$text = str_replace('?', 'ಲ್', $text);
		$text = str_replace('@', 'ಣಿ', $text);
		$text = str_replace('A', 'ವ್', $text);
		$text = str_replace('B', 'ಶ್', $text);
		$text = str_replace('C', 'ಷ್', $text);
		$text = str_replace('D', 'ಸ್', $text);
		$text = str_replace('E', 'ಹ್', $text);
		$text = str_replace('F', 'ಜ್ಞ್', $text);
		$text = str_replace('G', 'ಖ', $text);
		$text = str_replace('H', 'ಙ', $text);
		$text = str_replace('I', 'ಜ', $text);
		$text = str_replace('J', 'ಞ', $text);
		$text = str_replace('K', 'ಟ', $text);
		$text = str_replace('L', 'ಣ', $text);
		$text = str_replace('M', 'ಋ', $text);// ?
		$text = str_replace('N', 'ಬ', $text);
		$text = str_replace('O', 'ಯ್', $text);
		$text = str_replace('P', 'ಲ', $text);
		$text = str_replace('Q', 'ಜ್ಞ', $text);
		$text = str_replace('R', 'ಕಿ', $text);
		$text = str_replace('S', 'ಖಿ', $text);
		$text = str_replace('T', 'ಗಿ', $text);
		$text = str_replace('U', 'ಚಿ', $text);
		// $text = str_replace('V', 'ಛಿ', $text); //?
		$text = str_replace('W', 'ಜಿ', $text);
		$text = str_replace('X', 'ಟಿ', $text);
		$text = str_replace('Y', 'ರಿ', $text);
		$text = str_replace('Z', 'ಡಿ', $text);
		//~ $text = str_replace('[', '', $text);
		$text = str_replace("\\", 'ತಿ', $text);
		$text = str_replace(']', 'ದಿ', $text);
		$text = str_replace('^', 'ನಿ', $text);
		$text = str_replace('_', 'ಪಿ', $text);
		$text = str_replace('`', 'v', $text);
		$text = str_replace('a', 'ವಿ', $text);
		$text = str_replace('b', 'ಲಿ', $text);
		$text = str_replace('c', 'ಷಿ', $text);
		$text = str_replace('d', 'ಸಿ', $text);
		$text = str_replace('e', 'ಹಿ', $text);
		$text = str_replace('f', 'ಳಿ', $text);
		$text = str_replace('g', 'ಜ್ಞಿ', $text);
		$text = str_replace('h', 'ಯಿ', $text); //?
		$text = str_replace('i', 'ಶಿ', $text);
		$text = str_replace('j', 'ಅ', $text);
		$text = str_replace('k', 'k', $text); //?
		//~ $text = str_replace('l', '', $text); //?
		//~ $text = str_replace('m', '', $text); //?
		//~ $text = str_replace('n', '', $text); //?
		$text = str_replace('o', 'ಾ', $text);
		$text = str_replace('p', 'ಿ', $text);
		$text = str_replace('q', 'ಆ', $text);
		$text = str_replace('r', 'ೂ', $text);
		//~ $text = str_replace('s', '', $text); //?
		$text = str_replace('t', 't', $text);
		$text = str_replace('u', 'ೆ', $text);
		$text = str_replace('v', 'ಬಿ', $text);
		$text = str_replace('w', 'ೆ', $text);
		$text = str_replace('x', '್ಕ', $text);
		$text = str_replace('y', 'ೄ', $text);
		$text = str_replace('z', 'ೌ', $text);
		//~ $text = str_replace('{', '', $text); //?
		//~ $text = str_replace('|', '', $text); //?
		$text = str_replace('}', '್​', $text);
		$text = str_replace('~', 'R', $text);
		$text = str_replace('¡', '್ಖ', $text);
		$text = str_replace('¢', '್ಗ', $text);
		$text = str_replace('£', '್ಘ', $text);
		$text = str_replace('¤', '್ಙ', $text);
		$text = str_replace('¥', '್ಚ', $text);
		//~ $text = str_replace('¦', '', $text);
		$text = str_replace('§', '್ಜ', $text);
		$text = str_replace('©', '್ಞ', $text);
		$text = str_replace('ª', '್ಟ', $text);
		$text = str_replace('«', '್ಠ', $text);
		$text = str_replace('®', '್ಣ', $text);
		$text = str_replace('°', '್ಥ', $text);
		$text = str_replace('±', '್ಱ', $text);
		$text = str_replace('²', '್ೞ', $text);
		$text = str_replace('³', 'ೞ', $text);
		$text = str_replace('´', 'ಱ', $text);
		//~ $text = str_replace('µ', '', $text);
		$text = str_replace('¶', '್ಮ', $text);
		//~ $text = str_replace('·', '', $text);
		$text = str_replace('¸', '್ತ್ರ', $text);
		//~ $text = str_replace('¹', '', $text);
		$text = str_replace('º', '್ವ', $text);
		
		$text = str_replace('»', '್ಶ', $text);
		$text = str_replace('¿', '್ಳ', $text);
		$text = str_replace('À', '್ಹ', $text);
		$text = str_replace('Á', 'ॐ', $text);
		$text = str_replace('Â', '್ಕೃ', $text);
		$text = str_replace('Ã', '್ಬೈ', $text);
		$text = str_replace('Ä', '್ಟ್ರ', $text);
		$text = str_replace('Å', '್ತೃ', $text);
		$text = str_replace('Æ', '್ತೈ', $text);
		$text = str_replace('Ç', '್ಯ', $text);
		$text = str_replace('È', '್ರ', $text);
		$text = str_replace('É', '್ಪ್ರ', $text);
		$text = str_replace('Ê', '್ರೈ', $text);
		$text = str_replace('Ë', '್ಸ್ರ', $text);
		$text = str_replace('Ì', '್ಕ್ಷ', $text);
		$text = str_replace('Í', '್ಕ್ರ', $text);
		$text = str_replace('Î', 'ೆ', $text);
		//~ $text = str_replace('Ï', '', $text); //?
		$text = str_replace('Ñ', 'ೂ', $text);
		$text = str_replace('Ò', 'ಯೆ', $text); //?
		$text = str_replace('Ó', 'ಕ್', $text);
		$text = str_replace('Ô', 'ಗ್', $text);
		$text = str_replace('Õ', 'ಘ್', $text);
		$text = str_replace('Ö', 'ಚ್', $text);
		$text = str_replace('Ø', 'ಜ್', $text);
		$text = str_replace('Ù', 'ಟ್', $text);
		$text = str_replace('Ú', 'ರ್', $text);
		$text = str_replace('Û', 'ಡ್', $text);
		$text = str_replace('Ü', 'ಣ್', $text);
		$text = str_replace('ß', '', $text);
		$text = str_replace('à', 'ಂ', $text);
		$text = str_replace('á', 'ಶ್ರೀ', $text);
		$text = str_replace('â', 'ೃ', $text);
		$text = str_replace('ã', 'ೈ', $text);
		$text = str_replace('ä', ',', $text);
		$text = str_replace('å', '.', $text); // handled separately inside span class english
		$text = str_replace('æ', 'ಬ್', $text);
		$text = str_replace('ç', 'ನ್', $text);
		$text = str_replace('è', 'ಳ್', $text);
		$text = str_replace('é', '್ತ್ರ', $text);
		$text = str_replace('ê', '್ತ್ಯ', $text);
		$text = str_replace('ë', '್ಷ', $text);
		//~ $text = str_replace('ì', '', $text); //?
		$text = str_replace('í', 'ಫ್', $text);
		$text = str_replace('î', 'ಖ್', $text);
		$text = str_replace('ò', 'ಔ', $text);
		$text = str_replace('ô', '', $text);
		$text = str_replace('ö', 'ಘಿ', $text);
		$text = str_replace('ø', 'ಓ', $text);
		$text = str_replace('ù', 'ಕ', $text);
		$text = str_replace('ú', 'ಕೆ', $text);
		$text = str_replace('û', 'ು', $text);
		$text = str_replace('ü', 'ಛ್ ', $text);
		$text = str_replace('ÿ', 'ಌ', $text);
		$text = str_replace('Œ', '್ಪ', $text);
		$text = str_replace('œ', '್ಸ', $text);
		$text = str_replace('Š', '್ದ', $text);
		$text = str_replace('š', '್ಲ', $text);
		$text = str_replace('–', 'ೞ', $text);
		$text = str_replace('—', 'ಱ', $text);
		$text = str_replace('‘', '್ಫ', $text);
		$text = str_replace('’', '್ಬ', $text);
		$text = str_replace('“', '್ಱ', $text);
		$text = str_replace('”', '್ೞ', $text);
		$text = str_replace('†', '್ಡ', $text);
		//~ $text = str_replace('‡', '', $text); //?
		$text = str_replace('‰', '್ತ', $text);
		$text = str_replace('‹', '್ನ', $text);
		$text = str_replace('›', '್ಷ', $text);
		$text = str_replace('™', '', $text);
		$text = str_replace('•', '್ತ್ಯ', $text);

		$text = str_replace('­', '್ಕ್ರ', $text); //caution! Character not visible : U+200B

		// Special cases

		// remove ottu spacer
		$text = str_replace('õ', '', $text);
		$text = str_replace('ï', '', $text);
		$text = str_replace('ñ', '', $text);
		$text = str_replace('ð', '', $text);

		// Swara
		$text = preg_replace('/್[ಅ]/u', '', $text);
		$text = preg_replace('/್([ಾಿೀುೂೃೄೆೇೈೊೋೌ್])/u', "$1", $text);
		
		// vyanjana
		$text = str_replace('ವt', 'ಮಾ', $text);
		$text = str_replace('ಯ್t', 'ಯಾ', $text);
		$text = str_replace('ಫì', 'ಘ', $text);
		$text = str_replace('ಫೆì', 'ಘೆ', $text);
		$text = str_replace('ಫಿì', 'ಘಿ', $text);

		$text = str_replace('ೊ', 'ೊ', $text);
		$text = str_replace('ೆೈ', 'ೈ', $text);

		$swara = "ಅ|ಆ|ಇ|ಈ|ಉ|ಊ|ಋ|ಎ|ಏ|ಐ|ಒ|ಓ|ಔ";
		$vyanjana = "ಕ|ಖ|ಗ|ಘ|ಙ|ಚ|ಛ|ಜ|ಝ|ಞ|ಟ|ಠ|ಡ|ಢ|ಣ|ತ|ಥ|ದ|ಧ|ನ|ಪ|ಫ|ಬ|ಭ|ಮ|ಯ|ರ|ಱ|ಲ|ವ|ಶ|ಷ|ಸ|ಹ|ಳ|ೞ";
		$swaraJoin = "ಾ|ಿ|ೀ|ು|ೂ|ೃ|ೄ|ೆ|ೇ|ೈ|ೊ|ೋ|ೌ|ಂ|ಃ|್";

		$syllable = "($vyanjana)($swaraJoin)|($vyanjana)($swaraJoin)|($vyanjana)|($swara)";

		$text = preg_replace("/($swaraJoin)್($vyanjana)/u", "್$2$1", $text);
		$text = preg_replace("/್​್($vyanjana)/u", "್$1್​", $text);
		

		$text = str_replace('||', '|', $text);

		$text = str_replace('ೊ', 'ೊ', $text);
		$text = str_replace('ೆೈ', 'ೈ', $text);

		$text = str_replace('ಿ|', 'ೀ', $text);
		$text = str_replace('ೆ|', 'ೇ', $text);
		$text = str_replace('ೊ|', 'ೋ', $text);
		
		$text = str_replace('​R', 'R​', $text);

		$text = preg_replace("/($swaraJoin)್($vyanjana)/u", "್$2$1", $text);
	
		// First pass of repha inversion
		$text = preg_replace("/($syllable)/u", "$1zzz", $text);
		$text = preg_replace("/್zzz/u", "್", $text);
		$text = preg_replace("/್R/u", "್zzzR", $text);
		$text = preg_replace("/zzz([^z]*?)zzzR/u", "zzzರ್zzz" . "$1", $text);
		$text = str_replace("zzz", "", $text);

		$text = str_replace('ೊ', 'ೊ', $text);
		$text = str_replace('ೆೈ', 'ೈ', $text);

		$text = str_replace('ಿ|', 'ೀ', $text);
		$text = str_replace('ೆ|', 'ೇ', $text);
		$text = str_replace('ೊ|', 'ೋ', $text);

		// Second pass of repha inversion
		$text = preg_replace("/($syllable)/u", "$1zzz", $text);
		$text = preg_replace("/್zzz/u", "್", $text);
		$text = preg_replace("/್R/u", "್zzzR", $text);
		$text = preg_replace("/zzz([^z]*?)zzzR/u", "zzzರ್zzz" . "$1", $text);
		$text = str_replace("zzz", "", $text);

		$text = str_replace('ೊ', 'ೊ', $text);
		$text = str_replace('ೆೈ', 'ೈ', $text);

		$text = str_replace('ಿ|', 'ೀ', $text);
		$text = str_replace('ೆ|', 'ೇ', $text);
		$text = str_replace('ೊ|', 'ೋ', $text);

		$text = preg_replace('/​([\h[:punct:]‘’“”])/u', "$1", $text);

		$text = preg_replace("/([[:punct:]\s0-9])ಂ/u", '${1}' . '0', $text);

		return $text;
	}

	function normalizePraja ($text) {

		$text = str_replace('á', 'ù', $text);  // 225,E1 --> 249,F9
		$text = str_replace('¢', 'Â', $text);  // 162,A2 --> 194,C2
		$text = str_replace('¤', 'Ä', $text);  // 164,A4 --> 196,C4
		$text = str_replace('×', 'ü', $text);  // 164,A4 --> 196,C4
		
		$text = str_replace('', 'x', $text);
		$text = str_replace('', '¡', $text);
		$text = str_replace('', '¢', $text);
		$text = str_replace('', '£', $text);

		$text = str_replace('', '¥', $text);
		// $text = str_replace('', ',', $text); //handled in converter
		$text = str_replace('', '§', $text);
		// $text = str_replace('', '.', $text); //handled in converter
		$text = str_replace('', '©', $text);
		$text = str_replace('', 'ª', $text);
		$text = str_replace('', '«', $text);
		$text = str_replace('', '†', $text);
		$text = str_replace('', '‡', $text);
		$text = str_replace('', '®', $text);
		$text = str_replace('', '‰', $text); // 143,8F --> 137,89
		$text = str_replace('¯', '‰', $text); // 143,8F --> 137,89
		$text = str_replace('', '°', $text);
		$text = str_replace('', 'Š', $text);
		$text = str_replace('', '‹', $text);
		$text = str_replace('', 'Œ', $text);
		$text = str_replace('', '‘', $text);
		$text = str_replace('', '’', $text);
		$text = str_replace('', '¶', $text);
		$text = str_replace('', 'Ç', $text);
		$text = str_replace('', 'È', $text);
		$text = str_replace('', 'š', $text);
		$text = str_replace('', 'º', $text);
		$text = str_replace('', '»', $text);
		$text = str_replace('', 'ë', $text);
		$text = str_replace('', 'œ', $text);
		$text = str_replace('', '~', $text);
		$text = str_replace('', '¿', $text);
		
		// 
		
		$text = str_replace('Ð', 'û', $text);  // 164,A4 --> 196,C4
		$text = str_replace('¾', 'À', $text);
		
		$text = str_replace('‘', '`', $text);
		$text = str_replace('’', "'", $text);
		$text = str_replace('“', 'É', $text);
		$text = str_replace('”', 'Ê', $text);
		$text = str_replace('–', 'å', $text);
		$text = str_replace('—', 'ä', $text);
		$text = str_replace('।', '|', $text);
	
		return $text;
	}


?>


    <div class="container footer">
        <div class="row converter-box">
            <div class="col-md-12">
                <h1>Praja to Unicode converter</h1>
            </div>
            <div class="col-md-12">
                <form action="prajatounicode.php" method="POST">
                    <div class="form-group">
                        <label for="inputtext">Input Text (Praja)</label>
                        <textarea class="form-control" id="inputtext" name="inputtext" rows="8"><?php if(isset($_POST['inputtext'])){ echo $_POST['inputtext'];} ?></textarea>
                    </div>
                    <div class="text-center"> 
                        <button type="submit" class="btn btn-primary">Convert Praja to Unicode</button>&nbsp;
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
