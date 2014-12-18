<?php

class Dose extends Eloquent {

	/**
	* Identify relation between Author and Book
	*/
	public function drug() {
        # Define a one-to-many relationship.
        return $this->hasMany('Drug');
    }

    /**
	* When editing or adding a new book, we need a select dropdown of authors to choose from
	* A select is easy to generate when you have a key=>value pair to work with
	* This method will generate a key=>value pair of author id => author name
	*
	* @return Array
	*/
    public static function getIdNamePair() {

		$doses = Array();

		$collection = Dose::all();

		foreach($collection as $dose) {
			$doses[$dose->id] = $dose->dose;
		}

		return $doses;
	}

}