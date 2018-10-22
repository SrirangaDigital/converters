<?php

class Converter{

	public function __construct() {
		
	}

	public function shreeSan2Unicode ($text) {

		// Initial parse
		
		// Reversing occurances
		
		// Consolidation of same glyphs at multiple code points
		// danda
		$text = str_replace('p', '"', $text);
		//ikaara
		$text = str_replace('[', 'q', $text);
		$text = str_replace('{', 'q', $text);
		// iikaara
		$text = str_replace('”', 'r', $text);
		//ukaara
		$text = str_replace('l', 's', $text);
		$text = str_replace('½', 's', $text);
		//uukaara
		$text = str_replace('m', 't', $text);
		$text = str_replace('ó', 't', $text);
		//RRikaara
		$text = str_replace('–', 'w', $text);

		// ma group
		// jjha group
		// ha group
		// gha group
		// swara
		// Lookup ---------------------------------------------
				
		$text = str_replace('!', '', $text);
		$text = str_replace('"', 'ा', $text);
		$text = str_replace('#', 'ः', $text);
		$text = str_replace('$', '।', $text);
		$text = str_replace('%', 'ॄ', $text);
		$text = str_replace('&', 'ऽ', $text);
		$text = str_replace("'", "छ्व", $text);
		$text = str_replace('(', '(', $text);
		$text = str_replace(')', ')', $text);
		$text = str_replace('*', '*', $text); // handled later
		$text = str_replace('+', 'क्र', $text);
		$text = str_replace(',', ',', $text);
		$text = str_replace('-', '-', $text);
		$text = str_replace('.', '.', $text);
		$text = str_replace('/', '/', $text);
		$text = str_replace('0', '०', $text);
		$text = str_replace('1', '१', $text);
		$text = str_replace('2', '२', $text);
		$text = str_replace('3', '३', $text);
		$text = str_replace('4', '४', $text);
		$text = str_replace('5', '५', $text);
		$text = str_replace('6', '६', $text);
		$text = str_replace('7', '७', $text);
		$text = str_replace('8', '८', $text);
		$text = str_replace('9', '९', $text);
		$text = str_replace(':', '॥', $text);
		$text = str_replace(';', 'ड्व', $text);
		$text = str_replace('=', 'ड्ग', $text);
		$text = str_replace('>', '', $text); // Remove formatting space
		$text = str_replace('?', '?', $text);
		$text = str_replace('@', 'क', $text);
		$text = str_replace('A', 'ख्', $text);
		$text = str_replace('B', 'ग्', $text);
		$text = str_replace('C', 'घ्', $text);
		$text = str_replace('D', 'ङ', $text);
		$text = str_replace('E', 'च्', $text);
		$text = str_replace('F', 'छ', $text);
		$text = str_replace('G', 'ज्', $text);
		$text = str_replace('H', 'झ्', $text);
		$text = str_replace('I', 'ञ्', $text);
		$text = str_replace('J', 'ट', $text);
		$text = str_replace('K', 'ठ', $text);
		$text = str_replace('L', 'ड', $text);
		$text = str_replace('M', 'ढ', $text);
		$text = str_replace('N', 'ण्', $text);
		$text = str_replace('O', 'त्', $text);
		$text = str_replace('P', 'थ्', $text);
		$text = str_replace('Q', 'द', $text);
		$text = str_replace('R', 'ध्', $text);
		$text = str_replace('S', 'न्', $text);
		$text = str_replace('T', 'प्', $text);
		$text = str_replace('U', 'फ', $text);
		$text = str_replace('V', 'ब्', $text);
		$text = str_replace('W', 'भ्', $text);
		$text = str_replace('X', 'म्', $text);
		$text = str_replace('Y', 'य्', $text);
		$text = str_replace('Z', 'र', $text);
		// $text = str_replace('[', 'ि', $text); // handled in pre
		$text = str_replace("\\", 'व्', $text);
		$text = str_replace(']', '॑', $text); // vedic
		$text = str_replace('^', 'ष्', $text);
		$text = str_replace('_', 'स्', $text);
		$text = str_replace('`', 'ह', $text);
		$text = str_replace('a', 'ळ', $text);
		$text = str_replace('b', 'क्ष्', $text);
		$text = str_replace('c', 'ज्ञ्', $text);
		$text = str_replace('d', 'श्र', $text);
		$text = str_replace('e', 'त्र्', $text);
		$text = str_replace('f', 'त्त्', $text);
		$text = str_replace('g', 'ॐ', $text);
		$text = str_replace('h', 'ऋ', $text);
		$text = str_replace('i', 'द्व्र', $text);
		$text = str_replace('j', 'द्घ्र', $text);
		$text = str_replace('k', 'क्त्र', $text);
		// $text = str_replace('l', 'ु', $text); // handled in pre
		// $text = str_replace('m', 'ू', $text); // handled in pre
		$text = str_replace('n', '्न', $text); 
		$text = str_replace('o', '्', $text);
		// $text = str_replace('p', 'ा', $text); // handled in pre
		// $text = str_replace('q', 'q', $text); // handled in invert ikaara
		$text = str_replace('r', 'ी', $text);
		$text = str_replace('s', 'ु', $text); 
		$text = str_replace('t', 'ू', $text);
		$text = str_replace('u', 'े', $text);
		$text = str_replace('v', 'ै', $text);
		$text = str_replace('w', 'ृ', $text);
		$text = str_replace('x', 'ॅ', $text);
		$text = str_replace('y', 'ँ', $text);
		$text = str_replace('z', 'ं', $text);
		// $text = str_replace('{', 'ि', $text);  // handled in pre
		$text = str_replace('|', 'êं', $text); // arka ottu
		$text = str_replace('}', '᳚', $text); // vedic
		$text = str_replace('~', '्र', $text);
		$text = str_replace('¡', '', $text); // Remove formatting space
		$text = str_replace('¢', 'ह्न', $text);
		$text = str_replace('£', '॒', $text); // vedic
		$text = str_replace('¤', '¤', $text); // doubt vedic?
		$text = str_replace('¥', '¥', $text); // doubt vedic?
		$text = str_replace('¦', '¦', $text); // doubt vedic?
		$text = str_replace('§', 'ॢ', $text);
		$text = str_replace('¨', 'द्ब', $text);
		$text = str_replace('©', 'द्द', $text);
		$text = str_replace('ª', 'दृ', $text);
		$text = str_replace('«', 'द्घ', $text);
		$text = str_replace('¬', 'द्भ', $text);
		$text = str_replace('®', 'स्त्र', $text);
		$text = str_replace('¯', 'द्ध', $text);
		$text = str_replace('°', 'द्ब्र', $text);
		$text = str_replace('±', 'क्ल', $text);
		$text = str_replace('²', 'ङ्क्र', $text);
		$text = str_replace('³', 'ङ्ग्र', $text);
		$text = str_replace('´', 'ङ्घ्र', $text);
		$text = str_replace('µ', 'ङ्क्त', $text);
		$text = str_replace('¶', 'द्ग्र', $text);
		$text = str_replace('·', '·', $text); // doubt
		$text = str_replace('¸', 'ङ्ख्र', $text);
		$text = str_replace('¹', 'ङ्क्ष्', $text);
		$text = str_replace('º', 'ङ्क्ष्व', $text);
		$text = str_replace('»', 'द्र्य', $text);
		$text = str_replace('¼', 'द्व्य', $text);
		// $text = str_replace('½', 'ु', $text); // handled in pre
		$text = str_replace('¾', 'स्र', $text);
		$text = str_replace('¿', 'द्द्व', $text);
		$text = str_replace('À', 'द्द्र', $text);
		$text = str_replace('Á', 'द्द्घ', $text);
		$text = str_replace('Â', 'द्भ्य', $text);
		$text = str_replace('Ã', 'स्न', $text);
		$text = str_replace('Ä', 'श्व्', $text);
		$text = str_replace('Å', 'श्न्', $text);
		$text = str_replace('Æ', 'श्च्', $text);
		$text = str_replace('Ç', 'श्ल्', $text);
		$text = str_replace('È', 'क्क', $text);
		$text = str_replace('É', 'क्व', $text);
		$text = str_replace('Ê', 'प्त्', $text);
		$text = str_replace('Ë', 'ट्ठ', $text);
		$text = str_replace('Ì', 'ट्व', $text);
		$text = str_replace('Í', 'ष्ट', $text);
		$text = str_replace('Î', 'ष्ठ', $text);
		$text = str_replace('Ï', 'ह्न्', $text);
		$text = str_replace('Ð', 'ग्न्', $text);
		$text = str_replace('Ñ', 'त्न्', $text);
		$text = str_replace('Ò', 'क्त्', $text);
		$text = str_replace('Ó', 'क्न्', $text);
		$text = str_replace('Ô', 'क्क्', $text);
		$text = str_replace('Õ', 'क्व्', $text);
		$text = str_replace('Ö', 'स्त्र्', $text);
		$text = str_replace('×', 'क्', $text);
		$text = str_replace('Ø', 'छ्', $text);
		$text = str_replace('Ù', 'फ्', $text);
		$text = str_replace('Ú', 'ल्', $text);
		$text = str_replace('Û', 'ळ्', $text);
		$text = str_replace('Ü', 'श्', $text);
		$text = str_replace('Ý', 'ऱ्', $text);
		$text = str_replace('Þ', 'ह्', $text);
		$text = str_replace('ß', 'न्न्', $text);
		$text = str_replace('à', 'रु', $text);
		$text = str_replace('á', 'रू', $text);
		$text = str_replace('â', 'हृ', $text);
		$text = str_replace('ã', 'ह्र', $text);
		$text = str_replace('ä', 'प्ल', $text);
		$text = str_replace('å', 'ह्य', $text);
		$text = str_replace('æ', 'द्न', $text);
		$text = str_replace('ç', 'द्र', $text);
		$text = str_replace('è', 'द्म', $text);
		$text = str_replace('é', 'द्घ्र', $text);
		$text = str_replace('ê', 'ê', $text); // arka ottu
		$text = str_replace('ë', 'ं', $text);
		$text = str_replace('ì', 'अ', $text);
		$text = str_replace('í', 'उ', $text);
		$text = str_replace('î', 'ऊ', $text);
		$text = str_replace('ï', 'ए', $text);
		$text = str_replace('ð', 'श्', $text);
		$text = str_replace('ñ', '॑', $text); // vedic
		$text = str_replace('ò', 'इ', $text);
		// $text = str_replace('ó', 'ू', $text); // handled in pre
		$text = str_replace('ô', 'द्भ्र', $text);
		$text = str_replace('õ', '्र', $text);
		$text = str_replace('ö', '्न', $text);
		$text = str_replace('÷', '्य', $text);
		$text = str_replace('ø', '्र', $text);
		$text = str_replace('ù', '᳚', $text); // vedic
		$text = str_replace('ú', 'ञ्च्', $text);
		$text = str_replace('û', 'ङ्घ', $text);
		$text = str_replace('ü', 'द्य', $text);
		$text = str_replace('ý', 'ञ्ज्', $text);
		$text = str_replace('þ', 'ङ्म', $text);
		$text = str_replace('ÿ', 'द्ग', $text);
		$text = str_replace('Œ', 'ङ्ग', $text);
		$text = str_replace('œ', 'ढ्ढ', $text);
		$text = str_replace('Š', 'ङ्क', $text);
		$text = str_replace('š', 'ठ्ठ', $text);
		$text = str_replace('Ÿ', 'द्व', $text);
		$text = str_replace('ƒ', 'ज्ज्', $text);
		$text = str_replace('ˆ', 'ह्व', $text);
		$text = str_replace('˜', 'क्त', $text);
		// $text = str_replace('–', 'ृ', $text); // handled in pre
		$text = str_replace('—', '—', $text); // should be handled in pre, not handled for now, zha case
		$text = str_replace('‘', '‘', $text);
		$text = str_replace('’', '’', $text);
		$text = str_replace('‚', 'च्च्', $text);
		$text = str_replace('“', 'ल', $text);
		// $text = str_replace('”', 'ी', $text); // handled in pre
		$text = str_replace('„', 'ल्ल', $text);
		$text = str_replace('†', 'ह्ण', $text);
		$text = str_replace('‡', 'ह्ल', $text);
		$text = str_replace('•', 'ङ्क्ष', $text);
		$text = str_replace('…', '॒', $text); // vedic
		$text = str_replace('‰', 'ड्ढ', $text);
		$text = str_replace('‹', 'ङ्ख', $text);
		$text = str_replace('›', 'ड्ड', $text);
		$text = str_replace('™', 'ट्ट', $text);
		$text = str_replace('∙', '∙', $text); // check

		//~ $swara = "అ|ఆ|ఇ|ఈ|ఉ|ఊ|ఋ|ౠ|ఎ|ఏ|ఐ|ఒ|ఓ|ఔ";
		//~ $vyanjana = "క|ఖ|గ|ఘ|ఙ|చ|ఛ|జ|ఝ|ఞ|ట|ఠ|డ|ఢ|ణ|త|థ|ద|ధ|న|ప|ఫ|బ|భ|మ|య|ర|ల|వ|శ|ష|స|హ|ళ|ఱ";
		//~ $swaraJoin = "ా|ి|ీ|ు|ూ|ృ|ౄ|ె|ే|ై|ొ|ో|ౌ|ం|ః|్";

		// Swara
		$text = preg_replace('/्[ा]/u', '', $text);
	
		$text = $this->invertIkara($text);
		$text = $this->invertRepha($text);

	
		//~ $text = preg_replace('/్([ాిీుూృౄెేైౖొోౌ్])/u', "$1", $text);

		//~ // Special cases gha, Cha, Jha, Dha, tha, dha, pha, bha 
		//~ $text = preg_replace("/($swaraJoin)([èäî])/u", "$2$1", $text);
		//~ $text = str_replace('చè', 'ఛ', $text);
		//~ $text = str_replace('డè', 'ఢ', $text);
		//~ $text = str_replace('దä', 'థ', $text);
		//~ $text = str_replace('దè', 'ధ', $text);
		//~ $text = str_replace('పè', 'ఫ', $text);
		//~ $text = str_replace('బè', 'భ్', $text);
		//~ $text = str_replace('రî', 'ఠ', $text);

		//~ // Spaces before ottu should be removed
		//~ $text = str_replace(' ్', "్", $text);
		//~ $text = str_replace(' ృ', "ృ", $text);

		//~ // Swara
		//~ $text = preg_replace('/్[అ]/u', '', $text);
		//~ $text = preg_replace('/్([ాిీుూృౄెేైౖొోౌ్])/u', "$1", $text);
		
		//~ // vyanjana

		//~ $text = preg_replace("/ె($vyanjana)ౖ/u", "$1" . 'ై', $text);
		//~ $text = str_replace('ై', 'ై', $text);
		
		//~ $syllable = "($vyanjana)($swaraJoin)|($vyanjana)($swaraJoin)|($vyanjana)|($swara)";
		//~ $text = preg_replace("/($swaraJoin)్($vyanjana)/u", "్$2$1", $text);
		//~ $text = preg_replace("/($swaraJoin)్($vyanjana)/u", "్$2$1", $text);
		//~ $text = preg_replace("/($swaraJoin)్($vyanjana)/u", "్$2$1", $text);
		//~ $text = preg_replace("/($swaraJoin)్($vyanjana)/u", "్$2$1", $text);
		//~ $text = preg_replace("/్​్($vyanjana)/u", "్$1్​", $text);
		//~ $text = preg_replace("/్​్($vyanjana)/u", "్$1్​", $text);
		//~ $text = preg_replace("/్​్($vyanjana)/u", "్$1్​", $text);

		//~ // Ra ottu inversion
		//~ $text = preg_replace("/¢($vyanjana)/u", "$1" . "¢", $text);
		//~ $text = preg_replace("/¢్($vyanjana)/u", "్$1" . "¢", $text);
		//~ $text = str_replace("¢", "్ర", $text);
		//~ $text = str_replace("్య్ర", "్ర్య", $text);

		//~ $text = str_replace('ౖ', "<!-- <error>ౖ</error> -->", $text);

		//~ // Final replacements
		//~ $text = str_replace('।।', '॥', $text);
		//~ $text = str_replace("'", '‘', $text);
		//~ $text = str_replace('—', '’', $text);
		//~ $text = str_replace('‘‘', '“', $text);
		//~ $text = str_replace('’’', '”', $text);

		//~ $text = str_replace('బుు', 'ఋ', $text);
		//~ $text = str_replace('బుూ', 'ౠ', $text);

		return $text;
	}
	
	public function invertRepha($text) {

		$vyanjana = "क|ख|ग|घ|ङ|च|छ|ज|झ|ञ|ट|ठ|ड|ढ|ण|त|थ|द|ध|न|ऩ|प|फ|ब|भ|म|य|र|ऱ|ल|ळ|ऴ|व|श|ष|स|ह|क़|ख़|ग़|ज़|ड़|ढ़|फ़|य़";
		$swara = "अ|आ|इ|ई|उ|ऊ|ऋ|ऌ|ऍ|ऎ|ए|ऐ|ऑ|ऒ|ओ|औ";
		$swaraJoin = "ा|ि|ी|ु|ू|ृ|ॄ|ॅ|ॆ|े|ै|ॉ|ॊ|ो|ौ|्|ं|ः|ऽ" ; 

		$syllable = "($vyanjana)($swaraJoin)($swaraJoin)($swaraJoin)|($vyanjana)($swaraJoin)($swaraJoin)|($vyanjana)($swaraJoin)|($vyanjana)|($swara)";
		
		$text = 'zzz' . preg_replace("/($syllable|\s|[[:punct:]])/u", "$1zzz", $text);
		$text = preg_replace("/्zzz/u", "्", $text);
		
		$text = str_replace("zzzê", "êzzz", $text);
		$text = preg_replace("/z([^z]*?)êz/u", "zê$1z", $text);
		$text = str_replace("ê", "र्", $text);
		$text = str_replace("zzz", "", $text);

		return($text);
	}

	public function invertIkara($text) {

		$vyanjana = "क|ख|ग|घ|ङ|च|छ|ज|झ|ञ|ट|ठ|ड|ढ|ण|त|थ|द|ध|न|ऩ|प|फ|ब|भ|म|य|र|ऱ|ल|ळ|ऴ|व|श|ष|स|ह|क़|ख़|ग़|ज़|ड़|ढ़|फ़|य़";
		$swara = "अ|आ|इ|ई|उ|ऊ|ऋ|ऌ|ऍ|ऎ|ए|ऐ|ऑ|ऒ|ओ|औ";
		$swaraJoin = "ा|ि|ी|ु|ू|ृ|ॄ|ॅ|ॆ|े|ै|ॉ|ॊ|ो|ौ" ; 

		$compoundConjunct = "($vyanjana)्($vyanjana)्($vyanjana)्($vyanjana)्($vyanjana)|($vyanjana)्($vyanjana)्($vyanjana)्($vyanjana)|($vyanjana)्($vyanjana)्($vyanjana)|($vyanjana)्($vyanjana)";
		$swaraConjunct = "($compoundConjunct)($swaraJoin)|($vyanjana)($swaraJoin)|($compoundConjunct)";

		$syllable = "($swaraConjunct)|($vyanjana)|($swara)";
		
		$text = preg_replace("/($syllable)/u", "$1zzz", $text);
		$text = preg_replace("/्zzz/u", "्", $text);

		$text = preg_replace("/([q])([^z]*?)zzz/u", "$2" . "$1zzz", $text);

		$text = str_replace("zzz", "", $text);
		
		$text = str_replace('q', 'ि', $text);
		
		return($text);
	}
}
	
?>
