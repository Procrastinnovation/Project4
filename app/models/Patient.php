<?php

class Patient extends Eloquent {

    # The guarded properties specifies which attributes should *not* be mass-assignable
    protected $guarded = array('id', 'created_at', 'updated_at');

    /**
    * Book belongs to Author
    * Define an inverse one-to-many relationship.
    */
	public function drug() {

        return $this->belongsTo('Drug');

    }
	public function dose() {

        return $this->belongsTo('Dose');

    }

    /**
    * Search among Patients, drugs, doses
    * @return Collection
    */
    public static function search($query) {
	//Debug purpose
		/*	$dose = DB::table('patients')
           ->join('drugs', 'patients.drug_id', '=', 'drugs.id')
			->join('doses', 'drugs.dose_id', '=', 'doses.id')
            ->select('patients.drug_id', 'drugs.dose_ID', 'doses.dose')
            ->get();

			 print_r($dose);*/
			
        # If there is a query, search the library with that query
        if($query) {
            # Eager load Patient and drug

			$patients = Patient::with('drug')
            ->whereHas('drug', function($q) use($query) {
                $q->where('name', 'LIKE', "%$query%");
            })
            ->get();
/*
			$patients = Patient::with('drug')
            ->whereHas('drug', function($q) use($query) {
                $q->where('name', 'LIKE', "%$query%");
            })
			->join('drugs', 'drug_id', '=', 'drugs.id')
		    ->join('doses', 'drugs.dose_id', '=', 'doses.id')
            ->get();
*/
		//	print_r($patients);
            

		/*	$patients = Patient::with('drug')
				->join('drugs', 'patients.drug_id', '=', 'drugs.id')
				->join('doses', 'drugs.dose_id', '=', 'doses.id')
				->whereHas('name', function($q) use($query) {
                $q->where('name', 'LIKE', "%$query%");
            })
			->get();*/

        }
        # Otherwise, just fetch all patients
        else {
            # Eager load drugs and doses
			//JLim Get current user's study_role
		/*	 $user = DB::table('users')
            ->select('study_role')
            ->get();
			
			$user = Auth::user()->study_role;
		*/
			 #1 means This user is logged in as a study Role
		//	 if ($user == '1')
		//	 {
				  $patients = Patient::with('drug')
				->join('drugs', 'patients.drug_id', '=', 'drugs.id')
				->join('doses', 'drugs.dose_id', '=', 'doses.id')
				->select('*')
				->get();


		#	}
	#		else #This user is logged in as a non-study Role
		#	{
		#		$patients = Patient::with('drug')
		#		->select('photo', 'name', 'age', 'weight', 'visit_reason')
		#		->get();
				
		#	}
	
        }

        return $patients;
    }


}