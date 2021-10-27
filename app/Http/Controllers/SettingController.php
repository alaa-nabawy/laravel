<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bll\ApiConnection;

class SettingController extends Controller
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

        return view('components.settings.index', compact('languages'));
    }

    public function ajax_settings($lang)
    {  
        $apiConnection = new ApiConnection();
        $settings = $apiConnection->connect('settings', 'index', 'GET', [], false, false, $lang);

        return $settings;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'title' => $request->title,
            'description'   => $request->description,
            'meta_description'  => $request->meta_description
        ];

        $apiConnection = new ApiConnection();
        $settings = $apiConnection->connect('settings', 'store_data', 'POST', $data, true, false, $request->lang);

        return $settings;

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
