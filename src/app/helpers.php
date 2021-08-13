<?php

if (!function_exists('contrastColor')) {
	function contrastFontColor(string $hex): ?string
	{
		$rgb = hex2rgb($hex);

		// Counting the perceptive luminance - human eye favors green color...
		$luminance = (0.299 * $rgb[0] + 0.587 * $rgb[1] + 0.114 * $rgb[2]) / 255;

		if ($luminance > 0.56)
			$fontColor = '#000000'; // bright colors - black font
		else $fontColor = '#FFFFFF'; // dark colors - white font

		return $fontColor;
	}
}

if (!function_exists('hex2rgp')) {
	function hex2rgb($hex)
	{
		$hex = str_replace("#", "", $hex);

		$r = hexdec(substr($hex, 0, 2));
		$g = hexdec(substr($hex, 2, 2));
		$b = hexdec(substr($hex, 4, 2));
		if (strlen($hex) == 3) {
			$r = hexdec(substr($hex, 0, 1) . substr($hex, 0, 1));
			$g = hexdec(substr($hex, 1, 1) . substr($hex, 1, 1));
			$b = hexdec(substr($hex, 2, 1) . substr($hex, 2, 1));
		}
		$rgb = array($r, $g, $b);

		return $rgb; // returns an array with the rgb values
	}
}
