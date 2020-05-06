<?php

namespace App\Http\Controllers\cpanel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PatronCategoryType;
use App\PatronCategories;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
	}
	
	public function store(Request $request){

		if( $request->input('category') == 'patron_category_type' ){

			$patron_category_type = new PatronCategoryType();
			$patron_category_type->category_name = $request->input('category_name');
			$patron_category_type->description = $request->input('description');
			$patron_category_type->save();
			return $patron_category_type->patron_category_type_id;

		}else if( $request->input('category') == 'patron_category' ){

			// return $request->input();
			$patron_category = new PatronCategories();
			$patron_category->description = $request->input('description');
			$patron_category->category_type_id = $request->input('category_type_id');
			$patron_category->enrolment_period = null;
			$patron_category->enrolment_period_date = null;

			if( $request->input('enrollment') == 'm'  ){
				$patron_category->enrolment_period = $request->input('inmonth');
			}else{
				$patron_category->enrolment_period_date = $request->input('untildate');
			}

			$patron_category->status = 'active';
			$patron_category->save();

			return $patron_category->patron_category_id;
			// return $patron_category;
		}

		// return $request->input();
	}

	public function fetch(Request $request){

	}

	public function populate(Request $request){

		if( $request->input('category') == 'patron_category_type' ){

			$patron_category_type = new PatronCategoryType();
			$categories = $patron_category_type::all()->toArray();
			return response()->json(['data' => $categories]);

		}else if(  $request->input('category') == 'patron_category' ){

			$categories = DB::table('patron_category_type')
				->join('patron_categories', 'patron_categories.category_type_id', '=', 'patron_category_type.category_type_id')
				->get(['patron_category_type.category_name',
						'patron_categories.patron_category_id',
						'patron_categories.category_type_id',
						'patron_categories.description',
						'patron_categories.enrolment_period',
						'patron_categories.enrolment_period_date'])
				->toArray();

				return response()->json(['data' => $categories]); 
		}

	}
}
