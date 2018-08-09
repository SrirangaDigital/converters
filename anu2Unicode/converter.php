<?php

class Converter{

	public function __construct() {
		
	}

	public function anu2Unicode ($text) {

		
		// Initial parse
		// $text = str_replace('fl', 'ﬂ', $text);
		// $text = str_replace('fi', 'ﬁ', $text);
		$text = str_replace('', '½', $text);
		$text = str_replace('¶', 'è', $text);
		
		// Reversing occurances
		$text = str_replace('Ô~', '~Ô', $text);
		$text = str_replace('ÔQ', 'QÔ', $text);
		$text = str_replace('¿ã', 'ã¿', $text);
		$text = str_replace('¿Ñ', 'Ñ¿', $text);
		$text = str_replace('ÃÑ', 'ÑÃ', $text);
		$text = str_replace('Ãã', 'ãÃ', $text);
		$text = str_replace('ÃÇ', 'ÇÃ', $text);
		$text = str_replace('ˆH', 'Hˆ', $text);
		$text = str_replace('ˆQ', 'Qˆ', $text);
		$text = str_replace('ˆ~', '~ˆ', $text);

		// Consolidation of same glyphs at multiple code points
		$text = preg_replace('/[íõ°¨Æ«»Œ◊]/u', 'í', $text); // అ
		$text = preg_replace('/[åê•ß®ÍÏ]/u', 'å', $text); // ా
		$text = preg_replace('/[ç≤˜]/u', 'ç', $text); // ి
		$text = preg_replace('/[ô©‘]/u', 'ô', $text); // ీ
		$text = preg_replace('/[∞μΩ√]/u', '∞', $text); // ు
		$text = preg_replace('/[ÄØ¥∂Ó]/u', 'Ä', $text); // ూ
		$text = preg_replace('/[≥Ã‹Ôˇ]/u', '≥', $text); // ె
		$text = preg_replace('/[¿ÕËıˆ]/u', '¿', $text); // ే
		$text = preg_replace('/[ÿ·Â]/u', 'ÿ', $text); // ై
		$text = preg_replace('/[∏⁄Á˘]/u', '∏', $text); // ొ
		$text = preg_replace('/[À’ŸÈ]/u', 'À', $text); // ో
		$text = preg_replace('/[∫øœ“Ò]/u', '∫', $text); // ౌ
		$text = preg_replace('/[òü£±∑π]/u', 'ò', $text); // ్ 

		// ma group
		$text = str_replace('=∞', 'మ', $text);
		$text = str_replace('=Ä', 'మా', $text);
		$text = str_replace('q∞', 'మి', $text);
		$text = str_replace('g∞', 'మీ', $text);
		$text = str_replace('=Ú', 'ము', $text);
		$text = str_replace('=¸', 'మూ', $text);
		$text = str_replace('"≥∞', 'మె', $text);
		$text = str_replace('"¿∞', 'మే', $text);
		// $text = str_replace('∞', 'మై', $text);
		$text = str_replace('"≥Ú', 'మొ', $text);
		$text = str_replace('"≥Ä', 'మో', $text);

		// ya group
		$text = str_replace('Üí∞', 'య', $text);
		$text = str_replace('ÜíÄ', 'యా', $text);
		$text = str_replace('~Ú', 'యి', $text);
		$text = str_replace('ÜÄ', 'యీ', $text);
		$text = str_replace('ÜíÚ', 'యు', $text);
		$text = str_replace('Üí¸', 'యూ', $text);		
		$text = str_replace('Ü≥∞', 'యె', $text);
		$text = str_replace('Ü¿∞', 'యే', $text);
		$text = str_replace('Ü≥ÿ∞', 'యై', $text);
		$text = str_replace('Ü≥Ú', 'యొ', $text);
		$text = str_replace('Ü≥Ä', 'యో', $text);

		// jjha group
		// ఝ ఝి ఝీ ఝు ఝూ ఝె ఝే ఝై ఝొ ఝో ఝౌ 
		
		// ha group
		$text = str_replace('Çíå', 'హ', $text);
		$text = str_replace('Çí½', 'హా', $text);
		$text = str_replace('Ççå', 'హి', $text);
		$text = str_replace('Çôå', 'హీ', $text);
		$text = str_replace('Çíï', 'హు', $text);
		$text = str_replace('Çí˙', 'హూ', $text);		
		$text = str_replace('Ç≥å', 'హె', $text);
		$text = str_replace('Ç¿å', 'హే', $text);
		// $text = str_replace('∞', 'హై', $text);
		$text = str_replace('Çíå∏', 'హొ', $text);
		$text = str_replace('ÇíåÀ', 'హో', $text);
		
		// gha group
		$text = str_replace('Ñèí∞', 'ఘ', $text);
		$text = str_replace('ÑèíÄ', 'ఘా', $text);
		$text = str_replace('Ñèç∞', 'ఘి', $text);
		$text = str_replace('Ñèô∞', 'ఘీ', $text);
		$text = str_replace('ÑèíÚ', 'ఘు', $text);
		$text = str_replace('Ñèí¸', 'ఘూ', $text);		
		$text = str_replace('Ñè≥∞', 'ఘె', $text);
		$text = str_replace('Ñè¿∞', 'ఘే', $text);
		// $text = str_replace('∞', 'ఘై', $text);
		$text = str_replace('Ñè≥Ú', 'ఘొ', $text);
		$text = str_replace('Ñè≥Ä', 'ఘో', $text);
		
		$text = str_replace('Ûù', '్ఛ', $text);
		$text = str_replace('¤ù', '్ఢ', $text);
		$text = str_replace('Êù', '్ఫ', $text);
		$text = str_replace('ƒù', '్భ', $text);
		// Special cases Jha pending
		 
		// swara
		$text = str_replace('|Ú', 'ఋ', $text);
		$text = str_replace('|¸', 'ౠ', $text);
		
		// Lookup ---------------------------------------------
				
		$text = str_replace('ž', 'డ్', $text);

		$text = str_replace('!', '!', $text);
		$text = str_replace('"', 'వ్', $text);
		$text = str_replace('#', 'న', $text);
		$text = str_replace('$', 'ృ', $text);
		// $text = str_replace('%', '%', $text);
		$text = str_replace('&', 'ఞ', $text);
		// $text = str_replace("'", "‘", $text); // handled later
		$text = str_replace('(', '(', $text);
		$text = str_replace(')', ')', $text);
		$text = str_replace('*', 'జ', $text);
		$text = str_replace('+', 'ష్', $text);
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
		$text = str_replace(';', '్ష్మ', $text);
		$text = str_replace('<', 'న్', $text);
		$text = str_replace('=', 'వ', $text);
		$text = str_replace('>', 'ట', $text);
		$text = str_replace('?', '?', $text);
		$text = str_replace('@', 'ట', $text);
		$text = str_replace('A', 'జు', $text);
		$text = str_replace('B', 'ఔ', $text);
		$text = str_replace('C', '్పు', $text); // verify 
		$text = str_replace('D', 'ఈ', $text);
		$text = str_replace('E', 'జూ', $text);
		$text = str_replace('F', 'ఓ', $text);
		$text = str_replace('G', 'స్త్ర', $text);
		$text = str_replace('H', 'క్', $text);
		$text = str_replace('I', '।', $text);
		$text = str_replace('J', 'అ', $text);
		$text = str_replace('K', 'చ్', $text);
		$text = str_replace('L', 'ఉ', $text);
		$text = str_replace('M', 'ఖ', $text);
		$text = str_replace('N', 'శ్రీ', $text);
		$text = str_replace('O', 'ం', $text);
		$text = str_replace('P', 'ఆ', $text);
		$text = str_replace('Q', 'గ్', $text);
		$text = str_replace('R', 'ష్ట్ర', $text);
		$text = str_replace('S', 'ఐ', $text);
		$text = str_replace('T', 'ఊ', $text);
		$text = str_replace('U', 'ఏ', $text);
		$text = str_replace('V', 'ఙ', $text);
		$text = str_replace('W', 'ఇ', $text);
		$text = str_replace('X', 'ఒ', $text);
		$text = str_replace('Y', 'ఖ', $text);
		$text = str_replace('Z', 'ఎ', $text);
		$text = str_replace('[', 'జ', $text);
		$text = str_replace("\\", 'ట', $text);
		$text = str_replace(']', '్ఱ', $text);
		$text = str_replace('^', 'ద్', $text);
		$text = str_replace('_', 'డ్', $text);
		$text = str_replace('`', 'త్', $text);
		$text = str_replace('a', 'బి', $text);
		$text = str_replace('b', 'లీ', $text);
		$text = str_replace('c', 'బీ', $text);
		$text = str_replace('d', 'ఖీ', $text);
		$text = str_replace('e', 'లి', $text);
		$text = str_replace('f', 'తీ', $text);
		$text = str_replace('g', 'వీ', $text);
		$text = str_replace('h', 'నీ', $text);
		$text = str_replace('i', 'రి', $text);
		$text = str_replace('j', 'శీ', $text);
		$text = str_replace('k', 'ది', $text);
		$text = str_replace('l', 'జి', $text); 
		$text = str_replace('m', 'ళీ', $text);
		$text = str_replace('n', 'దీ', $text); 
		$text = str_replace('o', 'ళి', $text);
		$text = str_replace('p', 'చీ', $text);
		$text = str_replace('q', 'వి', $text);
		$text = str_replace('r', 'జీ', $text);
		$text = str_replace('s', 'రీ', $text); 
		$text = str_replace('t', 'శి', $text);
		$text = str_replace('u', 'తి', $text);
		$text = str_replace('v', 'ఖీ', $text);
		$text = str_replace('w', 'గీ', $text);
		$text = str_replace('x', 'ని', $text);
		$text = str_replace('y', 'గి', $text);
		$text = str_replace('z', 'చి', $text);
		$text = str_replace('{', '+', $text);
		$text = str_replace('|', 'బ', $text);
		$text = str_replace('}', 'ణ', $text);
		$text = str_replace('~', 'ర్', $text); // could be ya
		$text = str_replace('Ä', 'ూ', $text);
		$text = str_replace('Å', 'ల', $text);
		$text = str_replace('Ç', 'ప్', $text);
		$text = str_replace('É', 'బ', $text); 
		$text = str_replace('Ñ', 'ప్', $text);
		$text = str_replace('Ö', 'ల', $text);
		$text = str_replace('Ü', 'Ü', $text); // pre యి
		$text = str_replace('á', 'ప్', $text);
		$text = str_replace('à', 'ళ్', $text);
		$text = str_replace('â', 'శ్', $text);
		$text = str_replace('ä', 'ä', $text); // pre
		$text = str_replace('ã', 'స్', $text);
		$text = str_replace('å', 'ా', $text);
		$text = str_replace('ç', 'ి', $text);
		$text = str_replace('é', 'ఱ', $text);
		$text = str_replace('è', 'è', $text); // pre
		$text = str_replace('ê', 'ా', $text);
		$text = str_replace('ë', 'ష్', $text);
		$text = str_replace('í', 'అ', $text);
		$text = str_replace('ì', '్ట', $text);
		$text = str_replace('î', 'î', $text); // pre da dha
		$text = str_replace('ï', 'ï', $text); // pre hu
		$text = str_replace('ñ', 'ఁ', $text);
		$text = str_replace('ó', 'ః', $text);
		$text = str_replace('ò', '్', $text);
		$text = str_replace('ô', 'ీ', $text);
		$text = str_replace('ö', '్ఖ', $text);
		$text = str_replace('õ', 'అ', $text);
		$text = str_replace('ú', '్ధ', $text);
		$text = str_replace('ù', 'ù', $text); // pre
		$text = str_replace('û', '్స', $text);
		$text = str_replace('ü', '్', $text);
		$text = str_replace('†', ';', $text);
		$text = str_replace('°', 'అ', $text);
		$text = str_replace('¢', '¢', $text);
		$text = str_replace('£', '్', $text);
		$text = str_replace('§', '్ళ', $text);
		$text = str_replace('•', 'ా', $text);
		$text = str_replace('¶', '¶', $text); // pre
		$text = str_replace('ß', 'ా', $text);
		$text = str_replace('®', 'ా', $text);
		$text = str_replace('©', 'ీ', $text);
		$text = str_replace('™', 'స్', $text);
		$text = str_replace('´', '=', $text);
		$text = str_replace('¨', 'అ', $text);
		$text = str_replace('≠', '≠', $text); // pre
		$text = str_replace('Æ', 'అ', $text);
		$text = str_replace('Ø', 'ూ', $text);
		$text = str_replace('∞', 'ు', $text);
		$text = str_replace('±', '్', $text);
		$text = str_replace('≤', 'ి', $text);
		$text = str_replace('≥', 'ె', $text);
		$text = str_replace('¥', 'ూ', $text);
		$text = str_replace('μ', 'ు', $text);
		$text = str_replace('∂', 'ూ', $text);
		$text = str_replace('∑', '్', $text);
		$text = str_replace('∏', 'ొ', $text);
		$text = str_replace('π', '్', $text);
		$text = str_replace('∫', 'ౌ', $text);
		$text = str_replace('ª', '్ఠ', $text);
		$text = str_replace('º', '్య', $text);
		$text = str_replace('Ω', 'ు', $text);
		$text = str_replace('æ', '్గ', $text);
		$text = str_replace('ø', 'ౌ', $text);
		$text = str_replace('¿', 'ే', $text);
		$text = str_replace('¡', '్ల', $text);
		$text = str_replace('¬', '్ష', $text);
		$text = str_replace('√', 'ు', $text);
		$text = str_replace('ƒ', '్బ', $text);
		$text = str_replace('≈', '్శ', $text);
		$text = str_replace('Δ', '్ష', $text);
		$text = str_replace('«', 'అ', $text);
		$text = str_replace('»', 'అ', $text);
		$text = str_replace('…', '్ఘ', $text);
		// $text = str_replace(' ', '&', $text);
		$text = str_replace('À', 'ో', $text);
		$text = str_replace('Ã', 'ె', $text);
		$text = str_replace('Õ', 'ే', $text);
		$text = str_replace('Œ', 'అ', $text);
		$text = str_replace('œ', 'ౌ', $text);
		$text = str_replace('–', '–', $text);
		// $text = str_replace('—', '’', $text); // handled later
		$text = str_replace('“', 'ౌ', $text);
		$text = str_replace('”', '÷', $text);
		$text = str_replace('‘', 'ీ', $text);
		$text = str_replace('’', 'ో', $text);
		$text = str_replace('÷', '్థ', $text);
		$text = str_replace('◊', 'అ', $text);
		$text = str_replace('ÿ', 'ౖ', $text);
		$text = str_replace('Ÿ', 'ో', $text);
		$text = str_replace('⁄', 'ొ', $text);
		$text = str_replace('¤', '్డ', $text);
		$text = str_replace('‹', 'ె', $text);
		$text = str_replace('›', '్హ', $text);
		$text = str_replace('ﬁ', '్వ', $text);
		$text = str_replace('ﬂ', '్న', $text);
		$text = str_replace('‡', '్మ', $text);
		$text = str_replace('·', 'ౖ', $text);
		$text = str_replace('‚', '్ణ', $text);
		$text = str_replace('„', '¢', $text);
		$text = str_replace('‰', 'క్', $text);
		$text = str_replace('Â', 'ౖ', $text);
		$text = str_replace('Ê', '్ప', $text);
		$text = str_replace('Á', 'ొ', $text);
		$text = str_replace('Ë', 'ే', $text);
		$text = str_replace('È', 'ో', $text);
		$text = str_replace('Í', 'ా', $text);
		$text = str_replace('Î', '్త', $text);
		$text = str_replace('Ï', 'ా', $text);
		$text = str_replace('Ì', '్ద', $text);
		$text = str_replace('Ó', 'ూ', $text);
		$text = str_replace('Ô', 'ె', $text);
		
		$text = str_replace('Ò', 'ౌ', $text);
		$text = str_replace('Ú', 'Ú', $text); // pre
		$text = str_replace('Û', '్చ', $text);
		$text = str_replace('Ù', 'ు', $text); 
		$text = str_replace('ı', 'ే', $text);
		$text = str_replace('ˆ', 'ే', $text);
		$text = str_replace('˜', 'ి', $text);
		$text = str_replace('¯', '్క', $text);
		$text = str_replace('˘', 'ొ', $text);
		$text = str_replace('˙', '˙', $text); // pre ha
		$text = str_replace('˚', '్జ', $text);
		$text = str_replace('¸', '¸', $text); // pre
		$text = str_replace('˝', '్ఞ', $text);
		$text = str_replace('˛', '×', $text);
		$text = str_replace('ˇ', 'ె', $text);

		$swara = "అ|ఆ|ఇ|ఈ|ఉ|ఊ|ఋ|ౠ|ఎ|ఏ|ఐ|ఒ|ఓ|ఔ";
		$vyanjana = "క|ఖ|గ|ఘ|ఙ|చ|ఛ|జ|ఝ|ఞ|ట|ఠ|డ|ఢ|ణ|త|థ|ద|ధ|న|ప|ఫ|బ|భ|మ|య|ర|ల|వ|శ|ష|స|హ|ళ|ఱ";
		$swaraJoin = "ా|ి|ీ|ు|ూ|ృ|ౄ|ె|ే|ై|ొ|ో|ౌ|ం|ః|్";

		// Special cases gha, Cha, Jha, Dha, tha, dha, pha, bha 
		$text = preg_replace("/($swaraJoin)([èäî])/u", "$2$1", $text);
		$text = str_replace('చè', 'ఛ', $text);
		$text = str_replace('డè', 'ఢ', $text);
		$text = str_replace('దä', 'థ', $text);
		$text = str_replace('దè', 'ధ', $text);
		$text = str_replace('పè', 'ఫ', $text);
		$text = str_replace('బè', 'భ్', $text);
		$text = str_replace('రî', 'ఠ', $text);
		
		// Swara
		$text = preg_replace('/్[అ]/u', '', $text);
		$text = preg_replace('/్([ాిీుూృౄెేైౖొోౌ్])/u', "$1", $text);
		
		// vyanjana

		$text = preg_replace("/ె($vyanjana)ౖ/u", "$1" . 'ై', $text);
		$text = str_replace('ై', 'ై', $text);
		
		$syllable = "($vyanjana)($swaraJoin)|($vyanjana)($swaraJoin)|($vyanjana)|($swara)";
		$text = preg_replace("/($swaraJoin)్($vyanjana)/u", "్$2$1", $text);
		$text = preg_replace("/($swaraJoin)్($vyanjana)/u", "్$2$1", $text);
		$text = preg_replace("/($swaraJoin)్($vyanjana)/u", "్$2$1", $text);
		$text = preg_replace("/($swaraJoin)్($vyanjana)/u", "్$2$1", $text);

		// Ra ottu inversion
		$text = preg_replace("/¢($vyanjana)/u", "$1" . "్ర", $text);

		// Spaces before ottu should be removed
		$text = str_replace(' ్', "్", $text);

		// Final replacements
		$text = str_replace('।।', '॥', $text);
		$text = str_replace("'", '‘', $text);
		$text = str_replace('—', '’', $text);
		$text = str_replace('‘‘', '“', $text);
		$text = str_replace('’’', '”', $text);

		return $text;
	}
}
	
?>
