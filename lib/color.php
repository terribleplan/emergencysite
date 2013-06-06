<?php
class color {
	var $cur = null;

	function __construct(&$db) {
		$this->cur = $db->getColor();
	}

	function rgbIntArray(){
		return $this->cur;
	}

	function rgbHexArray() {
		return array(
			dechex($this->cur[0]),
			dechex($this->cur[1]),
			dechex($this->cur[2])
		);
	}

	function rgbCSS() {
		$t = $this->cur;
		return "rgb(" . $this->cur[0] . "," . $this->cur[1] . "," .
			$this->cur[2] . ")";
	}

	function html() {
		$r = "#";
		if ($this->cur[0] < 16)
			$r .= "0";
		$r .= dechex($this->cur[0]);
		if ($this->cur[1] < 16)
			$r .= "0";
		$r .= dechex($this->cur[1]);
		if ($this->cur[2] < 16)
			$r .= "0";
		$r .= dechex($this->cur[2]);
		return $r;
	}

	function newColor(){
		$this->cur = $dtb->getColor();
	}
}