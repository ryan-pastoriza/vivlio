<?php

namespace App\Http\Controllers\cpanel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\LoanRules;

class LoanRulesController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
	}
	
	public function store(Request $request) {

		// return $request->input();
		$loanRules = new LoanRules();

		$loanRules->patron_category_id= $request->input('patron_category_id');
		// $loanRules->material_type_id = $request->input('material_type_id');
		$loanRules->fine = $request->input('fine');
		$loanRules->max_loan_qty = $request->input('max_loan_qty');
		$loanRules->loan_length = $request->input('length_loan');
		$loanRules->save();
		// return $loanRules;
		return $loanRules->category_type_id;
	}

}
