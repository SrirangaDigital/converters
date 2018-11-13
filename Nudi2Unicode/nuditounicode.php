<?php

class Nuditounicode{
	
	public function sumne($text){
		
		return $text;
	}
	
	public function nudi2Unicode($text){


		// ya group
		$text = str_replace('AiÀiï', 'ಯ್​', $text);
		$text = str_replace('AiÀÄ', 'ಯ', $text);
		$text = str_replace('AiÀiÁ', 'ಯಾ', $text);
		$text = str_replace('¬Ä', 'ಯಿ', $text);
		$text = str_replace('AiÉÄ', 'ಯೆ', $text); 
		$text = str_replace('AiÉÆ', 'ಯೊ', $text);
		$text = str_replace('AiÀiË', 'ಯೌ', $text);
		
		//ma group
		$text = str_replace('ªÀÄ', 'ಮ', $text);
		$text = str_replace('ªÀiÁ', 'ಮಾ', $text);
		$text = str_replace('ªÉÄ', 'ಮೆ', $text);
		$text = str_replace('ªÉÆ', 'ಮೊ', $text);
		$text = str_replace('«Ä', 'ಮಿ', $text);
		
		// jjha group
		$text = str_replace('gÀhÄ', 'ಝ', $text);
		$text = str_replace('gÀhiÁ', 'ಝಾ', $text);
		$text = str_replace('gÉhÄ', 'ಝೆ', $text);
		$text = str_replace('gÉhÆ', 'ಝೊ', $text);
		$text = str_replace('jhÄ', 'ಝಿ', $text);

		//dha group
		$text = str_replace('zs', 'ಧ್', $text);
		$text = str_replace('¢ü', 'ಧಿ', $text);

		//Dha group
		$text = str_replace('qs', 'ಢ್', $text);
		$text = str_replace('rü', 'ಢಿ', $text);
		
		//pha group
		$text = str_replace('¥s', 'ಫ್', $text);
		$text = str_replace('¦ü', 'ಫಿ', $text);

		//ha group
		$text = str_replace('¨s', 'ಭ್', $text);
		$text = str_replace('©ü', 'ಭಿ', $text);

		// RRi group
		$text = str_replace('IÄ', 'ಋ', $text);
		$text = str_replace('IÆ', 'ೠ', $text);

		// Lookup ---------------------------------------------
		$text = str_replace('!', '!', $text);
		$text = str_replace('"', '"', $text);// tbh
		$text = str_replace('#', '#', $text);
		$text = str_replace('$', '$', $text);
		$text = str_replace('%', '%', $text);
		$text = str_replace('&', '&', $text);
		$text = str_replace("'", '’', $text);
		$text = str_replace('(', '(', $text);
		$text = str_replace(')', ')', $text);
		$text = str_replace('*', '*', $text);
		$text = str_replace('+', '+', $text);
		$text = str_replace(',', ',', $text);
		$text = str_replace('-', '-', $text);
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
		$text = str_replace('<', '<', $text);
		$text = str_replace('=', '=', $text);
		$text = str_replace('>', '>', $text);
		$text = str_replace('?', '?', $text);
		$text = str_replace('@', '@', $text);
		$text = str_replace('A', 'ಂ', $text);
		$text = str_replace('B', 'ಃ', $text);
		$text = str_replace('C', 'ಅ', $text);
		$text = str_replace('D', 'ಆ', $text);
		$text = str_replace('E', 'ಇ', $text);
		$text = str_replace('F', 'ಈ', $text);
		$text = str_replace('G', 'ಉ', $text);
		$text = str_replace('H', 'ಊ', $text);
		//~ $text = str_replace('I', '', $text); //handled above in RRi group
		$text = str_replace('J', 'ಎ', $text);
		$text = str_replace('K', 'ಏ', $text);
		$text = str_replace('L', 'ಐ', $text);
		$text = str_replace('M', 'ಒ', $text);
		$text = str_replace('N', 'ಓ', $text);
		$text = str_replace('O', 'ಔ', $text); 
		$text = str_replace('P', 'ಕ್', $text);
		$text = str_replace('Q', 'ಕಿ', $text);
		$text = str_replace('R', 'ಖ', $text);
		$text = str_replace('S', 'ಖ್', $text);
		$text = str_replace('T', 'ಖಿ', $text);
		$text = str_replace('U', 'ಗ್', $text);
		$text = str_replace('V', 'ಗಿ', $text);
		$text = str_replace('W', 'ಘ್', $text);
		$text = str_replace('X', 'ಘಿ', $text);
		$text = str_replace('Y', 'ಙ', $text);
		$text = str_replace('Z', 'ಚ್', $text);
		$text = str_replace('[', '[', $text);
		$text = str_replace("\\", '\\', $text);
		$text = str_replace(']', ']', $text);
		$text = str_replace('^', '^', $text);
		$text = str_replace('_', '_', $text);
		$text = str_replace('`', '‘', $text);
		$text = str_replace('a', 'ಚಿ', $text);
		$text = str_replace('b', 'ಛ್', $text);
		$text = str_replace('c', 'ಛಿ', $text);
		$text = str_replace('d', 'ಜ', $text);
		$text = str_replace('e', 'ಜ್', $text);
		$text = str_replace('f', 'ಜಿ', $text);
		$text = str_replace('g', 'ರ್', $text);
		//~ $text = str_replace('h', '', $text); //pre processing (ya Jha)
		//~ $text = str_replace('i', '', $text); //pre processing (ya Jha)
		$text = str_replace('j', 'ರಿ', $text);
		$text = str_replace('k', 'ಞ', $text); // pre processing
		$text = str_replace('l', 'ಟ', $text); 
		$text = str_replace('m', 'ಟ್', $text);
		$text = str_replace('n', 'ಟಿ', $text); 
		$text = str_replace('o', 'ಠ್', $text);
		$text = str_replace('p', 'ಠಿ', $text);
		$text = str_replace('q', 'ಡ್', $text);
		$text = str_replace('r', 'ಡಿ', $text);
		//~ $text = str_replace('s', '', $text); //pre processing
		$text = str_replace('t', 'ಣ', $text);
		$text = str_replace('u', 'ಣ್', $text);
		$text = str_replace('v', 'ತ್', $text);
		$text = str_replace('w', 'ತಿ', $text);
		$text = str_replace('x', 'ಥ್', $text);
		$text = str_replace('y', 'ಥಿ', $text);
		$text = str_replace('z', 'ದ್', $text);
		$text = str_replace('{', '{', $text);
		$text = str_replace('|', '|', $text); 
		$text = str_replace('}', '}', $text);
		$text = str_replace('~', '~', $text);
		// $text = str_replace(' ', '', $text); // tbh (no break space)
		$text = str_replace('¢', 'ದಿ', $text);
		$text = str_replace('£', 'ನ್', $text);
		$text = str_replace('¤', 'ನಿ', $text);
		$text = str_replace('¥', 'ಪ್', $text);
		$text = str_replace('¦', 'ಪಿ', $text);
		$text = str_replace('§', 'ಬ', $text);
		$text = str_replace('¨', 'ಬ್', $text);
		$text = str_replace('©', 'ಬಿ', $text);
		$text = str_replace('ª', 'ವ್', $text);
		$text = str_replace('«', 'ವಿ', $text);
		//~ $text = str_replace('¬', '', $text); //handled above in ya group (yi)
		$text = str_replace('®', 'ಲ', $text);
		$text = str_replace('¯', 'ಲ್', $text);
		$text = str_replace('°', 'ಲಿ', $text);
		$text = str_replace('±', 'ಶ್', $text);
		$text = str_replace('²', 'ಶಿ', $text);
		$text = str_replace('µ', 'ಷ್', $text);
		$text = str_replace('¶', 'ಷಿ', $text);
		$text = str_replace('¸', 'ಸ್', $text);
		$text = str_replace('¹', 'ಸಿ', $text);
		$text = str_replace('º', 'ಹ್', $text);
		$text = str_replace('»', 'ಹಿ', $text);
		$text = str_replace('¼', 'ಳ್', $text);
		$text = str_replace('½', 'ಳಿ', $text);
		$text = str_replace('¾', 'ಱ', $text);
		$text = str_replace('¿', 'ೞ', $text);
		$text = str_replace('À', 'ಅ', $text); // replacing a kara to swara 'a'
		$text = str_replace('Á', 'ಾ', $text);//kA
		$text = str_replace('Â', 'ಿ', $text);//ki
		$text = str_replace('Ä', 'ು', $text);//ku
		$text = str_replace('Å', 'ು', $text);//ku
		$text = str_replace('Æ', 'ೂ', $text);//kU
		$text = str_replace('Ç', 'ೂ', $text);//kU
		$text = str_replace('È', 'ೃ', $text);//kaq
		$text = str_replace('É', 'ೆ', $text);//ke
		$text = str_replace('Ê', 'ೈ', $text);//kai
		$text = str_replace('Ë', 'ೌ', $text);
		$text = str_replace('Ì', '್ಕ', $text);
		$text = str_replace('Í', '್ಖ', $text);
		$text = str_replace('Î', '್ಗ', $text);
		$text = str_replace('Ï', '್ಘ', $text);
		$text = str_replace('Ð', '್ಙ', $text);
		$text = str_replace('Ñ', '್ಚ', $text);
		$text = str_replace('Ò', '್ಛ', $text);
		$text = str_replace('Ó', '್ಜ', $text);
		$text = str_replace('Ô', '್ಝ', $text);
		$text = str_replace('Õ', '್ಞ', $text);
		$text = str_replace('Ö', '್ಟ', $text);
		$text = str_replace('×', '್ಠ', $text);
		$text = str_replace('Ø', '್ಡ', $text);
		$text = str_replace('Ù', '್ಢ', $text);
		$text = str_replace('Ú', '್ಣ', $text);
		$text = str_replace('Û', '್ತ', $text);
		$text = str_replace('Ü', '್ಥ', $text);
		$text = str_replace('Ý', '್ದ', $text);
		$text = str_replace('Þ', '್ಧ', $text);
		$text = str_replace('ß', '್ನ', $text);
		$text = str_replace('à', '್ಪ', $text);
		$text = str_replace('á', '್ಫ', $text);
		$text = str_replace('â', '್ಬ', $text);
		$text = str_replace('ã', '್ಭ', $text);
		$text = str_replace('ä', '್ಮ', $text);
		$text = str_replace('å', '್ಯ', $text);
		$text = str_replace('æ', '್ರ', $text);
		$text = str_replace('ç', '್ರ', $text);
		$text = str_replace('è', '್ಲ', $text);
		$text = str_replace('é', '್ವ', $text);
		$text = str_replace('ê', '್ಶ', $text);
		$text = str_replace('ë', '್ಷ', $text);
		$text = str_replace('ì', '್ಸ', $text);
		$text = str_replace('í', '್ಹ', $text);
		$text = str_replace('î', '್ಳ', $text);
		$text = str_replace('ï', '್​', $text);
		$text = str_replace('ð', 'ð', $text);//arka vottu
		$text = str_replace('ñ', 'ೄ', $text);
		$text = str_replace('ò', 'ನ್', $text);
		$text = str_replace('ó', '಼', $text);
		$text = str_replace('ô', 'ô', $text);//tbh
		$text = str_replace('õ', 'õ', $text);//tbh
		$text = str_replace('ø', 'ೃ', $text);
		$text = str_replace('ù', '್ಱ', $text);
		$text = str_replace('ú', '್ೞ', $text);
		$text = str_replace('û', '಼', $text);
		//~ $text = str_replace('ü', '', $text);//tbh
		$text = str_replace('ý', 'ಽ', $text);
		//~ $text = str_replace('Œ', '', $text);//tbh
		//~ $text = str_replace('Š', '', $text);//tbh
		//~ $text = str_replace('¯', '', $text);//tbh
		$text = str_replace('‘', '‘', $text);
		$text = str_replace('’', '’', $text);
		$text = str_replace('“', '“', $text);
		$text = str_replace('”', '”', $text);
		$text = str_replace('„', 'ಽ', $text);
		$text = str_replace('†', '।', $text);
		$text = str_replace('‡', '॥', $text);
		//~ $text = str_replace('‰', '', $text);//tbh
		//~ $text = str_replace('‹', '', $text);//tbh

		// Special cases

		//remove ottu spacer
		$text = str_replace('ö', '', $text);//ottu spacer
		$text = str_replace('÷', '', $text);//ottu spacer


		// Swara
		$text = preg_replace('/್[ಅ]/u', '', $text);
		$text = preg_replace('/್([ಾಿೀುೂೃೄೆೇೈೊೋೌ್])/u', "$1", $text);

		$text = str_replace('ೊ', 'ೊ', $text);//ko
		$text = str_replace('ೆೈ', 'ೈ', $text);//kai

		$swara = "ಅ|ಆ|ಇ|ಈ|ಉ|ಊ|ಋ|ಎ|ಏ|ಐ|ಒ|ಓ|ಔ";
		$vyanjana = "ಕ|ಖ|ಗ|ಘ|ಙ|ಚ|ಛ|ಜ|ಝ|ಞ|ಟ|ಠ|ಡ|ಢ|ಣ|ತ|ಥ|ದ|ಧ|ನ|ಪ|ಫ|ಬ|ಭ|ಮ|ಯ|ರ|ಱ|ಲ|ವ|ಶ|ಷ|ಸ|ಹ|ಳ|ೞ";
		$swaraJoin = "ಾ|ಿ|ೀ|ು|ೂ|ೃ|ೄ|ೆ|ೇ|ೈ|ೊ|ೋ|ೌ|ಂ|ಃ|್";

		$syllable = "($vyanjana)($swaraJoin)|($vyanjana)($swaraJoin)|($vyanjana)|($swara)";

		$text = preg_replace("/($swaraJoin)್($vyanjana)/u", "್$2$1", $text);
		$text = preg_replace("/್​್($vyanjana)/u", "್$1್​", $text);


		$text = str_replace('ೊ', 'ೊ', $text);//ko
		$text = str_replace('ೆೈ', 'ೈ', $text);//kai

		$text = str_replace('ಿÃ', 'ೀ', $text);//kiV
		$text = str_replace('ೆÃ', 'ೇ', $text);//keV
		$text = str_replace('ೊÃ', 'ೋ', $text);//koV		

		$text = preg_replace("/($swaraJoin)್($vyanjana)/u", "್$2$1", $text);
		
		// First pass of repha inversion
		$text = preg_replace("/($syllable)/u", "$1zzz", $text);
		$text = preg_replace("/್zzz/u", "್", $text);
		$text = preg_replace("/್ð/u", "್zzzð", $text);
		$text = preg_replace("/zzz([^z]*?)zzzð/u", "zzzರ್zzz" . "$1", $text);
		$text = str_replace("zzz", "", $text);

		$text = str_replace('ೊ', 'ೊ', $text);//ko
		$text = str_replace('ೆೈ', 'ೈ', $text);//kai

		$text = str_replace('ಿÃ', 'ೀ', $text);//kiV
		$text = str_replace('ೆÃ', 'ೇ', $text);//keV
		$text = str_replace('ೊÃ', 'ೋ', $text);//koV		

		// Second pass of repha inversion
		$text = preg_replace("/($syllable)/u", "$1zzz", $text);
		$text = preg_replace("/್zzz/u", "್", $text);
		$text = preg_replace("/್ð/u", "್zzzð", $text);
		$text = preg_replace("/zzz([^z]*?)zzzð/u", "zzzರ್zzz" . "$1", $text);
		$text = str_replace("zzz", "", $text);

		$text = str_replace('ೊ', 'ೊ', $text);//ko
		$text = str_replace('ೆೈ', 'ೈ', $text);//kai

		$text = str_replace('ಿÃ', 'ೀ', $text);//kiV
		$text = str_replace('ೆÃ', 'ೇ', $text);//keV
		$text = str_replace('ೊÃ', 'ೋ', $text);//koV	

		$text = str_replace('ಿ Ã', 'ೀ', $text);//kiV
		$text = str_replace('ೆ Ã', 'ೇ', $text);//keV
		$text = str_replace('ೊ Ã', 'ೋ', $text);//koV	

		// Final replacements
		$text = str_replace(' ್', '್', $text);
		$text = str_replace('||', '॥', $text);
		$text = str_replace('|', '।', $text);
				
		return $text;
	}

}	
?>
