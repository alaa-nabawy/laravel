<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bll\ApiConnection;
use Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apiConnection = new ApiConnection();
        $users = $apiConnection->connect('users', 'index', 'GET', [], true);

        // dd($users);

        return view('components.users.index', compact('users'));
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

    public function login(){
        return view('index');
    }

    public function doLogin(Request $request){
        $request->validate([
            'phone_number'  => 'required',
            'password'  => 'required'
        ]);

        $data = [
            'phone_number'  => $request->phone_number,
            'password'  => $request->password,
            'admin'  => true
        ];

        // dd($data);

        $apiConnection = new ApiConnection();

        $login = $apiConnection->connect('users', 'login', 'POST', $data);

        // dd($login);

        if(isset($login->token)):
            Session::put('token', $login->token);
            return response()->json(['success' => 'seccess']);
        else:
            return $login;
        endif;
    }

    public function logout(Request $request){
        $apiConnection = new ApiConnection();

        $logout = $apiConnection->connect('users', 'logout', 'POST', [], true);

        if(isset($logout->success)):
            Session::forget('token');
            return redirect(route('login'));
        else:
            return  redirect(route('index'));
        endif;
    }
}
