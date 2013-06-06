<?php
interface ReadableDatabase {
//	if this allowed interfaces to have variables
//	your db class MUST define this
//	public static $wri;

	/**
	 * Function should return a random color.
	 */
	function getColor();

	/**
	 * Function should return the specified or a random phrase.
	 */
	function getPhrase($number=-1);

	/**
	 * Function tells if we can store submissions.
	 */
	function canWrite();
	
	/**
	 * Returns true if the database can be read from (and write if it supports it).
	 */
	function ready();

}

interface WritableDatabase {

	/**
	 * Function stores a submission into the submitted table.
	 * It is up to the implementing class
	 */
	function storeSubmission($submission, $clientIP);

	/**
	 * Function moves a submission into the approved table.
	 */
	function approveSubmission($id);

}