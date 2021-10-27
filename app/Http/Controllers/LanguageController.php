<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bll\ApiConnection;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $code = ['code'=>'en'];
        $apiConnection = new ApiConnection();
        $languages = $apiConnection->connect('languages', 'index', 'GET', $code);

        return view('components.languages.index', compact('languages'));
    }

    public function changeStatus(Request $request){
        $data = ['item_id' => $request->item_id, 'status' => $request->status];
        $apiConnection = new ApiConnection();
        $response = $apiConnection->connect('languages', 'change_status', 'POST', $data, true);
        return $response;
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
}
