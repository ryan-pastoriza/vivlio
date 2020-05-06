<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\auth_user;
use App\user_profile;

class UserManagementController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
	}
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $data = ['title'=> 'Vivlio | User Management', 'active' => 'user_management', 'user_info' => $this->get_user_info(), 'user_info' => $this->get_user_info()];
        
        return view('user_management.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function profile()
    {
        $data = ['title'=> 'Vivlio | Profile', 'active' => 'user_management', 'user_info' => $this->get_user_info()];
        
        return view('user_management.profile.index', compact('data'));
    }

    public function roles()
    {
        $data = ['title'=> 'Vivlio | Role', 'active' => 'user_management', 'user_info' => $this->get_user_info()];
        
        return view('user_management.roles.index', compact('data'));
    }

    public function create_user(Request $request){
        
        $retData = $request->input('form');
        $data = [];
        foreach ($retData as $value) {
            $data[$value['name']] = $value['value'];
        }
        if($data['confirmPassword'] != $data['password']){
            return 'Password Doesn\'t Match';
        }

        $user_id = auth_user::create([
                'username' => $data['username'],
                'password' => bcrypt($data['password']),
                'salt' => bcrypt($data['password']),
                'status_id' => 1,
            ]);
        // return $user_id['user_id'];
        // $user_auth->username = $data['username'];
        // $user_auth->password $data['password'];
        // $user_auth-> $data['confirmPassword'];
        $user_prof = user_profile::create([
            'user_id'=>$user_id['user_id'],
            'full_name'=>$data['full_name'],
            'gender'=>$data['gender'],
            'position'=>$data['position'],
            'contact_no'=>$data['contactNumber']
            ]);
        if (isset($user_prof)){
            return 'success';
        }
        // $data['full_name'];
        // $data['gender'];
        // $data['position'];
        return 'error';
    }

    public function load_users(){
        $data = user_profile::get()->toarray();
        return $data;
    }


}
