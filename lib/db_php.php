<?php
class Database implements ReadableDatabase {
	public static $wri = false;
	
	private $cont, $colo, $sets;
	function __construct(&$settings) {
		$this->cont=array(
			0=>'This software is distributed under a BSD license.',
			1=>'This software is still under development.',
			2=>'This software is open source.',
			3=>'This software is awesomesauce.',
			4=>'This software can be downloaded from github.',
		);
		$this->colo = array(
				array(0,128,255),	//blue
				array(255,0,128),	//magenta
				array(1,223,58),	//green
				array(255,191,0),	//oragnge-yellow
		);
		$this->sets = $settings;
	}

	function getPhrase($number=-1) {
		$tc = count($this->cont) - 1;
		if ($number > -1 && $number <= $tc) {
			return $this->cont[$number];
		}
		return $this->cont[rand(0,$tc)];
	}

	function getColor() {
		return $this->colo[rand(0,count($this->colo)-1)];
	}
	
	function canWrite() {
		return self::$wri;
	}

	function ready() {
		return (isset($this->cont) && isset($this->colo));
	}
}
