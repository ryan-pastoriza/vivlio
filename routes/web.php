<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard', 'HomeController@index');
Route::post('/initDashboard','HomeController@__initDashBoard');

/*pages [cpanel] */
/*Route::get('/cpanel', 'CpanelController@index');*/
Route::get('/cpanel', 'CpanelController@rda');
Route::get('/cpanel/rda', 'CpanelController@rda');
Route::get('/cpanel/announcement', 'CpanelController@announcement');
Route::get('/cpanel/company', 'CpanelController@company');
Route::get('/cpanel/printing', 'CpanelController@printing');
Route::get('/cpanel/circulation','CpanelController@circulation');
Route::post('/cpanel/company/edit', 'CpanelController@edit');

//Announcement
Route::post('/annoucement/save', 'AnnouncementController@save');
Route::post('/annoucement/fetch', 'AnnouncementController@fetch');
Route::post('/annoucement/delete', 'AnnouncementController@delete');
Route::post('/annoucement/edit', 'AnnouncementController@edit');


// rda controller
Route::post('/rda/store', 'cpanel\RDAController@store');
Route::post('/rda/update', 'cpanel\RDAController@update');
Route::post('/rda/fetch/{type}', 'cpanel\RDAController@fetch');
Route::post('/rda/remove', 'cpanel\RDAController@destroy');


// templatecontroller
Route::post('/template/populate', 'cpanel\TemplateController@populate');
Route::post('/template/add_to_template', 'cpanel\TemplateController@add_to_template');
Route::post('/template/remove_template', 'cpanel\TemplateController@remove_template');
Route::post('/template/fetch_tags', 'cpanel\TemplateController@fetch_tags');
// Route::post('/rda/save_subtag', 'cpanel\RDAController@store');

// CategoryController
Route::post('/category/store', 'cpanel\CategoryController@store');
Route::post('/category/populate', 'cpanel\CategoryController@populate');


// LoanRulesController
Route::post('/loan_rules/store', 'cpanel\LoanRulesController@store');
/*end pages [cpanel] */


/*pages [circulation] */
Route::get('/circulation', 'CirculationController@index');
Route::get('/circulation/borrow', 'CirculationController@borrow');
Route::get('/circulation/patrons', 'CirculationController@patrons');
Route::get('/circulation/utilization', 'CirculationController@utilization');
Route::get('/circulation/logs', 'CirculationController@logs');
Route::post('/circulation/fetch_patrons', 'CirculationController@fetch_patrons');
Route::post('/circulation/fetch_students', 'CirculationController@fetch_students');
Route::get('/circulation/FETCH', 'CirculationController@FETCH');
Route::post('/circulation/getStudentDataFromYear','CirculationController@getStudentDataFromYear');
Route::post('/circulation/saveStudentFromDB','CirculationController@saveStudentFromDB');
Route::post('/circulation/getPatronByID','CirculationController@getPatronByID');
Route::post('/circulation/getPatronByBarcode','CirculationController@getPatronByBarcode');
Route::post('/circulation/manual_save','CirculationController@manual_save');
Route::post('/circulation/edit','CirculationController@edit');
Route::post('/circulation/sort_by','CirculationController@get_data_in_range');
Route::post('/circulation/getItemByBarcode','CirculationController@getItemByBarcode');
Route::post('/circulation/saveLoanItem','CirculationController@saveLoanItem');
Route::post('/circulation/getTransactionDetails','CirculationController@getTransactionDetails');
Route::post('/circulation/getMaterialReservationDetails','CirculationController@getMaterialReservationDetails');
Route::post('/circulation/saveReserveItem','CirculationController@saveReserveItem');
Route::post('/circulation/saveRenewItem','CirculationController@saveRenewItem');
Route::post('/circulation/cancelReservedItem','CirculationController@cancelReservedItem');
Route::post('/circulation/checkItem','CirculationController@checkItem');
Route::post('/circulation/payFines','CirculationController@payFines');
Route::post('/circulation/getUtilItem','CirculationController@getUtilItem');

/*end pages [circulation] */


/*pages [technical] */
// Route::get('/technical', 'TechnicalController@index');
Route::get('/technical', 'TechnicalController@catalogue');
Route::get('/technical/acquisition', 'TechnicalController@acquisition');
Route::get('/technical/catalogue', 'TechnicalController@catalogue');
Route::get('/technical/indexing', 'TechnicalController@indexing');
Route::get('/technical/e_resource', 'TechnicalController@e_resource');


Route::post('/technical/saveResources', 'TechnicalController@saveResources');
Route::post('/technical/fetchResources', 'TechnicalController@fetchResources');
Route::post('/technical/downloadFile', 'TechnicalController@downloadFile');

/*end pages [technical] */

/* pages cataloging */
Route::post('technical/fetch', 'technical\CatalogController@fetch');
Route::post('technical/deleteMarc', 'technical\CatalogController@deleteMarc');
Route::post('technical/view_catalog_record', 'technical\CatalogController@view_catalog_record');
Route::post('technical/store', 'technical\CatalogController@store');
Route::post('technical/populate', 'technical\CatalogController@populate');
Route::post('technical/accession_book', 'technical\CatalogController@accession_book');
Route::post('technical/add_copy', 'technical\CatalogController@add_copy');
Route::post('technical/get_copies', 'technical\CatalogController@get_copies');
Route::post('technical/delete_copy', 'technical\CatalogController@delete_copy');
Route::post('technical/add_marc_record', 'technical\CatalogController@add_marc_record');
Route::post('technical/update_marc_record', 'technical\CatalogController@update_marc_record');
Route::post('technical/get_record_by_isbn', 'technical\CatalogController@get_record_by_isbn');
Route::post('technical/getQuickEditInfo', 'technical\CatalogController@getQuickEditInfo');
Route::post('technical/editQuick', 'technical\CatalogController@editQuick');
Route::post('technical/search_catalogue', 'technical\CatalogController@searchCatalogue');

/* end pages cataloging */


/*pages [report] */
/*Route::get('/report', 'ReportController@index');*/
Route::get('/report', 'ReportController@patron');
Route::get('/report/inventory', 'ReportController@inventory');
Route::get('/report/lmu', 'ReportController@lmu');
Route::get('/report/patron', 'ReportController@patron');
Route::get('/report/fines', 'ReportController@fines');
Route::get('/report/acquisition', 'ReportController@acquisition');
Route::get('/report/borrow', 'ReportController@borrow');
Route::post('/report/fetch/{type}', 'ReportController@fetch');
Route::post('/report/fetch_data_by_date','ReportController@fetch_data_by_date');
Route::post('/report/fetch_data_by_range','ReportController@fetch_data_by_range');
/*end pages [report] */


/*pages [user_management] */
Route::get('/user_management', 'UserManagementController@index');
Route::get('/user_management/profile', 'UserManagementController@profile');
Route::get('/user_management/roles', 'UserManagementController@roles');
Route::post('/user_management/create_user', 'UserManagementController@create_user');
Route::post('/user_management/load_users', 'UserManagementController@load_users');
/*end pages [user_management] */


/*Log (Entry)*/
Route::get('/{category}/log','LogController@index');
Route::post('log_patron','LogController@log_patron');
/*END Log (Entry)*/


/*Annoucement*/
Route::get('/announcement','AnnouncementController@index');
/*END Annoucement*/

//logout route (hack route)
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');


// ---------------------------------------------------------------------------------------------------

//opac 
Route::get('opac', 'OpacController@index');
Route::get('loadItemsList','OpacController@loadItemsList');
Route::post('loadItemsList/loginStudent','OpacController@loginStudent');
Route::post('loadItemsList/logoutStudent','OpacController@logoutStudent');
Route::post('loadItemsList/viewBorrowsReserves','OpacController@viewBorrowsReserves');
Route::post('loadItemsList/reserveBook','OpacController@reserveBook');
Route::post('loadItemsList/cancelReserve','OpacController@cancelReserve');
Route::post('loadItemsList/loadSearches','OpacController@loadSearches');


Route::get('test', function (){
    return "hello";
} );