<?php
class Color {
	private $color = false, $id = false;
	
	function __construct($id, $color) {
		$this->color = $color;
		$this->id = $id;
	}

	function rgbIntArray(){
		return $this->color;
	}

	function rgbHexArray() {
		return array(dechex($this->color[0]), dechex($this->color[1]), dechex($this->color[2]));
	}

	function rgbCSS() {
		return "rgb(" . $this->color[0] . "," . $this->color[1] . "," .
				$this->color[2] . ")";
	}

	function html() {
		$r = "#";
		if ($this->color[0] < 16)
			$r .= "0";
		$r .= dechex($this->color[0]);
		if ($this->color[1] < 16)
			$r .= "0";
		$r .= dechex($this->color[1]);
		if ($this->color[2] < 16)
			$r .= "0";
		$r .= dechex($this->color[2]);
		return $r;
	}
}
class Phrase {
	private $phrase = false, $id = false, $error = false;

	function __construct($id, $phrase, $error=false) {
		if ($error !== false) {
			if ($error === true) {
				$this->error = 'Generic';
			} else {
				$this->error = $error;
			}
		}
		$this->id = $id;
		$this->phrase = $phrase;
	}
	
	public function getError() {
		return $this->error;
	}

	public function getID() {
		return $this->id;
	}

	public function getPhrase() {
		return $this->phrase;
	}
}
interface ReadableDatabase {
	/**
	 * Should connect to the database and get ready for queries.
	 */
	function __construct();

	/**
	 * Function should return a random color.
	*/
	public function randomColor();

	/**
	 * Function should return the specified or a random phrase.
	*/
	public function getPhrase($id=-1);

	/**
	 *
	*/
	public function randomPhraseID();

	/**
	 * Returns true if the database can be read from (and write if it supports it).
	*/
	public function ready();
}

interface WritableDatabase {
	/**
	 * Function stores a submission into the submitted table.
	 * It is up to the implementing class
	 */
	public function storeSubmission($submission, $clientIP);

	/**
	 * Function moves a submission into the approved table.
	*/
	public function approveSubmission($id);

	/**
	 * Function drops a submission from the database table.
	*/
	public function removeSubmission($id);

	/**
	 * Function drops a phrase from the database.
	*/
	public function removePhrase($id);

	/**
	 * Function adds a color to the proper table
	*/
	public function addColor($color);

	/**
	 * Deletes the color with $id from the proper table
	*/
	public function removeColor($id);
}