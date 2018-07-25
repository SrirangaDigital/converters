<?php

class Converter{

	public function __construct() {
		
	}

	public function ventura2Text ($text) {

		$text = preg_replace_callback('/<(\d+)>/',
			function($matches) {

				return chr(intval($matches[1]) + 32);
			},
			$text);

		$text = str_replace('<<', '<', $text);
		$text = str_replace('>>', '>', $text);

		$text = mb_convert_encoding($text, 'UTF-8');

		$text = str_replace("\r\n", "\n", $text);
		return $text;
	}

	public function formHTML ($text) {

		$html = "<html>\n" . $this->sanitizeText($text) . "\n</html>\n";

		$html = preg_replace('/@CHAPTERNOS = (.*)/', "<h1>$1</h1>", $html);
		$html = preg_replace('/@CHAPTERHEADNG = (.*)/', "<h1>$1</h1>", $html);
		$html = preg_replace('/@FIRSTPARA = (.*)/', '<p class="noindent">' . "$1" . '</p>', $html);
		$html = preg_replace("/@[A-Z\.0-9#]+ = (.*)/", "<div>$1</div>", $html);
		$html = preg_replace("/\n([^<\n][^\n]*)/", "\n<p>$1</p>", $html);
		
		$html = preg_replace("/(&lt;[A-Z\.0-9]*MI&gt;.*?&lt;D+&gt;)/", "<em>$1</em>", $html);
		$html = preg_replace("/&lt;[A-Z\.0-9]*B&gt;(.*?)&lt;[A-Z\.0-9]*D&gt;/", "<strong>$1</strong>", $html);
		
		$html = preg_replace_callback("/&lt;F[A-Z\.0-9]+&gt;(.*?)&lt;F[A-Z\.0-9]+&gt;/",
			function($matches){

				return $this->handlePunctuations($matches[1]);
			}, $html);

		$html = preg_replace_callback("/&lt;F[A-Z\.0-9]+&gt;(.*?)(<\/)/",
			function($matches){

				return $this->handlePunctuations($matches[1]) . $matches[2];
			}, $html);

		$html = str_replace("&lt;MI&gt;", "", $html);
		$html = str_replace("&lt;D&gt;", "", $html);

		// removing entries like <P123>
		$html = preg_replace("/&lt;P[A-Z\.0-9]+?&gt;/", "", $html);
		$html = preg_replace("/&lt;M[A-Z\.0-9]+?&gt;/", "", $html);
		$html = preg_replace("/&lt;D[A-Z\.0-9]+?&gt;/", "", $html);
		$html = preg_replace("/&lt;R&gt;/", "<br />", $html);
		$html = preg_replace("/&lt;M&gt;/", "", $html);

		return $html;
	}

	public function handlePunctuations($text) {

		$punctuations = '[[:punct:]\h‘’“”–—BCD।॥]';

		$text = str_replace('`', '‘', $text);
		$text = str_replace('\'', '’', $text);
		$text = str_replace('É', '“', $text);
		$text = str_replace('Ê', '”', $text);
		$text = str_replace('å', '–', $text);
		$text = str_replace('ä', '—', $text);
		$text = str_replace('|', '।', $text);
		$text = str_replace('।।', '॥', $text);

		$text = preg_replace('/^(' . $punctuations . '*)D(' . $punctuations . '*)$/', "$1–$2", $text);
		$text = preg_replace('/^(' . $punctuations . '*)B(' . $punctuations . '*)$/', "$1“$2", $text);
		$text = preg_replace('/^(' . $punctuations . '*)C(' . $punctuations . '*)$/', "$1”$2", $text);

		$text = '<span class="en">' . preg_replace('/(.*)(<em>|<\/em>)(.*)/', "$2$1$3", $text) . '</span>';
		$text = preg_replace('/(<span class="en">)(<em>|<\/em>)/', "$2$1", $text);
		
		return $text;
	}

	public function sanitizeText($text) {

		return htmlspecialchars($text);
	}

	public function convert ($html) {

		$dom = new DOMDocument("1.0");
		$dom->preserveWhiteSpace = false;
		$dom->formatOutput = true;

		$html = $this->normalizePraja($html);

		$dom->loadXML($html);
		$xpath = new DOMXpath($dom);

		foreach($xpath->query('//text()') as $text_node) {

			if(preg_replace('/\s+/', '', $text_node->nodeValue) === '') continue; 

			if($text_node->parentNode->hasAttribute('class'))
				if($text_node->parentNode->getAttribute('class') == 'en')
					 continue;

			$text_node->nodeValue = $this->praja2Unicode($text_node->nodeValue);
		}

		$html = html_entity_decode($dom->saveXML());
		$html = preg_replace('/<span class="en">([[:punct:]\h‘’“”–—।॥]*?)<\/span>/', "$1", $html);
		return $html;
	}

	public function praja2Unicode ($text) {

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
		// $text = str_replace('1', '೧', $text);
		// $text = str_replace('2', '೨', $text);
		// $text = str_replace('3', '೩', $text);
		// $text = str_replace('4', '೪', $text);
		// $text = str_replace('5', '೫', $text);
		// $text = str_replace('6', '೬', $text);
		// $text = str_replace('7', '೭', $text);
		// $text = str_replace('8', '೮', $text);
		// $text = str_replace('9', '೯', $text);
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
		$text = str_replace('}', '್', $text);
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
		$text = str_replace('å', '', $text); // handled separately inside span class english
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

		$text = str_replace('||', '|', $text);

		$text = str_replace('ೊ', 'ೊ', $text);
		$text = str_replace('ೆೈ', 'ೈ', $text);

		$text = str_replace('ಿ|', 'ೀ', $text);
		$text = str_replace('ೆ|', 'ೇ', $text);
		$text = str_replace('ೊ|', 'ೋ', $text);

		$text = preg_replace("/($swaraJoin)್($vyanjana)/u", "್$2$1", $text);

		$text = preg_replace("/($syllable)/u", "$1zzz", $text);
		$text = preg_replace("/್zzz/u", "್", $text);
		$text = preg_replace("/zzz([^z]*?)zzzR/u", "zzzರ್zzz" . "$1", $text);

		$text = str_replace("zzz", "", $text);

		$text = str_replace('ೊ', 'ೊ', $text);
		$text = str_replace('ೆೈ', 'ೈ', $text);

		$text = str_replace('ಿ|', 'ೀ', $text);
		$text = str_replace('ೆ|', 'ೇ', $text);
		$text = str_replace('ೊ|', 'ೋ', $text);

		$text = preg_replace("/([[:punct:]\s0-9])ಂ/u", '${1}' . '0', $text);

		return $text;
	}

	public function shreelipi2Unicode ($text) {

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


		$text = str_replace('!', '!', $text);
		$text = str_replace('#', 'x', $text);
		$text = str_replace('%', '%', $text);
		$text = str_replace('&', '-', $text);
		$text = str_replace('(', '(', $text);
		$text = str_replace(')', ')', $text);
		$text = str_replace('*', '*', $text);
		$text = str_replace('+', '+', $text);
		$text = str_replace(',', ',', $text);
		$text = str_replace('.', '.', $text);
		$text = str_replace('/', '/', $text);
		$text = str_replace('0', '೦', $text);
		$text = str_replace('1', '೧', $text);
		$text = str_replace('2', '೨', $text);
		$text = str_replace('3', '೩', $text);
		$text = str_replace('4', '೪', $text);
		$text = str_replace('5', '೫', $text);
		$text = str_replace('6', '೬', $text);
		$text = str_replace('7', '೭', $text);
		$text = str_replace('8', '೮', $text);
		$text = str_replace('9', '೯', $text);
		$text = str_replace(':', ':', $text);
		$text = str_replace(';', ';', $text);
		$text = str_replace('<', 'ॐ', $text);
		$text = str_replace('=', '=', $text);
		$text = str_replace('>', '।', $text);
		$text = str_replace('?', '?', $text);
		$text = str_replace('@', 'ಃ', $text);
		$text = str_replace('A', 'ಅ', $text);
		$text = str_replace('B', 'ಆ', $text);
		$text = str_replace('C', 'ಇ', $text);
		$text = str_replace('D', 'ಈ', $text);
		$text = str_replace('E', 'ಉ', $text);
		$text = str_replace('F', 'ಊ', $text);
		$text = str_replace('G', 'ಎ', $text);
		$text = str_replace('H', 'ಏ', $text);
		$text = str_replace('I', 'ಐ', $text);
		$text = str_replace('J', 'ಒ', $text);
		$text = str_replace('K', 'ಓ', $text);
		$text = str_replace('L', 'ಔ', $text);
		$text = str_replace('M', 'M', $text);// pre processing
		$text = str_replace('N', 'ಶ್ರಿ', $text);
		$text = str_replace('O', 'ನ್', $text);//?
		$text = str_replace('P', 'ಕ್', $text);
		$text = str_replace('Q', 'ಕಿ', $text);
		$text = str_replace('R', '್ಕ', $text);
		$text = str_replace('S', 'ಖ', $text);
		$text = str_replace('T', 'ಖ್', $text);
		$text = str_replace('U', 'ಖಿ', $text);
		$text = str_replace('V', '್ಖ', $text);
		$text = str_replace('W', 'ಗ್', $text);
		$text = str_replace('X', 'ಗಿ', $text);
		$text = str_replace('Y', '್ಗ', $text);
		$text = str_replace('Z', 'ಘ', $text);
		$text = str_replace('[', 'ಘ್', $text);
		$text = str_replace("\\", 'ಘಿ', $text);
		$text = str_replace(']', 'ಘೆ', $text);
		$text = str_replace('^', '್ಘ', $text);
		$text = str_replace('_', 'ಙ', $text);
		$text = str_replace('`', '್ಙ', $text);
		$text = str_replace('a', 'ಚ್', $text);
		$text = str_replace('b', 'ಚಿ', $text);
		$text = str_replace('c', '್ಚ', $text);
		$text = str_replace('d', 'ಛ್', $text);
		$text = str_replace('e', 'ಛಿ', $text);
		$text = str_replace('f', '್ಛ', $text);
		$text = str_replace('g', 'ಜ	', $text);
		$text = str_replace('h', 'ಜ್', $text);
		$text = str_replace('i', 'ಜಿ', $text);
		$text = str_replace('j', '್ಜ', $text);
		$text = str_replace('k', 'k', $text); // pre processing
		$text = str_replace('l', '್ಝ', $text); 
		$text = str_replace('m', 'ಞ', $text);
		$text = str_replace('n', '್ಞ', $text); 
		$text = str_replace('o', 'ಟ', $text);
		$text = str_replace('p', 'ಟ್', $text);
		$text = str_replace('q', 'ಟಿ', $text);
		$text = str_replace('r', '್ಟ', $text);
		$text = str_replace('s', 'ಠ್', $text); 
		$text = str_replace('t', 'ಠಿ', $text);
		$text = str_replace('u', '್ಠ', $text);
		$text = str_replace('v', 'ಡ್', $text);
		$text = str_replace('w', 'ಡಿ', $text);
		$text = str_replace('x', '್ಡ', $text);
		$text = str_replace('y', 'ಢ್', $text);
		$text = str_replace('z', 'ಢಿ', $text);
		$text = str_replace('{', '್ಢ', $text);
		$text = str_replace('|', 'ಣ', $text); 
		$text = str_replace('}', 'ಣ್', $text);
		$text = str_replace('~', 'ಣಿ', $text);
		// $text = str_replace('', '಼', $text); // ignored for now due to lack of proper code point
		$text = str_replace('‘', 'ೞ', $text);
		$text = str_replace('’', 'ೞ', $text);
		$text = str_replace('“', 'ಱ', $text);
		$text = str_replace('”', 'ಱ', $text);
		$text = str_replace('•', '್ಱ', $text);
		$text = str_replace('–', '–', $text);
		$text = str_replace('—', '—', $text);
		$text = str_replace('˜', 'ऽ', $text);
		$text = str_replace('¡', '್ಣ', $text);
		$text = str_replace('¢', 'ತ್', $text);
		$text = str_replace('£', 'ತಿ', $text);
		$text = str_replace('¤', '್ತ', $text);
		$text = str_replace('¥', 'ಥ್', $text);
		$text = str_replace('¦', 'ಥಿ', $text);
		$text = str_replace('§', '್ಥ', $text);
		$text = str_replace('¨', 'ದ್', $text);
		$text = str_replace('©', 'ದಿ', $text);
		$text = str_replace('ª', '್ದ', $text);
		$text = str_replace('«', 'ಧ್', $text);
		$text = str_replace('¬', 'ಧಿ', $text);
		// $text = str_replace('-', '್ಧ', $text); // soft hyphen ?
		$text = str_replace('®', 'ನ್', $text);
		$text = str_replace('¯', 'ನಿ', $text);
		$text = str_replace('°', '್ನ', $text);
		$text = str_replace('±', 'ಪ್', $text);
		$text = str_replace('²', 'ಪಿ', $text);
		$text = str_replace('³', '್ಪ', $text);
		$text = str_replace('´', 'ಫ್', $text);
		$text = str_replace('µ', 'ಫಿ', $text);
		$text = str_replace('¶', '್ಫ', $text);
		$text = str_replace('·', 'ಬ', $text);
		$text = str_replace('¸', 'ಬ್', $text);
		$text = str_replace('¹', 'ಬಿ', $text);
		$text = str_replace('º', '್ಬ', $text);
		$text = str_replace('»', 'ಭ್', $text);
		$text = str_replace('¼', 'ಭಿ', $text);
		$text = str_replace('½', '್ಭ', $text);
		$text = str_replace('¾', '್ಮ', $text);
		$text = str_replace('¿', '¿', $text); // pre processing
		$text = str_replace('À', 'À', $text); // pre processing
		$text = str_replace('Á', 'Á', $text); // pre processing
		$text = str_replace('Â', '್ಯ', $text);
		$text = str_replace('Ã', 'ರ್', $text);
		$text = str_replace('Ä', 'ರಿ', $text);
		$text = str_replace('Å', '್ರ', $text);
		$text = str_replace('Æ', 'ಲ', $text);
		$text = str_replace('Ç', 'ಲ್', $text); 
		$text = str_replace('È', 'ಲಿ', $text);
		$text = str_replace('É', '್ಲ', $text);
		$text = str_replace('Ê', 'ವ್', $text);
		$text = str_replace('Ë', 'ವಿ', $text);
		$text = str_replace('Ì', '್ವ', $text);
		$text = str_replace('Í', 'ಶ್', $text);
		$text = str_replace('Î', 'ಶಿ', $text);
		$text = str_replace('Ï', '್ಶ', $text);
		$text = str_replace('Ð', 'ಷ್', $text);
		$text = str_replace('Ñ', 'ಷಿ', $text);
		$text = str_replace('Ò', '್ಷ', $text);
		$text = str_replace('Ó', 'ಸ್', $text);
		$text = str_replace('Ô', 'ಸಿ', $text);
		$text = str_replace('Õ', '್ಸ', $text);
		$text = str_replace('Ö', 'ಹ್', $text);
		$text = str_replace('×', 'ಹಿ', $text);
		$text = str_replace('Ø', '್ಹ', $text);
		$text = str_replace('Ù', 'ಳ್', $text);
		$text = str_replace('Ú', 'ಳಿ', $text);
		$text = str_replace('Û', '್ಳ', $text);
		$text = str_replace('Ü', 'ಅ', $text);
		$text = str_replace('Ý', 'ಾ', $text);
		$text = str_replace('Þ', 'Þ', $text); // pre processing
		$text = str_replace('ß', 'ಿ', $text);
		$text = str_replace('à', 'à', $text); // post processing
		$text = str_replace('á', 'ು', $text);
		$text = str_replace('â', 'ು', $text);
		$text = str_replace('ã', 'ೂ', $text);
		$text = str_replace('ä', 'ೂ', $text);
		$text = str_replace('å', 'å', $text); // post processing
		$text = str_replace('æ', 'ೆ', $text);
		$text = str_replace('ç', 'ೈ', $text);
		$text = str_replace('è', 'ೌ', $text);
		$text = str_replace('é', '್', $text);
		$text = str_replace('ê', 'ೃ', $text);
		$text = str_replace('ë', 'ೄ', $text);
		$text = str_replace('ì', 'ì', $text); // ಅರ್ಕ ಒತ್ತು
		$text = str_replace('í', 'ಂ', $text);
		$text = str_replace('î', 'î', $text); // pre proccessing - Jha group
		$text = str_replace('ï', 'ï', $text); // pre proccessing - Jha group
		$text = str_replace('ð', '್ಕ್ರ', $text);
		$text = str_replace('ñ', '್ಕೃ', $text);
		$text = str_replace('ò', '್ಬೈ', $text); // kirik
		$text = str_replace('ó', '್ಟ್ರ', $text);
		$text = str_replace('ô', '್ತೈ', $text);
		$text = str_replace('õ', '್ತೃ', $text);
		$text = str_replace('ö', '್ತ್ಯ', $text);
		$text = str_replace('÷', '್ತ್ರ', $text);	
		$text = str_replace('ø', '್ಪ್ರ', $text);
		$text = str_replace('ù', '್ರೈ', $text);
		$text = str_replace('ú', '್ಸ್ರ', $text);
		$text = str_replace('û', 'ಕ್ಷ್', $text);
		$text = str_replace('ü', 'ಕ್ಷಿ ', $text);
		$text = str_replace('ý', 'ಜ್ಞ', $text);
		$text = str_replace('þ', 'ಜ್ಞ್', $text);
		$text = str_replace('ÿ', 'ಜ್ಞಿ', $text);
		$text = str_replace('Š', '÷', $text);
		$text = str_replace('"', '‘', $text);
		$text = str_replace("'", '’', $text);
		
		
		
		//~ $text = str_replace('Œ', '್ಪ', $text);
		//~ $text = str_replace('œ', '್ಸ', $text);
		//~ $text = str_replace('Š', '', $text);
		//~ $text = str_replace('š', '್ಲ', $text);
		$text = str_replace('–', '-', $text);
		$text = str_replace('—', '', $text);
		//~ $text = str_replace('†', '್ಡ', $text);
		//~ $text = str_replace('‡', '', $text); //?
		//~ $text = str_replace('‰', '್ತ', $text);
		//~ $text = str_replace('‹', '್ನ', $text);
		//~ $text = str_replace('›', '್ಷ', $text);
		//~ $text = str_replace('™', '', $text);
		//~ $text = str_replace('•', '್ತ್ಯ', $text);


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

		$text = str_replace('||', '|', $text);

		$text = str_replace('ೊ', 'ೊ', $text);
		$text = str_replace('ೆೈ', 'ೈ', $text);

		$text = str_replace('ಿ|', 'ೀ', $text);
		$text = str_replace('ೆ|', 'ೇ', $text);
		$text = str_replace('ೊ|', 'ೋ', $text);

		$text = preg_replace("/($swaraJoin)್($vyanjana)/u", "್$2$1", $text);

		$text = preg_replace("/($syllable)/u", "$1zzz", $text);
		$text = preg_replace("/್zzz/u", "್", $text);
		$text = preg_replace("/zzz([^z]*?)zzzR/u", "zzzರ್zzz" . "$1", $text);

		$text = str_replace("zzz", "", $text);

		$text = str_replace('ೊ', 'ೊ', $text);
		$text = str_replace('ೆೈ', 'ೈ', $text);

		$text = str_replace('ಿ|', 'ೀ', $text);
		$text = str_replace('ೆ|', 'ೇ', $text);
		$text = str_replace('ೊ|', 'ೋ', $text);

		$text = preg_replace("/([[:punct:]\s0-9])ಂ/u", '${1}' . '0', $text);

		return $text;
	}

	public function normalizePraja ($text) {

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

		return $text;
	}
}

?>
