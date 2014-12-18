<?php

class EnrollController extends \BaseController {


	/**
	*
	*/
	public function __construct() {

		# Make sure BaseController construct gets called
		parent::__construct();

		$this->beforeFilter('auth', array('except' => 'getIndex'));

	}


	/**
	* Process the searchform
	* @return View
	*/
	public function getSearch() {

		return View::make('patient_search');

	}


	/**
	* Display all patients
	* @return View
	*/
	public function getIndex() {

		# Format and Query are passed as Query Strings
		$format = Input::get('format', 'html');
		
		$query  = Input::get('query');

		$patients = Patient::search($query);
		$drugs = Drug::getIdNamePair();
		$doses = Dose::getIdNamePair();
		
		//JLim Get current user's study_role
			 $user = DB::table('users')
            ->select('study_role')
            ->get();
			
			$user = Auth::user()->study_role;
			
	    #1 means This user is logged in as a study Role
		# Decide on output method...
		# Default - HTML
		if($format == 'html') {
				if ($user == '1')
				 {
				return View::make('patient_index')
				->with('query', $query)
					->with('patients', $patients)
					->with('drugs', $drugs)
				    ->with('doses', $doses);
				}
				
				else{
				return View::make('patient_index_blinded')
					->with('patients', $patients)
					->with('query', $query);
				}
				
		}
		# JSON
		elseif($format == 'json') {
			return Response::json($patients);
		}
		# PDF (Coming soon)
		elseif($format == 'pdf') {
			return "This is the pdf (Coming soon).";
		}

	}


	/**
	* Show the "Add a patient form"
	* @return View
	*/
	public function getCreate() {

		$drug = Drug::getIdNamePair();
    	return View::make('patient_add')->with('drug',$drug);
	}


	/**
	* Process the "Add a patient form"
	* @return Redirect
	*/
	public function postCreate() {
		# Instantiate the Patient model
		$patient = new Patient();
		
		$drugid = mt_rand(1,6);
		$patient->photo = '/images/clinical_doctor.png';
		$patient->drug_id = $drugid;

		$patient->fill(Input::all());
		$patient->save();

		# Magic: Eloquent
		$patient->save();

		return Redirect::action('EnrollController@getIndex')->with('flash_message','Patient has been Registered.');
	}
	

	/**
	* Show the "Edit a patient form"
	* @return View
	*/
	public function getEdit($id) {
	// print_r($id);
		try {
		  
		    $drug = Drug::getIdNamePair();
			$doses = Dose::getIdNamePair();
			$patient  = Patient::findOrFail($id);
		
		}
		catch(exception $e) {
		    return Redirect::to('/enroll')->with('flash_message', 'Patient not found');
		}
			// print_r($id);
		$doses = DB::table('patients')
           ->join('drugs', 'patients.drug_id', '=', 'drugs.id')
			->join('doses', 'drugs.dose_id', '=', 'doses.id')
            ->select('*')
			->where('patients.id', '=', "$id")
           ->get();

		   
			//print_r($patient);

    	return View::make('patient_edit')
			->with('patient', $patient)
    		->with('drugs', $drug)
			->with('doses', $doses);
	}


	/**
	* Process the "Edit a patient form"
	* @return Redirect
	*/
	public function postEdit() {

		try {
	        $patient = Patient::findOrFail(Input::get('id'));
	    }
	    catch(exception $e) {
	        return Redirect::to('/enroll')->with('flash_message', 'Patient not found');
	    }

	    # http://laravel.com/docs/4.2/eloquent#mass-assignment
	    $patient->fill(Input::all());
	    $patient->save();

	   	return Redirect::action('EnrollController@getIndex')->with('flash_message','Your changes have been saved.');

	}


	/**
	* Process patient deletion
	*
	* @return Redirect
	*/
	public function postDelete() {

		try {
	        $patient = Patient::findOrFail(Input::get('id'));
	    }
	    catch(exception $e) {
	        return Redirect::to('/enroll/')->with('flash_message', 'Could not remove Patient - not found.');
	    }

	    Patient::destroy(Input::get('id'));

	    return Redirect::to('/enroll/')->with('flash_message', 'Patient has been removed from system.');

	}


	/**
	* Process a patient search
	* Called w/ Ajax
	*/
	public function postSearch() {

		if(Request::ajax()) {

			$query  = Input::get('query');

			# We're demoing two possible return formats: JSON or HTML
			$format = Input::get('format');

			# Do the actual query
	        $patients  = Patient::search($query);

	        # If the request is for JSON, just send the books back as JSON
	        if($format == 'json') {
		        return Response::json($patients);
	        }
	        # Otherwise, loop through the results building the HTML View we'll return
	        elseif($format == 'html') {

		        $results = '';
				foreach($patients as $patient) {
					# Created a "stub" of a view called book_search_result.php; all it is is a stub of code to display a book
					# For each book, we'll add a new stub to the results
					$results .= View::make('patient_search_result')->with('patient', $patient)->render();
				}

				# Return the HTML/View to JavaScript...
				return $results;
			}
		}
	}

	

}