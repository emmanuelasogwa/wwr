<?php

namespace App\Http\Controllers;

use App\Scheme;

use Illuminate\Support\Facades\Input;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;
use Redirect;

class SchemesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all the referral schemes
        $schemes = Scheme::all();
        //load the view and pass the schemes
        return view('schemes.index')
        ->with('schemes', $schemes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('schemes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // input validation
        $rules = array(
            'title'       => 'required',
            'link'      => 'required',
            'creator' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('schemes/create')
                ->withErrors($validator)
                ->withInput();
        } else {
        $scheme = new Scheme;
        $scheme->title       = Input::get('title');
        $scheme->link      = Input::get('link');
        $scheme->description = Input::get('description');
        $scheme->creator   = Input::get('creator');
        $scheme->referer_reward = Input::get('referer_reward');
        $scheme->invitee_reward = Input::get('invitee_reward');
        $scheme->save();

        // redirect
        Session::flash('message', 'Successfully created scheme!');
        return Redirect::to('schemes/create');
    }
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
        $scheme = Scheme::findOrFail($id);

        return view('schemes.show')->withScheme($scheme);
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
}
