<?php

class IndexController extends BaseController {

	/**
	*
	*/
	public function __construct() {

		# Make sure BaseController construct gets called
		parent::__construct();

	}

	/**
	*
	*/
	public function getIndex() {

		return View::make('index');

		$gender = RecordCompany::lists('gender', 'id');

		return View::make('admin.record_new', compact('gender'));

	}

}