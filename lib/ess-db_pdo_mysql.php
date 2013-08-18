<?php
class Database implements ReadableDatabase {
	//connection
	private $conn = null, $ready = false;
	//statements
	private $stm1 = null, $stm2 = null, $stm3 = null, $stm4 = null;

	function __construct() {
		try {
			$this->conn = new PDO("mysql:host=" . ESS_DB_HOST . "dbname=" . ESS_DB_DATABASE . ";charset=utf8", ESS_DB_USER, ESS_DB_PASS);
			$this->ready = true;
		} catch (PDOException $e) {
		}
	}

	function randomColor() {
		try{
			if ($this->stm2 === null) {
				$this->stm2 = $this->conn->prepare("SELECT * FROM " . ESS_DB_TBL_COLORS . " ORDER BY RAND() LIMIT 1");
			}
			$ta = $this->stm2->fetch(PDO::FETCH_ASSOC);
			if ($ta !== false) {
				return $ta['id'];
			}
		} catch (PDOException $e) {
		}
		return false;
	}

	function getPhrase($id=-1) {
		try{
			if ($id >= 0) {
				try{
					if ($this->stm1 === null) {
						$this->stm1 = $this->conn->prepare("SELECT * FROM " . ESS_DB_TBL_PHRASES . " WHERE id = ? LIMIT 1");
					}
					$this->stm1->execute(array($id));
					$ta = $this->stm1->fetch(PDO::FETCH_ASSOC);
					if ($ta !== false) {
						return new Phrase($ta['id'], $ta['phrase']);
					}
				} catch (PDOException $e) {
				}
			}
			if ($this->stm3 === null) {
				$this->stm3 = $this->conn->prepare("SELECT * FROM " . ESS_DB_TBL_PHRASES . " ORDER BY RAND() LIMIT 1");
			}
			$this->stm3->execute();
			$ta = $this->stm3->fetch(PDO::FETCH_ASSOC);
			if ($ta !== false) {
				return new Phrase($ta['id'], $ta['phrase']);
			}
		} catch (PDOException $e) {
		}
		return false;
	}

	function randomPhraseID() {
		try{
			if ($this->stm3 === null) {
				$this->stm3 = $this->conn->prepare("SELECT * FROM " . ESS_DB_TBL_PHRASES . " ORDER BY RAND() LIMIT 1");
			}
			$this->stm3->execute();
			$ta = $this->stm3->fetch(PDO::FETCH_ASSOC);
			if ($ta !== false) {
				return $ta['id'];
			}
		} catch (PDOException $e) {
		}
		return false;
	}

	function ready() {
		return ($this->conn->ready && $this->PDO !== false && $this->PDO !== null);
	}
}
