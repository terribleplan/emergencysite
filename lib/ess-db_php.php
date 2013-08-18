<?php
/*
 * This is enough for a small site, such as the reference implementation. If
 * you want advansed features such as submissions and administration, then you
 * should use a different database driver.
 */
class Database implements ReadableDatabase {
	private $cont, $colo, $numcont, $numcolo;
	function __construct() {
		$this->cont=array(
			0=>'This software is distributed under a BSD license.',
			1=>'This software is still under development.',
			2=>'This software is awesomesauce.',
			3=>'This software can be downloaded from <a href="http://github.com/terribleplan/emergencysite">github</a>.',
		);
		$this->colo = array(
				array(0,128,255),	//blue
				array(255,0,128),	//magenta
				array(1,223,58),	//green
				array(255,191,0)	//oragnge-yellow
		);
		$this->numcont = count($this->cont);
		$this->numcolo = count($this->colo);
	}

	function randomColor() {
		$id = rand(0, $this->numcolo-1);
		return new Color($id, $this->colo[$id]);
	}

	function getPhrase($id=-1) {
		if ($id >= 0 && $id < $this->numcont) {
			return new Phrase($id, $this->cont[$id]);
		}
		return $this->getPhrase($this->randomPhraseID());
	}

	function randomPhraseID() {
		return rand(0, $this->numcont-1);
	}

	function ready() {
		return (isset($this->cont) && isset($this->colo));
	}
}
