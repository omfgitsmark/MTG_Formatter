<?php

function convertSymbols($str, $size = 11) {
	$titletxt = ['T'=>'Tap', 'C'=>'Colorless', 'W'=>'White', 'G'=>'Green', 'R'=>'Red', 'U'=>'Blue', 'B'=>'Black', '0'=>'Zero', '1'=>'One', '2'=>'Two', '3'=>'Three', '4'=>'Four', '5'=>'Five', '6'=>'Six', '7'=>'Seven', '8'=>'Eight', '9'=>'Nine', '10'=>'Ten', '11'=>'Eleven', '12'=>'Twelve', '13'=>'Thirteen', '14'=>'Fourteen', '15'=>'Fifteen', '16'=>'Sixteen', '17'=>'Seventeen', '18'=>'Eighteen', '19'=>'Nineteen', '20'=>'Twenty', 'W/U'=>'White/Blue', 'W/B'=>'White/Black', 'U/R'=>'Blue/Red', 'U/B'=>'Blue/Black', 'R/W'=>'Red/White', 'R/G'=>'Red/Green', 'G/W'=>'Green/White', 'G/U'=>'Green/Blue', 'B/R'=>'Black/Red', 'B/G'=>'Black/Green', 'T'=>'Tap', '2B'=>'2 Colorless or 1 Black', '2G'=>'2 Colorless or 1 Green', '2R'=>'2 Colorless or 1 Red', '2U'=>'2 Colorless or 1 Blue', '2W'=>'2 Colorless or 1 White', 'BP'=>'Black/Phyrexian', 'GP'=>'Green/Phyrexian', 'RP'=>'Red/Phyrexian', 'UP'=>'Blue/Phyrexian', 'WP'=>'White/Phyrexian', 'S'=>'Snow-Covered', 'X'=>'X', 'Y'=>'Y', 'Z'=>'Z'];
	// UN-SET TO ADD: 1/2, 1/2R, 1/2W, 100, 1000000, Infinity
	
	preg_match_all("/\{(.+?)\}/", $str, $matches, PREG_OFFSET_CAPTURE);
	$returnstr = "";
	$curpos = 0;
	for ($i = 0; $i < count($matches[0]); $i++) {
		$returnstr .= substr($str, $curpos, $matches[0][$i][1] - $curpos);
		$curpos = intval($matches[0][$i][1]) + strlen($matches[0][$i][0]);
		$returnstr .= '<img src="images/symbols/' . str_replace("/", "", $matches[1][$i][0]) . '.svg" class="symbol" style="width:' . $size . 'px;height:' . $size . 'px;" title="' . $titletxt[$matches[1][$i][0]] . '">';
	}
	$returnstr .= substr($str, $curpos); 
	return $returnstr; //utf8_encode($returnstr);

}

?>