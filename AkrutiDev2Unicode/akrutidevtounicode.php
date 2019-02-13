<?php

class Akrutidevtounicode{
	
	public function sumne($text){
		
		return $text;
	}
	
	public function akrutidev2Unicode($contents){

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
		// missing
		$contents = str_replace('¡', 'ञ्च्', $contents);
		$contents = str_replace('¢', 'दृ', $contents);
		$contents = str_replace('£', '्र', $contents);
		//~ $contents = str_replace('¤', 'रू', $contents); //TBD
		//~ $contents = str_replace('¥', 'ह्ल', $contents); //TBD
		$contents = str_replace('¦', '्रु', $contents); //Left as it is as no use case found
		$contents = str_replace('§', 'ु', $contents);
		// missing
		$contents = str_replace('©', 'रु', $contents);
		$contents = str_replace('ª', 'रू', $contents);
		$contents = str_replace('«', 'ङ्घ', $contents);
		// missing
		// missing
		$contents = str_replace('®', 'च्', $contents);
		$contents = str_replace('°', '्रु', $contents);
		$contents = str_replace('±', 'ङ्ख', $contents);
		$contents = str_replace('²', 'ङ्ग', $contents);
		$contents = str_replace('³', 'य्', $contents);
		$contents = str_replace('´', '्र', $contents);
		$contents = str_replace('μ', 'श्', $contents);
		$contents = str_replace('¶', 'ढ्ढ', $contents); //Left as it is as no use case found
		$contents = str_replace('.', 'ड्ड', $contents);
		$contents = str_replace('¸', 'ख्र्', $contents);
		$contents = str_replace('¹', 'ङ्क', $contents); //Handled in post processing kka case
		$contents = str_replace('º', 'ष्', $contents);
		$contents = str_replace('»', 'ह्व', $contents);
		$contents = str_replace('¼', 'ह्ल', $contents);
		$contents = str_replace('½', 'श्च्', $contents);
		// missing
		$contents = str_replace('¿', 'ह्य्', $contents);
		//~ $contents = str_replace('À', 'ञ्ज्', $contents); //TBD
		$contents = str_replace('Á', '्ल', $contents);
		$contents = str_replace('Â', 'द्ब', $contents);
		$contents = str_replace('Ã', 'द्ग', $contents);
		$contents = str_replace('Ä', 'ा', $contents); //Handled in pre processing
		// $contents = str_replace('Å', 'द्य्', $contents); //TBD
		$contents = str_replace('Æ', 'ट्ट', $contents);
		$contents = str_replace('Ç', 'ठ्ठ', $contents);
		$contents = str_replace('È', 'ळ्', $contents);
		$contents = str_replace('É', 'ृ', $contents);
		$contents = str_replace('Ê', 'त्त्', $contents); //May be a notation for shortform; left as it is
		$contents = str_replace('Ë', 'हृ', $contents);
		//~ $contents = str_replace('Ì', ']', $contents); //TBD
		$contents = str_replace('Í', 'श्', $contents);  
		$contents = str_replace('Î', 'द्य्', $contents);
		$contents = str_replace('Ï', '्र', $contents);
		// missing
		$contents = str_replace('Ñ', 'ा', $contents);
		$contents = str_replace('Ò', 'प्र्', $contents);
		$contents = str_replace('Ó', 'द्भ', $contents);
		$contents = str_replace('Ô', 'ह्', $contents);
		//~ $contents = str_replace('Õ', 'श्व्', $contents); //TBD
		$contents = str_replace('Ö', 'प्र्', $contents);
		$contents = str_replace('×', 'द्ध', $contents); //Handled in post processing kka case
		$contents = str_replace('Ø', 'व्र्', $contents);
		//~ $contents = str_replace('Ù', 'य्', $contents); //TBD
		$contents = str_replace('Ú', 'ह्न', $contents);
		$contents = str_replace('Û', 'ह्र', $contents);
		$contents = str_replace('Ü', 'द्व', $contents);
		$contents = str_replace('Ý', '-', $contents);
		$contents = str_replace('Þ', 'श्र्', $contents);
		$contents = str_replace('ß', 'ॐ', $contents);
		$contents = str_replace('à', 'द्ध', $contents);
		$contents = str_replace('á', 'ञ्च्', $contents); 
		$contents = str_replace('â', 'झ्र्', $contents); // क and फ case 
		$contents = str_replace('ã', 'ृ', $contents); //???? verify
		$contents = str_replace('ä', 'ष्ट', $contents); // right side glyph of ka in case of conjuncts
		$contents = str_replace('å', '्रू', $contents);
		$contents = str_replace('æ', '.', $contents);
		$contents = str_replace('ç', 'ऽ', $contents);
		$contents = str_replace('è', 'ू', $contents);
		$contents = str_replace('é', 'श्व्', $contents);
		$contents = str_replace('ê', 'द्र', $contents);
		$contents = str_replace('ë', 'ः', $contents);
		$contents = str_replace('ì', 'ट', $contents); 
		$contents = str_replace('í', 'छ', $contents); 
		$contents = str_replace('î', '्य्', $contents);
		$contents = str_replace('ï', 'ह्म्', $contents); //mostly LR, left as it is
		$contents = str_replace('ð', 'स्त्र्', $contents);
		$contents = str_replace('ñ', 'स्र्', $contents);
		$contents = str_replace('ò', 'ा', $contents);
		$contents = str_replace('ó', 'ा', $contents);
		$contents = str_replace('ô', 'ा', $contents);
		$contents = str_replace('õ', '—', $contents); //TBD
		$contents = str_replace('ö', '—', $contents); //TBD
		$contents = str_replace('÷', 'ष्ठ', $contents);
		$contents = str_replace('ø', 'ष्', $contents);
		$contents = str_replace('ù', 'ट्ठ', $contents);
		$contents = str_replace('ú', 'ड्ढ', $contents);
		$contents = str_replace('û', 'ग्र्', $contents);
		$contents = str_replace('ü', 'ज्र्', $contents);
		$contents = str_replace('ý', 'ज्र्', $contents);
		$contents = str_replace('þ', 'ठ', $contents);
		$contents = str_replace('ÿ', 'ष्ठ', $contents);
		//~ $contents = str_replace('Œ', 'ष्ठ', $contents);
		//~ $contents = str_replace('œ', 'स्र्', $contents);
		//~ $contents = str_replace('Š', 'ः', $contents);
		//~ $contents = str_replace('š', 'ट', $contents);
		//~ $contents = str_replace('Ÿ', '्य्', $contents);
		//~ $contents = str_replace('ƒ', 'e', $contents); // Considered as danda
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

		
		
		$contents = str_replace('•', '=', $contents);
		$contents = str_replace(']', '.', $contents);
		$contents = str_replace('`', '‘', $contents);
		$contents = str_replace('‘‘', '“', $contents);
		$contents = str_replace('\'', '’', $contents);
		$contents = str_replace('’’', '”', $contents);
		$contents = str_replace('।।', '॥', $contents);

		$contents = str_replace(' ञ् ', ' — ', $contents);

		$contents = $this->invertIkara($contents);
		$contents = $this->invertRepha($contents);

		$contents = str_replace('ेा', 'ाे', $contents);
		$contents = str_replace('ाै', 'ौ', $contents);
		$contents = str_replace('ाे', 'ो', $contents);
		$contents = str_replace('्ंा' , 'ं', $contents);
		$contents = str_replace('्ी' , 'ी', $contents);
		$contents = str_replace(' ः' , ' :', $contents);

		return $contents;
	}

	public function invertRepha($text) {

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

	public function invertIkara($text) {

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

}	
?>
