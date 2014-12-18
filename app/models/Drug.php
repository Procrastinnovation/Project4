<?php

class Drug extends Eloquent {

	/**
	* Identify relation between Author and Book
	*/
	public function patient() {
        # Author has many Books
        # Define a one-to-many relationship.
        return $this->hasMany('Patient');
    }

    /**
	* When editing or adding a new book, we need a select dropdown of authors to choose from
	* A select is easy to generate when you have a key=>value pair to work with
	* This method will generate a key=>value pair of author id => author name
	*
	* @return Array
	*/
    public static function getIdNamePair() {

		$drug = Array();

		$collection = Drug::all();

		foreach($collection as $item) {
			$drug[$item->id] = $item->drug_NM;
		}

		return $drug;
	}

	/*	foreach($collection as $drug) {
			$drugs[$drug->id] = $drug->drug_NM;
		}

		return $drugs;
	}
	*/

}