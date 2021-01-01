<?php

function mtgFormat($str, $size = 12) {
	$titletxt = ['T'=>'Tap', 'C'=>'Colorless', 'W'=>'White', 'G'=>'Green', 'R'=>'Red', 'U'=>'Blue', 'B'=>'Black', '0'=>'Zero', 
		     '1'=>'One Generic', '2'=>'Two Generic', '3'=>'Three Generic', '4'=>'Four Generic', '5'=>'Five Generic', 
		     '6'=>'Six Generic', '7'=>'Seven Generic', '8'=>'Eight Generic', '9'=>'Nine Generic', '10'=>'Ten Generic', 
		     '11'=>'Eleven Generic', '12'=>'Twelve Generic', '13'=>'Thirteen Generic', '14'=>'Fourteen Generic', 
		     '15'=>'Fifteen Generic', '16'=>'Sixteen Generic', '17'=>'Seventeen Generic', '18'=>'Eighteen Generic', 
		     '19'=>'Nineteen Generic', '20'=>'Twenty Generic', 'W/U'=>'White/Blue', 'W/B'=>'White/Black', 'U/R'=>'Blue/Red', 
		     'U/B'=>'Blue/Black', 'R/W'=>'Red/White', 'R/G'=>'Red/Green', 'G/W'=>'Green/White', 'G/U'=>'Green/Blue', 
		     'B/R'=>'Black/Red', 'B/G'=>'Black/Green', 'T'=>'Tap', '2B'=>'2 Generic or 1 Black', '2G'=>'2 Generic or 1 Green', 
		     '2R'=>'2 Generic or 1 Red', '2U'=>'2 Generic or 1 Blue', '2W'=>'2 Generic or 1 White', 'BP'=>'Black/Phyrexian', 
		     'GP'=>'Green/Phyrexian', 'RP'=>'Red/Phyrexian', 'UP'=>'Blue/Phyrexian', 'WP'=>'White/Phyrexian', 'S'=>'Snow-Covered', 
		     'X'=>'X', 'Y'=>'Y', 'Z'=>'Z'];
	preg_match_all("/\{(.+?)\}/", $str, $matches, PREG_OFFSET_CAPTURE);
	$returnstr = "";
	$curpos = 0;
	for ($i = 0; $i < count($matches[0]); $i++) {
		$returnstr .= substr($str, $curpos, $matches[0][$i][1] - $curpos);
		$curpos = intval($matches[0][$i][1]) + strlen($matches[0][$i][0]);
		$returnstr .= '<img src="../images/symbols/' . str_replace("/", "", $matches[1][$i][0]) . 
			      '.svg" class="symbol" style="width:' . $size . 'px;height:' . $size . 'px;" title="' . 
			      $titletxt[$matches[1][$i][0]] . '">';
	}
	$returnstr .= substr($str, $curpos); 
	$returnstr = preg_replace('/\((.+?)\)/','<span style="font-style:italic;">($1)</span>',$returnstr);
	$returnstr = str_replace("\n","<br><br>", $returnstr); // Formerly "nl2br()" but 2 line-breaks looks a little nicer
	return $returnstr;
}

?>
