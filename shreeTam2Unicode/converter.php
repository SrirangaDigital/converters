<?php

class Converter{

	public function __construct() {
		
	}
	
	public function shreeTam2Unicode ($text) {

		// Initial parse

		// Reversing occurances

		// Consolidation of same glyphs at multiple code points
		
		// Reversing occurances
		// Lookup ---------------------------------------------
				
		$text = str_replace('!', '!', $text);
		$text = str_replace('%', '%', $text);
		$text = str_replace('&', '-', $text);
		$text = str_replace('(', '(', $text);
		$text = str_replace(')', ')', $text);
		$text = str_replace('*', '*', $text);
		$text = str_replace('+', '+', $text);
		$text = str_replace(',', ',', $text);
		$text = str_replace('-', '-', $text);
		$text = str_replace('.', '.', $text);
		$text = str_replace('/', '/', $text);
		$text = str_replace('0', '0', $text);
		$text = str_replace('1', '1', $text);
		$text = str_replace('2', '2', $text);
		$text = str_replace('3', '3', $text);
		$text = str_replace('4', '4', $text);
		$text = str_replace('5', '5', $text);
		$text = str_replace('6', '6', $text);
		$text = str_replace('7', '7', $text);
		$text = str_replace('8', '8', $text);
		$text = str_replace('9', '9', $text);
		$text = str_replace(':', ':', $text);
		$text = str_replace(';', ';', $text);
		$text = str_replace('=', '=', $text);
		$text = str_replace('>', '>', $text); // Doubt
		$text = str_replace('?', '?', $text);
		$text = str_replace('@', '@', $text); // Doubt
		$text = str_replace('A', 'அ', $text);
		$text = str_replace('B', 'ஆ', $text);
		$text = str_replace('C', 'இ', $text);
		$text = str_replace('D', 'ஈ', $text);
		$text = str_replace('E', 'உ', $text);
		$text = str_replace('F', 'ஊ', $text);
		$text = str_replace('G', 'எ', $text);
		$text = str_replace('H', 'ஏ', $text);
		$text = str_replace('I', 'ஐ', $text);
		$text = str_replace('J', 'ஒ', $text);
		$text = str_replace('K', 'ஓ', $text);
		$text = str_replace('L', 'ஃ', $text);
		$text = str_replace('M', '௵', $text);
		$text = str_replace('N', '௴', $text);
		$text = str_replace('O', '௹', $text);
		$text = str_replace('P', 'க', $text);
		$text = str_replace('Q', 'கி', $text);
		$text = str_replace('R', 'கீ', $text);
		$text = str_replace('S', 'கு', $text);
		$text = str_replace('T', 'கூ', $text);
		$text = str_replace('U', 'க்', $text);
		$text = str_replace('V', 'ங', $text);
		$text = str_replace('W', 'ஙி', $text);
		$text = str_replace('X', 'ஙீ', $text);
		$text = str_replace('Y', 'ஙு', $text);
		$text = str_replace('Z', 'ஙூ', $text);
		$text = str_replace('[', 'ங்', $text);
		$text = str_replace("\\", 'ச', $text);
		$text = str_replace(']', 'சி', $text);
		$text = str_replace('^', 'சீ', $text);
		$text = str_replace('_', 'சு', $text);
		$text = str_replace('`', 'சூ', $text);
		$text = str_replace('a', 'ச்', $text);
		$text = str_replace('b', 'ஞ', $text);
		$text = str_replace('c', 'ஞி', $text);
		$text = str_replace('d', 'ஞீ', $text);
		$text = str_replace('e', 'ஞு', $text);
		$text = str_replace('f', 'ஞூ', $text);
		$text = str_replace('g', 'ஞ்', $text);
		$text = str_replace('h', 'ட', $text);
		$text = str_replace('i', 'டி', $text);
		$text = str_replace('j', 'டீ', $text);
		$text = str_replace('k', 'டு', $text);
		$text = str_replace('l', 'டூ', $text);
		$text = str_replace('m', 'ட்', $text);
		$text = str_replace('n', 'ண', $text); 
		$text = str_replace('o', 'ணி', $text);
		$text = str_replace('p', 'ணீ', $text);
		$text = str_replace('q', 'ணு', $text);
		$text = str_replace('r', 'ணூ', $text);
		$text = str_replace('s', 'ண்', $text); 
		$text = str_replace('t', 't', $text); //doubt
		$text = str_replace('u', 'த', $text);
		$text = str_replace('v', 'தி', $text);
		$text = str_replace('w', 'தீ', $text);
		$text = str_replace('x', 'து', $text);
		$text = str_replace('y', 'தூ', $text);
		$text = str_replace('z', 'த்', $text);
		$text = str_replace('{', 'நி', $text);
		$text = str_replace('|', 'ந', $text);
		$text = str_replace('}', 'நீ', $text);
		$text = str_replace('~', 'நு', $text);
		$text = str_replace('¡', 'நூ', $text);
		$text = str_replace('¢', 'ந்', $text);
		$text = str_replace('£', 'ப', $text);
		$text = str_replace('¤', 'பி', $text);
		$text = str_replace('¥', 'பீ', $text);
		$text = str_replace('¦', 'பு', $text);
		$text = str_replace('§', 'பூ', $text);
		$text = str_replace('¨', 'ப்', $text);
		$text = str_replace('©', 'ம', $text);
		$text = str_replace('ª', 'மி', $text);
		$text = str_replace('«', 'மீ', $text);
		$text = str_replace('®', 'ம்', $text);
		$text = str_replace('¯', 'ய', $text);
		$text = str_replace('°', 'யி', $text);
		$text = str_replace('±', 'யீ', $text);
		$text = str_replace('²', 'யு', $text);
		$text = str_replace('³', 'யூ', $text);
		$text = str_replace('´', 'ய்', $text);
		$text = str_replace('µ', 'ர', $text);
		$text = str_replace('·', '·', $text); // doubt
		$text = str_replace('¸', 'ரு', $text);
		$text = str_replace('¹', 'ரூ', $text);
		$text = str_replace('º', 'ர்', $text);
		$text = str_replace('»', 'ல', $text);
		$text = str_replace('¼', 'லி', $text);
		$text = str_replace('½', 'லீ', $text);
		$text = str_replace('¾', 'லு', $text);
		$text = str_replace('¿', 'லூ', $text);
		$text = str_replace('À', 'ல்', $text);
		$text = str_replace('Á', 'வ', $text);
		$text = str_replace('Â', 'வி', $text);
		$text = str_replace('Ã', 'வீ', $text);
		$text = str_replace('Ä', 'வு', $text);
		$text = str_replace('Å', 'வூ', $text);
		$text = str_replace('Æ', 'வ்', $text);
		$text = str_replace('Ç', 'ழ', $text);
		$text = str_replace('È', 'ழி', $text);
		$text = str_replace('É', 'ழீ', $text);
		$text = str_replace('Ê', 'ழு', $text);
		$text = str_replace('Ë', 'ழூ', $text);
		$text = str_replace('Ì', 'ழ்', $text);
		$text = str_replace('Í', 'ள', $text);
		$text = str_replace('Î', 'ளி', $text);
		$text = str_replace('Ï', 'ளீ', $text);
		$text = str_replace('Ð', 'ளு', $text);
		$text = str_replace('Ñ', 'ளூ', $text);
		$text = str_replace('Ò', 'ள்', $text);
		$text = str_replace('Ó', 'ற', $text);
		$text = str_replace('Ô', 'றி', $text);
		$text = str_replace('Õ', 'றீ', $text);
		$text = str_replace('Ö', 'று', $text);
		$text = str_replace('×', 'றூ', $text);
		$text = str_replace('Ø', 'ற்', $text);
		$text = str_replace('Ù', 'Ù', $text); //Doubt
		$text = str_replace('Ú', 'ன', $text);
		$text = str_replace('Û', 'னி', $text);
		$text = str_replace('Ü', 'னீ', $text);
		$text = str_replace('Ý', 'னு', $text);
		$text = str_replace('Þ', 'னூ', $text);
		$text = str_replace('ß', 'ன்', $text);
		$text = str_replace('à', 'à', $text); // Doubt
		$text = str_replace('á', 'ஜ', $text);
		$text = str_replace('â', 'ஜி', $text);
		$text = str_replace('ã', 'ஜீ', $text);
		$text = str_replace('ä', 'ஜ்', $text);
		$text = str_replace('å', 'ஷ', $text);
		$text = str_replace('æ', 'ஷி', $text);
		$text = str_replace('ç', 'ஷீ', $text);
		$text = str_replace('è', 'ஷ்', $text);
		$text = str_replace('é', 'ஸ', $text);
		$text = str_replace('ê', 'ஸி', $text);
		$text = str_replace('ë', 'ஸீ', $text);
		$text = str_replace('ì', 'ஸ்', $text);
		$text = str_replace('í', 'ஹ', $text);
		$text = str_replace('î', 'ஹி', $text);
		$text = str_replace('ï', 'ஹீ', $text);
		$text = str_replace('ð', 'ஹ்', $text);
		$text = str_replace('ñ', 'க்ஷ', $text);
		$text = str_replace('ò', 'க்ஷி', $text);
		$text = str_replace('ó', 'க்ஷீ', $text);
		$text = str_replace('ô', 'க்ஷ்', $text);
		$text = str_replace('õ', 'ா', $text);
		$text = str_replace('ö', 'ெ', $text);
		$text = str_replace('÷', 'ே', $text);
		$text = str_replace('ø', 'ை', $text);
		$text = str_replace('ù', 'ù', $text); // Doubt
		$text = str_replace('ú', 'ு', $text);
		$text = str_replace('û', 'ு', $text);
		$text = str_replace('ü', 'ூ', $text);
		$text = str_replace('ý', 'ூ', $text);
		$text = str_replace('þ', '௸', $text);
		$text = str_replace('ÿ', 'ஶ்ரீ', $text);
		$text = str_replace('š', 'ௐ', $text);
		$text = str_replace('Ÿ', 'ரீ', $text);
		$text = str_replace('ƒ', 'ஶ்', $text);
		$text = str_replace('ˆ', '௳', $text);
		$text = str_replace('˜', '௲', $text);
		$text = str_replace('–', '–', $text);
		$text = str_replace('—', '—', $text);
		$text = str_replace('‘', 'ி', $text);
		$text = str_replace('’', 'ீ', $text);
		$text = str_replace('‚', 'ஶீ', $text);
		$text = str_replace('“', '்', $text);
		$text = str_replace('„', '௱', $text);
		$text = str_replace('†', 'ஶ', $text);
		$text = str_replace('‡', 'ஶி', $text);
		$text = str_replace('•', 'மு', $text); //Doubt
		$text = str_replace('…', '௰', $text);
		$text = str_replace('‰', 'மூ', $text); //Doubt
		$text = str_replace('›', 'ரி', $text);
		$text = str_replace('™', '௹', $text);
		$text = str_replace('∙', '∙', $text); //Doubt

		$text = str_replace('#', '×', $text);
		$text = str_replace('$', '÷', $text);
		$text = str_replace('"', '‘', $text);
		$text = str_replace("'", "’", $text);

		// Swara
		// Vyanjana
		
		// Remove double swara joins
		
		$vyanjana = "க|ங|ச|ஞ|ட|ண|த|ந|ப|ம|ய|ர|ல|வ|ழ|ள|ற|ன|ஶ|ஜ|ஷ|ஸ|ஹ";
		
		$text = preg_replace("/(ே|ெ|ை)($vyanjana)/u", "$2$1", $text);
		$text = str_replace('ொ', 'ொ', $text);
		$text = str_replace('ோ', 'ோ', $text);
		$text = str_replace('ெள', 'ௌ', $text);

		// Final replacements
		// $text = str_replace('।।', '॥', $text);
		// $text = str_replace('‘‘', '“', $text);
		// $text = str_replace('’’', '”', $text);

		return $text;
	}
}
	
?>
