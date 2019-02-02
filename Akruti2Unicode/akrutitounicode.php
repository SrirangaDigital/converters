<?php

class Akrutitounicode{
	
	public function sumne($text){
		
		return $text;
	}
	
	public function akruti2Unicode($text){

		
		$text = preg_replace('/ (X|ô|"|\#|\$|\&|\*|\+|\@|B|C|D|F|G|H|J|K|L|M|P|Q|R|S|T|V|W|X|Z|\[|\\|\]|\^|\_|b|c|\¦|§|¨|®|¯|½|¿|ß|à|á|ã|å|æ|ç|è|ë|ì|í|ô|÷|ø)/', '\1', $text);
		//~ $text = preg_replace("/ ([Xô\"#\$&\*\+\@BCDFGHJKLMPQRSTVWXZ[]\\\^\_bc\¦§¨®¯½¿ßàáãåæçèëìíô÷ø])/", '\1', $text);		
		$text = str_replace(' ]', ']', $text);
		$text = str_replace('\'\'[', '[\'\'', $text);
				
		// ya group 
		$text = str_replace('ÌâÃÒ', 'ಯ್​', $text);
		$text = str_replace('Ìâ°', 'ಯ', $text);
		$text = str_replace('ÌâÃÖ', 'ಯಾ', $text);
		$text = str_replace('Î°', 'ಯಿ', $text);
		$text = str_replace('Ìê°', 'ಯೆ', $text); 
		$text = str_replace('Ìê³', 'ಯೊ', $text);
		$text = str_replace('ÌâÃñ', 'ಯೌ', $text);
		
		//ma group
		$text = str_replace('ÀâÃÒ', 'ಮ್', $text);
		$text = str_replace('ÀâÃñ', 'ಮೌ', $text);		
		$text = str_replace('Àâ°', 'ಮ', $text);
		$text = str_replace('ÀâÃÖ', 'ಮಾ', $text);
		$text = str_replace('Àê°', 'ಮೆ', $text);
		$text = str_replace('Àê³', 'ಮೊ', $text);
		$text = str_replace('Æ°', 'ಮಿ', $text);
		
		// jjha group
		$text = str_replace('pâ°ü°', 'ಝ', $text);
		$text = str_replace('pâ°üÃÖ', 'ಝಾ', $text);
		$text = str_replace('pê°ü°', 'ಝೆ', $text);
		$text = str_replace('pê°ü³', 'ಝೊ', $text);
		$text = str_replace('î°ü°', 'ಝಿ', $text);
	
		//special 
		$text = str_replace('¡£', 'ೞ', $text);
		$text = str_replace('¢£', 'ಱ', $text);
		

		// RRi group
		$text = str_replace('n°', 'ಋ', $text);
		$text = str_replace('n³', 'ೠ', $text);

		// Lookup ---------------------------------------------
		$text = str_replace('!', '!', $text);
		$text = str_replace('"', '್ಕ', $text);// tbh
		$text = str_replace('#', '್ಖ', $text);
		$text = str_replace('$', '್ಗ', $text);
		$text = str_replace('%', 'ಅ', $text);
		$text = str_replace('&', '್ಘ ', $text);
		$text = str_replace("'", '’', $text);
		$text = str_replace('(', '(', $text);
		$text = str_replace(')', ')', $text);
		$text = str_replace('*', '್ಙ', $text);
		$text = str_replace('+', '್ಚ', $text);
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
		$text = str_replace('<', '', $text);
		$text = str_replace('=', '=', $text);
		$text = str_replace('>', '', $text);
		$text = str_replace('?', '?', $text);
		$text = str_replace('@', '್ಜ', $text);
		$text = str_replace('A', 'ಆ', $text);
		$text = str_replace('B', '್ಝ', $text);
		$text = str_replace('C', '್ಞ', $text);
		$text = str_replace('D', '್ಟ', $text);
		$text = str_replace('E', 'ಇ', $text);
		$text = str_replace('F', '್ಠ', $text);
		$text = str_replace('G', '್ಡ', $text);
		$text = str_replace('H', '್ಢ', $text);
		$text = str_replace('I', 'ಉ', $text);
		$text = str_replace('J', '್ಣ', $text);
		$text = str_replace('K', '್ತ', $text);
		$text = str_replace('L', '್ಥ', $text);
		$text = str_replace('M', '್ದ', $text);
		$text = str_replace('N', 'ಊ', $text);
		$text = str_replace('O', 'ಏ', $text); 
		$text = str_replace('P', '್ಧ', $text);
		$text = str_replace('Q', '್ನ', $text);
		$text = str_replace('R', '್ಪ', $text);
		$text = str_replace('S', '್ಫ', $text);
		$text = str_replace('T', '್ಬ', $text);
		$text = str_replace('U', 'ಎ', $text);
		$text = str_replace('V', '್ಭ', $text);
		$text = str_replace('W', '್ಮ', $text);
		$text = str_replace('X', '್ಯ', $text);
		$text = str_replace('Y', 'ಐ', $text);
		$text = str_replace('Z', '್ರ', $text);
		$text = str_replace('[', '್ಲ', $text);
		$text = str_replace("\\", '್ಳ', $text);
		$text = str_replace(']', '್ವ', $text);
		$text = str_replace('^', '್ಶ', $text);
		$text = str_replace('_', '್ಷ', $text);
		$text = str_replace('`', '‘', $text);
		$text = str_replace('a', 'ಒ', $text);
		$text = str_replace('b', '್ಸ', $text);
		$text = str_replace('c', '್ಹ', $text);
		$text = str_replace('d', 'ಕ್', $text);
		$text = str_replace('e', 'ಓ', $text);
		$text = str_replace('f', 'ಖ್', $text);
		$text = str_replace('g', 'ಗ್', $text);
		$text = str_replace('h', 'ಘ್', $text); 
		$text = str_replace('i', 'ಔ', $text); 
		$text = str_replace('j', 'ಙ್', $text);
		$text = str_replace('k', 'ಚ್', $text); // pre processing
		$text = str_replace('l', 'ಛ್', $text); 
		$text = str_replace('m', 'ಜ', $text);
		//~ $text = str_replace('n', 'ಟಿ', $text); //ಋ
		$text = str_replace('o', 'ಈ', $text);
		$text = str_replace('p', 'ರ್', $text);
		$text = str_replace('q', 'ಞ್', $text);
		$text = str_replace('r', 'ಟ', $text);
		$text = str_replace('s', 'ಟಿ', $text); 
		$text = str_replace('t', 'ಠ್', $text);
		$text = str_replace('u', 'ಜ್', $text);
		$text = str_replace('v', 'ಡ್', $text);
		$text = str_replace('w', 'ಢ್', $text);
		$text = str_replace('x', 'ಣ', $text);
		$text = str_replace('y', 'ತ್', $text);
		$text = str_replace('z', 'ಥ್', $text);
		$text = str_replace('{', 'ದ್', $text);
		$text = str_replace('|', 'ಧ್', $text); 
		$text = str_replace('}', 'ನ್', $text);
		$text = str_replace('~', 'ಪ್', $text);
		$text = str_replace('¡', 'ೞ್', $text);
		// $text = str_replace(' ', '', $text); // tbh (no break space)
		$text = str_replace('¢', 'ಱ್', $text);
		//~ $text = str_replace('£', '', $text); //joint for talagottu
		$text = str_replace('¥', '-', $text);
		$text = str_replace('¦', '್ತ್ಯ', $text);
		$text = str_replace('§', '್ತೃ', $text);
		$text = str_replace('¨', '್ತ್ಯ', $text);
		//~ $text = str_replace('©', '', $text);//dheerga
		$text = str_replace('ª', 'ಂ', $text);
		$text = str_replace('«', 'ಭಿ', $text);
		$text = str_replace('¬', 'ದಿ', $text); 
		$text = str_replace('­', '್ಕೃ', $text); 
		$text = str_replace('®', '್ತ್ವ', $text);
		$text = str_replace('¯', '್ಕೃ', $text);
		$text = str_replace('°', 'ು', $text); //u kara(kombu)
		$text = str_replace('±', 'ಬ', $text);
		$text = str_replace('²', 'ಬಿ', $text);
		$text = str_replace('³', 'ೂ', $text);
		$text = str_replace('´', 'ಘ್', $text);
		$text = str_replace('µ', 'ಶ್', $text);
		$text = str_replace('¶', 'ಲಿ', $text);
		$text = str_replace('·', 'ಲ', $text);
		$text = str_replace('¸', 'ಷಿ', $text);
		$text = str_replace('¹', 'ಣಿ', $text);
		$text = str_replace('º', 'ಧಿ', $text);
		$text = str_replace('»', 'ತಿ', $text);
		$text = str_replace('¼', 'ಥಿ', $text);
		$text = str_replace('½', 'ೃ', $text);
		$text = str_replace('¾', 'ನಿ', $text);
		$text = str_replace('¿', 'ನ್', $text);
		$text = str_replace('À', 'ವ್', $text); // replacing a kara to swara 'a'
		$text = str_replace('Á', 'ಫ್', $text);//kA
		$text = str_replace('Â', 'ಟ್', $text);//ki
		//~ $text = str_replace('Ã', '', $text);//joint
		$text = str_replace('Ä', 'ಪಿ', $text);//joint
		$text = str_replace('Å', 'ಭ್', $text);//
		$text = str_replace('Æ', 'ವಿ', $text);//
		$text = str_replace('Ç', 'ಣ್', $text);//
		$text = str_replace('È', 'ಲ್', $text);//
		$text = str_replace('É', 'ಸ್', $text);//
		$text = str_replace('Ê', 'ಜಿ', $text);//
		$text = str_replace('Ë', 'Ë', $text);//arka vottu
		$text = str_replace('Ì', 'ಯ್', $text);
		$text = str_replace('Í', 'ಷ್', $text);
		//~ $text = str_replace('Î', 'ಯಿ', $text); //tbh
		$text = str_replace('Ï', 'ಬ್', $text);
		$text = str_replace('Ð', 'ಗಿ', $text);
		$text = str_replace('Ñ', 'ಕಿ', $text);
		$text = str_replace('Ò', '್​', $text);
		$text = str_replace('Ó', 'ಛಿ', $text);
		$text = str_replace('Ô', 'ಳ್', $text);
		$text = str_replace('Õ', 'ಫಿ', $text);
		$text = str_replace('Ö', 'ಾ', $text);
		$text = str_replace('×', 'ಚಿ', $text);
		$text = str_replace('Ø', 'ಖಿ', $text);
		$text = str_replace('Ù', 'ಖ', $text);
		$text = str_replace('Ú', 'ಡಿ', $text);
		$text = str_replace('Û', 'ಢಿ', $text);
		$text = str_replace('Ü', 'ಘಿ', $text);
		$text = str_replace('Ý', 'ಹ್', $text);
		$text = str_replace('Þ', 'ಶ್ರೀ', $text);
		$text = str_replace('ß', '್ಪ್ರ', $text);
		$text = str_replace('à', '್ೞ', $text);
		$text = str_replace('á', '್ಱ', $text);
		$text = str_replace('â', 'ಅ', $text);//replace a kara to swara a
		$text = str_replace('ã', 'ೄ', $text);
		$text = str_replace('ä', 'ಚಿ', $text);
		$text = str_replace('å', '್ಟ್ರ', $text);
		$text = str_replace('æ', '್ಫ', $text);
		$text = str_replace('ç', '್ತ್ರ', $text);
		$text = str_replace('è', '್ತೈ', $text);
		$text = str_replace('é', '|', $text);
		$text = str_replace('ê', 'ೆ', $text);
		$text = str_replace('ë', '್ರೃ', $text);
		$text = str_replace('ì', '್ಸ್ರ', $text);
		//~ $text = str_replace('í', '', $text); //no glyph in unicode
		$text = str_replace('î', 'ರಿ', $text);
		$text = str_replace('ï', 'ಠಿ', $text);
		$text = str_replace('ð', 'ಿ', $text);//i kara
		$text = str_replace('ñ', 'ೌ', $text);
		$text = str_replace('ò', 'ೂ', $text);
		$text = str_replace('ó', 'ು', $text);
		$text = str_replace('ô', 'ೈ', $text);//
		$text = str_replace('õ', '—', $text);//
		$text = str_replace('ö', '–', $text);//
		$text = str_replace('÷', '್ರ', $text);//
		$text = str_replace('ø', '್ಕ', $text);
		$text = str_replace('ù', 'ಳಿ', $text);
		$text = str_replace('ú', 'ಶಿ', $text);
		$text = str_replace('û', 'ಸಿ', $text);
		//~ $text = str_replace('ü', '', $text);//tbh
		$text = str_replace('ý', 'ಹಿ', $text);
		$text = str_replace('þ', 'ಹಿ', $text);
		$text = str_replace('ÿ', 'ಃ', $text);
		$text = str_replace('‘', '‘', $text);
		$text = str_replace('’', '’', $text);
		$text = str_replace('“', '“', $text);
		$text = str_replace('”', '”', $text);

		// Special cases

		//remove ottu spacer
		//~ $text = str_replace('ö', '', $text);//ottu spacer
		//~ $text = str_replace('÷', '', $text);//ottu spacer


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

		$text = str_replace('ಿ©', 'ೀ', $text);//kiV
		$text = str_replace('ೆ©', 'ೇ', $text);//keV
		$text = str_replace('ೊ©', 'ೋ', $text);//koV		
		
		$text = str_replace('್​Ë', '್Ë', $text);//halanta+zwj+R = halanta+R
		

		$text = preg_replace("/($swaraJoin)್($vyanjana)/u", "್$2$1", $text);
		
		// First pass of repha inversion
		$text = preg_replace("/($syllable)/u", "$1zzz", $text);
		$text = preg_replace("/್zzz/u", "್", $text);
		$text = preg_replace("/್Ë/u", "್zzzË", $text);
		$text = preg_replace("/zzz([^z]*?)zzzË/u", "zzzರ್zzz" . "$1", $text);
		$text = str_replace("zzz", "", $text);

		$text = str_replace('ೊ', 'ೊ', $text);//ko
		$text = str_replace('ೆೈ', 'ೈ', $text);//kai

		$text = str_replace('ಿ©', 'ೀ', $text);//kiV
		$text = str_replace('ೆ©', 'ೇ', $text);//keV
		$text = str_replace('ೊ©', 'ೋ', $text);//koV		

		// Second pass of repha inversion
		$text = preg_replace("/($syllable)/u", "$1zzz", $text);
		$text = preg_replace("/್zzz/u", "್", $text);
		$text = preg_replace("/್Ë/u", "್zzzË", $text);
		$text = preg_replace("/zzz([^z]*?)zzzË/u", "zzzರ್zzz" . "$1", $text);
		$text = str_replace("zzz", "", $text);

		$text = str_replace('ೊ', 'ೊ', $text);//ko
		$text = str_replace('ೆೈ', 'ೈ', $text);//kai

		$text = str_replace('ಿ©', 'ೀ', $text);//kiV
		$text = str_replace('ೆ©', 'ೇ', $text);//keV
		$text = str_replace('ೊ©', 'ೋ', $text);//koV

		$text = str_replace('ಿ©', 'ೀ', $text);//kiV
		$text = str_replace('ೆ©', 'ೇ', $text);//keV
		$text = str_replace('ೊ©', 'ೋ', $text);//koV	

		// Final replacements
		$text = str_replace(' ್', '್', $text);
		$text = str_replace('||', '||', $text);
		$text = str_replace('|', '|', $text);
				
		return $text;
	}

}	
?>
